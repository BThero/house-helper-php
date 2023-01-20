<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;

    use HasFactory;

    public function houses()
    {
        return $this->hasMany(House::class);
    }

    protected $fillable = [
        'name', 'country', 'full_name'
    ];
}
