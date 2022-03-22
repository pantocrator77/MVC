

<!--LIST TASKS  app/controller/ShowAll.php 11 -->
<?php  
	$mysql= new mysqli("localhost","root","root1234","ex_mvc");
	if($mysql->connect_error)
		die('Cannot connect with database');
	$registros=$mysql->query("SELECT code FROM tasks") or 
		die ($mysql->error);

	echo '<table class="all_tasks">';
	echo '<tr><th>Code</th><th>Description</th></tr>';
	while ($reg=$registros->fetch_array()) 
	{
		echo'<tr>';
		echo'<td>';
		echo $reg['code'];
		echo'</td>';
		echo'<td>';
		echo $reg['description'];
		echo'</td>';
		echo'</tr>';
	}
	echo '<table>';
	$mysql->close();
?>

<!-- FIND ONE TASK  app/view/FindOne.html 12-->

<html>
<head>
	<title>Find a task</title>
</head>
<body>
	<form method="post" action="FindOne.php"> <!-- search for single task-->
		Search task for id:
		<input type="text" name="code" size="10" required>
		<br>
		<input type="submit" value="Find">
	</form>

</body>
</html>

<!-- FIND TASKS  app/controller/FindOne.php  13-->

<?php 
$mysql= new mysqli("localhost","root","root1234","ex_mvc");
if($mysql->connect_error)
	die('Cannot connect with database');
$registros=$mysql->query("SELECT description FROM tasks WHERE code=$_REQUEST[code]") or 
	die ($mysql->error);
if ($reg=$registros->fetch_array())
	echo 'Selected task is: '.$reg['description'];
else
	echo 'Selected task does not exist.'
$mysql->close();
 ?>

 <!-- ERASE TASK app/view/erase.html 14-->

<html>
<head>
	<title>Erase a task</title>
</head>
<body>
	<form method="post" action="erase.php"> <!-- erase single task-->
		Erase task with id:
		<input type="text" name="id" size="10" required>
		<br>
		<input type="submit" value="find">
	</form>
</body>
</html>

<!-- ERASE TASKS  app/controller/erase.php 15-->

<?php 
$mysql= new mysqli("localhost","root","root1234","ex_mvc");
if($mysql->connect_error)
	die('Cannot connect with database');
$registros=$mysql->query("SELECT description FROM tasks WHERE code=$_REQUEST[code]") or 
	die ($mysql->error);
if ($reg=$registros->fetch_array())
{
	$mysql->query("DELETE FROM tasks WHERE code=$_REQUEST[code]") or
	die ($mysql->error);
	echo 'Description of erased task is: '.$reg['description'];
}
else
	echo 'The task does not exist.'
$mysql->close();
 ?>

 <!-- MODIFY TASK  app/view/modify.html 16 -->

<html>
<head>
	<title>Change a task</title>
</head>
<body>
	<form method="post" action="modify.php"> <!-- ask for task to modify -->
		Change task whith id:
		<input type="text" name="id" size="10" required>
		<br>
		<input type="submit" value="find">
	</form>
</body>
</html>

<!-- MODIFY TASK  app/controller/modify.php 17-->

<?php 
$mysql= new mysqli("localhost","root","root1234","ex_mvc");
if($mysql->connect_error)
	die('Cannot connect with database');
$registros=$mysql->query("SELECT description FROM tasks WHERE code=$_REQUEST[code]") or 
	die ($mysql->error);
if ($reg=$registros->fetch_array())
{
?>
	<form method="post" action=".php"> 
		Task  id:
		<input type="text" name="id" size="50" 
		value="<?php echo $_REQUEST['description']; ?>">
		<br>
		<input type="hidden" name="id"
		value="<?php echo $_REQUEST['code']; ?>">
		<br>
		<input type="submit" value="Confirm">
	</form>
<?php  
}
else
	echo 'Selected task does not exist.'
$mysql->close();

?>


<!-- MODIFY TASK UPDATE app/model/update.php 18-->


<html>
<head>
	<title>Modify task</title> 
</head>
<body>
	<?php 
	$mysql=new mysqli("localhost","root","root1234","ex_mvc");
		if($mysql->connect_error)
		die('Cannot connect with database');
		$mysql->query("UPDATE task SET description=$_REQUEST[code]") or 
		die ($mysql->error);
		echo'Task was successfully updated';

		$mysql->close();

	?>

</body>
</html>

<!-- ERASE TASK app/view/erase.html 19 -->

<html>
<head>
		<title>Erase a task</title>
</head>
<body>
	<form method="post" action="erase.php"> 
		Erase task whith id:
		<input type="text" name="id" size="10" required>
		<br>
		<input type="submit" value="Erase">
	</form>
</body>
</html>

<!-- ERASE TASK app/model/erase.php 20 -->

<html>
<head>
	<title>Erase task</title>
</head>
<body>
	<?php 
	$mysql=new mysqli("localhost","root","root1234","ex_mvc");
		if($mysql->connect_error)
		die('Cannot connect with database');
		$mysql->query("DELETE FROM task WHERE code=$_REQUEST[code]") or 
		die ($mysql->error);
		if ($mysql->affected_rows==1)
			echo'Task was successfully deleted';
		else
			echo'Task canoot be found';

		$mysql->close();

	?>
</body>
</html>
<!-- CREATE NEW TASK app/view/create.html 21 -->

<html>
<head>
		<title>Create new  task</title>
</head>
<body>
	<form method="post" action="../model/create.php"> 
		Insert task description:
		<input type="text" name="description" size="50" required>
		<br>
		Task created by:
		<input type="text" name="creator" size="50" required>
		<br>
		Task start date:
		<input type="text" name="start_date" size="50" required>
		Task status:
		<input type="text" name="task_status" size="50" required>

		<input type="submit" value="Submit">
	</form>
</body>
</html>



<!-- CREATE NEW TASK VIEW 23 app/model/create.php-->

<html>
	<head>
	<title>Create new  task</title>
	</head>
		<body>
		<?php 
		mysql=new mysqli("localhost","root","root1234","ex_mvc");
			if($mysql->connect_error)
			die('Cannot connect with database');
		$mysql->query("INSERT INTO task(description,creator,start_date,task_status)
		VALUES ($_REQUEST[description],$_REQUEST[creator],$_REQUEST[start_date],$_REQUEST[task_status]) or 
			die ($mysql->error);
		echo'Task was successfully added with id:';
		echo $mysql->insert_id;
		$mysql->close();
		</body>
</html>




<!--   EXTRA -->





