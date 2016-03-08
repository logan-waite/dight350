<?php

include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['check'])) 
    {
        $taskID = trim(filter_input(INPUT_POST, 'check', FILTER_SANITIZE_STRING));  
        $query = "UPDATE tasks 
                    SET taskStatus = 0 
                    WHERE taskID = :taskID";
        $result = $db->prepare($query);
        $result->execute(
            array(
                "taskID" => $taskID
            )
        );
    } 
    elseif (isset($_POST['task'])) 
    {
        $task = trim(filter_input(INPUT_POST, 'task', FILTER_SANITIZE_STRING));
        $query = "INSERT INTO tasks 
                    (title, priority, taskStatus) 
                    VALUES 
                    (:task, 1, 1)";
        $result = $db->prepare($query);
        $result->execute(
            array(
                "task" => $task
            )
        );
    } 
    elseif (isset($_POST['done'])) 
    {
        $taskID = trim(filter_input(INPUT_POST, 'done', FILTER_SANITIZE_STRING));
        $query = "DELETE FROM tasks WHERE taskID = :taskID";
        $result = $db->prepare($query);
        $result->execute(
            array(
                "taskID" => $taskID
            )
        );
    }
    elseif (isset($_POST['text']))
    {
        $taskID = trim(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING));
        $text = trim(filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING));
        
        $query = "UPDATE tasks 
                    SET title = :text 
                    WHERE taskID = :taskID";
        $result = $db->prepare($query);
        $result->execute(
            array(
                "taskID" => $taskID,
                "text" => $text
            )
        );
    }
    else 
    {
        echo "NOTHING!";
    }
}

?>