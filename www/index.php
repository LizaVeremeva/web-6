<?php
require 'vendor/autoload.php';
require 'ClientFactory.php';
require 'ElasticExample.php';
require 'RedisExample.php';
require 'ClickhouseExample.php';

echo "<h1>Лабораторная работа 6 - Нереляционные базы данных</h1>";
echo "<h2>Вариант 8: Новости (Elasticsearch)</h2>";

try {
    // Elasticsearch для новостей
    echo "<h3> Elasticsearch - Новости:</h3>";
    $elastic = new ElasticExample();
    $result1 = $elastic->addNews(1, 'Новая технология в IT', 'Компания представила инновацию...', 'технологии', '2024-01-15');
    echo "<pre>Добавлено: " . htmlspecialchars($result1) . "</pre>";
    
    $result2 = $elastic->searchNews(['title' => 'технология']);
    echo "<pre>Поиск: " . htmlspecialchars($result2) . "</pre>";

    // Redis
    echo "<h3> Redis:</h3>";
    $redis = new RedisExample();
    $result3 = $redis->setValue('last_news_id', '100');
    echo "<pre>SET: " . htmlspecialchars($result3) . "</pre>";
    
    $result4 = $redis->getValue('last_news_id');
    echo "<pre>GET: " . htmlspecialchars($result4) . "</pre>";

    // ClickHouse
    echo "<h3> ClickHouse:</h3>";
    $click = new ClickhouseExample();
    $result5 = $click->query('SELECT version()');
    echo "<pre>Запрос: " . htmlspecialchars($result5) . "</pre>";

} catch (Exception $e) {
    echo "<p style='color: red;'>Ошибка: " . $e->getMessage() . "</p>";
}