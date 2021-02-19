<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'image',
        'description',
        'price',
        'status',
    ];

    /**
     * Get the human readable status.
     *
     * @param  string  $value
     * @return string
     */
    public function getStatusAttribute($value){
        return $value==1?'Active':'InActive';
    }

    /**
     * Get the bookings for the service.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    /**
     * Get the categories for the service.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class,'service_category');
    }
}
