<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Page extends Model
{
    /**
     * @param $position : like css top right bottom left
     * @return mixed : return list of title for generate menu
     */
    public static function getMenu($position)
    {
        return DB::table('pages')
            ->select('menu_name', 'url_name')
            ->join('menus', 'pages.id', '=', 'menus.page_id')
            ->where('menu_position', '=', $position)
            ->orderBy('menu_order', 'asc')
            ->get();
    }

    public static function getPageId($page)
    {
        return DB::table('pages')
            ->select('pages.id')
            ->where('url_name', '=', $page)
            ->first();
    }

    /**
     * @param $page_name
     * @return mixed contain simple text by page
     */
    public static function choosePageText($page_name)
    {
        return DB::table('pages')
            ->select('text')
            ->where('url_name', '=', $page_name)
            ->first();
    }

    /**
     * @param $page_name
     * @return mixed
     */
    public static function currentPageTitle($page_name)
    {
        return DB::table('pages')
            ->select('head_title', 'menu_name')
            ->where('url_name', '=', $page_name)
            ->first();
    }

    public static function getContent($page_name)
    {

        return DB::table('pages')
            ->select('url_name', 'menu_name', 'head_title', 'text')
            ->where('url_name', '=', $page_name)
            ->get();
    }

    public static function getEditContent($page_name)
    {

        return DB::table('pages')
            ->select('pages.id','url_name', 'menu_name', 'head_title', 'text', 'menu_order')
            ->join('menus', 'pages.id', '=', 'menus.page_id')
            ->where('url_name', '=', $page_name)
            ->get();
    }

    public static function getContentFromId($page_id)
    {

        return DB::table('pages')
            ->select('*')
            ->where('id', '=', $page_id)
            ->get();
    }

    public static function updatePage($data, $page)
    {
        return DB::table('pages')
            ->where('url_name', $page)
            ->join('menus', 'pages.id', '=', 'menus.page_id')
            ->update([
                'url_name'      => $data['url_name'],
                'menu_name'     => $data['menu_name'],
                'head_title'    => $data['head_title'],
                'text'          => $data['text'],
                'menu_order'    => $data['menu_order'],
            ]);
    }
}
