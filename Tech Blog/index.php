<?php
$title = "Tech Blog";
require "module/config.php";
require "module/header.php";
require "module/login.php";
require "module/nav.php";
require "module/form.php";
?>
   
                     <!--Тело-->
    <div class="center">
      <section>
	    <?php require "module/list_index.php";?>
      </section>
    </div>
    <script src="TechBlog.js"></script>
	
<?php require "module/footer.php";?>