<?php

try {
    $db = new PDO(
        "mysql:host=localhost;dbname=dight350",
        "root",
        "root"
    );

    $db->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    $db->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
    );

    } catch (Exception $error) {
        echo "Cannot connect to the database.<br>";
    }

?>
