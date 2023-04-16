<?php
function my_autoloader($class)
{
    include 'news.php';
}

spl_autoload_register('my_autoloader');
 echo '<div class="newsDisplay">
            
        </div> ';
