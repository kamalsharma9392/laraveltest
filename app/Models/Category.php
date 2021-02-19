<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','parent_id'
    ];

    /**
     * Get the services for the category.
     */
    public function services()
    {
        return $this->belongsToMany(Service::class,'service_category');
    }

    /**
     * Get the child for the category.
     */
    public function child()
    {
        return $this->hasMany(self::class);
    }

    /**
     * Get the parent for the category.
     */
    public function parent()
    {
        return $this->belongsTo(self::class);
    }
}
