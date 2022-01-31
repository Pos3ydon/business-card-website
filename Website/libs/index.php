<!DOCTYPE html>

<html>
    <head>
        <title>Business Card</title>


        <link rel="icon" href="./../images/website_icon.svg">

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
                $username = 'root';
                $password = '^7Yo6QQYbSqbEibwFr84KvkiXqD!Fv%w';
                
                try {
                $conn = new PDO("mysql:host=$servername;dbname=$dbname; charset=utf8mb4", $username, $password);
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
                        $meta = json_decode($result["meta"]);
                    }
                    else
                    {
                        header('location: ./pages/createCard.php');
                    }

                } catch(PDOException $e) {
                    header('location: ./pages/createCard.php');
                }

            }
        

            //$glob = glob("./user-images/" . $_GET["id"] . "_*");
            //$logo = glob("./../User-Images/" . $_GET["id"] . "_logoImage.*", GLOB_NOSORT)[0];
            //$background = glob("./../User-Images/" . $_GET["id"] . "_backgroundImage.*", GLOB_NOSORT)[0];
	    $glob = glob("./user-images/" . $_GET["id"] . "_backgroundImage*");
            if (isset($glob[0])) {
                $background = $glob[0];
            }
	    $glob = glob("./user-images/" . $_GET["id"] . "_logoImage*");
            if (isset($glob[0])) {
                $logo = $glob[0];
            }
        
        ?>


        <div id="cardDiv">
            <div id="viewDiv">
                <div id="view" style="background-color: <?php echo $meta->backgroundColor;?>; background-image: url('<?php echo $background?>');">
                    <div id="viewLogo" class="viewField"style="background-image: url('<?php echo $logo?>');">
                    </div>
                    <div id="viewFirstName" class="viewField" style="top: <?php echo $meta->firstName->top;?>; left: <?php echo $meta->firstName->left;?>; width: <?php echo $meta->firstName->width;?>; height: <?php echo $meta->firstName->height;?>;">
                        <div id="viewFirstNameP" style="font-size: <?php echo $meta->firstName->fontSize;?>;>"><?php echo htmlspecialchars($result["firstName"]);?></div>
                    </div>
                    <div id="viewLastName" class="viewField" style="top: <?php echo $meta->lastName->top;?>; left: <?php echo $meta->lastName->left;?>">
                        <div id="viewLastNameP" style="font-size: <?php echo $meta->lastName->fontSize;?>;>"><?php echo htmlspecialchars($result["lastName"]);?></div>
                    </div>
                    <div id="viewProfession" class="viewField" style="top: <?php echo $meta->profession->top;?>; left: <?php echo $meta->profession->left;?>">
                        <div id="viewProfessionP" style="font-size: <?php echo $meta->profession->fontSize;?>;>"><?php echo htmlspecialchars($result["profession"]);?></div>
                    </div>
                    <div id="viewEmail" class="viewField" style="top: <?php echo $meta->email->top;?>; left: <?php echo $meta->email->left;?>">
                        <div id="viewEmailP" style="font-size: <?php echo $meta->email->fontSize;?>;>"><?php echo htmlspecialchars($result["email"]);?></div>
                    </div>
                    <div id="viewTel" class="viewField" style="top: <?php echo $meta->tel->top;?>; left: <?php echo $meta->tel->left;?>">
                        <div id="viewTelP" style="font-size: <?php echo $meta->tel->fontSize;?>;>"><?php echo htmlspecialchars($result["tel"]);?></div>
                    </div>
                    <div id="viewWebsite" class="viewField" style="top: <?php echo $meta->website->top;?>; left: <?php echo $meta->website->left;?>">
                        <div id="viewWebsiteP" style="font-size: <?php echo $meta->website->fontSize;?>;>"><?php echo htmlspecialchars($result["website"]);?></div>
                    </div>
                    <div id="viewCompany" class="viewField" style="top: <?php echo $meta->company->top;?>; left: <?php echo $meta->company->left;?>">
                        <div id="viewCompanyP" style="font-size: <?php echo $meta->company->fontSize;?>;>"><?php echo htmlspecialchars($result["company"]);?></div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</html>