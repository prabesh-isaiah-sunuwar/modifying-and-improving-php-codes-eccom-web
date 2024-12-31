<?php
//This is the database for the local host.
//everytime the data need to be added,updated or deleted.
//Login infromation for the local host
$pdo = new PDO(
    'mysql:dbname=job;host=mysql',
    'student',
    'student',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
