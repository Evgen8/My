<?php
	$id = $_GET['id'];
    function h1() {
    	global $id;
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = $conn->query("SELECT * FROM article WHERE id=$id");
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            echo $row['h1'];
        }
     }
    h1();