<?php
    $servername = "localhost";
    $dbname = "business_card_test";
    $username = "root";
    $password = "^7Yo6QQYbSqbEibwFr84KvkiXqD!Fv%w";
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //   echo "Connected successfully";
    } catch(PDOException $e) {
    //   echo "Connection failed: " . $e->getMessage();
    }

    try {
        $statement = $conn->prepare("select cardID from tbl_business_cards where firstName = ? and lastName = ? and profession = ? and email = ? and tel = ? and website = ? and company = ? ");
        $statement->execute([get("firstName"), get("lastName"), get("profession"), get("email"), get("tel"), get("website"), get("company")]);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        
        if (!isset($result[0])) {
            $statement = $conn->prepare("insert into tbl_business_cards (firstName, lastName, profession, email, tel, website, company, meta) values ( ? , ? , ? , ? , ? , ? , ? , ? )");
            $statement->execute([get("firstName"), get("lastName"), get("profession"), get("email"), get("tel"), get("website"), get("company"), get("meta")]);

            $id = $conn->lastInsertId();

            if (isset($_FILES["logoImage"])) {
                $extension = pathinfo($_FILES["logoImage"]["name"], PATHINFO_EXTENSION);
                $isUploaded = move_uploaded_file($_FILES["logoImage"]["tmp_name"], "./../user-images/" . $id . "_logoImage." . $extension);
            }
            if (isset($_FILES["backgroundImage"])) {
                $extension = pathinfo($_FILES["backgroundImage"]["name"], PATHINFO_EXTENSION);
                $isUploaded = move_uploaded_file($_FILES["backgroundImage"]["tmp_name"], "./../user-images/". $id . "_backgroundImage." . $extension);
            }


            print($id);



            die();
        }
        else {
            print($result[0]["cardID"]);
            die();
        }
        
        //echo "\nInserted successfully";
    } catch(Exception $e) {
        echo "\nInsert failed: " . $e->getMessage();
    }

    function get($var)
    {
        if(isset($_POST[$var])){
            return $_POST[$var];
        }
        return null;
    }
?>