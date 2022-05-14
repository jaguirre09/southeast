<?php


use Oneago\Arcturus\Core\Router\Request;
use Oneago\Arcturus\Core\Router\Router;

$app = new Router;

$app->get('/', function (Request $request, array $args) {
    return view('welcome');
});

$app->get('/test/{var}/', function (Request $request, array $args) {
    return $args['var'];
});

$app->post('/some/route', function (Request $request, array $args) {

});

// API use suggestion
$app->post('/api/{r}', function (Request $request, array $args) {
    header("Content-Type: application/json");
    if (empty($args['r'])) {
        http_response_code(400);
        echo "{\"error\": \"Resource not set. api format is /api/RESOURCE\"}";
        die();
    }
    return api($args['r']);
});

$app->setCustom404Page(function (Request $request) {
    return view('NotFound');
});

$app->run();