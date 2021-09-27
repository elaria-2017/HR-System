<?php include '../shared/header.php'; ?>
<?php include '../shared/nav.php'; ?>
<?php include '../genral/configDatabase.php'; ?>
<?php include '../genral/functions.php'; ?>

<?php
if(isset($_POST['send'])){
    $name=$_POST['name'];

$insert="INSERT INTO `departments` VALUES (NULL,'$name')";
$i=mysqli_query($conn,$insert);
test($i,"insert to dept");
}

?>


<h1 class="text-center text-primary display-3">Add Departments age</h1>

<div class="container col-6" >
        <div class="card">
        <div class="card-body">
        <form action="" method="POST" class="form-group">
            <div class="form-group">
                <label for=" " > Department Name </label>
                <input type="text"  name="name" class="form-control">
            </div>

            <div class="form-group">
            <button name="send" class="btn btn-primary btn-block"> send data</button>
            </div>
        </form>
        </div>
        </div>

    </div>

<?php include '../shared/script.php'; ?>