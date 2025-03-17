<?php

function dd($data)
{
    header('Content-Type: application/json');
    print_r(json_encode($data, JSON_PRETTY_PRINT));
    die;
}
