<?php

    include("db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM department WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $departmentName = $row['name'];
            
            
        }
    }

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $departmentName = $_POST['name'];
        
        $query = "UPDATE department set name = '$departmentName' WHERE id = '$id'";
        mysqli_query($conn, $query);

        $_SESSION['message'] = 'Department updated successfully';
        $_SESSION['message_type'] = 'warning';
        header("Location: ../../index.php");
    }

?>

<?php include("../header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="updateDepartment.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="name" value="<?php echo $departmentName; ?>" class="form-control" placeholder="Update Department Name"> 
                    </div>
                    <button class="btn btn-success" name="update">
                        Update

                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("../footer.php") ?>