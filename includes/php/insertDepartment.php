<?php 

    include("db.php");

    if (isset($_POST['save_department'])) {
        $departmentName = $_POST['department'];
		$locationID = $_POST['select_location'];
        

        $query = "INSERT INTO department(name, locationID) VALUES ('$departmentName', '$locationID')";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Query failed");
        }

        $_SESSION['message'] = 'Department created successfully';
        $_SESSION['message_type'] = 'success';

        header("Location: ../../index.php");
    }

?>