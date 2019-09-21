<?php

use App\pagination\Builder;
use \Doctrine\DBAL\Configuration;
use \Doctrine\DBAL\DriverManager;
use App\pagination\Results;
use App\pagination\Renders\PlainRenderer;

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
$users = $builder->paginate($_GET['page'] ?? 1, 10);

foreach ($users->get() as $user) {
    echo $user['id'] . "  " . $user['first_name'] . "<br>";
}

print_r($users->render());