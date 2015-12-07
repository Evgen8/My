<?php
    if(isset($_POST['submit'])) {
        if(!empty($_POST['login']) && !empty($_POST['pass'])) {    
            $login = trim(strip_tags($_POST['login']));
            $pass = trim(strip_tags($_POST['pass']));
            $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
            $sql = $conn->query("SELECT * FROM user WHERE name = '$login'");
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            if(password_verify($pass, $result['password'])) {
                $_SESSION['login'] = $login;
                $last_visit = date("Y-m-d H-i");
                $visit = $conn->query("UPDATE user SET last_visit='$last_visit' WHERE name='$login'");                
            }
            else {
                echo 'Неверный логин или пароль';
            }
            $conn = null;
        }    
        else {
            echo 'Введите логин и пароль';    
        }
    }
    
?>
