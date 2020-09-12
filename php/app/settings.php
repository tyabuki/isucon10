<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Logger;

return function (ContainerBuilder $containerBuilder) {
    // Global Settings Object
    $containerBuilder->addDefinitions([
        'settings' => [
            'displayErrorDetails' => false, // Should be set to false in production
            'logger' => [
                'name' => 'slim-app',
                'path' => 'php://stdout', // __DIR__ . '/var/log/app.log'
                'level' => Logger::DEBUG,
            ],
            'database' => [
                'host' => '10.162.36.103',
                'port' => '3306',
                'user' => 'isucon',
                'pass' => 'isucon',
                'dbname' => 'isuumo',
            ],
        ],
    ]);
};
