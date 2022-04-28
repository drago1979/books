<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    // Relationships
    public function books()
    {
        return $this->hasMany(Publisher::class);
    }
}
