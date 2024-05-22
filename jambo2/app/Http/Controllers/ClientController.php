<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Client; // Assuming your model is named Client
use Exception;






class ClientController extends Controller
{
   

    /**
     * Display a listing of the clients.
     */
    public function index()
    {
        $clients = client::orderBy('created_at', 'DESC')->get();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new client.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created client in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients,email',
            'password' => 'required|min:8'
        ]);

        DB::beginTransaction();

        try {
            $client = client::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            DB::commit();

            return redirect()->route('clients.index')->with(['success' => 'client created successfully']);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified client.
     */
    public function show(string $id)
    {
        $client = client::findOrFail($id);
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified client.
     */
    public function edit(string $id)
    {
        $client = client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified client in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients,email,' . $id,
            'password' => 'nullable|min:8'
        ]);

        DB::beginTransaction();

        try {
            $client = client::find($id);

            if (!$client) {
                return Redirect::route('clients.index')->with(['error' => 'client not found']);
            }

            $client->name = $request->name;
            $client->email = $request->email;
            if ($request->has('password')) {
                $client->password = bcrypt($request->password);
            }
            $client->save();

            DB::commit();

            return redirect()->route('clients.index')->with(['success' => 'client updated successfully']);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified client from storage.
     */
    public function destroy(string $id)
    {
        $client = client::findOrFail($id);

        try {
            $client->delete();
            return redirect()->route('clients.index')->with(['success' => 'client deleted successfully']);
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    /**
     * Filter clients based on name and email.
     */
    public function clientFilter(Request $request)
    {
        $name = $request->name;
        $email = $request->email;

        $clients = client::when($name, function ($query) use ($name) {
            return $query->where('name', 'like', "%$name%");
        })
        ->when($email, function ($query) use ($email) {
            return $query->where('email', 'like', "%$email%");
        })
        ->get();

        return view('clients.index', compact('clients'));
    }
}