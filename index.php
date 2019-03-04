<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Kame Sennin</title>
<meta name="ROBOTS" content="NOINDEX,NOFOLLOW,NOARCHIVE" />
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
<div class="top">
<h1>Kame Sennin</h1>

<div class="content">
<a href="session.php"><button>New Session</button></a>
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
