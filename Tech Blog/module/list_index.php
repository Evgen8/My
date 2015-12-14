<?php
	$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
	if(isset($_GET['category'])) {
		$category = $_GET['category'];
		if($category < 1 OR $category > 6) { 
            $category = 1;
        }
	}
	else {
		$category = 1;
	}
	
	$num = $conn->prepare("SELECT COUNT(*) FROM article WHERE category_id=:category");
	$num->bindValue(':category', $category);
	$num->execute();
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
	/*вивод статей*/
    $start = $page*$max_posts-$max_posts;
	$sql = $conn->prepare("SELECT * FROM article WHERE category_id=:category ORDER BY id DESC LIMIT $start, $max_posts");
	$sql->bindValue(':category', $category);
	$sql->execute();
	while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
		echo "<div>
				<h2><a href='article/Article.php?category=$category&id={$row['id']} '> {$row['title']} </a></h2>
				<a href='article/Article.php?category=$category&id={$row['id']} '> {$row['image']} </a>
			 </div>";
	}
	?>
	<div id="more">
		<ul>
    <?php
	/*пагинация*/
	for($i = 1;$i <= $num_pages; $i++ ) {
		if($num_pages > 1) {
			if(isset($page) && $i == $page)
				echo "<li><a id='active' href='index.php?category=$category&page=$i'>$i</a></li>";
			else
				echo "<li><a href='index.php?category=$category&page=$i'>$i</a></li>";
		}
    }
	?>
		</ul>
    </div>
	