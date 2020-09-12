<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Logger;

return function (ContainerBuilder $containerBuilder) {
    // Global Settings Object
    $containerBuilder->addDefinitions([
        'settings' => [
            'displayErrorDetails' => true, // Should be set to false in production
            'logger' => [
                'name' => 'slim-app',
                'path' => 'php://stdout', // __DIR__ . '/var/log/app.log'
                'level' => Logger::DEBUG,
            ],
            'database' => [
                'host' => getenv('MYSQL_HOST') ?: '10.162.36.103',
                'port' => getenv('MYSQL_PORT') ?: '3306',
                'user' => getenv('MYSQL_USER') ?: 'root',
                'pass' => getenv('MYSQL_PASS') ?: 'Knishiya248!',
                'dbname' => getenv('MYSQL_DBNAME') ?: 'isuumo',
            ],
        ],
    ]);
};
