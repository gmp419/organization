<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function notes()
    // {
    //     return $this->hasMany(Note::class);
    // }

    // Post model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
