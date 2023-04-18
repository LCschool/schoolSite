<?php

function my_autoloader($class)
{
    include 'news.php';
}

spl_autoload_register('my_autoloader');
$articals = [];
$vars = new news("Terry Simmons", "images\\nws1.jpg", "dicks", "big ones");
array_push($articals,$vars);
$vars = new news("Homer Simpson", "images\\nws2.jpg", "dicks", "big ones");
array_push($articals,$vars);
$vars = new news("Kramer", "images\\nws3.jpg", "dicks", "big ones");
array_push($articals,$vars);
$data = serialize($articals);
$myfile = "news.byt";
file_put_contents($myfile,$data);
header("Location: index.php");



