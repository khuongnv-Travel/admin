<?php

namespace Modules\Backend\Helpers;

class SidebarHelper
{
    static public function menu($module, $menu)
    {
        $htmls = '';
        if (isset($menu['child']) && !empty($menu['child'])) {
            $htmls .= '<li>';
            $htmls .= '<a href="javascript: void(0);" class="has-arrow waves-effect">';
            $htmls .= '<i class="'.$menu['icon'].'"></i>';
            $htmls .= '<span>'.$menu['name'].'</span>';
            $htmls .= '</a>';
            $htmls .= '<ul class="sub-menu" aria-expanded="true">';
            foreach ($menu['child'] as $key => $value) {
                if (isset($value['child']) && !empty($value['child'])) {
                    $htmls .= '<li><a href="javascript: void(0);" class="has-arrow">';
                    $htmls .= '<i class="'.$value['icon'].'"></i>';
                    $htmls .= '<span>'.$value['name'].'</span>';
                    $htmls .= '</a>';
                    $htmls .= '<ul class="sub-menu" aria-expanded="true">';
                    foreach ($value['child'] as $k => $v) {
                        $htmls .= '<li>';
                        $htmls .= '<a href="'.url($module.'/'.$key.'/'.$k).'">';
                        $htmls .= '<i class="'.$v['icon'].'"></i>';
                        $htmls .= '<span>'.$v['name'].'</span>';
                        $htmls .= '</a>';
                        $htmls .= '</li>';
                    }
                    $htmls .= '</ul>';
                } else {
                    $htmls .= '<li>';
                    $htmls .= '<a href="'.url($module.'/'.$key).'">';
                    $htmls .= '<i class="'.$value['icon'].'"></i>';
                    $htmls .= '<span>'.$value['name'].'</span>';
                    $htmls .= '</a>';
                    $htmls .= '</li>';
                }
            }
            $htmls .= '</ul>';
            $htmls .= '</li>';
        } else {
            $htmls .= '<li>';
            $htmls .= '<a id="main_'.$module.'" href="'.url($module).'" class="waves-effect">';
            $htmls .= '<i class="'.$menu['icon'].'"></i>';
            $htmls .= '<span>'.$menu['name'].'</span>';
            $htmls .= '</a>';
            $htmls .= '</li>';
        }
        return $htmls;
    }
}
