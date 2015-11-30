<?php
    if(isset($_POST['publish'])) {
        $name = htmlspecialchars($_POST['name']);
        if($name == "") {
            echo 'Введите имя';
        };
        $age = htmlspecialchars($_POST['age']);
        if($age == "") {
            $age = 'null';
        };
        $country = htmlspecialchars($_POST['country']);
        $text = htmlspecialchars($_POST['message']);
    }
    
    function insert() {
        global $name, $age, $country, $text;
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $write = "INSERT INTO comment VALUES (null, '$name', $age, '$country', null, '$text')";
        $st = $conn->prepare( $write );
        $st->execute();
    }
    if(!empty($name) && !empty($text)) {
        insert();
    }
    
    function select() {
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $sql = $conn->query("SELECT * FROM comment ORDER BY id DESC");
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            echo '<h3 id=\'h3_name\'>'. $row['name'] .'</h3><p id=\'date\'>' .$row['date'].'</p><p id=\'p\'>'. $row['text'] .'</p>';
        }
     }
    ?>
    <hr>
    <h3>Комментарии</h3>
    <form action="" method="post">
     <p>Ваше имя: <input type="text" name="name" required/></p>
     <p>Ваш возраст: <input type="text" name="age" /></p>
     <p>Ваша страна: <input type="text" name="country"/></p>
     <textarea name="message" cols='40' rows='10' placeholder="Введите текст" required></textarea>
     <p><input type="submit" name="publish" value="Отправить"/></p>
    </form>
    <hr>
    <?php select(); ?>