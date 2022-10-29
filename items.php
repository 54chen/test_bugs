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
				$prodCode = htmlspecialchars($_GET["id"]); //Get the productCode from the URL
        $mysqli = new mysqli("localhost", "new_user", "340144024b17e6a6cb38b035f7995723", "testsite");
        $stmt = $mysqli->prepare("SELECT productCode,productName,productDescription,MSRP  FROM `products` WHERE productCode=?");
        $stmt->bind_param("s", $prodCode);
        $stmt->execute();
        $stmt->bind_result($productCode,$productName,$productDescription,$MSRP);
        while ($stmt->fetch()) {
          echo '<div class="boxes" id="A">';
          echo '<a href="items.php?id=';
          echo $productCode ." \">";
          echo $productName . "	";
          echo '</a>';
          echo '</div>';
          echo '<div class="boxes" id="B">';
          echo $productDescription . "	";
          echo '</div>';
          echo '<div class="boxes" id="C">';
          echo "NZD ".$MSRP . "	";
          echo '</div>';
				}
			?>
	    </div>
		<!-- HTML for the feedback form -->
		<!-- The form sends data to review.php -->
		<form action="review.php" method="POST">
			<h2> leave this product a review </h2>
			<div>
			<input type='text' id='tb2' name='person' minlength="2"
      maxlength="10" pattern="[a-zA-Z0-9]{2,}$"> <br>
			<input id="txt" name="txt" minlength="2"
      maxlength="1000" pattern="[a-zA-Z0-9]{2,}$"><br />
			<!-- Hidden field that doesn't get displayed but holds the product code to send to review.php -->
			<input type='hidden' name='prod' value='<?php echo $prodCode ?>'>
			<input id='but2' type='submit' value='submit'>
			</div>
		</form>
		<!-- Once everything has been displayedon the HTML page. Make a database connection and get all the reviews for this product -->
		<?php
			/* Create the query and run it on the db */
			$stmt = $mysqli->prepare("SELECT name,review  FROM `reviews` WHERE productCode=?");
      $stmt->bind_param("s", $prodCode);
      $stmt->execute();
      $stmt->bind_result($name,$review);
      while ($stmt->fetch()) {
				echo "<b>".strip_tags($name) . "</b> <i> says </i>". strip_tags($review) . " <br><hr>";
			}
		?>
            </body>
</html>
