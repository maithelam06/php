<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class language extends Model
{
   use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'canonical',
        'publish',
        'image',
        'user_id'

        
    ];
    protected $table = 'languages';


}


