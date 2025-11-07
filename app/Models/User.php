<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // ✅ Table name (existing table in your database)
    protected $table = 'users';

    // ✅ Columns that can be mass-assigned
    protected $fillable = [
        'fullname',
        'email',
        'username',
        'password',
        'role',
    ];

    // ✅ If your `users` table doesn’t have created_at / updated_at
    public $timestamps = false;

    // ✅ Columns that should be hidden when serialized
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // ✅ Custom primary key (if your `id` column is auto-increment)
    protected $primaryKey = 'id';
}
