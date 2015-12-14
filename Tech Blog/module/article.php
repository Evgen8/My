<?php
	$id = $_GET['id'];
    function article() {
    	global $id;
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$sql = "SELECT * FROM article WHERE id=:id";
        $st = $conn->prepare($sql);
        $st->bindValue(':id', $id);
		$st->execute();
        while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
            echo $row['content'];
        }
		$conn = null;
		
    }
    article();