<?php 

    include("db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        

        $query2 = "SELECT * FROM department WHERE locationID = $id";
        $result2 = mysqli_query($conn, $query2);
        if (mysqli_num_rows($result2) == 0) {
            $query = "DELETE FROM location WHERE id = $id";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                die("Query Failed!");
            }
        
            $_SESSION['message'] = 'Location removed successfully';
            $_SESSION['message_type'] = 'success';
            
        }
        else {

            $_SESSION['message'] = 'You cannot remove a location unless empty';
            $_SESSION['message_type'] = 'danger';
        }

        header("Location: ../../index.php");
        
    }

?>
