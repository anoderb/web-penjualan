<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class M_menu extends Model
{
    // firstmenu
    public static function firstmenus()
    {
        $query = DB::select('SELECT
                                    * 
                                FROM
                                    tb_menufirsts 
                                ORDER BY
                                    id_firstmenu DESC');
        return $query;
    }

    public static function firstmenu_byid($id)
    {
        return DB::table('tb_levels')->select('level_name')->where('id_level', $id)->first();
    }

    public static function firstmenu_store($data)
    {
        DB::table('tb_menufirsts')->insert($data);
    }

    public static function firstmenu_update($id, $data)
    {
        DB::table('tb_menufirsts')->where('id_firstmenu', $id)->update($data);
    }

    public static function firstmenu_destroy($id)
    {
        DB::table('tb_menufirsts')->where('id_firstmenu', $id)->delete();
    }

    // secondmenu
    public static function secondmenus()
    {
        $query = DB::select('SELECT
                                    A.*,
                                    b.firstmenu_name 
                                FROM
                                    tb_menuseconds AS A
                                    LEFT JOIN tb_menufirsts AS b ON A.id_firstmenu = b.id_firstmenu 
                                ORDER BY
                                    id_secondmenu DESC');
        return $query;
    }

    public static function secondmenu_store($data)
    {
        DB::table('tb_menuseconds')->insert($data);
    }

    public static function secondmenu_update($id, $data)
    {
        DB::table('tb_menuseconds')->where('id_secondmenu', $id)->update($data);
    }

    public static function secondmenu_destroy($id)
    {
        DB::table('tb_menuseconds')->where('id_secondmenu', $id)->delete();
    }

    // thirdmenu
    public static function thirdmenus()
    {
        $query = DB::select('SELECT
                                      A.*,
                                      b.secondmenu_name 
                                  FROM
                                      tb_menuthirds AS A
                                      LEFT JOIN tb_menuseconds AS b ON A.id_secondmenu = b.id_secondmenu 
                                  ORDER BY
                                      id_thirdmenu DESC');
        return $query;
    }

    public static function thirdmenu_store($data)
    {
        DB::table('tb_menuthirds')->insert($data);
    }

    public static function thirdmenu_update($id, $data)
    {
        DB::table('tb_menuthirds')->where('id_thirdmenu', $id)->update($data);
    }

    public static function thirdmenu_destroy($id)
    {
        DB::table('tb_menuthirds')->where('id_thirdmenu', $id)->delete();
    }

    // fourthmenu
    public static function fourthmenus()
    {
        $query = DB::select('SELECT
                                          A.*,
                                          b.thirdmenu_name 
                                      FROM
                                          tb_menufourths AS A
                                          LEFT JOIN tb_menuthirds AS b ON A.id_thirdmenu = b.id_thirdmenu 
                                      ORDER BY
                                          id_fourthmenu DESC');
        return $query;
    }

    public static function fourthmenu_store($data)
    {
        DB::table('tb_menufourths')->insert($data);
    }

    public static function fourthmenu_update($id, $data)
    {
        DB::table('tb_menufourths')->where('id_fourthmenu', $id)->update($data);
    }

    public static function fourthmenu_destroy($id)
    {
        DB::table('tb_menufourths')->where('id_fourthmenu', $id)->delete();
    }

    // other
    public static function firstmenu_list()
    {
        $query = DB::select('SELECT id_firstmenu, firstmenu_name FROM tb_menufirsts ORDER BY firstmenu_name ASC');
        return $query;
    }

    public static function secondmenu_list()
    {
        $query = DB::select('SELECT id_secondmenu, secondmenu_name FROM tb_menuseconds ORDER BY secondmenu_name ASC');
        return $query;
    }

    public static function thirdmenu_list()
    {
        $query = DB::select('SELECT id_thirdmenu, thirdmenu_name FROM tb_menuthirds ORDER BY thirdmenu_name ASC');
        return $query;
    }

    public static function menu_byidlevel($id_level)
    {
        $menus = [];

        // Get first menu by level
        $firstMenus = DB::table('tb_menufirsts')
            ->join('tb_accessmenus', 'tb_menufirsts.id_firstmenu', '=', 'tb_accessmenus.id_firstmenu')
            ->where('tb_accessmenus.id_level', $id_level)
            ->select('tb_menufirsts.*')
            ->distinct()
            ->get();

        foreach ($firstMenus as $firstMenu) {
            $menu = [
                'id' => $firstMenu->id_firstmenu,
                'name' => $firstMenu->firstmenu_name,
                'link' => $firstMenu->firstmenu_link,
                'icon' => $firstMenu->firstmenu_icon,
                'children' => []
            ];

            // Get second menu by first menu
            $secondMenus = DB::table('tb_menuseconds')
                ->join('tb_accessmenus', 'tb_menuseconds.id_secondmenu', '=', 'tb_accessmenus.id_secondmenu')
                ->where('tb_accessmenus.id_level', $id_level)
                ->where('tb_menuseconds.id_firstmenu', $firstMenu->id_firstmenu)
                ->select('tb_menuseconds.*')
                ->distinct()
                ->get();

            foreach ($secondMenus as $secondMenu) {
                $secondMenuData = [
                    'id' => $secondMenu->id_secondmenu,
                    'name' => $secondMenu->secondmenu_name,
                    'link' => $secondMenu->secondmenu_link,
                    'icon' => $secondMenu->secondmenu_icon,
                    'children' => []
                ];

                // Get third menu by second menu
                $thirdMenus = DB::table('tb_menuthirds')
                    ->join('tb_accessmenus', 'tb_menuthirds.id_thirdmenu', '=', 'tb_accessmenus.id_thirdmenu')
                    ->where('tb_accessmenus.id_level', $id_level)
                    ->where('tb_menuthirds.id_secondmenu', $secondMenu->id_secondmenu)
                    ->select('tb_menuthirds.*')
                    ->distinct()
                    ->get();

                foreach ($thirdMenus as $thirdMenu) {
                    $thirdMenuData = [
                        'id' => $thirdMenu->id_thirdmenu,
                        'name' => $thirdMenu->thirdmenu_name,
                        'link' => $thirdMenu->thirdmenu_link,
                        'icon' => $thirdMenu->thirdmenu_icon,
                        'children' => []
                    ];

                    // Get fourth menu by third menu
                    $fourthMenus = DB::table('tb_menufourths')
                        ->join('tb_accessmenus', 'tb_menufourths.id_fourthmenu', '=', 'tb_accessmenus.id_fourthmenu')
                        ->where('tb_accessmenus.id_level', $id_level)
                        ->where('tb_menufourths.id_thirdmenu', $thirdMenu->id_thirdmenu)
                        ->select('tb_menufourths.*')
                        ->distinct()
                        ->get();

                    foreach ($fourthMenus as $fourthMenu) {
                        $fourthMenuData = [
                            'id' => $fourthMenu->id_fourthmenu,
                            'name' => $fourthMenu->fourthmenu_name,
                            'link' => $fourthMenu->fourthmenu_link,
                            'icon' => $fourthMenu->fourthmenu_icon
                        ];

                        $thirdMenuData['children'][] = $fourthMenuData;
                    }

                    $secondMenuData['children'][] = $thirdMenuData;
                }

                $menu['children'][] = $secondMenuData;
            }

            $menus[] = $menu;
        }

        return $menus;
    }
}
