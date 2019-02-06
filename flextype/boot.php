<?php
session_start();

// Instantiate the app
$settings = require ROOT_DIR . '/flextype/slim/settings.php';

$app = new \Slim\App($settings);

// Set up dependencies
require ROOT_DIR . '/flextype/slim/dependencies.php';

// Register middleware
require ROOT_DIR . '/flextype/slim/middleware.php';

// Register routes
require ROOT_DIR . '/flextype/slim/routes.php';

// Run app
$app->run();
