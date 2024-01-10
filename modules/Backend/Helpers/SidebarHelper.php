<?php

namespace Modules\Backend\Helpers;

class SidebarHelper
{
    static public function menu($module, $menu)
    {
        // dd($module, $menu);

        // <li>
        //     <a href="index.html" class="waves-effect">
        //         <i class="bx bx-home-variant-outline"></i>
        //         <span>Dashboard</span>
        //     </a>
        // </li>

        // <li>
        //     <a href="javascript: void(0);" class="has-arrow waves-effect">
        //         <i class="ri-share-line"></i>
        //         <span>Multi Level</span>
        //     </a>
        //     <ul class="sub-menu" aria-expanded="true">
        //         <li><a href="javascript: void(0);">Level 1.1</a></li>
        //         <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
        //             <ul class="sub-menu" aria-expanded="true">
        //                 <li><a href="javascript: void(0);">Level 2.1</a></li>
        //                 <li><a href="javascript: void(0);">Level 2.2</a></li>
        //             </ul>
        //         </li>
        //     </ul>
        // </li>



        $htmls = '';
        if (isset($menu['child']) && !empty($menu['child'])) {
            $htmls .= '<li>';
            $htmls .= '<a href="javascript: void(0);" class="has-arrow waves-effect">';
            $htmls .= '<i class="' . $menu['icon'] . '"></i>';
            $htmls .= '<span>' . $menu['name'] . '</span>';
            $htmls .= '</a>';
            // $htmls .= SidebarHelper::child($menu, $htmls);
            $htmls .= '<ul class="sub-menu" aria-expanded="true">';
            foreach ($menu['child'] as $key => $value) {
                if (isset($value['child']) && !empty($value['child'])) {
                    $htmls .= '<li><a href="javascript: void(0);" class="has-arrow">' . $value['name'] . '</a>';
                    $htmls .= '<ul class="sub-menu" aria-expanded="true">';
                    foreach ($value['child'] as $k => $v) {
                        $htmls .= '<li><a href="javascript: void(0);">' . $v['name'] . '</a></li>';
                    }
                    $htmls .= '</ul>';
                } else {
                    $htmls .= '<li><a href="javascript: void(0);">' . $value['name'] . '</a></li>';
                }
            }
            $htmls .= '</li>';
            $htmls .= '</ul>';
            $htmls .= '</li>';

            // $htmls .= '<div class="nav-item" id="active_'.$module.'">';
            // $htmls .= '<a class="nav-link dropdown-toggle" id="main_'.$module.'" href="#collapse_'.$module.'" role="button" data-bs-toggle="collapse" data-bs-target="#collapse_'.$module.'" aria-expanded="false" aria-controls="collapse_'.$module.'">';
            // $htmls .= '<i class="'.$menu['icon'].' nav-icon"></i>';
            // $htmls .= '<span class="nav-link-title">'.$menu['name'].'</span>';
            // $htmls .= '</a>';

            // $htmls .= '<div id="collapse_'.$module.'" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">';
            // foreach($menu['child'] as $key => $value){
            //     if(isset($value['child']) && !empty($value['child'])){
            //         $htmls .= '<a class="nav-link dropdown-toggle" href="#navbar_'.$key.'" role="button" data-bs-toggle="collapse" data-bs-target="#navbar_'.$key.'" aria-expanded="false" aria-controls="navbar_'.$key.'">'.$value['name'].'</a>';
            //         $htmls .= '<div id="navbar_'.$key.'" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenuEcommerce">';
            //         foreach($value['child'] as $keyChild => $valueChild){
            //             $htmls .= '<a class="nav-link " href="ecommerce-products.html">'.$valueChild['name'].'</a>';
            //         }
            //         $htmls .= '</div>';
            //     }else{
            //         $htmls .= '<a class="nav-link" id="action_'.$key.'" href="'.url($module.'/'.$key).'">'.$value['name'].'</a>';
            //     }
            // }
            // $htmls .= '</div></div>';
        } else {
            $htmls .= '<li>';
            $htmls .= '<a id="main_' . $module . '" href="' . url($module) . '" class="waves-effect">';
            $htmls .= '<i class="' . $menu['icon'] . '"></i>';
            $htmls .= '<span>' . $menu['name'] . '</span>';
            $htmls .= '</a>';
            $htmls .= '</li>';

            // $htmls .= '<div class="nav-item">';
            // $htmls .= '<a class="nav-link" id="main_'.$module.'" href="'.url($module).'" data-placement="left" style="display: flex;align-items: center;">';
            // $htmls .= '<i class="'.$menu['icon'].' nav-icon"></i>';
            // $htmls .= '<span class="nav-link-title">'.$menu['name'].'</span>';
            // $htmls .= '</a>';
            // $htmls .= '</div>';
        }
        // dd($htmls);
        return $htmls;
    }
    public static function child($child, $htmls)
    {
        // dd($child);

        // <li>
        //     <a href="javascript: void(0);" class="has-arrow waves-effect">
        //         <i class="ri-share-line"></i>
        //         <span>Multi Level</span>
        //     </a>
        //     <ul class="sub-menu" aria-expanded="true">
        //         <li><a href="javascript: void(0);">Level 1.1</a></li>
        //         <li><a href="javascript: void(0);" class="has-arrow">Level 1.2</a>
        //             <ul class="sub-menu" aria-expanded="true">
        //                 <li><a href="javascript: void(0);">Level 2.1</a></li>
        //                 <li><a href="javascript: void(0);">Level 2.2</a></li>
        //             </ul>
        //         </li>
        //     </ul>
        // </li>
        if (isset($child['child']) && !empty($child['child'])) {
            $htmls .= '<li>';
            $htmls .= '<a href="javascript: void(0);" class="has-arrow waves-effect">';
            $htmls .= '<i class="' . $child['icon'] . '"></i>';
            $htmls .= '<span>' . $child['name'] . '</span>';
            $htmls .= '</a>';
            $htmls .= '<ul class="sub-menu" aria-expanded="true">';
            foreach ($child['child'] as $k => $v) {
                $htmls .= SidebarHelper::child($v, $htmls);
            }
            $htmls .= '</ul>';
            $htmls .= '</li>';
            $htmls .= '</ul>';
            $htmls .= '</li>';
        } else {
            $htmls .= '<li>';
            $htmls .= '<a id="main_' . $module . '" href="' . url($module) . '" class="waves-effect">';
            $htmls .= '<i class="' . $menu['icon'] . '"></i>';
            $htmls .= '<span>' . $menu['name'] . '</span>';
            $htmls .= '</a>';
            $htmls .= '</li>';
        }
        dd($htmls);
        return $htmls;
    }
}
