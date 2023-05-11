<!-- function for creating database using oops method -->

// function createDB($hostname, $username, $password, $db){
    
    //     $conn = new mysqli($hostname, $username, $password);
    //     if($conn -> connect_error){
    //         die("Unable to connect the mysqli connection " . $conn -> error);
    //     }
    
    //     $sql = "CREATE Database IF NOT exists $db";
    //     if(!($conn -> query($sql))){
    //         die("Unable to Create Database " . mysqli_error($conn));
    //     }
    // }


    <!-- function for creating the database using functional method -->
    // function createDB($hostname, $username, $password, $db){
        
    //     $conn = mysqli_connect($hostname, $username, $password);
    //     if(!$conn){
    //         die("Unable to connect the mysqli connection " . mysqli_error());
    //     }
    
    //     $sql = "CREATE Database IF NOT exists $db";
    //     if(!(mysqli_query($conn, $sql))){
    //         die("Unable to Create Database " . mysqli_error($conn));
    //     }
    // }