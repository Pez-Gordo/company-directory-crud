<?php include("includes/php/db.php") ?>

<?php include("includes/header.php") ?>
    
<div class="container p-4">

    <div class="row">

        <div class="col-md-4">

            <?php if (isset($_SESSION['message'])) { ?>

            <?php } ?>

            <div class="card card-body">

                <form action="./includes/php/insertEmployee.php" method="POST">

                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="surname" class="form-control" placeholder="Surname">
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_employee" value="Save Employee">

                </form>

            </div>

        </div>

        <div class="col_md_8">

        </div>

    </div>

</div>

<?php include("includes/footer.php") ?>