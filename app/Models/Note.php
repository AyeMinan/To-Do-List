<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'title', 'notes', 'due_date', 'new_list_id'
        // Add other attributes that you want to allow mass assignment for
    ];

    // Note.php model

    public function newList()
    {
        return $this->hasOne(NewList::class, 'new_list_id');
    }


}
