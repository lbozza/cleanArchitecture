<?php

use App\App\Infra\DAO\Product\ProductDAO;
use App\Domain\Product\ProductService;

$container = new \DI\Container();

$db = [
    'driver' => getenv('DB_DRIVER'),
    'charset' => getenv('DB_CHARSET'),
    'host' => '172.19.0.1',
    'port' => getenv('DB_PORT'),
    'dbname' => 'cleanarc',
    'user' => 'root',
    'pass' => 'root'
];

$conn = function () use ($db) {
    $pdo = new PDO('mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'], $db['user'], $db['pass']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
};

$container->set(Domain\Product\ProductService::class, function () use ($conn) {
    return new ProductService(
        new ProductDAO($conn())
    );
});
