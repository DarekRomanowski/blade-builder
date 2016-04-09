<?php

require __DIR__.'/../vendor/autoload.php';

try {
    $app = new \BladeBuilder\App(
        getcwd() . '/views',
        getcwd() . '/cache'
    );
    echo $app->renderView(trim($_SERVER['REQUEST_URI'], '/'));
} catch (Exception $e) {
    echo 'Oops... Server made a boo boo';
}
