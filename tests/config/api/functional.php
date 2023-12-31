<?php
/**
 * Application configuration for frontend functional tests
 */
return yii\helpers\ArrayHelper::merge(
    require(YII_APP_BASE_PATH . '/common/config/base.php'),
    require(YII_APP_BASE_PATH . '/common/config/web.php'),
    require(YII_APP_BASE_PATH . '/api/config/base.php'),
    require(YII_APP_BASE_PATH . '/api/config/web.php'),
    require(dirname(__DIR__) . '/base.php'),
    require(dirname(__DIR__) . '/common/functional.php')
);
