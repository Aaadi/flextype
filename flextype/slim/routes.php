<?php

namespace Flextype;

use Slim\Http\Request;
use Slim\Http\Response;

// Define named route
$app->get('/{uri:.+}', function (Request $request, Response $response, array $args) {

    var_dump(Entries::getEntry($args['uri']));
    //return $this->view->render($response, 'templates/default.html', [
    //    'uri' => $args['uri']
    //]);
})->setName('entries');
