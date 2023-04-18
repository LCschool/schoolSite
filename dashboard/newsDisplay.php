<?php
function my_autoloader($class)
{
    include 'news.php';
}

spl_autoload_register('my_autoloader');
function displayNewsArticle($artNum)
{
    $myFile = "news.byt";
    $data = "";
    file_get_contents($myFile,$data);
    $articals = unserialize($data);
    if ($artNum<count($articals)){
        echo '<div class="newsDisplay" xmlns="http://www.w3.org/1999/html">
            <img src="' .$articals[$artNum]->image.'" alt="News Artical Image" class="newsImage">
            <h2>'.$articals[$artNum]->headline.'</h2>
            <p>'.$articals[$artNum]->author.'</p></br>
            <p>'.$articals[$artNum]->text.'</p>
        </div> ';
    }

}

