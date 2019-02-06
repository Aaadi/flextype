<?php

namespace Flextype;

use Slim\Http\Request;
use Slim\Http\Response;

// Define named route
$app->get('/{uri:.+}', function (Request $request, Response $response, array $args) {

    $entry = Flextype::getEntry($args['uri']);

    if ($entry === null) {
        $entry['title'] = 'Error404';
        $entry['content'] = 'Error404';
        $entry['template'] = 'default';
    }

    return $this->view->render($response, 'templates/'.$entry['template'].'.html', [
        'entry' => $entry
    ]);

})->setName('entries');
