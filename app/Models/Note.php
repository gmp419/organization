<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Note extends Model
{
    use HasFactory, Sortable;

    protected $guarded = [];

    public $sortable = [ 'header', 'body','tag_name', 'user_id'];
    

    // Post model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
