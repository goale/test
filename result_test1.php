<?php

function get_trace($array)
{
    return array_reduce($array, function ($carry, $item) {
        return [$item => $carry];
    });
}

$x = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];

print_r(get_trace($x));
