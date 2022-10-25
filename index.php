 <!-- HTML code that includes the css stylesheet and creates the form with the search textbox and button -->
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
        <form class='inline-block-center'action="results.php" method="GET">
            <input id='tb1' type="text" name="keywords">
            <input id='but1' type="submit" value="Search">
            <br><br>
        </form>
        <div class="outermost_div">

		<?php
			/* PHP code to connect with the database, formulate the query and execute it on the db */
			$mysqli = new mysqli("localhost", "new_user", "340144024b17e6a6cb38b035f7995723", "testsite");
      $stmt = $mysqli->prepare("select productLine, textDescription from `productlines`");
      $stmt->execute();
      $stmt->bind_result($productLine, $textDescription);
      while ($stmt->fetch()) {
        echo '<div class="boxes" id="A">'; //creating the first box for product line
        echo '<a href="pages.php?prodLine='; //creating the hyperlink
        echo $productLine ." \">";
        echo $productLine . "	";
        echo '</a>';
        echo '</div>';
        echo '<div class="boxes" id="B">';//second box in the row for description
        echo $textDescription . "	";
        echo '</div>';
      }
		?>
        </div>
    </body>
</html>
