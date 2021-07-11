<?php

if (!function_exists('getFrontend')) {
    function getFrontend()
    {
        return $GLOBALS['TSFE'];
    }
}
