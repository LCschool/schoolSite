<?php require __DIR__ . '/newsDisplay.php';?>
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

</div>
<script>
    function slides(){
        let max = <?php echo getSlideNumbers();?>;
        console.log(max);
        for(let x=0;x<max,x++){
            document.write(<?php echo displayNewsArticle(x);?>);
            console.log("Running");
            if(x == max-1){
                x = -1;
            }
            setTimeout(slides,2000);
        }
    }
    slides();
    console.log("running");
</script>

</body>
</html>