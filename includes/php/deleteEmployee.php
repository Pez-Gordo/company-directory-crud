<?php 

    include("db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM personnel WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Query Failed!");
        }

        $_SESSION['message'] = 'Employee removed successfully';
        $_SESSION['message_type'] = 'success';
        header("Location: ../../index.php");
    }

?>
