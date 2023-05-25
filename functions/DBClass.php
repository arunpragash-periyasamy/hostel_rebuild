<?php


// creating class for sql operations crud
class DB{
    private $db = null;
    private $hostname = null;
    private $username = null;
    private $password = null;
    private $connection = null;
    private $port = null;


    // constructor for creating the new object of the database with the details of the database name, username , password , hostname and port;
    
    function __construct($username, $password, $db, $hostname = "localhost", $port = 3306){

        // set the values from the user to the class variables.
        $this -> db = $db;
        $this -> port = $port;
        $this -> username = $username;
        $this -> password = $password;
        $this -> hostname = $hostname;

        $this -> createDBConnection();
    }


    // function to create Database Connection and create a connection
    private function createDBConnection(){

        $this -> connection = new mysqli($this -> hostname, $this -> username, $this -> password);
        
        $sql = `CREATE Database IF NOT exists  ` . $this -> db;
        if(! $this -> connection -> query($sql)){
            die("Unable to connect the Database");
        }

        $this -> connection = new mysqli($this -> hostname, $this -> username, $this -> password, $this -> db, $this -> port);

        if($this -> connection -> connect_error){
            die("Unable to connect the mysql ". $this -> connection -> connect_error);
        }

    }


    // function to close the mysql connection 
    function __destruct(){
        if($this -> connection != null){
            $this -> connection -> close();
        }
        $this -> connection = null;
    }

    // function to create the table with the table_name(string) and field_names (array)
    private function createTable($table_name, $field_names){

        $field_names = str_ireplace(",", "TEXT, ",$field_names);
        
        if($this -> connection -> connect_error){
            die("Unable to connect the mysqli" . $this -> connection -> connect_error);
        }

        $sql = `CREATE TABLE IF NOT exists $table_name($field_names)`;
        if(! $this -> connection -> query($sql)){
            die("Unable to Create Database");
        }
    }


    // function to insert the data into the table
    public function insert($table_name, $data, $multiple_records = "false"){

        $fields = implode(",", array_keys($data));
        $values = implode(",", array_values($data));
        
        $this -> createTable($table_name, $fields);

        $query = `INSERT INTO $table_name($fields), VALUES ($values);`;
        $this -> connection -> query($query);
    }

    // function to update the data
    public function update($tablename, $values, $condition){


        $query = `UPDATE $tablename SET $values WHERE $condition`;
        $this -> connection -> query($query);
    }



    // function to insert the data into the table
    public function insertUpdate($table_name, $data, $multiple_records = "false"){


        $fields = implode(",", array_keys($data));
        $values = implode(",", array_values($data));
        
        $this -> createTable($table_name, $fields);
        
        $update_data = "";
        
        foreach($data as $field => $value){
            $update_data .= `$field = $value, `;
        }
        // remove last comma;
        $last_position = strlen($update_data);
        $update_data = substr($update_data, 0, $last_position);
        

        $query = `INSERT INTO $table_name($fields), VALUES ($values) ON DUPLICATE KEY UPDATE $update_data;`;
        $this -> connection -> query($query);
    }

    // function to delete the data from the table
    public function delete($tablename, $condition = null){
        if($condition != null){
            $query = `DELETE FROM $tablename WHERE $condition`;
            $this -> connection -> query($query);
        }else{
            echo "No condition is provided to delete";
        }
    }

    // function to delete all the records from the table
    public function deleteAll($tablename){
        $query = `DELETE $tablename`;
        $this -> connection -> query($query);
    }
}


$dbconnection = new DB("kechostel","konguhostels","Funtime");
$table_name = "student";
$column = "student_name Text, roll_number Text, email Text, password Text";
$dbconnection -> createTable($table_name, $column);
$dbconnection -> insert("student", array("name" => "arunpragash", "roll_number" => "19isr007", "email" => "arunpragashap.19msc@kongu.edu", "password" => "arun@1234"));



?>