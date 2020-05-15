<?php
 namespace App\Helpers\pen07;

 class ImgFile {

    public static function getInfo($txt)
    {
        return $txt;
    }

    public static function getImgFilePath($url, $txt)
    {
        $path_info = pathinfo($txt);
            if($path_info['extension'] == "pdf")
                echo '<img src="'.$url.'/images/ico/pdf.png" width="20px" height="20px" boreder="0">';
            elseif($path_info['extension'] == "doc" or $path_info['extension'] == "docx")
                echo '<img src="'.$url.'/images/ico/doc.png" width="20px" height="20px" boreder="0">';
            elseif($path_info['extension'] == "xls" or $path_info['extension'] == "xlsx")
                echo '<img src="'.$url.'/images/ico/xls.png" width="20px" height="20px" boreder="0">';
            elseif($path_info['extension'] == "zip" or $path_info['extension'] == "rar" or $path_info['extension'] == "7z")
                echo '<img src="'.$url.'/images/ico/zip.png" width="20px" height="20px" boreder="0">';
            elseif($path_info['extension'] == "jpg")
                echo '<img src="'.$url.'/images/ico/jpg.png" width="20px" height="20px" boreder="0">';
    }

    public static function getDateRussian() {
            $months = array(
                1 => 'Январь', 
                    'Февраль',
                    'Март',
                    'Апрель',
                    'Май',
                    'Июнь',
                    'Июль',
                    'Август',
                    'Сентябрь',
                    'Октябрь',
                    'Ноябрь',
                    'Декабрь');
        return $test = date($months[date( 'n' )] . ' Y' );
    }

    public static function str_gen_rand($length = 7)
    {
        $x = '';
            for($i = 1; $i <= $length; $i++)
            {
                $x .= random_int(0,255);
            }
        return substr($x, 0, $length);
    }
 }
?>
