<?php
require "../module/config.php";
require "../module/header.php";
require "../module/login.php";
require "../module/nav.php";
require "../module/form.php";
?>
        <!--Тело-->
    <div class="center">
      <div class="title">
        <input id="back" type="button" onclick="history.back()" value="&larr; Вернуться">
        <?php
        try {
            $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        } catch (PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage();
            exit;
        }
        $search = $_SESSION['search'];
        if (!empty($search)) {
            $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
            $query = trim(htmlspecialchars($search));
            $sql = "SELECT COUNT(*) FROM article WHERE title LIKE '%$query%' OR content LIKE '%$query%'";
            $res = $conn->query($sql);
            $num = $res->fetchColumn();
            $sql = "SELECT id, title, content FROM article WHERE title LIKE '%$query%' OR content LIKE '%$query%'";
            $result = $conn->query($sql);
            ?>
        <h3>По запросу: «<b><?php echo $search?></b>» найдено совпадений: <?php echo $num?> </h3><hr>
      </div>
      
      <section> 
            <?php
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                echo "<li><h3><a href='Article.php?id= {$row['id']} '> {$row['title']} </a></h3></li>";
            }
        } else {
            echo '<p>По вашему запросу ничего не найдено</p>';
        }
        ?>
      </section>
    </div>
  
  <div id="up"><img src="../image/arrow-up-01-128.png"></div>
  
<?php require "../module/footer.php";?>