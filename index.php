<?php
include_once("./functions.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Tech Excuse Generator</title>
</head>
<body>
  <h1>What?</h1>
  <p>Blame Technology! Find an excuse or submit your own!</p>

  <h3>Random excuse</h3>
  <?php
    $excuse = (isset($_POST['excuse_id'])) ? random_excuse($_POST['excuse_id']) : random_excuse();
    print htmlentities($excuse['desc'] . "(".$excuse['id'].")");
  ?>
  <form action="index.php" method="POST">
    <input type="hidden" name="excuse_id" value="<?php print $excuse['id']; ?>"/>
    <input type="submit" value="Refresh">
  </form>


  <h3>Any inputs?</h3>
  <?php if (isset($_POST['excuse'])) {
    add_excuse($_POST['excuse']);
  }?>
  <form action="index.php" method="POST">
    <label for="excuse">Excuse</label>
    <input type="text" name="excuse">
    <input type="submit" value="Submit">
  </form>
</body>
</html>
