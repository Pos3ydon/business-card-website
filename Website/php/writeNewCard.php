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
        $statement = $conn->prepare("select cardID from tbl_business_cards where firstName = ? and lastName = ? and profession = ? and email = ? and tel = ? and website = ? and company = ? and backgroundColor = ? ");
        $statement->execute([get("firstName"), get("lastName"), get("profession"), get("email"), get("tel"), get("website"), get("company"), get("backgroundColor")]);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        if (!isset($result[0])) {
            $statement = $conn->prepare("insert into tbl_business_cards (firstName,lastName,profession,email,tel,website,company,backgroundColor) values ( ? , ? , ? , ? , ? , ? , ? , ? )");
            $statement->execute([get("firstName"), get("lastName"), get("profession"), get("email"), get("tel"), get("website"), get("company"), get("backgroundColor")]);

            $id = $conn->lastInsertId();


            $extension = pathinfo($_FILES["logoImage"]["name"], PATHINFO_EXTENSION);
            $isUploaded = move_uploaded_file($_FILES["logoImage"]["tmp_name"], "./../user-images/". $id . "_logoImage." . $extension);
            $extension = pathinfo($_FILES["backgroundImage"]["name"], PATHINFO_EXTENSION);
            $isUploaded = move_uploaded_file($_FILES["backgroundImage"]["tmp_name"], "./../user-images/". $id . "_backgroundImage." . $extension);


            print($id);

            die();
        }
        else {
            print($result[0]["cardID"]);
            die();
        }
        
        //echo "\nInserted successfully";
    } catch(Exception $e) {
        //echo "\nInsert failed: " . $e->getMessage();
    }

    function get($id)
    {
        if(isset($_POST[$id])){
            return $_POST[$id];
        }
        return null;
    }
?>