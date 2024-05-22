<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;



use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    

    /**
     * Display a listing of the resource.
     */


    public function index(Request $request)
    {
        // Retrieve all admins sorted by the latest created date
        $admins = Admin::latest()->get();

        // Check if pagination is requested
        if ($request->query('paginate') == 'true') {
            // Paginate the admins
            $admins = $admins->paginate();
        }

        // Return the view with admins data
        return view('admins.index', compact('admins'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admins.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:8'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $admin = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            DB::commit();

            return redirect()->route('admins.index')->with('success', 'Admin created successfully');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = Admin::findOrFail($id);

        return view('admins.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $admin = Admin::findOrFail($id);

        return view('admins.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' . $id,
            'password' => 'nullable|min:8'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $admin = Admin::findOrFail($id);

            $admin->name = $request->name;
            $admin->email = $request->email;
            if ($request->filled('password')) {
                $admin->password = bcrypt($request->password);
            }
            $admin->save();

            DB::commit();

            return redirect()->route('admins.index')->with('success', 'Admin updated successfully');
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $admin = Admin::findOrFail($id);

        try {
            $admin->delete();

            return redirect()->route('admins.index')->with('success', 'Admin deleted successfully');
        } catch (Exception $e) {
            return redirect()->route('admins.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Filter admins based on given criteria.
     */
    public function filter(Request $request)
    {
        $name = $request->name;
        $email = $request->email;

        $admins = Admin::when($name, function ($query) use ($name) {
            return $query->where('name', 'like', "%$name%");
        })
        ->when($email, function ($query) use ($email) {
            return $query->where('email', 'like', "%$email%");
        })
        ->get();

        return response()->json($admins);
    }

}