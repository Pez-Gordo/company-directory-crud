<?php 

    include("db.php");

    if (isset($_POST['save_location'])) {
        $location = $_POST['location'];
        
        $query = "INSERT INTO location(name) VALUE ('$location')";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Query failed");            
        }

        $_SESSION['message'] = 'Location created properly';
        $_SESSION['message_type'] = 'success';

        header("Location: ../../index.php");
    }

?>