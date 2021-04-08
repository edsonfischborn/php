<?php
    include './globals.php';
    include LIB_DIR.'/AutoLoader.php';

    new AutoLoader([LIB_DIR, DB_DIR, CONTROLLERS_DIR, MODELS_DIR]);

    $controllerDictionary = [
        "usuario" => "user",
        "inicio" => "home"
    ];

    $handleRequest = new HandleRequest(
        new FolderFileUtil(CONTROLLERS_DIR),
        new FriendlyUrlUtil(),
        $controllerDictionary
    );
    
    $handleRequest->handle(); 
