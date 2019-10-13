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
    }

    if(isset($_POST['update_task'])) {
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        $query = "UPDATE task SET title = '$title' ,description = '$description' WHERE id = $id";

       $result = mysqli_query($conn, $query);

       if (!$result) {
           die('something whent wrong updating the task');
       }

        $_SESSION['message'] = 'Taks updated succesfully';
        $_SESSION['message_type'] = 'success';

        header("Location: index.php");
        
    }

?>

<?php include("includes/header.php"); ?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">

                <div class="card card-body">
                    <form action="update_task.php?id=<?php echo $id?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Update Title" autofocus>
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="2" placeholder="Update description" class="form-control"><?php echo $description; ?></textarea>
                        </div>
                        <input type="submit" value="Update" class="btn btn-success btn-block" name="update_task">
                    </form>
                </div>

            </div>
        </div>
    </div>

<?php include("includes/footer.php"); ?>