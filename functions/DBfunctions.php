<?php

class DBDev
{
    private $hostname;
    private $username;
    private $password;
    private $dbname;
    public $table_name;
    private $port;
    private $connection;
    public function __construct($dbname, $hostname = "localhost", $username = "root", $password = "", $table_name = "", $port = 3306)
    {
        $this->dbname = $dbname;
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->table_name = $table_name;
        $this->port = $port;
        $this->connection = mysqli_connect($this->hostname, $this->username, $this->password);

        $query = "CREATE DATABASE IF NOT EXISTS $dbname";
        mysqli_query($this->connection, $query);
        $this->connection = mysqli_connect($this->hostname, $this->username, $this->password, $dbname, $port);

    }


    private function create_table($fields)
    {
        // fields is a string convert it to an array
        $fields = explode(", ", $fields);

        // check table exist or not
        $query = "Show tables like '$this->table_name';";
        $result = mysqli_query($this->connection, $query);
        $results = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // if there is no table then create it
        if (sizeof($results) === 0) {

            // add a column for creating table
            $create_fields = "id int(10) AUTO_INCREMENT,";
            foreach ($fields as $field) {
                if ($field != "id") {
                    $create_fields .= "`$field` TEXT, ";
                }
            }
            $create_fields .= "PRIMARY KEY(id)";

            // create table if not exists
            $query = "CREATE TABLE IF NOT EXISTS $this->table_name ($create_fields)";
            mysqli_query($this->connection, $query);


        }

        // if table exists then add new columns
        else{
            // check if the column is already exists or not 
    
            $query = "SHOW COLUMNS from $this->table_name";
            $results = mysqli_query($this->connection, $query);
    
            if ($results) {
                $results = mysqli_fetch_all($results, MYSQLI_ASSOC);
                $existing_column = array_column($results, 'Field');
                $new_column = array_diff($fields, $existing_column);
            }
    
    
            if ($new_column) {
                $add_column = "";
                foreach ($new_column as $column) {
                    $add_column .= "ADD COLUMN $column text,";
                }
                $add_column = rtrim($add_column, ",");
    
                // add column if not exists
                $query = "ALTER TABLE $this->table_name $add_column;";
                mysqli_query($this->connection, $query);
            }
        }

    }


    function insert($form_data)
    {
        // separate the array keys and values

        foreach ($form_data as $key => $value) {
            $fields[] = $key;
            $values[] = $value;
        }

        // make the keys and values in string
        foreach ($fields as $field) {
            $update[] = "$field = VALUES($field)";
        }

        $update_query = implode(",", $update);
        $fields = implode(", ", $fields);
        $values = "'" . implode("','", $values) . "'";

        $query = "INSERT INTO $this->table_name ($fields) VALUES ($values) ON DUPLICATE KEY UPDATE $update_query;";
        try {
            mysqli_query($this->connection, $query);
        } catch (Exception $error) {
            $this->create_table($fields);
            mysqli_query($this->connection, $query);
        }
    }

    function update($id, $form_data)
    {

        $data = "";
        foreach ($form_data as $key => $value) {
            $data .= $key . " = '" . $value . "' ,";
        }
        $data = rtrim($data, ",");

        $query = "UPDATE $this->table_name SET $data WHERE id='$id'";
        $result = mysqli_query($this->connection, $query);

        // create table if the update query has any issues
        if (!$result) {
            $fields = array_keys($form_data);
            $fields = implode(", ", $fields);
            $this->create_table($fields);
            mysqli_query($this->connection, $query);
        }
    }

    function delete($id)
    {
        $query = "DELETE FROM $this->table_name WHERE id = $id";
        mysqli_query($this->connection, $query);
    }

}



// // get method
// if ($_SERVER['REQUEST_METHOD'] === "GET") {

// }



// post method
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // get the request data

    $table_name = $_POST['tableName'];
    $form_data = $_POST['formData'];

    // create an object with the table_name if the object is not exists
    $$table_name = ($$table_name === null) ? new DBDev("hostel", "localhost", "kechostel", "konguhostels", $table_name) : $$table_name;

    $$table_name->insert($form_data);

    $response = array(
        'success' => true,
        'message' => 'Data inserted successfully.',
        'output' => $form_data
    );
    header('Content-Type: application/json');
    http_response_code(200);
    echo json_encode($response);

}


// update method
if ($_SERVER["REQUEST_METHOD"] === "PUT") {
    parse_str(file_get_contents("php://input"), $data);
    // $data = file_get_contents("php://input");
    $table_name = $data["tableName"];
    $form_data = $data["formData"];
    $id = $data["id"];

    $$table_name = ($$table_name === null) ? new DBDev("hostel", "localhost", "kechostel", "konguhostels") : $$table_name;
    $$table_name->table_name = $table_name;

    $query = $$table_name->update($id, $form_data);


    $response = array(
        'success' => true,
        'message' => "Data updated successfully",
        'output' => $data
    );

    header("Content-Type:application/json");
    http_response_code(200);
    echo json_encode($response);
}

// // delete method
if ($_SERVER['REQUEST_METHOD'] === "DELETE") {

    // get the data from the api call
    parse_str(file_get_contents("php://input"), $data);
    $table_name = $data["tableName"];
    $id = $data["id"];

    $$table_name = ($$table_name === null) ? new DBDev("hostel", "localhost", "kechostel", "konguhostels", $table_name) : $$table_name;
    $$table_name->delete($id);

    $response = array(
        'success' => true,
        'message' => 'Data deleted successfully',
        'output' => $data
    );

    header("Content-Type:application/json");
    http_response_code(200);
    echo json_encode($response);
}



// $fields = array("hostel_id", "hostel_name", "gender", "contact_info");
// $values = array("1", "Boys Hostel 1", "Boys", "99449933");

// $data = array_combine($fields, $values);

// print_r($data);

// $obj -> insert("student", $data);


?>