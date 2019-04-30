<?php head("Social Engine - Kravets"); ?>
<div id="contain">
    <div id="header"><a href="/">SEP</a><span href="/" style="font-size:10px; color:#e18f00;"> <?php include("configs/version.php"); ?></span></div>
        <div id="leftcol"><?php include("models/form/login_form.php"); ?>
            <a href="#openModal" id="register">ЗАРЕГИСТРИРОВАТЬСЯ</a>
            <?php include("models/form/register_form.php"); ?>
        </div>
        <div id="rss"><?php include("views/rss/news.php"); ?></div>
        <div id="content">
            <?php include("views/web/content.php"); ?>
            <?php include("views/web/history.php"); ?>
        </div>
</div>
<?php bottom(); ?>
