<?php
require_once __DIR__ . '/core/Core.php'; // Trazendo a classe Core
require_once __DIR__ . '/router/routes.php'; // Trazendo a classe Routes

$core = new Core(); // Instânciando classe Core
$core->run($routes); // Método run em execução