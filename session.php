<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Kame Sennin</title>
    <meta name="ROBOTS" content="NOINDEX,NOFOLLOW,NOARCHIVE" />
    <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="stylesheet" type="text/css" href="style.css"/>
    
    <?php 
	  $session = 1;
	  function readSession($session){ //read the stats in session file and return an array
		  $xml=simplexml_load_file("session".$session.".xml") or die("Error: Cannot open session".$session.".xml");
		  $nbpompes = $xml->pompes;
		  $nbabdos = $xml->abdos;
		  $stat = array($nbpompes, $nbabdos);
		  return $stat;
	  }
	  function writeSession($session, $stat){ //write the stats array in session file
		  $filename = "session".$session.".txt";
		  $sessionfile = fopen($filename, "w") or die("Unable to open session's file! in writeSession");
		  fwrite($sessionfile, "nb pompes:\r".$stat[0]."\r"."nb abdos:\r".$stat[1]);
		  fclose($sessionfile);
	  }
    ?>
  </head>
  
<body>
<div class="top">
<h1>Session</h1>
  </div>
  
  <div class="content">
	  <?php 
	  $stat = readSession($session);
	  if ($_POST["pn"] == 1){
		  $stat[0] = $stat[0] + 10;
		  writeSession($session, $stat);
	  }
	  elseif ($_POST["an"] == 1){
		  $stat[1] = $stat[1] + 20;
		  writeSession($session, $stat);
	  }
	  
	  ?>
	  <form action="session.php" method="post">
	<p>Nb pompes : <?php echo($stat[0]); ?></p>
		  <input type="hidden" name="pn" value="1">
		<input type="submit" value="Pompes+10">
						      </form>
	<form action="session.php" method="post">
	  <p>Nb abdos : <?php echo($stat[1]); ?></p>
	   <input type="hidden" name="an" value="1">
		<input type="submit" value="Abdos+20">
	</form>
    <a href="index.php"><button>Done</button></a>
  </div>


  <!-- Bottom -->
<div class="bottom">
<p> Votre navigateur : <?php echo $_SERVER['HTTP_USER_AGENT']; ?>
 ------ Votre adresse IP :
<?php echo $_SERVER['REMOTE_ADDR']; ?></p>
<p><?php echo "nous sommes le " . date("d/m/Y"); 
echo ". il est ". date("h:ia");  ?></p>
</div>
</body>
</html>
