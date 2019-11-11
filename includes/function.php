<?php

function isActive(String $menu)
{
    if (stripos($_SERVER["REQUEST_URI"], $menu)) {
        return true;
    }
    return false;
}