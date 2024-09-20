<?php

require __DIR__ . '/vendor/autoload.php';

use Doctrine\Common\Collections\ArrayCollection;

class A
{
    public function __construct(public string $a, public string $b) {}
}

// Define class B with properties $c and $d
class B
{
    public function __construct(public string $c, public string $d) {}
}

// Create instances of class A
$object1 = new A("value1a", "value1b");
$object2 = new A("value2a", "value2b");
$object3 = new A("value3a", "value3b");

// Create instances of class B
$objectB1 = new B("value1c", "value1d");
$objectB2 = new B("value2c", "value2d");
$objectB3 = new B("value3c", "value3d");

// Store the objects in an array
$list = [$object1, $object2, $object3];

// Store the objects in an array
$listB = [$objectB1, $objectB2, $objectB3];

$listC = array_merge($list, $listB);

$collection = new ArrayCollection($list);

$fil = $collection->filter(function ($el) {
    return $el->a === 'value1a';
});
print_r($fil);
