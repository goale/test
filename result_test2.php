<?php

require 'vendor/autoload.php';

use Oakoae\Collection;
use Oakoae\DotToArrayConverter;
use Oakoae\ArrayToDotConverter;

$data1 = [
    'parent.child.field' => 1,
    'parent.child.field2' => 2,
    'parent2.child.name' => 'test',
    'parent2.child2.name' => 'test',
    'parent2.child2.position' => 10,
    'parent3.child3.position' => 10,
];

$converted = Collection::parse($data1, new DotToArrayConverter());

print_r($converted);

$original = Collection::parse($data1, new ArrayToDotConverter());

print_r($original);
