<?php
$description = 'Windows 10';
$keywords = 'Windows 10';
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
        <h2><?php h1();?></h2>
      </div>
      
      <section>
      <?php include "../module/article.php"?>
    
        <script type="text/javascript">(function() {
          if (window.pluso)if (typeof window.pluso.start == "function") return;
          if (window.ifpluso==undefined) { window.ifpluso = 1;
            var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
            s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
            s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
            var h=d[g]('body')[0];
            h.appendChild(s);
          }})();</script>
        <div class="pluso" data-background="transparent" data-options="medium,round,line,horizontal,nocounter,theme=04" data-services="vkontakte,odnoklassniki,facebook,twitter,google,moimir,email,print">
        </div>
    
      <?php include "../module/comment.php"?>
      </section>
    
    <div class="advertising">
       <a href="http://www.microsoft.com/uk-ua/windows/windows-10-upgrade" target="_blank"><img src="../image/snow_mountains_windows_10-wide.jpg"></a>
     <a href="http://www.microsoft.com/uk-ua/windows/windows-10-upgrade" target="_blank"><img id="above" src="../image/Windows_10_Logo.svg.png"></a>
     </div>
    </div>
  
  <div id="up"><img src="../image/arrow-up-01-128.png"></div>
  
<?php require "../module/footer.php";?>