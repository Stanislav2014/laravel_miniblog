<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug'
    ];
    /**
     * get users by role
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
