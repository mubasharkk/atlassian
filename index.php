<?php

require_once 'vendor/autoload.php';

use \Mubasharkk\Atlassian;

$appService = new Atlassian\Services\ApplicationService();

header('Content-Type: application/json; charset=utf-8');
try {
    http_response_code(200);
    echo $appService->getAddons($_GET)->toJson();
} catch (Atlassian\Exceptions\BadRequest $ex) {
    http_response_code($ex->getCode());
    echo $ex->toJson();
}