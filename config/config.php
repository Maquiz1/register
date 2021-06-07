<?php
        DEFINE('HOST'     , 'localhost');
        DEFINE('USERNAME' , 'root');
        DEFINE('PASSWORD' , 'Data@2020');
        DEFINE('DATABASE' , 'register');
    
        $dsn = 'mysql:host=' . HOST . ';dbname=' . DATABASE;
    
        try{
            
            $conn = new PDO($dsn, USERNAME, PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
            // FETCH OBJECT
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);   //for LIMITS
            
        } catch(PDOException $e){
            echo "Failed to connect". $e->getMessage();
    
        }

        session_start();

?>