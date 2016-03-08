<?php
    include 'db_connect.php';

    $queryResults = $db->query("SELECT * FROM tasks ORDER BY taskStatus DESC");
            
    $results = $queryResults->fetchAll(PDO::FETCH_ASSOC);

    $status = '';
?>
<html>
    <head>
        <link href='stylesheet.css' rel='stylesheet' type='text/css'>
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    </head>
    <body>
        <div id='wrapper'>
            <header>
                <h1>To-Do List</h1>
                <h3>To check something off, click the button to the right. Click it again to delete it from the list.</h3>
            </header>
            <?php
                foreach($results as $item) {
                    if (!$item['taskStatus']) {
                        $status = 'done';
                    } else {
                        $status = 'not-done';
                    }
                    echo "<div class='row'>";
                    echo "<button class='checkbox $status' value='{$item['taskID']}' name='check'></button>";
                    echo "<div class='items'>{$item['title']}</div>";
                    echo "<button class='edit' value='{$item['taskID']} name='edit'>Edit</button>";
                    echo "</div>";
                }
            ?>
            <input type='text' name='new_item' placeholder="New Item" id='new-item'>
            <button class='checkbox' name='submit'><i class='fa fa-plus fa-lg'></i></button>
        </div>    
        <script>
        $('.checkbox').click(function (event) {
            if ($(this).attr('name') == 'check') 
            {
                if ($(this).attr('class') == 'checkbox done') 
                {
                    $.post('items.php', { done : $(this).val() }, function (result) {
                        location.reload();
                    });
                } 
                else 
                {
                    $.post('items.php', { check : $(this).val() }, function (result) {
                        location.reload();
                    }); 
                }
                
            } 
            else if ($(this).attr('name') == 'submit') 
            {
                var task = $('#new-item').val().trim();
                console.log(task);
                if (task == "") 
                {
                    $('#new-item').css('background-color', 'red');
                } 
                else 
                {
                    $.post("items.php", { task : task }, function (result) {
                        //console.log(result);
                        location.reload();
                    })
                }
            }
        });
            
        $('.edit').click(function (event) {
            if ($(this).html() == 'Edit')
            {
                var text = $(this).prev().html();
            
                $(this).prevAll('.checkbox').css('display', 'none');
                $(this).prev().replaceWith("<input id='edit-item' type='text' value='"+text+"'>");
                $(this).css('width', '50px').html("Submit");   
            }
            else
            {
                var value = $(this).prevAll('.checkbox').attr('value');
                var text = $(this).prev('#edit-item').val();
                console.log(text);
                $.post("items.php", {id:value, text:text}, function (result) {
                    //console.log(result);
                   location.reload();
                
                })
            }

        })
            
        </script>
    </body>
</html>