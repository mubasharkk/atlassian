<?php

require_once 'vendor/autoload.php';

use \Mubasharkk\Atlassian;

$appService = new Atlassian\Services\ApplicationService();

header('Content-Type: application/json; charset=utf-8');
try {
    echo $appService->getAddons($_GET)->toJson();
} catch (Atlassian\Exceptions\BadRequest $ex) {
    echo $ex->toJson();
}