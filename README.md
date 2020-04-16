### Installation

Once the repo is cloned, install the slim components using composer:
```
composer install
```

Setup a MySQL database named 'todo_app' and import the SQL file in the 'db' folder.

Create 'settings.php' and include the following code, altering the 'db' (database) information to point at your local SQL database.

```
<!--to go into settings.php-->

<?php
return [
    'settings' => [
        'displayErrorDetails' => false,
        'addContentLengthHeader' => false,

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        'db' => [
            'host' => 'mysql:host=127.0.0.1;',
            'dbName' => 'dbname=todo_app',
            'user' => 'user',
            'password' => 'password',
        ],
    ],
];
```


To run the application locally:
```
composer start
```

The app will run on port 8080 by default. Visit localhost:8080 in the browser once the app is running.

Yon can change the port the app is run on in composer.json by altering the 'start' script.
