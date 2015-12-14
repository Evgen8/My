<?php
    if(isset($_POST['publish'])) {
        $name = trim(htmlspecialchars($_POST['name']));
        $text =trim(htmlspecialchars($_POST['message']));
        $email = trim(htmlspecialchars($_POST['email']));
        $article_id = $_GET['id'];
    }
    
    function insert() {
        global $name, $text, $email, $article_id;
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $write = "INSERT INTO comment VALUES (null, :name, :text, :email, :article_id, null)";
        $st = $conn->prepare( $write );
        $st->bindValue(':name', $name);
        $st->bindValue(':text', $text);
        $st->bindValue(':email', $email);
        $st->bindValue(':article_id', $article_id);
        $st->execute();
        $conn = null;
    }
    if(!empty($name) && !empty($text)) {
        insert();
    }
    
    function select() {
        $id = $_GET['id'];
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = "SELECT * FROM comment WHERE article_id=:id ORDER BY id DESC";
        $st = $conn->prepare( $sql );
        $st->bindValue(':id', $id);
        $st->execute(); 
        while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
            echo '<h3 id=\'h3_name\'>'. $row['name'] .'</h3><p id=\'date\'>' .$row['date'].'</p><p id=\'p\'>'. $row['text'] .'</p>';
        $conn = null;
        }
     }
    ?>
    <hr>
    <h3>Комментарии</h3>
    <form action="" method="post">
        <p>Ваше имя: <input type="text" name="name" required/></p>
        <p>Ваш e-mail: <input type="email" name="email"/></p>
        <textarea name="message" cols='40' rows='10' placeholder="Введите текст" required></textarea>
        <p><input type="submit" name="publish" value="Отправить"/></p>
    </form>
    <hr>
    <?php select(); ?>