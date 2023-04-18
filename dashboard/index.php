<?php

require __DIR__ . '/news.php';

$_SESSION["articles"] = new articleSet();
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylesheets/style.css" type="text/css">
    <script src="javascripts/scripts.js">

    </script>
    <title></title>
</head>
<body>
<div>
    <p><a href="index.php"><img class="logo" src="images/logoSite.jpg" alt="Logo"></a></p>
    <div id="sideButtons">
        <ul class="sb-li">
            <li class="li-sd-btn">
                <a class="side-button" href="news_populate.php">Register</a>
            </li>
            <li class="li-sd-btn">
                <a class="side-button" href="contact.php">Contact</a>
            </li>
        </ul>
    </div>
    <div class = "newsArt">
        <div class="newsDisplay" xmlns="http://www.w3.org/1999/html">
            <img id = "nI" src="" alt="News Article Image">
            <h2 id = "nH"><?php echo $_SESSION["articles"]->getCurrentHeader()?></h2>
            <p id = "nA"><?php echo $_SESSION["articles"]->getCurrentAuthor()?></p>
            <p id = "nT"><?php echo $_SESSION["articles"]->getCurrentText()?></p>
        </div>
    </div>

</div>
<script>
    function slides(){

        console.log("<?php echo session_id()?>")
        document.getElementById('nH').content= "<?php echo $_SESSION["articles"]->getCurrentHeader() ?>";
        document.getElementById('nI').src = "<?php echo $_SESSION["articles"]->getCurrentImage() ?>".replace(',','\\');
        document.getElementById('nA').content = "<?php echo $_SESSION["articles"]->getCurrentAuthor() ?>";
        document.getElementById('nT').content = "<?php echo $_SESSION["articles"]->getCurrentText() ?>";
        console.log("<?php echo $_SESSION['articles']->next() ?>")
        setTimeout(slides, 2000);
    }
    slides();
</script>

</body>
</html>