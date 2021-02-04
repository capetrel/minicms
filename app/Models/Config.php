<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Config extends Model
{
    use HasFactory;

    public static function getSiteMeta(int $id) {
        return DB::table('configs')
            ->select('site_url', 'site_keywords', 'site_description')
            ->where('id', '=', $id)
            ->first();
    }

    public static function getConfig()
    {
        return DB::table('configs')
            ->select('*')
            ->first();
    }

    public static function updateConfig($datas, $id)
    {
        return DB::table('configs')
            ->where('id', $id)
            ->update([
                'site_name'          => $datas['site_name'],
                'site_slogan'        => $datas['site_slogan'],
                'site_url'           => $datas['site_url'],
                'site_keywords'      => $datas['site_keywords'],
                'site_description'   => $datas['site_description'],
            ]);
    }
}
