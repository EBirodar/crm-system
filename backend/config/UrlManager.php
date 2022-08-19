<?php

/** @var array $params */

return [
    'class' => 'codemix\localeurls\UrlManager',
    // 'hostInfo' => $params['backendHostInfo'],
    // 'baseUrl' => 'admin',
    'enablePrettyUrl' => true,
    'showScriptName' => false,
    'rules' => [
        ' ' => 'site/index',
//        '<_m:[\w\-]+>/<id:\d+>' => '<_m>/view',
//        '<_m:[\w\-]+>' => '<_m>/index',
//        '<_m:[\w\-]+>/<_a:[\w\-]+>/<id:\d+>' => '<_m>/<_a>',
//        '<_m:[\w\-]+>/<_a:[\w\-]+>' => '<_m>/<_a>',
    ],
];
