<?php 

    include("db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        

        $query2 = "SELECT * FROM personnel WHERE departmentID = $id";
        $result2 = mysqli_query($conn, $query2);
        if (mysqli_num_rows($result2) == 0) {
            $query = "DELETE FROM department WHERE id = $id";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                die("Query Failed!");
            }
        
            $_SESSION['message'] = 'Department removed successfully';
            $_SESSION['message_type'] = 'danger';
            
        }
        else {

            $_SESSION['message'] = 'You cannot remove a department unless empty';
            $_SESSION['message_type'] = 'warning';
        }

        header("Location: ../../index.php");
        
    }

?>
