<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/style.css">
		<style>
			.reportType{
				position:relative;
				left: 10px;
				top:30px;
				font-family: Verdana, Geneva, sans-serif;
				font-size: 24px;
				color:#00C;
			}
			input{
				cursor:pointer; /*forces the cursor to change to a hand when the button is hovered*/
				padding:5px 25px; /*add some padding to the inside of the button*/
				background:#0033FF; /*the colour of the button*/
				border:1px solid #33842a; /*required or the default border for the browser will appear*/
				position:relative;
				left:500px;
				top:-62px;
				/*give the button curved corners, alter the size as required*/
				-moz-border-radius: 10px;
				-webkit-border-radius: 10px;
				border-radius: 10px;
				/*give the button a drop shadow*/
				-webkit-box-shadow: 0 0 4px rgba(0,0,0, .75);
				-moz-box-shadow: 0 0 4px rgba(0,0,0, .75);
				box-shadow: 0 0 4px rgba(0,0,0, .75);
				/*style the text*/
				color:#f3f3f3;
				font-size:1.1em;
				}
				/***NOW STYLE THE BUTTON'S HOVER AND FOCUS STATES***/
			input:hover, input:focus{
				background-color:#00C;/*make the background a little darker*/
				/*reduce the drop shadow size to give a pushed button effect*/
				-webkit-box-shadow: 0 0 1px rgba(0,0,0, .75);
				-moz-box-shadow: 0 0 1px rgba(0,0,0, .75);
				box-shadow: 0 0 1px rgba(0,0,0, .75);
			}
			
		</style>
	</head>
      <body bgcolor="#0099FF">
		<?php
			include('header.php');
		?>
		<p class="reportType">Individual Report</p>
		<br/>
		<p>
		
		  <?php
			
			$VolID = array(
					'VO1234',
					'VO4354',
					'VO0023'
					);
				sort($VolID);
				echo '<form method="post" action="Individual_Report.php">';
				echo '<section class = "container">';
				echo '<div class = "dropdown">';
				echo "<select name='volID' class='dropdown-select'>";
				foreach($VolID as $valued) {
				
					
						$default='';
						echo '<option '.$default.' value="'.$valued.'">'.$valued.'</option>\n';
					
					} 
				echo '</select>&nbsp;';
				echo '</div>';
				echo '</section>';
				echo '<input type="submit" name="submit" id="submit" value="Generate Report">          </input></form>';
			?>
				<p class="reportType">Customize Reports</p>
			<?php
			
			$districts = array(
					'Jaffna',
					'Kilinochchi',
					'Mannar',
					'Mulative',
					'Vavuniya',
					'Anuradhapura',
					'Polonnaruwa', 
					'Colombo', 
					'Kandy',
					'Matale',
					'Nuwara Eliya',
					'Ampara',
					'Batticalo',
					'Trincomalee',
					'Kurunegala',
					'Puththalam',
					'Kegalla',
					'Rathnapura',
					'Galle',
					'Hambantota',
					'Matara',
					'Badulla',
					'Monaragala',
					'Gampaha',
					'Kalutara'
				);
				sort($districts);
			
			
				echo '<form method="post" action="ByDistric_Report.php">';
				echo '<section class = "container">';
				echo '<div class = "dropdown">';
				echo "<select name='district' class='dropdown-select'>";
				echo '<option '.$default.' value="">--Any District--</option>\n';
				foreach($districts as $valued) {
				
					
						$default='';
						echo '<option '.$default.' value="'.$valued.'">'.$valued.'</option>\n';
					
					} 
				echo '</select>&nbsp;';
				echo '</div>';
				$proffessions = array(
							'Teacher',
							'Doctor',
							'Accountant'
							);
				sort($proffessions);
				echo '<div class = "dropdown">';
				echo "<select name='proffession' class='dropdown-select'>";
				echo '<option '.$default.' value="">--Any Proffession--</option>\n';
				foreach($proffessions as $valued) {
						$default='';
						echo '<option '.$default.' value="'.$valued.'">'.$valued.'</option>\n';
					} 
				echo '</select>&nbsp;';
				echo '</div>';
				echo '</section>';
				echo '</section>';
				echo '<input type="submit" name="submit" id="submit" value="Generate Report">          </input></form>';
				echo '<br/><br/><br/>';
				include('footer.php');
			?>
		</p>
	</body>
</html>