<!DOCTYPE html> 
<html>
  <head>
	<title> <?php echo " $title $userstr " ?> </title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'> 
    <link rel="stylesheet" href="../styles/style.css">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
  </head>
  <body>
  	<div class="main-header">
  		<main class="header"><?= $header; ?></main>
    </div>

    <div class="main-content">
      <main class="content"><?= $content; ?></main>
    </div>

  </body>
</html>
