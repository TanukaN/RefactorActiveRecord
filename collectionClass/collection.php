<?php

    namespace collectionClass;
    use \PDO ;
    use \databaseConnectivity\dbConn as dbConn;

    abstract class collection {
        protected $html;
        static public function create() {
            $model = new static::$modelName;
            return $model;
        }
        public static function get_class($tableName) {
            $path = explode('\\', $tableName);
            return array_pop($path);
        }
        static function findOne($id) {
            $conn = dbConn::getConnection();
            $tableName = self::get_class(get_called_class());
            $sql = 'SELECT * FROM ' . $tableName . ' WHERE id =' . $id;
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $class = static::$modelName;
            $stmt-> setFetchMode(PDO::FETCH_CLASS, __NAMESPACE__."\\".$class);
            $result = $stmt->fetchAll();
            return $result;
        }
        static function findAll() {
            $conn = dbConn::getConnection();
            $tableName = self::get_class(get_called_class());
            $sql = 'SELECT * FROM '.$tableName;
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $class = static::$modelName;
            $stmt->setFetchMode(PDO::FETCH_CLASS, __NAMESPACE__ ."\\".$class);
            $result = $stmt->fetchAll();
            return $result;
        }
    }
?>