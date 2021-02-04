<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Media extends Model
{

    protected $table = 'medias';

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'media_date';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'media_title',
        'media_thumb',
        'media_fullsize',
        'media_slug',
        'media_link',
        'media_description',
        'media_date',
        'category_id',
        'page_id',
    ];

    /**
     * @return mixed use toArray() Laravel method on the result
     */
    public static function getMediasCategories()
    {
        return DB::table('categories')
            ->pluck('category_name');
    }

    /* TODO : delete
    public static function getFormMediasCategories()
    {
        return DB::table('categories')
            ->select('*')
            ->get()->toArray();
    }
    */

    /**
     * @return array of collections
     */
    public static function getMediasFromCategory()
    {

        $categories= self::getMediasCategories();

        $media_from_category = [];

        foreach ($categories as $category)
        {
            $medias = DB::table('medias')
                ->select('medias.*')
                ->join('categories', 'medias.category_id', 'categories.id')
                ->where('categories.category_name', '=', $category)
                ->orderBy('media_date', 'desc')
                ->get();
            $media_from_category[$category] = $medias;

        }

        return $media_from_category;
    }

    public static function getMediaWithCategoryFromSlug($slug)
    {
        return DB::table('medias')
            ->select(
                'medias.id',
                'medias.media_title',
                'medias.media_fullsize',
                'medias.media_slug',
                'medias.media_link',
                'medias.media_description',
                'medias.media_date',
                'medias.updated_at',
                'medias.category_id',
                'categories.category_name',
                'categories.category_slug'
            )
            ->join('categories', 'medias.category_id', 'categories.id')
            ->where('media_slug', 'LIKE', $slug)
            ->first();
    }

    public static function getMedia($id)
    {
        return DB::table('medias')
            ->select('*')
            ->where('id', '=', $id)
            ->get();
    }

    public static function getMediaFiles($id)
    {
        return DB::table('medias')
            ->select('media_thumb', 'media_fullsize')
            ->where('id', '=', $id)
            ->first();
    }

    public static function updateMedia($datas, $id)
    {
        return DB::table('medias')
            ->where('id', $id)
            ->update([
                'media_title'          => $datas['media_title'],
                'media_thumb'          => $datas['media_thumb'],
                'media_fullsize'       => $datas['media_fullsize'],
                'media_slug'           => $datas['media_slug'],
                'media_link'           => $datas['media_link'],
                'media_description'    => $datas['media_description'],
                'media_date'           => $datas['media_date'],
                'category_id'        => $datas['category_id'],
                'page_id'             => $datas['page_id'],
            ]);
    }


}
