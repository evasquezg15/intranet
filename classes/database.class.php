<?php


class Database{

    public function conn() {

        $dbhost = "localhost";
        $dbname = "intranet";        
        $dbuser = "root";
        $dbpass = "";  

        if($conn = new PDO("mysql:host=".$dbhost.";dbname=".$dbname, $dbuser, $dbpass,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'))){
            return($conn);
         }
         else {
            return null;
        }
    }

    public function connIntranetAnt() {

        $dbhost = "192.190.43.2";
        $dbname = "paxzumai_intranet";        
        $dbuser = "paxzumai_08user";
        $dbpass = "dbpxz8";  

        if($conn = new PDO("mysql:host=".$dbhost.";dbname=".$dbname, $dbuser, $dbpass,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'))){
            return($conn);
         }
         else {
            return null;
        }
    }

    // Function to SELECT from the database
    public function select($table, $rows = '*', $join = null, $where = null, $order = null, $limit = null){
        $conn = $this->conn();
        // Create query from the variables passed to the function
        $sql = 'SELECT '.$rows.' FROM '.$table;
        if($join != null){
            $sql .= ' JOIN '.$join;
        }
        if($where != null){
            $sql .= ' WHERE '.$where;
        }
        if($order != null){
            $sql .= ' ORDER BY '.$order;
        }
        if($limit != null){
            $sql .= ' LIMIT '.$limit;
        }

        //var_dump($sql);
        
        $query = $conn->prepare($sql);
        $executed = $query->execute(); 
        $result = $query->fetchAll();
        return $result;
    }

    // Function to insert into the database
    public function insert($table,$params=array()){
        $conn = $this->conn();
        try {
            //check if table exists or no
            $sql='INSERT INTO '.$table.' ('.implode(', ',array_keys($params)).') VALUES ("' . implode('", "', $params).'")';
            $query = $conn->prepare($sql);
            $check = $query->execute();
            //return lastInsertId
        } catch (PDOException $e) {
            var_dump($e->getMessage());
            echo 'Caught exception: ', $e->getMessage(), "\n";
            return false;
        }
    }
    
    // Function to update row in database
    public function update($table,$params=array(),$where){
        try {
                $conn = $this->conn();
                
                // Create Array to hold all the columns to update
                $args=array();
                foreach($params as $field=>$value){
                    // Seperate each column out with it's corresponding value
                    $args[]=$field.'="'.$value.'"';
                }
                
                // Create the query
                $sql='UPDATE '.$table.' SET '.implode(',',$args).' WHERE '.$where;
                // Make query to database
                $query = $conn->prepare($sql);
                $query->execute();
                return true; 
            } catch (PDOException $e) {
                var_dump($e->getMessage());
                echo 'Caught exception: ', $e->getMessage(), "\n";
                return false;
            }

        }
}
