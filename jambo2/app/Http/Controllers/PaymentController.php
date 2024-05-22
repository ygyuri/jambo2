<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class PaymentController extends Controller
{
  
    /**
     * Display a listing of the payments.
     */
    public function index()
    {
        $payments = Payment::orderBy('created_at', 'DESC')->get();
        return view('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new payment.
     */
    public function create()
    {
        return view('payments.create');
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

        // Individual field validation
        $bookingId = $request->validate(['booking_id' => 'required|exists:bookings,id']);
        $amount = $request->validate(['amount' => 'required|numeric|min:0']);
        $paymentMethod = $request->validate(['payment_method' => 'required']);
        $status = $request->validate(['status' => 'required']);
        $transactionId = $request->validate(['transaction_id' => 'required|unique:payments,transaction_id']);
        $paymentDate = $request->validate(['payment_date' => 'required|date']);

        // Begin database transaction
        DB::beginTransaction();
        try {
            // Create new payment
            $payment = Payment::create($request->all());

            // Commit transaction
            DB::commit();

            return redirect()->route('payments.index')->with('success', 'Payment created successfully');
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
        return view('payments.edit', compact('payment'));
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

        // Individual field validation
        $bookingId = $request->validate(['booking_id' => 'required|exists:bookings,id']);
        $amount = $request->validate(['amount' => 'required|numeric|min:0']);
        $paymentMethod = $request->validate(['payment_method' => 'required']);
        $status = $request->validate(['status' => 'required']);
        $transactionId = $request->validate(['transaction_id' => Rule::unique('payments')->ignore($id)]);
        $paymentDate = $request->validate(['payment_date' => 'required|date']);

        // Begin database transaction
        DB::beginTransaction();
        try {
            // Find payment by ID
            $payment = Payment::findOrFail($id);

            // Update payment
            $payment->update($request->all());

            // Commit transaction
            DB::commit();

            return redirect()->route('payments.index')->with('success', 'Payment updated successfully');
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

            return redirect()->route('payments.index')->with('success', 'Payment deleted successfully');
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
        return view('payments.show', compact('payment'));
    }

    /**
     * Filter payments based on criteria.
     */
    public function filter(Request $request)
    {
        // Validation rules for filtering criteria
        $request->validate([
            'type' => 'nullable|in:internal,citizen',
            'booking_id' => 'nullable|exists:bookings,id',
            'status' => 'nullable',
            'payment_date' => 'nullable|date',
            'custom_date' => 'nullable|date',
            'custom_start_date' => 'nullable|date',
            'custom_end_date' => 'nullable|date|after_or_equal:custom_start_date',
        ]);

        // Build the query based on filtering criteria
        $filteredPayments = Payment::latest();

        if ($request->type) {
            $filteredPayments->where('type', $request->type);
        }

        if ($request->booking_id) {
            $filteredPayments->where('booking_id', $request->booking_id);
        }

        if ($request->status) {
            $filteredPayments->where('status', $request->status);
        }

        if ($request->payment_date) {
            $filteredPayments->whereDate('payment_date', $request->payment_date);
        }

        if ($request->custom_date) {
            $filteredPayments->whereDate('payment_date', $request->custom_date);
        }

        if ($request->custom_start_date && $request->custom_end_date) {
            $filteredPayments->whereBetween('payment_date', [
                $request->custom_start_date,
                $request->custom_end_date
            ]);
        }

        // Execute the query
        $filteredPayments = $filteredPayments->get();

        return view('payments.index', compact('filteredPayments'));
    }
}
