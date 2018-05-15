<?php
include_once("./db.php");

function random_excuse( $previous_id = NULL ) {
  global $dbh;

  $excuses = $dbh->select_all_excuses();
  $cnt = count($excuses);

  if ($cnt == 0) return false;

  // avoid returning a previous-returned excuse.
  if (isset($previous_id) && $previous_id < $cnt && $cnt > 1)  {
    $previous_id = (int)$previous_id-1;
    $i = rand(0, $cnt-1);
    while ($i == $previous_id) {
      $i = rand(0, $cnt-1);
    }
    return $excuses[$i];
  }

  return $excuses[rand(0, $cnt-1)];
}

function add_excuse( $exuse ) {
  global $dbh;
  $dbh->insert_excuse($exuse);
}
