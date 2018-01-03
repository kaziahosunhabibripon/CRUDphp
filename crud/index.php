<?php 
	include'inc/header.php';
    include'Database/config.php';
    include 'Database/Database.php';
?>

<?php 
	$db = new Database();
	$query = "SELECT * FROM php_user";
	$read =  $db->select($query);
?>


<table class="Tmain">
		<tr>
			<th>Serial</th>
			<th>Name</th>
			<th>Email</th>
			<th>Skill</th>
			<th>Action</th>
			
		</tr>
		<?php if($read) { ?>
		<?php
		$sl=1;
		 while( $row = $read->fetch_assoc()) { ?>
		<tr>
			<td> <?php echo $sl++; ?> </td>
			<td> <?php echo $row['name']; ?> </td>
			<td> <?php echo $row['email']; ?> </td>
			<td> <?php echo $row['skill']; ?> </td>
			<td>
				<a href="update.php?id=<?php echo urlencode($row['id']);?>"> <input type="submit" name="submit" value=" Edit Info "/></a> 
			</td>
			
		</tr>

	
<?php } ?>
<?php } else { ?>
<p>There is no data</p>
<?php } ?>


</table>
<?php
if(isset($_GET['msg'])){
	echo "<span style='color:green'>".$_GET['msg']."</span>";
}
?>

<div>Do not have account ? <a href="create.php">Sign Up </a></div>


<?php include'inc/footer.php'?>