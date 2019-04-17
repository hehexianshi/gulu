<?php
define('APP_PATH', __DIR__);

require __DIR__ . "/src/autoload.php";

$app = new App();

$app->run();
