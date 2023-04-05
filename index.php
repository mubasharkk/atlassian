<?php

require_once 'vendor/autoload.php';

use \Mubasharkk\Atlassian;

$appService = new Atlassian\Services\ApplicationService();

header('Content-Type: application/json; charset=utf-8');


$urlpath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($urlpath) {
    case '/' :
        echo json_encode([
            'version' => '1.0.0',
            'availableRoutes' => [
                'GET /addons'
            ]
        ]);
        break;
    case '/api/addons' :
        try {
            echo $appService->getAddons($_GET)->toJson();
            http_response_code(200);
        } catch (Atlassian\Exceptions\BadRequest $ex) {
            http_response_code($ex->getCode());
            echo $ex->toJson();
        }
        break;
    default:
        http_response_code(404);
        echo json_encode([
            'error' => 'Route not found'
        ]);
        break;
}