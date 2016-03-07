<?php
    try {
    $link = new PDO(
        'mysql:host=localhost;dbname=dight350',
        'root',
        'root'
    );

    $link->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

    $link->setAttribute(
        PDO::ATTR_DEFAULT_FETCH_MODE,
        PDO::FETCH_ASSOC
);

    } catch (Exception $error) {
        echo "Cannot connect to the database";
    }

    try {
        $query_string = "
            SELECT name, type, creator, effect
            FROM enchanted_items
            ORDER BY type
        ";

        $results = $link->query($query_string);

        echo "<table border='1'>";
        echo "
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Creator</th>
                <th>Effect</th>
            </tr>";
        foreach($results as $item) {
            echo "
            <tr>
                <td>{$item['name']}</td>
                <td>{$item['type']}</td>
                <td>{$item['creator']}</td>
                <td>{$item['effect']}</td>
            </tr>";
        }

        echo "<table>";
    } catch (Exception $error) {
            echo "Could not retrieve information from the database";
    }

 ?>
