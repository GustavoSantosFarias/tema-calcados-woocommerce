<?php

$array1 = array('sandalias', 'peep-toe');
$array2 = array('tenis', 'botas');

if (array_intersect($array2,$array1)) {
    print_r(array_intersect($array2,$array1));
}else{
    echo "failed";
}

