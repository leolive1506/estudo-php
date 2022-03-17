<?php 
spl_autoload_register(function($class) {
    $baseDir = __DIR__.'/';
    $file = $baseDir.preg_replace('/\W|_/', '/', $class).'.php';
    
    if(file_exists("{$file}")) {
        require $file;
    }

});