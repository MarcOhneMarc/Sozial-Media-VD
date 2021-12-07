<!DOCTYPE html>
<html>
<head>
	<title>Marc</title>
</head>
<body>
	<form action="index.php" method="post">
		Mitteilungen: <input type="text" name="message" /><br />
		<input type="Submit" value="Posten" />
	</form>

	<h1>Alle Mitteilungen:</h1>
	<?php
          // Session Start
        	session_start();
          // Wir geprüft ob index schon erstellt ist, wenn nicht wird index erstellt
          if (!isset($_SESSION["index"]))
          {
            $_SESSION["index"]=0;
          }
          if (!isset($_SESSION["msgs"]))
          {
            $_SESSION["msgs"]=array();
          }
        	if (isset($_POST['message']) && strlen($_POST['message']) > 0)
        	{
            $_SESSION["index"]++;
            $i = $_SESSION["index"];
        		$_SESSION["msgs"][$i]= $_POST["message"];
				$_SESSION["rmsgs"]=array_reverse($_SESSION["msgs"]);

        	}	

          $i = $_SESSION["index"];
        	if (isset($_SESSION["msgs"][$i]))
        	{
				for ($a=1; $a<=$i; $a++)
            {
              echo "<div class=\"beitrag\">";
              echo "<h4>Nutzername</h4>";
              echo "<p>".$a.": ".$_SESSION["rmsgs"][$a]."</p>";
              echo "</div>";
            }
        	}

        	?>


</body>
</html>