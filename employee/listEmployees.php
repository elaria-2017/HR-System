<?php include '../shared/header.php'; ?>
<?php include '../shared/nav.php'; ?>
<?php include '../genral/configDatabase.php'; ?>
<?php include '../genral/functions.php'; ?>

<?php
// llazm hna a7ot session_start(); bs 34an a7na 7tnha fl nav w 3mlen include fa m4 hn7otha
$select="SELECT * FROM `emloyees`";
$s=mysqli_query($conn,$select);

if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $delete="DELETE FROM `emloyees` WHERE id=$id";
    $d=mysqli_query($conn,$delete);
    header('location:/final/employee/listEmployees.php');
}
//lw fe 7d 3aml login tmam lw mfe4 hyfdl ywdeny 3la sf7t el login
auth();
?>


<h1 class="text-center text-info display-3">List Emloyees Page</h1>
<div class="container col-6">
<table class="table table-hover">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Salary</th>
    <th>deptID</th>
    <th>Action</th>
</tr>
<?php foreach($s as $data) { ?>
<tr>
    <td><?php echo $data['id'] ?></td>
    <td><?php echo $data['name'] ?></td>
    <td><?php echo $data['salary'] ?></td>
    <td><?php echo $data['deptID'] ?></td>
<td>
<?php if(isset($_SESSION['admin'])=="ella"){ ?>

<a href="/final/employee/addEmployee.php?edit=<?php echo $data['id'] ?>" class="btn btn-primary">Edit</a>
<a onclick="return confirm('Are you sure?')" href="listEmployees.php?delete=<?php echo $data['id'] ?>" class="btn btn-danger">Delete</a>
<?php }else{ ?>
    <button disabled onclick="alert('Not Allowed')" class="btn btn-primary">Edit </button>
    <button disabled onclick="alert('Not Allowed')" class="btn btn-danger">Delete  </button>
<?php } ?>
</td>
</tr>
<?php } ?>
</table>
</div>
<?php include '../shared/script.php'; ?>