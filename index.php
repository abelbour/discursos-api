<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'service/CongregationService.php';

$app = new \Slim\App;

$app->get('/ping', function (Request $request, Response $response) {
    $response->getBody()->write("pong");

    return $response;
});

$app->get('/congregation/{id}', function (Request $request, Response $response) {
    $congregationService = new CongregationService();
    $json = $congregationService->getCongregationByID($request->getAttribute('id'));

    $response = $response->withJson($json);
    return $response;
});

$app->get('/congregation/user/{userId}', function (Request $request, Response $response) {
    $congregationService = new CongregationService();
    $json = $congregationService->getCongregationByUserID($request->getArgument('userId'));

    return $response->withJson($json);
});

$app->run();

