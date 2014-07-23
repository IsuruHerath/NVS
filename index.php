<!DOCTYPE html>
<?php
	$message = '';
	if(isset($_POST['submit'])){
    	$message=$_POST['district'];
	}
	session_start();
			
			echo 'Welcome to page #1';
			
			$_SESSION['district'] = $message;
			
			
			// Works if session cookie was accepted
			//echo '<br /><a href="page2.php">page 2</a>';
			
			// Or maybe pass along the session id, if needed
			echo '<br /><a href="ByDistric_Report.php?' . SID . '">page 2</a>';
?>
<html>
<body>
	<?php
        $districts = array(
                'Anuradhapura', 
                'Colombo', 
                'Kandy'
            );
        
        
        
        
        echo '<form method="post" action="">';
        echo "<select name='district'>";
        foreach($districts as $valued) {
        
            
                $default='';
                echo '<option '.$default.' value="'.$valued.'">'.$valued.'</option>\n';
            
            } 
        echo '</select>&nbsp;';
            
            echo '<input type="submit" name="submit" id="submit" value="Get Selected Date">          </input></form>';
        ?>
        <p>You Select:</p>
        <input type="text" value="<?php if(isset($message)){echo $message;}  ?>"></input>
        <?php
			// page1.php
			
			
		?>
    </body>
</html>