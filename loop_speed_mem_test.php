#!/usr/bin/php
<?php
ini_set('memory_limit', '500M');
$max = 1000000;
$data = range(0, $max);

echo sprintf("\n\rSTART\t(Init Memory: %s)\n\r\n\r", number_format(memory_get_usage()));
echo "STATEMENT/FUNC\t\t| TIME(secs)\t\t| MEMORY(bytes)\n\r";

goto array_filter; // [array_filter, array_map, array_walk, foreach_loop, foreach_loop_ref, for_loop, while_loop]


array_filter: {  // array_filter loop
    $mem_start = memory_get_usage();
    $time_start = microtime(true);
    $newData = array_filter($data, function ($item) {
        return $item;
    });

    exit(sprintf(
        "* %-15s\t| %.12f\t| %s\n\r",
        "array_filter", microtime(true) - $time_start, number_format(memory_get_usage() - $mem_start)));
}


array_map: {      // array_map loop
    $mem_start = memory_get_usage();
    $time_start = microtime(true);
    $newData = array_map(function ($item) {
        return $item;
    }, $data);

    exit(sprintf(
        "* %-15s\t| %.12f\t| %s\n\r",
        "array_map", microtime(true) - $time_start, number_format(memory_get_usage() - $mem_start)));
}


array_walk: {     // array_walk loop
    $mem_start = memory_get_usage();
    $time_start = microtime(true);
    $newData = array_walk($data, function ($item) {
        return $item;
    });

    exit(sprintf(
        "* %-15s\t| %.12f\t| %s\n\r",
        "array_walk", microtime(true) - $time_start, number_format(memory_get_usage() - $mem_start)));
}

foreach_loop: {   // Foreach loop
    $newData = [];
    $mem_start = memory_get_usage();
    $time_start = microtime(true);
    foreach ($data as $item) {
          $newData[] = $item;
    }

    exit(sprintf(
        "* %-15s\t| %.12f\t| %s\n\r",
        "foreach", microtime(true) - $time_start, number_format(memory_get_usage() - $mem_start)));
}


foreach_loop_ref: {    // Foreach loop (by &refrence)
    $newData = [];
    $mem_start = memory_get_usage();
    $time_start = microtime(true);
    foreach ($data as &$item) {
          $item = $item;
    }

    exit(sprintf(
        "* %-15s\t| %.12f\t| %s\n\r",
        "foreach(&ref)", microtime(true) - $time_start, number_format(memory_get_usage() - $mem_start)));
}

for_loop: {   // For loop 
    $newData = [];
    $mem_start = memory_get_usage();
    $time_start = microtime(true);
    for($i=0;$i < $max;$i++) {
            $newData[] = $data[$i];
    }

    exit(sprintf(
        "* %-15s\t| %.12f\t| %s\n\r",
        "for", microtime(true) - $time_start, number_format(memory_get_usage() - $mem_start)));
}


while_loop: {    // While loop
    $newData = [];
    $mem_start = memory_get_usage();
    $i = 0;
    $time_start = microtime(true);
    while ($i < $max) {
        $newData[] = $data[$i];
        $i++;
    }

    exit(sprintf(
        "* %-15s\t| %.12f\t| %s\n\r",
        "while", microtime(true) - $time_start, number_format(memory_get_usage() - $mem_start)));
}

?>
