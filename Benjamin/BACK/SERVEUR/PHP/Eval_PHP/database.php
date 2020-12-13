<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
                class Database
                {
                    private static $dbName = 'nbenj' ;
                    private static $dbHost = 'localhost' ;
                    private static $dbUsername = 'nbenj';
                    private static $dbUserPassword = 'nb20114';
                     
                    private static $cont  = null;
                     
                    public function __construct() {
                        die('Init function is not allowed');
                    }
                     
                    public static function connect()
                    {
                      
                       if ( null == self::$cont )
                       {     
                        try
                        {
                          self::$cont =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword); 
                        }
                        catch(PDOException $e)
                        {
                          die($e->getMessage()); 
                        }
                       }
                       return self::$cont;
                    }
                     
                    public static function disconnect()
                    {
                        self::$cont = null;
                    }
                }
                ?>
</body>
</html>