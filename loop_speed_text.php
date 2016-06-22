#!/usr/bin/php
<?php
ini_set('memory_limit', '500M');
$max = 1000000;
$data = range(0, $max);

echo "\n\rSTART\n\r\n\r";
echo "STATEMENT/FUNC\t\t| TIME(secs)\n\r";

// array_filter loop
$time_start = microtime(true);
$newData = array_filter($data, function ($item) {
    return $item;
});

echo sprintf(
    "* %-15s\t| %.12f\n\r",
    "array_filter", microtime(true) - $time_start);



// array_map loop
$time_start = microtime(true);
$newData = array_map(function ($item) {
    return $item;
}, $data);

echo sprintf(
    "* %-15s\t| %.12f\n\r",
    "array_map", microtime(true) - $time_start);



// array_walk loop
$time_start = microtime(true);
$newData = array_walk($data, function ($item) {
    return $item;
});

echo sprintf(
    "* %-15s\t| %.12f\n\r",
    "array_walk", microtime(true) - $time_start);



// Foreach loop
$newData = [];
$time_start = microtime(true);
foreach ($data as $item) {
      $newData[] = $item;
}

echo sprintf(
    "* %-15s\t| %.12f\n\r",
    "foreach", microtime(true) - $time_start);



// Foreach loop (by &refrence)
$newData = [];
$time_start = microtime(true);
foreach ($data as &$item) {
      $item = $item;
}

echo sprintf(
    "* %-15s\t| %.12f\n\r",
    "foreach(&ref)", microtime(true) - $time_start);



// For loop 
$newData = [];
$time_start = microtime(true);
for($i=0;$i < $max;$i++) {
        $newData[] = $data[$i];
}

echo sprintf(
    "* %-15s\t| %.12f\n\r",
    "for", microtime(true) - $time_start);



// While loop
$newData = [];
$time_start = microtime(true);
$i = 0;
while ($i < $max) {
    $newData[] = $data[$i];
    $i++;
}

echo sprintf(
    "* %-15s\t| %.12f\n\r",
    "while", microtime(true) - $time_start);

echo "\n\r\n\rEND\n\r";
?>
