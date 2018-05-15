<?php

class db
{
  private $db;

  function __construct() {
    $this->db_connect();
  }

  function db_connect() {
    $this->db = new SQLite3('excuses.db', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);
  }

  function create_table() {
    $this->db->query('CREATE TABLE IF NOT EXISTS "excuse" (
      "id" INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
      "desc" VARCHAR,
      "time" DATETIME
    )');
  }

  function insert_excuse( $description ) {
    $stmt = $this->db->prepare('INSERT INTO "excuse" ("desc", "time") VALUES (:desc, :time)');
    $stmt->bindValue(':desc', $description );
    $stmt->bindValue(':time', date("Y-m-d H:i:s"));
    $stmt->execute();
  }

  function select_all_excuses() {
    $stmt = $this->db->prepare('SELECT * FROM "excuse"');
    $result = $stmt->execute();

    $data = array();
    while ( $row = $result->fetchArray(SQLITE3_ASSOC) ) {
      array_push($data, $row);
    }

    $result->finalize();

    return $data;
  }
}

$dbh = new db();
$dbh->create_table();
