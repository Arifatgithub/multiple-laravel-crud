<?php

if (!function_exists('successResponse')) {
    function successResponse($alert)
    {
        session()->flash('success_mesage', $alert);
    }
}

if (!function_exists('errorResponse')) {
    function errorResponse($alert)
    {
        session()->flash('error_message', $alert);
    }
}

?>
