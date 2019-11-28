<!DOCTYPE html>
<html lang="en">
	<head>
		<title>lab 7: basic SQL</title>
		<meta charset="utf-8">
	</head>
	<body>
		<h1>BASIC SQL</h1>
		<form action="sql.php" method="POST">
			DATABASE:
			<input type="text" name="db"/>
			<br/>
			SQL query:
			<input type="text" name="query"/>
			<br/>
			<input type="submit" />
		</form>
		<h2>RESULTS</h2>
		<?php
		if(isset($_POST['db']) and $_POST['db'] != "" and isset($_POST['query']) and $_POST['query'] != ""){
			try{
				$db = new PDO("mysql:dbname={$_POST['db']};port=3306","root","");
				echo "CONNECTED";
				$rows = $db->query($_POST['query']);
			} catch(PDOException $error){
				echo $error->getMessage();
			}
			?>
			<ul>
			<?php
			foreach ($rows as $row) {?>
				<li>
					<?=print_r($row)?>
				</li>
			<?php 
			} 
			?>
			</ul>
		<?php
		}
		?>	
	</body>

	
</html>
