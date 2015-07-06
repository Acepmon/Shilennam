<?php

/**
 * @author Acep / D.Tsogtbayar
 */

namespace db_cn {

    use PDO;

    class Connector {

        private $host = "localhost";
        private $user = "root";
        private $pass = "acep123";
        private $dbname = "prototype";
        private $dbh;
        private $error;
        private $stmt;

        public function __construct() {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';charset=utf8';

            $options = array(
                PDO::ATTR_PERSISTENT => true,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );

            try {
                $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
            } catch (PDOException $e) {
                $this->error = $e->getMessage();
            }
        }

        public function query($query) {
            $this->stmt = $this->dbh->prepare($query);
        }

        public function bind($param, $value, $type = null) {
            if (is_null($type)) {
                switch (true) {
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;
                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;
                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;
                    default:
                        $type = PDO::PARAM_STR;
                }
            }
            $this->stmt->bindValue($param, $value, $type);
        }

        public function execute() {
            return $this->stmt->execute();
        }

        public function resultset() {
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function single() {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function rowCount() {
            return $this->stmt->rowCount();
        }

        public function lastInsertId() {
            return $this->dbh->lastInsertId();
        }

        public function beginTransaction() {
            return $this->dbh->beginTransaction();
        }

        public function endTransaction() {
            return $this->dbh->commit();
        }

        public function cancelTransaction() {
            return $this->dbh->rollBack();
        }

        public function debugDumpParams() {
            return $this->stmt->debugDumpParams();
        }

    }

    interface Select {
        function select($columns = "*", $condition = null, $sort = null, $sort_type = null, $rows = null);
    }

    interface Insert {
        function insert($columns = null, $values = array());
    }

    interface Update {
        function update();
    }

    interface Delete {
        function delete();
    }

    interface Create {
        function create();
    }

    interface Drop {
        function drop();
    }

    class Database {
        
    }

    class Table implements Select, Insert{

        private $connect = null;
        private $query = "";
        private $columns;
        private $table;
        private $condition;
        private $sort;
        private $sort_type;
        private $rows;

        public function __construct($table) {
            $this->table = strtolower($table);
            $this->connect = new Connector();
        }

        public function select($columns = "*", $condition = null, $sort = null, $sort_type = null, $rows = null) {
            $this->query = "SELECT";
            $columns_set = false;
            $condition_set = false;
            $sort_set = false;
            $rows_set = false;
            
            if (isset($columns)) {
                $this->columns = $columns;
                $columns_set = true;
            }
            if (isset($condition)) {
                $this->condition = $condition;
                $condition_set = true;
            }
            if (isset($sort)) {
                $this->sort = $sort;
                if (isset($sort_type)) {
                    if (strtolower($sort_type) == "asc") {
                        $this->sort_type = "ASC";
                    } else if (strtolower($sort_type) == "desc") {
                        $this->sort_type = "DESC";
                    }
                } else {
                    $this->sort_type = "ASC";
                }
                $sort_set = true;
            }
            if (isset($rows)) {
                $this->rows = $rows;
                $rows_set = true;
            }
            
            if ($columns_set) {
                $this->query .= " ".$this->columns." FROM ".$this->table;
                if ($condition_set) {
                    $this->query .= " WHERE ".$this->condition;
                }
                if ($sort_set) {
                    $this->query .= " ORDER BY ".$this->sort." ".$this->sort_type;
                }
                if ($rows_set) {
                    $this->query .= " LIMIT ".$this->rows;
                }
                $this->query .= ";";
                $this->connect->query($this->query);
                return $this->connect->resultset();
            }
        }
        
        public function selectFirst($columns = "*", $condition = null, $sort = null, $sort_type = null, $rows = null) {
            $this->query = "SELECT";
            $columns_set = false;
            $condition_set = false;
            $sort_set = false;
            $rows_set = false;
            
            if (isset($columns)) {
                $this->columns = $columns;
                $columns_set = true;
            }
            if (isset($condition)) {
                $this->condition = $condition;
                $condition_set = true;
            }
            if (isset($sort)) {
                $this->sort = $sort;
                if (isset($sort_type)) {
                    if (strtolower($sort_type) == "asc") {
                        $this->sort_type = "ASC";
                    } else if (strtolower($sort_type) == "desc") {
                        $this->sort_type = "DESC";
                    }
                } else {
                    $this->sort_type = "ASC";
                }
                $sort_set = true;
            }
            if (isset($rows)) {
                $this->rows = $rows;
                $rows_set = true;
            }
            
            if ($columns_set) {
                $this->query .= " ".$this->columns." FROM ".$this->table;
                if ($condition_set) {
                    $this->query .= " WHERE ".$this->condition;
                }
                if ($sort_set) {
                    $this->query .= " ORDER BY ".$this->sort." ".$this->sort_type;
                }
                if ($rows_set) {
                    $this->query .= " LIMIT ".$this->rows;
                }
                $this->query .= ";";
                $this->connect->query($this->query);
                return $this->connect->single();
            }
        }

        public function insert($columns = null, $values = array()) {
            $this->query = "INSERT INTO ".$this->table." (";
            if (isset($columns)) {
                $cols = preg_replace("/\s+/", "", $columns);
                $cols = strtolower($cols);
                $this->query .= $cols . ") VALUES ";
                $this->query .= "(";
                
                for ($i = 0; $i < count($values); $i++) {
                    $this->query .= $values[$i].", ";
                }
                
                $this->query = substr($this->query, 0, -2);
                $this->query .= ");";
                $this->connect->query($this->query);
                $this->connect->execute();
            }
        }
        
        public function rawQuery($query) {
            if (isset($query)) {
                $this->connect->query($query);
                return $this->connect->resultset();
            }
        }
        
        public function debug() {
            return $this->connect->debugDumpParams();
        }

    }

}