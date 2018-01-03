
<?php 
	include'inc/header.php';
    include'Database/config.php';
    include 'Database/Database.php';
?>

<?php 
	$db = new Database();
	if(isset($_POST['submit'])){
		$name =mysqli_real_escape_string($db->link, $_POST['name']);
		$email =mysqli_real_escape_string($db->link,$_POST['email']);
		$skill =mysqli_real_escape_string($db->link,$_POST['skill']);

		if($name == '' || $email == '' || $skill== ''){
			$error="Field Must Not Be Empty";
		}else{
			$query ="INSERT INTO php_user(name,email,skill) Values ('$name','$email','$skill')";
			$create =$db->insert($query);
		}
	}
?>	

<form action="create.php" method="POST">

<table>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="email" name="email"  ></td>
		</tr>
		<tr>
			<td>Skill</td>
			<td><input type="text" name="skill" ></td>
		</tr>
		<tr>
			<td> </td>
			<td>
				<input type="submit" name="submit" value="submit">
				<input type="reset" value="cancel">
			</td>
		</tr>
	</table>
</form>
<div><?php
if(isset($error)){
	echo "<span style='color:Red'>".$error."</span>";
}
?>
	
	<a href="index.php"> Home Page </a>
</div>




<?php include'inc/footer.php'?>
