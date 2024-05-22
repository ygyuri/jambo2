<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\Uuids;
use App\Models\Booking;




class Client extends Authenticatable
{
    use  HasFactory, Notifiable,  Uuids;
     // Explicitly specify the table name
     protected $table = 'clients';

    // Implement the missing method
    public function getAuthPasswordName()
    {
        return 'password';
    }
    /**
     * Check if the user is a client.
     *
     * @return bool
     */
    public function isClient()
    {
        // Check if there is a record in the 'clients' table with the user's id
        return $this->exists;
    }

    protected $guard = 'client';


 /**
     * A client can have many bookings.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be appended to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'full_name'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'enabled' => 'boolean'
    ];

    /**
     * Get the client's full name.
     *
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->name}";
    }
}