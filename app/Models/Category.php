<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = 'categories';

    public static function getCategoryName($id)
    {
        return DB::table('categories')
            ->select('category_name')
            ->where('id', '=', $id)
            ->pluck('category_name')
            ->toArray();
    }

    public static function getCategoryFromSlug($slug)
    {
        return DB::table('categories')
            ->select('category_name', 'id')
            ->where('category_slug', '=', $slug)
            ->first();
    }

    public static function getCategories()
    {
        return DB::table('categories')
            ->select('*')
            ->get();
    }

    public static function getCategory($id)
    {
        return DB::table('categories')
            ->select('*')
            ->where('id', $id)
            ->get();
    }

    public static function updateCategory($datas, $id)
    {
        return DB::table('categories')
            ->where('id', $id)
            ->update([
                'category_name'          => $datas['category_name'],
                'category_slug'          => $datas['category_slug'],
            ]);
    }

}
