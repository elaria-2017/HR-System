<?php include '../shared/header.php'; ?>
<?php include '../shared/nav.php'; ?>
<?php include '../genral/configDatabase.php'; ?>
<?php
$select="SELECT emloyees.name emp,departments.name dep FROM `emloyees` JOIN departments on emloyees.deptID=departments.id";
$s=mysqli_query($conn,$select);

?>


<h1 class="text-center text-info display-3">Join Employees with Departments</h1>
<div class="container col-6">
<table class="table table-hover">
<tr>
    <th>Employee</th>
    <th>Department</th>
</tr>
<?php foreach($s as $data) { ?>
<tr>
    <td><?php echo $data['emp'] ?></td>
    <td><?php echo $data['dep'] ?></td>

</tr>
<?php } ?>
</table>
</div>
<?php include '../shared/script.php'; ?>