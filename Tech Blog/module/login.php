<?php
    if(isset($_POST['submit'])) {
        if(!empty($_POST['login']) && !empty($_POST['pass'])) {    
            $login = trim(strip_tags($_POST['login']));
            $pass = md5(trim(strip_tags($_POST['pass'])));
            $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
            $sql = $conn->query("SELECT * FROM user WHERE name = '$login'");
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            if($result['password'] == $pass) {
                session_start();
                $_SESSION['login'] = $login;
                $_SESSION['check'] = true;
                $last_visit = date("Y-m-d H-i");
                $visit = $conn->query("UPDATE user SET last_visit='$last_visit' WHERE name='$login'");                
            }
            else {
                echo 'Неверный логин или пароль';
            }
        }    
        else {
            echo 'Введите логин и пароль';    
        }
    }
    
?>
