<?php include '../shared/header.php'; ?>
<?php include '../shared/nav.php'; ?>
<?php include '../genral/configDatabase.php'; ?>
<?php include '../genral/functions.php'; ?>

<?php
if(isset($_POST['send'])){
    $name=$_POST['name'];
    $salary=$_POST['salary'];
    $department=$_POST['department'];
$insert="INSERT INTO `emloyees` VALUES (NULL,'$name',$salary,$department)";
$i=mysqli_query($conn,$insert);
test($i,"insert to database");
}
//list all deprtments
$select="SELECT * FROM `departments`";
$s=mysqli_query($conn,$select);

?>


<h1 class="text-center text-primary display-3">Add Emloyees age</h1>

<div class="container col-6" >
        <div class="card">
        <div class="card-body">
        <form action="" method="POST" class="form-group">
            <div class="form-group">
                <label for=" " > Employee Name </label>
                <input type="text"  name="name" class="form-control">
            </div>
            <div class="form-group">
            <label for=" " > Employee Salary </label>
                <input type="text"  name="salary" class="form-control">
            </div>
            <div class="form-group">
            <label for=" " > Employee Department </label>
              <!--  <input type="text"  name="department" class="form-control"> -->
               <select name="department" class="form-control">
                 <?php foreach($s as $data){ ?>
                 <option value="<?php echo $data['id']?>"><?php echo $data['name']?></option>
                 <?php } ?>
               </select>
            </div>
            <div class="form-group">
            <button name="send" class="btn btn-primary btn-block"> send data</button>
            </div>
        </form>
        </div>
        </div>

    </div>

<?php include '../shared/script.php'; ?>