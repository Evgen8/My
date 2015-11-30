<?php
    if(isset($_POST['send'])) {
        if(isset($_POST['name']) && !empty($_POST['name'])) {
            $name = trim(strip_tags($_POST['name']));
        }
        else {
            echo 'Ведите имя';
        }
        $surname = trim(strip_tags($_POST['surname']));
        $city = trim(strip_tags($_POST['city']));
        $mail = trim($_POST['mail']);
        $password1 = trim(strip_tags($_POST['password1']));
        $password = trim(strip_tags($_POST['password']));
        $date = date("Y-m-d");
    }
	
    function registration( ) {
        global $name, $surname, $city, $mail, $password, $date;
        $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
        $write = "INSERT INTO user VALUES (null, :name, :surname, :city, :mail, :password, :date)";
        $st = $conn->prepare( $write );
        $st->bindValue(':name', $name);
        $st->bindValue(':surname', $surname);
        $st->bindValue(':city', $city);
        $st->bindValue(':mail', $mail);
        $st->bindValue(':password', $password);
        $st->bindValue(':date', $date);
        $st->execute();
    }
	
	if(isset($_POST['send'])) {
        $message = "Вы успешно зарегистрировались на сайте tblog.pp.ua\r\nВаш логин: ".$name."\r\nВаш пароль: ".$password;
        $message = wordwrap($message, 70, "\r\n");

        $headers = 'From: info@tblog.pp.ua' . "\r\n" .
            'Reply-To: info@tblog.pp.ua' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        $send_mail = mail($mail, 'Регистрация на tblog.pp.ua', $message, $headers);
	}
					  
    if(!empty($name) && !empty($surname) && !empty($mail) && !empty($city) && !empty($password)) {
        if($password1 == $password) {
			$password = md5($password);
			registration();
			$send_mail;
			session_start();
			$_SESSION['mail'] = $mail;
		    header("Location: registration.php");
        }
        else {
            echo "pass not match";
        }
    }
