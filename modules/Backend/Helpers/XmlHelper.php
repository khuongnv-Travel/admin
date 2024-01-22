<?php

namespace Modules\Backend\Helpers;

use Modules\Core\Helpers\ListtypeHelper;

class XmlHelper
{
    public function xmlGenerateFormfield($xmlFileName, $datas)
    {
        $stringXmlContent = file_get_contents($xmlFileName);
        $stringXmlContent = simplexml_load_string($stringXmlContent);
        $objXML = json_decode(json_encode($stringXmlContent), true);
        // dd($objXML);
        $htmls = '';
        foreach($objXML['update_object']['formfield_list'] as $key => $value){
            $htmls .= $this->xmlGenerateInput($value);
        }
        return $htmls;
    }
    public function xmlGenerateInput($data)
    {
        $sLabel = isset($data['label']) && !empty($data['label']) ? $data['label'] : '';
        $sType = isset($data['type']) && !empty($data['type']) ? $data['type'] : '';
        $sRequired = isset($data['required']) && !empty($data['required']) ? $data['required'] : '';
        $sListtypeCode = isset($data['listtype_code']) && !empty($data['listtype_code']) ? $data['listtype_code'] : '';
        $sXmlData = isset($data['xml_data']) && !empty($data['xml_data']) ? $data['xml_data'] : '';
        $sXmlTagInDb = isset($data['xml_tag_in_db']) && !empty($data['xml_tag_in_db']) ? $data['xml_tag_in_db'] : '';
        $sColumnName = isset($data['column_name']) && !empty($data['column_name']) ? $data['column_name'] : '';
        $sWidth = isset($data['width']) && !empty($data['width']) ? $data['width'] : '';
        $sClassInput = isset($data['class_input']) && !empty($data['class_input']) ? $data['class_input'] : '';
        $sPlaceholder = isset($data['placeholder']) && !empty($data['placeholder']) ? $data['placeholder'] : '';
        $sObject = isset($data['object']) && !empty($data['object']) ? $data['object'] : '';
        $sOnchange = isset($data['onchange']) && !empty($data['onchange']) ? $data['onchange'] : '';
        $sClick = isset($data['click']) && !empty($data['click']) ? $data['click'] : '';
        $sValueDefault = isset($data['value_default']) && !empty($data['value_default']) ? $data['value_default'] : '';
        
        $required = $sRequired == true ? 'required' : '';
        $htmls = '<div class="mb-3 row">';
        $htmls .= '<div class="col-md-3"><label class="' . $required . '"><span>' . $sLabel . '</span></label></div>';
        switch($sType){
            case 'text': 
                $htmls .= '<div class="col-md-9"><input type="' . $sType . '" name="' . $sColumnName . '" id="' . $sColumnName . '" class="' . $sClassInput . '" placeholder="' . $sPlaceholder . '" value=""></div>';
                break;
            case 'file':
                $htmls .= '<div class="col-md-9">';
                $htmls .= '<label for="' . $sColumnName . '" class="btn btn-default mb-0">Chọn ảnh</label>';
                $htmls .= '<input hidden type="' . $sType . '" name="' . $sColumnName . '" id="' . $sColumnName . '" class="' . $sClassInput . '" placeholder="' . $sPlaceholder . '" value="" onchange="' . $sOnchange . '">';
                $htmls .= '<div id="feature_img" class="mt-1 col-md-3"></div></div>';
                break;
            case 'select':
                $arr = ListtypeHelper::_getAllByCode($sListtypeCode);
                $htmls .= '<div class="col-md-9"><select class="' . $sClassInput . '">';
                foreach($arr as $m => $n){
                    $htmls .= '<option value="' . $n->id . '">' . $n->name . '</option>';
                }
                $htmls .= '</select></div>';
                break;
        }
        $htmls .= '</div>';
        return $htmls;
    }
}