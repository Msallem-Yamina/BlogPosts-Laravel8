<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'title',
        'image',
        'description',
        'category',
        'createur',
        'stat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'createur' , 'id');
    }

     /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
    
}
