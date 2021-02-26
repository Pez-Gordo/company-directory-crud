<?php 

    include("db.php");

    if (isset($_POST['save_employee'])) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];

        $query = "INSERT INTO personnel(firstName, lastName) VALUES ('$name', '$surname')";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Query failed");
        }

        $_SESSION['message'] = 'Employee saved properly';
        $_SESSION['message_type'] = 'success';

        header("Location: ../../index.php");
    }

?>