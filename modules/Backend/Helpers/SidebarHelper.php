<?php
namespace Modules\Backend\Helpers;

class SidebarHelper
{
    static public function menu($layout, $module, $menu)
    {
        // dd($layout, $module, $menu);
        $htmls = '';
        if(isset($menu['child']) && !empty($menu['child'])){
            $htmls .= '<div class="nav-item" id="active_'.$module.'">';
            $htmls .= '<a class="nav-link dropdown-toggle" id="main_'.$module.'" href="#collapse_'.$module.'" role="button" data-bs-toggle="collapse" data-bs-target="#collapse_'.$module.'" aria-expanded="false" aria-controls="collapse_'.$module.'">';
            $htmls .= '<i class="'.$menu['icon'].' nav-icon"></i>';
            $htmls .= '<span class="nav-link-title">'.$menu['name'].'</span>';
            $htmls .= '</a>';

            $htmls .= '<div id="collapse_'.$module.'" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">';
            foreach($menu['child'] as $key => $value){
                if(isset($value['child']) && !empty($value['child'])){
                    $htmls .= '<a class="nav-link dropdown-toggle" href="#navbar_'.$key.'" role="button" data-bs-toggle="collapse" data-bs-target="#navbar_'.$key.'" aria-expanded="false" aria-controls="navbar_'.$key.'">'.$value['name'].'</a>';
                    $htmls .= '<div id="navbar_'.$key.'" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenuEcommerce">';
                    foreach($value['child'] as $keyChild => $valueChild){
                        $htmls .= '<a class="nav-link " href="ecommerce-products.html">'.$valueChild['name'].'</a>';
                    }
                    $htmls .= '</div>';
                }else{
                    $htmls .= '<a class="nav-link" id="action_'.$key.'" href="'.url($module.'/'.$key).'">'.$value['name'].'</a>';
                }
            }
            $htmls .= '</div></div>';
        }else{
            $htmls .= '<div class="nav-item">';
            $htmls .= '<a class="nav-link" id="main_'.$module.'" href="'.url($module).'" data-placement="left" style="display: flex;align-items: center;">';
            $htmls .= '<i class="'.$menu['icon'].' nav-icon"></i>';
            $htmls .= '<span class="nav-link-title">'.$menu['name'].'</span>';
            $htmls .= '</a>';
            $htmls .= '</div>';
        }
        return $htmls;
    }
}