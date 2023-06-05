<?php
    spl_autoload_register(function ($clase){
        if(is_file(CORE.$clase.".php")){
            include CORE.$clase. '.php';
        }
    });