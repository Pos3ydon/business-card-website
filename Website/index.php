<!DOCTYPE html>

<html>
    <head>
        <link rel="icon" href="./../images/icon.png">

        <link rel="stylesheet" href="./index.css">
    </head>
    <body>
        <?php
            if (!isset($_GET["id"]))
            {
                header('location: ./pages/createCard.php');
            }
            else
            {
                $servername = "localhost";
                $dbname = "business_card_test";
                $username = "root";
                $password = "";
                
                try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //   echo "Connected successfully";
                } catch(PDOException $e) {
                //   echo "Connection failed: " . $e->getMessage();
                }

                try {
                    $statement = $conn->prepare("select * from tbl_business_cards where cardID = ? ");
                    $statement->execute([$_GET["id"]]);



                    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

                    if (isset($result[0])) 
                    {
                        $result = $result[0];
                    }
                    else
                    {
                        header('location: ./pages/createCard.php');
                    }

                } catch(PDOException $e) {
                    header('location: ./pages/createCard.php');
                }

            }
        

            $glob = glob("./user-images/" . $_GET["id"] . "_*");
            //$logo = glob("./../User-Images/" . $_GET["id"] . "_logoImage.*", GLOB_NOSORT)[0];
            //$background = glob("./../User-Images/" . $_GET["id"] . "_backgroundImage.*", GLOB_NOSORT)[0];
            $background = $glob[0];
            $logo = $glob[1];
        
        ?>


        <div id="cardDiv">
            <div id="viewDiv">
                <div id="view" style="background-color: <?php echo $result["backgroundColor"];?>; background-image: url('<?php echo $background?>');">
                    <div id="viewLogo" class="viewField"style="background-image: url('<?php echo $logo?>');">
                    </div>
                    <div id="viewFirstName">
                        <p id="viewFirstNameP" class="viewField"><?php echo $result["firstName"];?></p>
                    </div>
                    <div id="viewLastName" class="viewField">
                        <p id="viewLastNameP"><?php echo $result["lastName"];?></p>
                    </div>
                    <div id="viewProfession" class="viewField">
                        <p id="viewProfessionP"><?php echo $result["profession"];?></p>
                    </div>
                    <div id="viewEmail" class="viewField">
                        <p id="viewEmailP"><?php echo $result["email"];?></p>
                    </div>
                    <div id="viewWebsite" class="viewField">
                        <p id="viewWebsiteP"><?php echo $result["website"];?></p>
                    </div>
                    <div id="viewCompany" class="viewField">
                        <p id="viewCompanyP"><?php echo $result["company"];?></p>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>