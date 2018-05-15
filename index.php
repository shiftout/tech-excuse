<?php
include_once("./functions.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Tech Excuse Generator</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div id="container">
    <h1>Tech Excuse Generator</h1>
    <p>Blame Technology! Find an excuse or submit your own!</p>

    <div class="section">
      <h2>Random excuse</h2>
      <?php
        $excuse = (isset($_POST['excuse_id'])) ? random_excuse($_POST['excuse_id']) : random_excuse();
        print "<pre>" . htmlentities($excuse['desc']) . "</pre>";
      ?>
      <form action="index.php" method="POST">
        <input type="hidden" name="excuse_id" value="<?php print $excuse['id']; ?>"/>
        <input type="submit" value="Refresh">
      </form>
    </div>

    <div class="section">
      <h2>Your input</h2>
      <?php if (isset($_POST['excuse'])) {
        add_excuse($_POST['excuse']);
      }?>
      <form action="index.php" method="POST">
        <label for="excuse">What's your excuse?</label>
        <input type="text" name="excuse">
        <input type="submit" value="Submit">
      </form>
    </div>
  </div>
</body>
</html>
