<?php

    include("db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT name FROM location WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $locationName = $row['name'];
                                    
        }
    }

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $locationName = $_POST['name'];
        
        $query = "UPDATE location set name = '$locationName' WHERE id = '$id'";
        
        $result = mysqli_query($conn, $query);
        
        if (!$result) {
            die("Query failed");
        }
        
        $_SESSION['message'] = 'Location updated successfully';
        $_SESSION['message_type'] = 'success';
        header("Location: ../../index.php");
    }

?>

<?php include("../header.php") ?>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="../../index.php" class="navbar-brand">PHP-MYSQL-JS&nbsp;&nbsp;&nbsp; <span class="C">C<span class="c" >reate</span></span><span class="C">R<span class="r" >ead</span></span><span class="C">U<span class="u" >pdate</span></span><span class="C">D<span class="d" >elete</span></a>
    </div>
</nav>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="updateLocation.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="name" value="<?php echo $locationName; ?>" class="form-control" placeholder=""> 
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