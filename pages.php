 <!-- HTMLL code that includes the css stylesheet and creates the form with the search textbox and button -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <title>A One replicas</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="gridwork-done.css">
    </head>
    <body>
        <h1> <div class='top'><a class='toptext' href="index.php">A-ONE REPLICAS </a> </div></h1>
        <form class='inline-block-center' action="results.php" method="GET">
            <input id='tb1' type="text" name="keywords" minlength="2"
      maxlength="10" pattern="[a-zA-Z0-9]{2,}$">
            <input id='but1' type="submit" value="Search">
            <br><br>
        </form>
        <div class="outermost_div">
           
<?php
	/* PHP code to connect with the database, formulate the query and execute it on the db */
    $prodLine = htmlspecialchars($_GET["prodLine"]); //Get product line from the URL
    $mysqli = new mysqli("localhost", "new_user", "340144024b17e6a6cb38b035f7995723", "testsite");
    $stmt = $mysqli->prepare("SELECT productCode,productName,productLine,MSRP FROM `products` where `productLine` = ?");
    $stmt->bind_param("s", $prodLine);
    $stmt->execute();
    $stmt->bind_result($productCode,$productName,$productLine,$MSRP);
    while ($stmt->fetch()) {
			echo '<div class="boxes" id="A">';
			echo '<a href="items.php?id=';
			echo $productCode." \">";                          
			echo $productName . "	";
			echo '</a>';
			echo '</div>';
			echo '<div class="boxes" id="B">';
			echo $productLine . "	";
			echo '</div>';
			echo '<div class="boxes" id="C">';
			echo "NZD ".$MSRP . "	";
			echo '</div>';
		}
?>
            </div>
            </body>
</html>
