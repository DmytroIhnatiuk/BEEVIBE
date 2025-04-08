<?php
require_once('helpers.php');
require_once('image_sizes.php');
require_once('favicon.php');
require_once('options-page.php');
function addZero($number) {
    if ($number > 0 && $number < 10) {
        return '0' . $number;
    }
    return (string)$number;
}
















