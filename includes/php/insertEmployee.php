<?php 

    include("db.php");

    if (isset($_POST['save_employee'])) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $job = $_POST['job'];
        $email = $_POST['email'];
        $department = intval($_POST['selectDepartment']);

        $query = "INSERT INTO personnel(firstName, lastName, jobTitle, email, departmentID) VALUES ('$name', '$surname', '$job', '$email', '$department')";
        $result = mysqli_query($conn, $query);
        if (!$result) {

            die("Query failed!");
            
        }

        $_SESSION['message'] = 'Employee saved properly';
        $_SESSION['message_type'] = 'success';

        header("Location: ../../index.php");
    }

?>