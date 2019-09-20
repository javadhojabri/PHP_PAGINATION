<?php

use App\pagination\Builder;
use \Doctrine\DBAL\Configuration;
use \Doctrine\DBAL\DriverManager;

require_once 'vendor/autoload.php';
$config = new Configuration();
$connection = DriverManager::getConnection([
    'dbname' => 'pagination',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql'
]);
$queryBuilder = $connection->createQueryBuilder();
$queryBuilder->select('*')->from('users');
$queryBuilder->execute()->fetchAll();
$builder = new Builder($queryBuilder);
$builder->paginate($_GET['page'] ?? 1, 10);