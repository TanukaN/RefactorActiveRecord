<?php

    namespace databaseConnectivity;
    use \PDO ;

    define('SERVERNAME', 'sql2.njit.edu');
    define('USERNAME','tn76');
    define('PASSWORD','DblDTPzb');
    define('DBNAME','tn76');

    class dbConn
    {
        protected static $conn;
        function __construct()
        {
            try {
                self::$conn = new PDO('mysql:host='.SERVERNAME.';dbname='.DBNAME , USERNAME, PASSWORD);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
        }
        static function getConnection(){
            if(!self::$conn) {
                new dbConn;
            }
            return self::$conn;
        }
    }

?>