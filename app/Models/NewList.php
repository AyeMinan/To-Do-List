<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewList extends Model
{
    use HasFactory;

    protected $fillable = [
        'newLists'
    ];

    public function notes(){
        return $this->hasMany(Note::class, 'new_list_id');
    }
 }
