<?php

class ConnectDB {
    
        private $dbh;
        private $nameClass = "StdClass";
    
        public function __construct() {
            $this->dbh = new PDO ('mysql:dbname=HHtest;host=localhost', 'root', '');
        }
    
        public function setNameClass($nameClass) {
            $this->nameClass = $nameClass;
        }
    
        public function query($sql, $params = []) {
            $sth = $this->dbh->prepare($sql);
            $sth->execute($params);
            return $sth->fetchAll(PDO::FETCH_CLASS, $this->nameClass);
        }
    
        public function execute($sql, $params = []) {
            $sth = $this->dbh->prepare($sql);
            return $sth->execute($params);
        }
    
    }