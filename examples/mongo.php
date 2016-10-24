<?php

$connection = new MongoClient();
$collection = $connection->test->megasena;
$cursor = $collection->find();

foreach ($cursor as $document) {
    echo $document["Concurso"] . "<br/>";
}
