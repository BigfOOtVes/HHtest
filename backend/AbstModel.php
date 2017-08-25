<?php
require_once "ConnectDB.php";

abstract class AbstModel {
    
        protected static $table;
        protected $data = [];
    
        public function __set($key, $value) {
            $this->data[$key] = $value;
        }
    
        public function __get($key) {
            return $this->data[$key];
        }
        
        public static function selectAll() {
            $className = get_called_class();
            $sql = 'SELECT * FROM ' . static::$table;
            $db = new ConnectDB();
            $db->setNameClass($className);
            $res = $db->query($sql);
            return $res;	
        }
    }