<?php
namespace Date;

class DateFormat
{
    public static function invoce_pdf($time)
    {
            $published = date('F Y', $time);
        return strtr($published, trans('date.month_declensions'));
    }

}