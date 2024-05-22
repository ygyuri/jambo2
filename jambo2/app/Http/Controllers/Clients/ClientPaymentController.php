<?php

namespace App\Http\Controllers\Clients;


use Exception;
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ClientPaymentController extends Controller
{
    /**
     * Display a listing of the client payments.
     */
    public function index()
    {
        $payments = Payment::orderBy('created_at', 'DESC')->get();
        return view('clientviews.payments-client.index', compact('payments'));
    }

    /**
     * Show the form for creating a new payment.
     */
    public function create()
    {
        return view('clientviews.payments-client.create');
    }

    /**
     * Store a newly created payment in storage.
     */
    public function store(Request $request)
    {
        // Validation rules
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required',
            'status' => 'required',
            'transaction_id' => 'required|unique:payments,transaction_id',
            'payment_date' => 'required|date',
        ]);

        // Begin database transaction
        DB::beginTransaction();
        try {
            // Create new payment
            $payment = Payment::create($request->all());

            // Commit transaction
            DB::commit();

            return redirect()->route('client.payments.index')->with('success', 'Payment created successfully');
        } catch (Exception $e) {
            // Rollback transaction on error
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified payment.
     */
    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        return view('clientviews.payments-client.edit', compact('payment'));
    }

    /**
     * Update the specified payment in storage.
     */
    public function update(Request $request, $id)
    {
        // Validation rules
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'amount' => 'required|numeric|min:0',
            'payment_method' => 'required',
            'status' => 'required',
            'transaction_id' => [
                'required',
                Rule::unique('payments')->ignore($id),
            ],
            'payment_date' => 'required|date',
        ]);

        // Begin database transaction
        DB::beginTransaction();
        try {
            // Find payment by ID
            $payment = Payment::findOrFail($id);

            // Update payment
            $payment->update($request->all());

            // Commit transaction
            DB::commit();

            return redirect()->route('client.payments.index')->with('success', 'Payment updated successfully');
        } catch (Exception $e) {
            // Rollback transaction on error
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified payment from storage.
     */
    public function destroy($id)
    {
        // Begin database transaction
        DB::beginTransaction();
        try {
            // Find payment by ID and delete
            Payment::findOrFail($id)->delete();

            // Commit transaction
            DB::commit();

            return redirect()->route('client.payments.index')->with('success', 'Payment deleted successfully');
        } catch (Exception $e) {
            // Rollback transaction on error
            DB::rollBack();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified payment.
     */
    public function show($id)
    {
        $payment = Payment::findOrFail($id);
        return view('clientviews.payments-client.show', compact('payment'));
    }
}