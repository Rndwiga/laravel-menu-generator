<?php
/**
 * Created by PhpStorm.
 * User: Rndwiga
 * Date: 2/28/2017
 * Time: 10:34 PM
 */

namespace Tyondo\MenuGenerator\Helpers;

class TyondoMenuGeneratorHelper
{
    public function generateMenu($navigation, $view=null){
        $filtered =[];
        foreach ($navigation as $nav){
            $arr = explode(',',$nav['role']);
            if (in_array(getUserRole(auth()->id()),$arr)){
                $filtered[] = $nav;
            }
        }
        if($view){
            return view($view)->with([
                'navigation' => $filtered
            ]);
        }
       // return view('tyondo_menu_generator::menu', compact('navigation'));
        return view('tyondo_menu_generator::menu')->with([
            'navigation' => $filtered
        ]);
    }

}
