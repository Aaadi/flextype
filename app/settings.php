<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'twig' => [
            'template_path' => PATH['themes'] . '/default/views/',
            'cache_path' => PATH['cache'] . '/twig',
        ],
    ],
];
