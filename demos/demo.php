<?php

require_once 'vendor/autoload.php';

use Win32Sound\PlayWav;

try {
    $ps = new PlayWav(__DIR__ . DIRECTORY_SEPARATOR . 'test.wav');
    $ps->async()->loop()->play();

    echo ' ';
    for ($i = 0; $i <= 10; $i++) {
        echo "\x08" . $i;
        sleep(1);
    }

    $ps->stop();
    echo PHP_EOL . 'Finished!';
    sleep(5);

} catch (Exception $e) {
    echo $e->getMessage();
}
