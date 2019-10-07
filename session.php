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
		  $filename = "session".$session.".txt";
		  
		  $sessionfile = fopen($filename, "r") or die("Unable to open session's file!"); 
		  fgets($sessionfile); //throw the first line away and get to the next
		  $nbpompes = fgets($sessionfile); //get the value
		  fgets($sessionfile);
		  $nbabdos = fgets($sessionfile);
		  fclose($sessionfile);
		  
		  $stat = array($nbpompes, $nbabdos);
		  return $stat;
	  }
	  function writeSession($session, $stat){ //write the stats array in session file
		  $filename = "session".$session.".txt";
		  $sessionfile = fopen($filename, "w") or die("Unable to open session's file!");
		  fwrite($sessionfile, "nb pompes:\n".$stat[0]."\n"."nb abdos:\n".$stat[1]);
		  fclose($sessionfile);
	  }
	  if ($_POST['pn'] == 1){
		  $stat = readSession($session);
		  $stat[0] = $stat[0] + 10;
		  writeSesion($session, $stat);
	  } elseif ($_POST['an'] == 1){
		  $stat = readSession($session);
		  $stat[1] = $stat[1] + 10;
		  writeSesion($session, $stat);
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
	  ?>
	  <form action="session.php" method="post">
	<p>Nb pompes : <?php echo($stat[0]); ?></p>
		  <input type="hidden name="pn" value="1">
		<input type="submit" value="Pompes+10">
						      </form>
	<form action="session.php" method="post">
	  <p>Nb abdos : <?php echo($stat[1]); ?></p>
	   <input type="hidden name="an" value="1">
		<input type="submit" value="Abdos+10">
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


