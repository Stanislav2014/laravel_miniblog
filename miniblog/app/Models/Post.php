<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'text',
        'public',
        'user_id'
    ];

    /**
     * get user by post
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
