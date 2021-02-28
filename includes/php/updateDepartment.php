<?php

    include("db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM department WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $departmentName = $row['name'];
            $locationID = $row['locationID'];
            
            
        }
    }

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $locationID = $_POST['select_location'];
        $departmentName = $_POST['name'];
        
        $query = "UPDATE department set name = '$departmentName', locationID = '$locationID' WHERE id = '$id'";
        
        $result = mysqli_query($conn, $query);
        
        if (!$result) {
            die("Query failed");
        }
        
        $_SESSION['message'] = 'Department updated successfully';
        $_SESSION['message_type'] = 'success';
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
                    <div class="form-group">
                        <select name="select_location" class="form-select" placeholder="Select Location">
                        <!-- Populate <select> options dinamically -->
                        <?php 
                                $query2 = "SELECT * FROM location";
                                $result2 = mysqli_query($conn, $query2);
                            
                                while($row1 = mysqli_fetch_array($result2)):; 
                            ?>
                            <option value='<?php echo $row1[0];?>'><?php echo $row1[1];?></option>
                            <?php endwhile;?>
                        </select>
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