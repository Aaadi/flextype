<?php
session_start();

// Instantiate the app
$settings = require ROOT_DIR . '/app/settings.php';

$app = new \Slim\App($settings);

// Set up dependencies
require ROOT_DIR . '/app/dependencies.php';

// Register middleware
require ROOT_DIR . '/app/middleware.php';

// Register routes
require ROOT_DIR . '/app/routes.php';

// Run app
$app->run();
