<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'service/CongregationService.php';
require 'service/SketchService.php';
require 'service/AgreementService.php';

$container = new \Slim\Container;
$app = new \Slim\App($container);


$app->get('/ping', function (Request $request, Response $response) {
    $response->getBody()->write("pong");

    return $response;
});

$app->get('/congregation/{id}', function (Request $request, Response $response) {
    $congregationService = new CongregationService();
    $json = $congregationService->getCongregationByID($request->getAttribute('id'));

    $response = $response->withJson($json);
    return getStatusAndHead($response, $json);
});

$app->get('/congregation/user/{userId}', function (Request $request, Response $response) {
    $congregationService = new CongregationService();
    $json = $congregationService->getCongregationByUserID($request->getAttribute('userId'));

    return getStatusAndHead($response->withJson($json), $json);
});

$app->get('/congregation/persons/{id}', function (Request $request, Response $response) {
    $congregationService = new CongregationService();
    $json = $congregationService->getCongregationAndPersonByID($request->getAttribute('id'));

    $response = $response->withJson($json);
    return getStatusAndHead($response->withJson($json), $json);
});

$app->get('/person/{id}', function (Request $request, Response $response) {
    $personService = new PersonService();
    $json = $personService->getPersonByID($request->getAttribute('id'));

    return getStatusAndHead($response->withJson($json), $json);
});

$app->get('/person/name/{name}', function (Request $request, Response $response) {
    $personService = new PersonService();
    $json = $personService->getPersonByName($request->getAttribute('name'));

    return getStatusAndHead($response->withJson($json), $json);
});

$app->get('/person/congregation/{congregation_id}', function (Request $request, Response $response) {
    $personService = new PersonService();
    $json = $personService->getPersonByCongregationID($request->getAttribute('congregation_id'));

    return getStatusAndHead($response->withJson($json), $json);
});

$app->get('/sketch/number/{number}', function (Request $request, Response $response) {
    $sketchService = new SketchService();
    $json = $sketchService->getSketchByNumber($request->getAttribute('number'));

    return getStatusAndHead($response->withJson($json), $json);
});

$app->get('/sketch/person/{id}', function (Request $request, Response $response) {
    $sketchService = new SketchService();
    $json = $sketchService->getSketchsByPersonID($request->getAttribute('id'));

    return getStatusAndHead($response->withJson($json), $json);
});

$app->get('/agreement/{id}', function (Request $request, Response $response) {
    $agreementService = new AgreementService();
    $json = $agreementService->getAgreementByID($request->getAttribute('id'));

    return getStatusAndHead($response->withJson($json), $json);
});

$app->get('/agreement/congregation/{congregation}/{timeLapse}', function (Request $request, Response $response) {
    $agreementService = new AgreementService();
    $json = $agreementService->getAgreementByCongregationAndTimeLapse($request->getAttribute('congregation'), $request->getAttribute('timeLapse'));

    return getStatusAndHead($response->withJson($json), $json);
});

$app->get('/agreement/all/{timeLapse}', function (Request $request, Response $response) {
    $agreementService = new AgreementService();
    $json = $agreementService->getAgreementInTimeLapse($request->getAttribute('timeLapse'));

    return getStatusAndHead($response->withJson($json), $json);
});

$app->get('/time_lapse/{id}', function (Request $request, Response $response) {
    $timeLapseService = new TimeLapseService();
    $json = $timeLapseService->getTimeLapseByID($request->getAttribute('id'));

    return getStatusAndHead($response->withJson($json), $json);
});

$app->get('/time_lapse/current/', function (Request $request, Response $response) {
    $timeLapseService = new TimeLapseService();
    $json = $timeLapseService->getTimeLapseCurrent();

    return getStatusAndHead($response->withJson($json), $json);
});

$app->get('/time_lapse/next/', function (Request $request, Response $response) {
    $timeLapseService = new TimeLapseService();
    $json = $timeLapseService->getTimeLapseNext();

    return getStatusAndHead($response->withJson($json), $json);
});

$app->get('/time_lapse/last/', function (Request $request, Response $response) {
    $timeLapseService = new TimeLapseService();
    $json = $timeLapseService->getTimeLapseLast();

    return getStatusAndHead($response->withJson($json), $json);
});

//Override the default Not Found Handler
$container['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        $json = array('status' => 404, 'message'=>'not found' );;

        return $response->withJson($json);
    };
};

$app->run();

function getStatusAndHead($response, $json){
    if (array_key_exists('error', $json)) {

        $response = $response->withStatus($json['status']);
    }

    $response = $response->withHeader('Content-type', 'application/json');

    return $response;
}



