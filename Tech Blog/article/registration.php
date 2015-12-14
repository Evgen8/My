<?php
$title = "Registration";
require "../module/config.php";
require "../module/header.php";
require "../module/login.php";
require "../module/nav.php";
require "../module/form.php";
?>
<div class="center">
    <div class="title">
        <a href="../index.php"><button>На главную</button></a>
    </div>
    <section>
        <p>Вы успешно зарегистрировались!</p>
        <p>Вам отправлено письмо на: <?php echo $_SESSION['mail'];?>.</p>
    </section>
</div>
<script src="../TechBlog.js"></script>

<?php
require "../module/footer.php";
?>