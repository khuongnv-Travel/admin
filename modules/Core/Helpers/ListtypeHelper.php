<?php

namespace Modules\Core\Helpers;

use Modules\Backend\Models\ListModel;
use Modules\Backend\Models\ListtypeModel;

class ListtypeHelper
{
    public static function _getSingleByCode($type, $code, $column = '*')
    {
        $listtype = ListtypeModel::where('code', $type)->where('status', 1)->first();
        if(!empty($listtype)){
            $lists = ListModel::select($column)->where('listtype_id', $listtype->id)->where('code', $code)->where('status', 1)->first();
            return $lists;
        }
        return [];
    }
    public static function _getAllByCode($type, $column = '*')
    {
        $listtype = ListtypeModel::where('code', $type)->where('status', 1)->first();
        if(!empty($listtype)){
            $lists = ListModel::select($column)->where('listtype_id', $listtype->id)->where('status', 1)->get();
            return $lists;
        }
        return [];
    }
}