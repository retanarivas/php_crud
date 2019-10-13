<?php

    include("db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM task WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $title = $row['title'];
            $description = $row['description'];
            

            
        }
       





       /* $query = "UPDATE task SET (title = $title ,description = $description) WHERE id = $id";

       $result = mysqli_query($conn, $query);

       if (!$result) {
           die('something whent wrong updating the task');
       }

        $_SESSION['message'] = 'Taks updated succesfully';
        $_SESSION['message_type'] = 'success';

        header("Location: index.php"); */
    }

?>