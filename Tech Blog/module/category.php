<?php	
	function get_category() {
		$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
		$st = $conn->query("SELECT * FROM category");
		while($row = $st->fetch(PDO::FETCH_ASSOC)) {
			if(isset($_GET['category']) && $_GET['category'] == $row['id']) {
				  echo "<li id='active'><a href=\"http://tblog.pp.ua/index.php?category={$row['id']}\">{$row['name']}</a></li>\r\n";
			}
			else {
				  echo "<li><a href=\"http://tblog.pp.ua/index.php?category={$row['id']}\">{$row['name']}</a></li>\r\n";
			}
		}
	}
	get_category();