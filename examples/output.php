<?php

require_once __DIR__ . '/../loader.php';

$file = isset($argv[1]) ? getcwd() . '/' . $argv[1] : __DIR__ .  '/mazes/maze7.txt';
if (file_exists($file))
{
    $output = fopen('php://memory', 'x+');
    $output = fopen('/tmp/test2.htm', 'w+');

    $time = new Timer();

    $mrdr = new MazeReader($file);
    $maze = $mrdr->read();
    $solver = new AStarSolver();
    $path = $solver->solve($maze);

    $mwrt = new MazeWriter($maze, $path, $output, $time->elapsed());
    $mwrt->write('text/html');

    fseek($output, 0);
    var_dump(fread($output, 1000));
    exit;
}
