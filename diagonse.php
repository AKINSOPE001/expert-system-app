<!DOCTYPE HTML>

	<html>
		<head>
			
			<title>Diagnose</title>	
			<link rel="stylesheet" type="text/css" href="stylesheets/styles.css">
			<link rel="stylesheet" type="text/css" href="stylesheets/reset.css">
			<link rel="stylesheet" type="text/css" href="stylesheets/type.css">
		</head>
		<body>

		<div class="background">
			<div class="wrapper">
				
				<header class="logo">

					<a href="home.php"><img src="images/dr2.png"></a>
					<a href="user.php"><img src="images/user.png"></a>
					<a href="diagonse.php"><img src="images/dr3.png"></a>

				</header>
				
				<div class="content">

					<img class="image" src="images/img1.jpg">
			<?php
			$connection = mysql_connect("localhost", "root");
			if(!$connection){
				die("Database Connection failed: ".mysql_error());
			}

			$db_select = mysql_select_db("MES_DB", $connection);
			if (!$db_select) {
				die("Database selection failed: ". mysql_error());
			}
			?>


				<form action="#" method="POST" class="checkboxes">

				<ul>
					<li>
						<h4>Symptoms</h4>
						<input type="checkbox" name="Symptoms[]" value="1">Chills</input>
						<input type="checkbox" name="Symptoms[]" value="2">Headache</input>
						<input type="checkbox" name="Symptoms[]" value="3">Fever</input>
						<input type="checkbox" name="Symptoms[]" value="4">High Temperature</input>
						<br/>
						<br/>

						<input type="checkbox" name="Symptoms[]" value="5">Rapid, shallow breathing</input>
						<input type="checkbox" name="Symptoms[]" value="6">Cough</input>
						<input type="checkbox" name="Symptoms[]" value="7">Chest Pain</input>
						<input type="checkbox" name="Symptoms[]" value="8">Cold sores on face or lips</input>
						<br/>
						<br/>
					
					
						<input type="checkbox" name="Symptoms[]" value="9">Thirst</input>
						<input type="checkbox" name="Symptoms[]" value="10">Little or No Urine</input>
						<input type="checkbox" name="Symptoms[]" value="11">Sudden weight loss</input>
						<input type="checkbox" name="Symptoms[]" value="12">Stiff Neck</input>
						<br/>
						<br/>

						<center><input type="submit" name="submit" value="DIAGONSE"></center>
						</form>

							<?php 
								if(isset($_POST['submit'])){
									if (!empty ($_POST['Symptoms'])) {
										foreach ($_POST['Symptoms'] as $selected ) {
											// echo $selected ."</br>";
												$sum=$sum + $selected;
												// echo "Sum:".$sum;

												}

								$result= mysql_query("SELECT *  FROM disease WHERE $sum  = SSID    ", $connection);
								if (!$result) {

									die("Database query failed: ".mysql_error());
								}


								elseif($row = mysql_fetch_array($result)) {

									echo "<h2>Diagnosis:</h2>";
									echo  $row[1] . " " . "<br/>";
									echo "<h2>Prescription:</h2>";
									echo  $row[2]. " " ."<br/>";
									echo "<h3>Description:</h3>";
									echo  $row[3]. " ". "<br/>" ;
								}elseif (!$row = mysql_fetch_array($result)) {
									echo "<h2>Please Ensure You tick the correct Symptoms</h2>";
								}

							
								
								}
								}		
									
								
								?>	

						
				</li>			
						
			</ul>
						

						<p>Diagnosis:echo $row[1]</p>			
			
				</div>

				<div class="footer">
						<center><P>&copy Group 3_Expert Systems Artificial_Intellegence</P></center>
				</div>
				
			</div>
			

		</div>
			
			
		</body>

	</html>
		
</head>

