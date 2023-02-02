<?php
require_once 'MyPDO.template.php';

MyPDO::setConfiguration('mysql:host=localhost;dbname=formations_recherche', 'root', '',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));