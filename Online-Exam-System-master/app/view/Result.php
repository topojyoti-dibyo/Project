<?php
	session_start();
	if(!isset($_SESSION['name']))
	{
		header("Location:index.php");
	}
?>
<html>
	<head>
		<title>Add Question</title>
		<link href="css/Manage_User.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
			<div class="main">
				<div class="header">
					<div class="headertext">
						<h2>Online Exam System</h2>
					</div>
					<div class="menu">
						<ul>
							<li><a href="Home.php">Home</a></li>
							<li><a href="Manage_User.php">Manage User</a></li>
							<li><a href="Result.php">Result</a></li>
							<li><a href="Account.php">Account</a></li>
							<li><a href="Logout.php">Logout</a></li>
						</ul>
					</div>
				</div>
				<div class="right">
					<div class="text">
						<h1>View User List</h1>
					</div>
					<?php
						$con=mysqli_connect("localhost","root","","online_exam_system");
						if (mysqli_connect_errno())
						{
							echo "Failed to connect to MySQL: " . mysqli_connect_error();
						}

						$result = mysqli_query($con,"SELECT * FROM result");

						echo "<table border='1' width='100%' >
						<tr allign='center'>
							<th>Id</th>
							<th>User Name</th>
							<th>Marks</th>
						</tr>";

						while($row = mysqli_fetch_array($result))
						{
							echo "<tr>";
							echo "<td>" . $row['Id'] . "</td>";
							echo "<td>" . $row['User_Name'] . "</td>";
							echo "<td>" . $row['Marks'] . "</td>";
							echo "</tr>";
						}
						echo "</table>";

						mysqli_close($con);
					?>
				</div>
			</div>
		</form>
	</body>
</html>