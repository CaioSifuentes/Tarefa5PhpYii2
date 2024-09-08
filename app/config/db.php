<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'pgsql:host=db;dbname='.$_ENV['DB_DATABASE'],
    'username' => trim($_ENV['DB_USERNAME']),
    'password' => trim($_ENV['DB_PASSWORD']),
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
