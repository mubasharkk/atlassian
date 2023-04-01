<?php

require_once 'vendor/autoload.php';

use \Mubasharkk\Atlassian\Services;

$appService = new Services\ApplicationService();

//$list = $appService->getAppsList();
$addOns = $appService->getAddons($_GET);

header('Content-Type: application/json; charset=utf-8');
//echo $list->toJson();
echo $addOns->toJson();