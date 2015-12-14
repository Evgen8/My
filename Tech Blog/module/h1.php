<?php
	$id = $_GET['id'];
	$date = null;
    function h1() {
    	global $id, $date;
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "SELECT * FROM article WHERE id=:id";
        $st = $conn->prepare($sql);
        $st->bindValue(':id', $id);
		$st->execute();
        while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
            echo $row['title'];
			$date = $row['timestamp'];
        }
		$conn = null;
     }
    h1();