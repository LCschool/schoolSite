<?php

function my_autoloader($class)
{
    include 'news.php';
}

spl_autoload_register('my_autoloader');
$articals = [];
$vars = new news("Terry Simmons", "images,art1.jpg", "dicks", "big ones");
array_push($articals,$vars);
$vars = new news("Homer Simpson", "images,art2.jpg", "dicks", "big ones");
array_push($articals,$vars);
$vars = new news("Kramer", "images,art3.jpg", "dicks", "big ones");
array_push($articals,$vars);
$data = serialize($articals);
$myfile = "news.byt";
file_put_contents($myfile,$data);
header("Location: index.php");



