<header>
      <h1><a href="../index.php">Техно<span>Blog</span></a></h1>
      <form id="search" method="post"> 
        <input type="search" name="search">
        <input type="button" name="sick" value="Поиск">
      </form>
      <ul>
        <li><a href="#">Новости</a></li>
        <li><a href="#">Обзоры</a></li>
        <li><a href="#">Статьи</a></li>
        <li><a href="#">Гаджеты</a></li>
        <li><a href="#">Софт</a></li>
        <li><a href="#">Игры</a></li>
      </ul>
	  
	  <?php if(!empty($_SESSION['login'])) {?>
	  <form id="entry" method="post">
			<?php echo "<h3 style='padding: 0; margin: 0; display:inline;'><strong>".$_SESSION['login']."</strong></h3>";?>
			<input id="loginBtn" style="float: right;" type="submit" name="exit" value="Выйти"> 
      </form>
	  <?php } else {  ?>
      <form id="entry" method="post">
        <input id="loginBtn" type="button" name="log-in" value="Войти"  onclick="javascript:showElement('log-in')">
        <input id="registrationBtn" type="button" name="registration" value="Регистрация" onclick="show('block')">
        
        <div id="log-in" style="display:none;">
          <input autofocus type="text" name="login" placeholder="Логин" required>
          <input type="password" name="pass" placeholder="Пароль" required>
          <label><input type="checkbox" name="remember"> Запомнить меня</label>
          <input type="submit" name="submit" value="Войти"><br>
          <a id="aForgot" href="#">Забыли пароль?</a>
        </div>
	  <?php	}
			if(isset($_POST['exit'])) {
				unset($_SESSION['login']);
				#$file =  $_SERVER['PHP_SELF'];
				header("Location: http://tblog.pp.ua");
			}
	  ?>
      </form>
	  
	  		<!-- Задний прозрачный фон-->
	  <div id="wrap" onclick="show('none')"></div>

	  <div id="window">
		    <img class="close" onclick="show('none')" src="http://tblog.pp.ua/image/close.png" width="42px">
			<h3>Регистрация</h3>
			<div class="wrapper">
				  
		    <form id="registration"  method="post">
   
			 <div id="main">
				 <div class="field">
					 <label for="fullname">Имя</label>
					  <input type="text" name="name" id="fullname" pattern="[А-Яа-яЁёA-Za-z" required><span></span>
				 </div>
				 <div class="field">
					 <label for="fi2">Фамилия</label>
					 <input type="text" name="surname" id="fi2" pattern="[А-Яа-яЁёA-Za-z" required><span></span>
				 </div>
				 <div class="field">
					 <label for="fi3">Город</label>
					 <input type="text" name="city" id="fi4" pattern="[А-Яа-яЁёA-Za-z" required><span></span>
				 </div>
				 <div class="field">
					 <label for="fi4">E-mail</label>
					 <input type="email" name="mail" id="fi4" required><span></span>
				 </div>
				 <div class="field">
					 <label for="fi5">Пароль</label>
				   <input type="password" name="password1" id="fi5"  required>
				 </div>
				 <div class="field">
					 <label for="fi6">Повторите</label>
				   <input type="password" name="password" id="fi6"  required><br>
			   </div>
			   <div class="capcha">
			   <p>Введите число с картинки</p>
				   <label><img src="http://tblog.pp.ua/image/capcha.png"></label>
				   <input type="number" name="capcha" pattern="55102" required><br>
				 </div>
			 </div>
	   
			 <input type="submit" id="submit" name="send" value="Готово"/>
			 
		    </form>
			
			</div><!-- end wrapper -->
	  </div>
	   
</header>