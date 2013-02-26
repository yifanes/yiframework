<?php

return array(
    'defaultController'	=>	'Index',
    'defaultAction'		=>	'index',
    'timeZone'			=>	'PRC',
    'debug'				=>	true,
    'errorReporting'	=>	-1,
    'db'=>array(
        'dsn'   => 'mysql:dbname=link;host=localhost',
        'user'  =>  'root',
        'pwd'   =>  '',
        'driver'=>  'pdo'
    )
);