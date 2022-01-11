<?php
    $servername = "localhost";
    $dbname = "business_card_test";
    $username = "root";
    $password = "";
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //   echo "Connected successfully";
    } catch(PDOException $e) {
    //   echo "Connection failed: " . $e->getMessage();
    }

    try {
        $statement = $conn->prepare("insert into tbl_business_cards (firstName,lastName,profession,email,website,company,backgroundColor) values ( ? , ? , ? , ? , ? , ? , ? )");
        $statement->execute([get("firstName"), get("lastName"), get("profession"), get("email"), get("website"), get("company"), get("backgroundColor")]);

        //echo "\nInserted successfully";
    } catch(PDOException $e) {
        //echo "\nInsert failed: " . $e->getMessage();
    }
    
    print($conn->lastInsertId());
    die();

    function get($id)
    {
        if(isset($_POST[$id])){
            return $_POST[$id];
        }
        return null;
    }
?>