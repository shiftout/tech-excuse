<?php
include_once("./db.php");

function random_excuse() {
  global $dbh;

  $excuses = $dbh->select_all_excuses();
  $cnt = count($excuses);

  if ($cnt == 0) return false;

  return $excuses[rand(0, $cnt-1)];
}

function add_excuse( $exuse ) {
  global $dbh;
  $dbh->insert_excuse($exuse);
}
