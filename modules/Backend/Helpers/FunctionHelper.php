<?php

namespace Modules\Backend\Helpers;

class FunctionHelper
{
    /**
     * Thay thế các ký tự đặc biệt
     */
    public static function replaceBadChar($str)
    {
        $psRetValue = stripslashes($str);
        $psRetValue = str_replace('&', '&amp;', $psRetValue);
        $psRetValue = str_replace('<', '&lt;', $psRetValue);
        $psRetValue = str_replace('>', '&gt;', $psRetValue);
        $psRetValue = str_replace('"', '&#34;', $psRetValue);
        $psRetValue = str_replace("'", '&#39;', $psRetValue);
        return $psRetValue;
    }
    /**
     * Chuyển đổi chuỗi VN sang English
     */
    public static function convertVNtoEN($str)
    {
        $vnChars = array("á", "à", "ả", "ã", "ạ", "ă", "ắ", "ằ", "ẳ", "ẵ", "ặ", "â", "ấ", "ầ", "ẩ", "ẫ", "ậ", "é", "è", "ẻ", "ẽ", "ẹ", "ê", "ế", "ề", "ể", "ễ", "ệ", "í", "ì", "ì", "ỉ", "ĩ", "ị", "ó", "ò", "ỏ", "õ", "ọ", "ô", "ố", "ồ", "ổ", "ỗ", "ộ", "ơ", "ớ", "ờ", "ở", "ỡ", "ợ", "ú", "ù", "ủ", "ũ", "ụ", "ư", "ứ", "ừ", "ử", "ữ", "ự", "ý", "ỳ", "ỷ", "ỹ", "ỵ", "đ", "Á", "﻿À", "Ả", "Ã", "Ạ", "Ă", "Ắ", "Ằ", "Ẳ", "Ẵ", "Ặ", "Â", "Ấ", "Ầ", "Ẩ", "Ẫ", "Ậ", "É", "È", "Ẻ", "Ẽ", "Ẹ", "Ê", "Ế", "Ề", "Ể", "Ễ", "Ệ", "Í", "Ì", "Ỉ", "Ĩ", "Ị", "Ó", "Ò", "Ỏ", "Õ", "Ọ", "Ô", "Ố", "Ồ", "Ổ", "Ỗ", "Ộ", "Ơ", "Ớ", "Ờ", "Ở", "Ỡ", "Ợ", "Ú", "Ù", "Ủ", "Ũ", "Ụ", "Ư", "Ứ", "Ừ", "Ử", "Ữ", "Ự", "Ý", "Ỳ", "Ỷ", "Ỹ", "Ỵ", "Đ");
        $enChars = array("a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "i", "i", "i", "i", "i", "i", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "y", "y", "y", "y", "y", "d", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "E", "E", "E", "E", "E", "E", "E", "E", "E", "E", "E", "I", "I", "I", "I", "I", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "Y", "Y", "Y", "Y", "Y", "D");
        for ($i = 0; $i < sizeof($vnChars); $i ++) {
            $str = str_replace($vnChars[$i], $enChars[$i], $str);
        }
        return $str;
    }
    /**
     * Tạo một thư mục mới
     */
    public static function createFolder($pathLink, $folderYear = '', $folderMonth = '', $folderDay = '')
    {
        $sPath = str_replace("/", "\\", $pathLink);
        if(!file_exists($sPath)){
            // Tạo nhiều folder bên trong (thêm true)
            mkdir($sPath, 0777, true);
        }
        // Tạo folder theo năm (chưa tồn tại folder)
        if (!file_exists($sPath . $folderYear)) {
            mkdir($sPath . $folderYear, 0777);
            $sPath = $sPath . $folderYear;
            // Tạo folder theo tháng
            if (!file_exists($sPath . chr(92) . $folderMonth)) {
                mkdir($sPath . chr(92) . $folderMonth, 0777);
            }
        } else {
            // Tồn tại folder năm
            $sPath = $sPath . $folderYear;
            if (!file_exists($sPath . chr(92) . $folderMonth)) {
                mkdir($sPath . chr(92) . $folderMonth, 0777);
            }
        }
        // Tạo folder ngày
        if (!file_exists($sPath . chr(92) . $folderMonth . chr(92) . $folderDay)) {
            mkdir($sPath . chr(92) . $folderMonth . chr(92) . $folderDay, 0777);
        }
        // Kết quả trả về folder
        $strReturn = $pathLink . $folderYear . '/' . $folderMonth . '/' . $folderDay . '/';
        return str_replace("/", "\\", $strReturn);
    }
}