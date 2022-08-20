<?php

//phpinfo();

function pr($str) {
    echo '<pre>';
    var_dump($str);
    echo '</pre>';
}

// Redis

$redis = new Redis();
 
$redis->connect('redis', 6379);
$redis->auth('password');
 
$redis->set("status", "REDIS work!");
echo "<div style='margin-top: 20px;'>". $redis->get('status') . "</div>";

// DB

$connection = [
    'host' => 'mysql',
    'db_name' => 'docker',
    'user' => 'root',
    'password' => 'root'
];

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
];

try { 

    $start = new PDO("mysql:host={$connection['host']}", "{$connection['user']}", "{$connection['password']}");
    $start->exec("CREATE DATABASE IF NOT EXISTS docker CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");

    $connection = new PDO('mysql:host='.$connection['host'].';dbname='.$connection['db_name'].'', $connection['user'], $connection['password'], $options);

    $connection->exec("CREATE TABLE IF NOT EXISTS db (text VARCHAR(20))");

    $show = $connection->prepare('SHOW TABLES');
    $show->execute();
    $result = $show->fetchAll();

    echo "<div>MySQL Work!</div>";

    //pr($result);

} catch (\PDOException $e) {
    
}