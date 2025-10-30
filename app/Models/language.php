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


    public function languages()
    {
        return $this->belongsToMany(PostCatalogue::class, 'post_catalogue_language', 'language_id', 'post_catalogue_id')
            ->withPivot(
                'name',
                'canonical',
                'meta_title',
                'meta_keyword',
                'meta_description',
                'description',
                'content'
            )->withTimestamps();
    }

}


