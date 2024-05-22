<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Client;


class Booking extends Model
{
    use HasFactory,  Uuids;
    // Explicitly specify the table name
    protected $table = 'bookings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id',
        'flight_id',
        'passenger_count',
        'seat_id',
        'total_price',
        'status',
        'payment_status',
        'booking_date',
        'booking_reference',
        'notes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'booking_date' => 'datetime',
    ];

    /**
     * Relationships
     */

    /**
     * A booking belongs to a client.
     *
     * @return BelongsTo
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    /**
     * A booking belongs to a flight.
     *
     * @return BelongsTo
     */
    public function flight(): BelongsTo
    {
        return $this->belongsTo(Flight::class);
    }

    /**
     * A booking belongs to a seat.
     *
     * @return BelongsTo
     */
    public function seat(): BelongsTo
    {
        return $this->belongsTo(Seat::class);
    }
}
