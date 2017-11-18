<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';
require 'service/CongregationService.php';
require 'service/SketchService.php';
require 'service/AgreementService.php';

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
    $json = $congregationService->getCongregationByUserID($request->getAttribute('userId'));

    return $response->withJson($json);
});

$app->get('/congregation/persons/{id}', function (Request $request, Response $response) {
    $congregationService = new CongregationService();
    $json = $congregationService->getCongregationAndPersonByID($request->getAttribute('id'));

    $response = $response->withJson($json);
    return $response;
});

$app->get('/person/{id}', function (Request $request, Response $response) {
    $personService = new PersonService();
    $json = $personService->getPersonByID($request->getAttribute('id'));

    return $response->withJson($json);
});

$app->get('/person/name/{name}', function (Request $request, Response $response) {
    $personService = new PersonService();
    $json = $personService->getPersonByName($request->getAttribute('name'));

    return $response->withJson($json);
});

$app->get('/person/congregation/{congregation_id}', function (Request $request, Response $response) {
    $personService = new PersonService();
    $json = $personService->getPersonByCongregationID($request->getAttribute('congregation_id'));

    return $response->withJson($json);
});

$app->get('/sketch/number/{number}', function (Request $request, Response $response) {
    $sketchService = new SketchService();
    $json = $sketchService->getSketchByNumber($request->getAttribute('number'));

    return $response->withJson($json);
});

$app->get('/sketch/person/{id}', function (Request $request, Response $response) {
    $sketchService = new SketchService();
    $json = $sketchService->getSketchsByPersonID($request->getAttribute('id'));

    return $response->withJson($json);
});

$app->get('/agreement/{id}', function (Request $request, Response $response) {
    $agreementService = new AgreementService();
    $json = $agreementService->getAgreementByID($request->getAttribute('id'));

    return $response->withJson($json);
});

$app->get('/agreement/congregation/{congregation}/{timeLapse}', function (Request $request, Response $response) {
    $agreementService = new AgreementService();
    $json = $agreementService->getAgreementByCongregationAndTimeLapse($request->getAttribute('congregation'), $request->getAttribute('timeLapse'));

    return $response->withJson($json);
});

$app->get('/agreement/all/{timeLapse}', function (Request $request, Response $response) {
    $agreementService = new AgreementService();
    $json = $agreementService->getAgreementInTimeLapse($request->getAttribute('timeLapse'));

    return $response->withJson($json);
});

$app->get('/time_lapse/{id}', function (Request $request, Response $response) {
    $timeLapseService = new TimeLapseService();
    $json = $timeLapseService->getTimeLapseByID($request->getAttribute('id'));

    return $response->withJson($json);
});

$app->get('/time_lapse/current/', function (Request $request, Response $response) {
    $timeLapseService = new TimeLapseService();
    $json = $timeLapseService->getTimeLapseCurrent();

    return $response->withJson($json);
});

$app->get('/time_lapse/next/', function (Request $request, Response $response) {
    $timeLapseService = new TimeLapseService();
    $json = $timeLapseService->getTimeLapseNext();

    return $response->withJson($json);
});

$app->get('/time_lapse/last/', function (Request $request, Response $response) {
    $timeLapseService = new TimeLapseService();
    $json = $timeLapseService->getTimeLapseLast();

    return $response->withJson($json);
});

$app->run();

