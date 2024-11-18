<?php

use Illuminate\Support\Str;

if (!function_exists('uniqueKey')) {
    function uniqueKey()
    {
        return strtoupper(Str::random() . uniqid() . date('s'));
    }
}

if (!function_exists('serialNo')) {
    function serialNo($iteration, $perPage) {
        $counter = 0;
        if (isset($_GET['page']) && $_GET['page'] > 1) {
            $counter = ($_GET['page'] - 1) * $perPage;
        }
        return $counter + $iteration;
    }
}


if (!function_exists('page_size_dropdown')) {
    function page_size_dropdown($xsw_cls = '') {
        // $_pageSize = \App\Models\Setting::get_setting()->pagesize ?? 0;
        $_pageSize = 25;
        $_numbers = [25, 50, 100, 200, 300, 400, 500];
        $_xscls = !empty($xsw_cls) ? $xsw_cls : 'xsw_20';
        $_str = "<select class='form-select form-select-sm {$_xscls}' id='itemCount' name='item_count' style='width:80px'>";
        foreach ($_numbers as $_key => $val) {
            if ($val == $_pageSize) {
                $_str .= "<option value='{$val}' selected>{$val}</option>";
            } else {
                $_str .= "<option value='{$val}'>{$val}</option>";
            }
        }
        $_str .= "</select>";
        return $_str;
    }
}

if (!function_exists('pr')) {
    function pr($object, $exit = true) {
        echo '<pre>';
        print_r($object);
        echo '</pre>';
        if ($exit == true) {
            exit;
        }
    }
}
