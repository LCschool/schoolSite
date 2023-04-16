<?php
function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
        ');';if ($with_script_tags) {
    $js_code = '<script>' . $js_code . '</script>';
}
    echo $js_code;
}
function my_autoloader($class)
{
    include 'news.php';
}

spl_autoload_register('my_autoloader');
$articals = [];
$vars = new news("bErry", "images\images.jpg", "dicks", "big ones");
array_push($articals,$vars);
$vars = new news("gErry", "images\images.jpg", "dicks", "big ones");
array_push($articals,$vars);
$vars = new news("lErry", "images\images.jpg", "dicks", "big ones");
array_push($articals,$vars);
$data = serialize($articals);
$myfile = "news.byt";
console_log($vars->text);
file_put_contents($myfile,$data);
header("Location: index.php");



