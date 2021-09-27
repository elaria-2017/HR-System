<?php include '../shared/header.php'; ?>
<?php include '../shared/nav.php'; ?>
<?php include '../genral/configDatabase.php'; ?>
<?php
if(isset($_POST['login'])){
    $name=$_POST['user'];
    $pass=$_POST['password'];
    if($_POST['role']=="admin"){

$select="SELECT * FROM `admin` WHERE name='$name' and password='$pass'";
$s=mysqli_query($conn,$select);
$numrows=mysqli_num_rows($s);
// lw rg3ly 7aga mn el select yb2a el user da hy3ml login s7 fa bsgl el name bta3o 34an yfdl el session mfto7
if($numrows>0)
{
    $_SESSION['admin']=$name;
    header('location:/final/employee/listEmployees.php');

}
else{
echo "<div class='alert alert-danger'>
<h1 class='text-center text-info display-4'> Not Admin Try Again</h1>
</div>";
}
    } elseif($_POST['role']=="employee"){
        $select="SELECT * FROM `emloyees` WHERE name='$name' and id='$pass' and deptID=1";
$s=mysqli_query($conn,$select);
$numrows=mysqli_num_rows($s);
if($numrows>0)
{
    $_SESSION['hr']=$name;
    header('location:/final/employee/listEmployees.php');

}
else{
echo "<div class='alert alert-danger'>
<h1 class='text-center text-info display-4'> Not Emloyee</h1>
</div>";
}
    }
}
?>

<div class="container col-6">
<h1 class="text-center text-primary display-3">Login Page</h1>

    <div class="card">
        <div class="card-body">
        <form action="" method="POST">
        <div class="form-group">
        <label for="" >User Name</label>    
        <input type="text" name="user" class="form-control"></div>
        <div class="form-group">
        <label for="" >Password</label>    
        <input type="password" name="password" class="form-control"></div>
   <div class="form-group">
   <button name="login" class="btn btn-info btn-block">Login</button>
   </div>  
   <div class="form-group">
       <label for="">Role</label>
       <select name="role" class="form-control">
           <option value="admin"> Admin</option>
           <option value="employee"> Employee</option>

        </select>
   </div>       
    </form>
        </div>
    </div>

</div>
<?php include '../shared/script.php'; ?>
