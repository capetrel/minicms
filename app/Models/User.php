<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static function getUserInfo(int $id)
    {
        return DB::table('users')
            ->select('users.id', 'users.firstname', 'users.lastname', 'users.name', 'users.email')
            ->where('id', $id)
            ->first();
    }

    public static function updateUser($data, $id)
    {
        return DB::table('users')
            ->where('id', $id)
            ->update([
                'firstname'  => $data['firstname'],
                'lastname'   => $data['lastname'],
                'name'       => $data['name'],
                'email'      => $data['email'],
            ]);
    }
}
