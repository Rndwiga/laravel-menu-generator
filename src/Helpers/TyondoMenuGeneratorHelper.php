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
    public function generateMenu($navigation){
        return view('tyondo_menu_generator::menu', compact('navigation'));
    }

}