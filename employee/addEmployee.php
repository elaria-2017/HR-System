<?php include '../shared/header.php'; ?>
<?php include '../shared/nav.php'; ?>
<?php include '../genral/configDatabase.php'; ?>
<?php include '../genral/functions.php'; ?>
<?php if(isset($_SESSION['admin'])=="ella"){ ?>
<?php
if(isset($_POST['send'])){
    $name=$_POST['name'];
    $salary=$_POST['salary'];
    $department=$_POST['department'];
$insert="INSERT INTO `emloyees` VALUES (NULL,'$name',$salary,$department)";
$i=mysqli_query($conn,$insert);
test($i,"insert to database");
}
$name="";
$salary="";
//list all deprtments
$select="SELECT * FROM `departments`";
$s=mysqli_query($conn,$select);
//edit part
$update=false;
if(isset($_GET['edit'])){
    $update=true;
    $id=$_GET['edit'];
    $select="SELECT * FROM `emloyees` WHERE id=$id";
    $ss=mysqli_query($conn,$select);
    $row=mysqli_fetch_assoc($ss);
    $name=$row['name'];
    $salary=$row['salary'];
if(isset($_POST['edit'])){
    $name=$_POST['name'];
    $salary=$_POST['salary'];
    $department=$_POST['department'];
$edit="update `emloyees` set name='$name' ,salary= $salary , deptID=$department where id=$id";
$i=mysqli_query($conn,$edit);
header('location: /final/employee/listEmployees.php');

}
}
auth();

?>


<h1 class="text-center text-primary display-3">Add Emloyees age</h1>

<div class="container col-6" >
        <div class="card">
        <div class="card-body">
        <form action="" method="POST" class="form-group">
            <div class="form-group">
                <label for=" " > Employee Name </label>
                <input type="text" value="<?php echo $name ?>" name="name" class="form-control">
            </div>
            <div class="form-group">
            <label for=" " > Employee Salary </label>
                <input type="text" value="<?php echo $salary ?>" name="salary" class="form-control">
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
            <?php if($update): ?>
            <button name="edit" class="btn btn-info btn-block"> edit data</button>
            <?php else: ?>
            <button name="send" class="btn btn-primary btn-block"> send data</button>
        <?php endif; ?>    
        </div>
        </form>
        </div>
        </div>

    </div>

<?php }else{ ?>
    <h1 class="text-center text-primary display-3">Not Authorized</h1>

    <?php } ?>
    <?php include '../shared/script.php'; ?>
