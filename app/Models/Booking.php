<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'service_id',
        'user_id',
        'address',
        'start_time',
        'end_time',
        'status',
    ];

    /**
     * Get the human readable status.
     *
     * @param  string  $value
     * @return string
     */
    public function getStatusAttribute($value){
        return $value==1?'PENDING':($value==2?'ACTIVE':'PAYMENT');
    }

    /**
     * Get the service for the booking.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get the user for the booking.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
