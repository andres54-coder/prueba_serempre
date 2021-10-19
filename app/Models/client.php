<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'cod',
        'name',
        'city_id'
    ];
    /**
     * Get the city associated with the user.
     */
    public function city()
    {
        return $this->belongsTo(city::class);
    }

}
