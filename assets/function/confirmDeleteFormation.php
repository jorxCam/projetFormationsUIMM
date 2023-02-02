<?php

require_once "../src/MyPDO.php";

$stmt = MyPDO::getInstance()->prepare(<<<SQL
update formation
SET description = 1
where id = :id
SQL

);
$stmt->bindParam(':id',$_GET["q"]);
$stmt->execute();

header('Location: ../../dashboard.php');
