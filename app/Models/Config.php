<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Config extends Model
{
    use HasFactory;

    public static function getConfig()
    {
        return DB::table('configs')
            ->select('*')
            ->first();
    }
}
