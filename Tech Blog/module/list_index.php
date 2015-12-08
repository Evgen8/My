<?php
	$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	$num = $conn->query("SELECT COUNT(*) FROM article");
    $row = $num->fetch();
    
    $max_posts = 9;
    $num_posts = $row[0];
    $num_pages = ceil($num_posts / $max_posts);
    
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
        if($page < 1) {
            $page = 1;
        }
        elseif($page > $num_pages) {
            $page = $num_pages;
        }
    }
    else {
        $page = 1;
    }

    $start = $page*$max_posts-$max_posts;
	$sql = $conn->query("SELECT * FROM article ORDER BY id DESC LIMIT $start, $max_posts");
	while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
		echo "<div>
				<h2><a href='article/Article.php?id={$row['id']} '> {$row['title']} </a></h2>
				<a href='article/Article.php?id={$row['id']} '> {$row['image']} </a>
			 </div>";
	}
	?>
	<div id="more">
		<ul>
    <?php     
	for($i = 1;$i <= $num_pages; $i++ ) {
		if(isset($_GET['page']) && $i == $_GET['page'])
			echo "<li><a id='active' href='index.php?page=$i'>$i</a></li>";
		else
			echo "<li><a href='index.php?page=$i'>$i</a></li>";
    }
	?>
		</ul>
    </div>
	