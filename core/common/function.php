<?php

function post($name,$default=false,$fitt=false)
{
    if (isset($_POST[$name])) {
        if ($fitt) {
            switch ($fitt) {
                case 'int':
                    if (is_numeric($_POST[$name])) {
                        return $_GET[$name];
                    } else {
                        return $default;
                    }
                    break;
                default:;

            }
        } else {
            return $default;
        }
    }
}