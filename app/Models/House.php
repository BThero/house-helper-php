<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'address',
        'city',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('user_role');
    }

    public static $rules = [
        'address' => 'string',
        'city' => 'required|string',
    ];
}
