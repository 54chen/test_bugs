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
        <h1> <div class='top'><a  class='toptext' href="index.php">A-ONE REPLICAS </a> </div></h1>
        <form class='inline-block-center' action="results.php" method="GET">
            <input id='tb1' type="text" name="keywords">
            <input id='but1' type="submit" value="Search">
            <br><br>
        </form>
        <div class="outermost_div">

<?php
	/* PHP code to connect with the database, formulate the query and execute it on the db */
    $searchterm = "%".$_GET["keywords"]."%";  //data from the URL
     $con = mysqli_connect("localhost", "root", "", "test");
    /*The query */
    $query = "SELECT * FROM `products` where `productDescription` Like '$searchterm'";
    $result = mysqli_query($con, $query);
	/*Wrap the output of the query in html tags and print */

	if($result !=FALSE) //If some result is returned
	{
		while($row = mysqli_fetch_assoc($result)) {
			echo '<div class="boxes" id="A">';
			echo '<a href="items.php?id='; /*Create the link using productCode*/
			echo $row['productCode']." \">";
			echo $row['productName'] . "	";
			echo '</a>';
			echo '</div>';
			echo '<div class="boxes" id="B">';
			echo $row['productLine'] . "	";
			echo '</div>';
			echo '<div class="boxes" id="C">';
			echo "NZD ".$row['MSRP'] . "	";
			echo '</div>';
		}
	}
	else
		echo mysqli_error($con); //print the error in case of error
    mysqli_close($con);
?>
            </div>
            </body>
</html>
