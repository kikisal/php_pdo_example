<?php

// picks all the video from a database source
// by using PDO php extension and mysql as driver.

// mysql config:
// host = 127.0.0.1
// port = 3306
// user = dev
// pass = Svtcsm74!
// dbname = prova
// table = videos

$db = null;

try {
	$db = new PDO("mysql:host=localhost;port=3306;dbname=prova","dev","Svtcsm74!");
} catch(PDOException $e) {
	die($e->getMessage());
}

$videi = $db->prepare("SELECT * FROM videos");
$videi->execute();

$videos = $videi->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css?<?= time(); ?>" />
  </head>
  <body>
    <div class="tutto">
		<?php for ($i=0; $i < count($videos); $i++) { ?> 
			<div class="video">
        <div>VIDEO</div>
        <div><?= $videos[$i]['nome']; ?></div>
				<div><?= $videos[$i]['desc']; ?></div>
			</div>
		<?php } ?>
    </div>
  </body>
</html>
