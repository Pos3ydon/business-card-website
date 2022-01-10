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

        // $conn->exec("Insert Into tbl_businesscards (" .
        //     (($_POST["firstName"] == "") ? "" : "firstName") .
        //     (($_POST["lastName"] == "") ? "" : ", lastName") .
        //     (($_POST["profession"] == "") ? "" : ", profession") .
        //     (($_POST["email"] == "") ? "" : ", email") .
        //     (($_POST["website"] == "") ? "" : ", website") .
        //     (($_POST["company"] == "") ? "" : ", company") .
        //     ") Values (" .
        //     (($_POST["firstName"] == "") ? "" : "'" . $_POST["firstName"] . "'") .
        //     (($_POST["lastName"] == "") ? "" : ", '" . $_POST["lastName"] . "'") .
        //     (($_POST["profession"] == "") ? "" : ", '" . $_POST["profession"] . "'") .
        //     (($_POST["email"] == "") ? "" : ", '" . $_POST["email"] . "'") .
        //     (($_POST["website"] == "") ? "" : ", '" . $_POST["website"] . "'") .
        //     (($_POST["company"] == "") ? "" : ", '" . $_POST["company"] . "'") .
        //     ");");


        $statement = $conn->prepare("insert into tbl_businesscards (firstName,lastName,profession,email,website,company) values ( ? , ? , ? , ? , ? , ? )");
        $statement->execute([get("firstName"), get("lastName"), get("profession"), get("email"), get("website"), get("company")]);
        

        // echo "\nInserted successfully";
    } catch(PDOException $e) {
        // echo "\nInsert failed: " . $e->getMessage();
    }
    
    // echo "\n";
    // print_r($_POST);
    // echo "\n";
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