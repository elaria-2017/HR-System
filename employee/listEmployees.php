<?php include '../shared/header.php'; ?>
<?php include '../shared/nav.php'; ?>
<?php include '../genral/configDatabase.php'; ?>
<?php
$select="SELECT * FROM `emloyees`";
$s=mysqli_query($conn,$select);

?>


<h1 class="text-center text-info display-3">List Emloyees age</h1>
<div class="container col-6">
<table class="table table-hover">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Salary</th>
    <th>deptID</th>
</tr>
<?php foreach($s as $data) { ?>
<tr>
    <td><?php echo $data['id'] ?></td>
    <td><?php echo $data['name'] ?></td>
    <td><?php echo $data['salary'] ?></td>
    <td><?php echo $data['deptID'] ?></td>

</tr>
<?php } ?>
</table>
</div>
<?php include '../shared/script.php'; ?>