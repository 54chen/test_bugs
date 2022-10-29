<?php
	/*store the parameters from the URL in local variables */
  $reviewer=htmlspecialchars($_POST['person']);
  $text=htmlspecialchars($_POST['txt']);
	$prodCode=htmlspecialchars($_POST['prod']);
	/*connect to the db */
  $mysqli = new mysqli("localhost", "new_user", "340144024b17e6a6cb38b035f7995723", "testsite");
  $stmt = $mysqli->prepare("INSERT INTO reviews(`name`, `review`, `productCode`) VALUES (?, ?, ?)");

  $stmt->bind_param("sss", $reviewer, $text, $prodCode); 
  $stmt->execute();
  $prodCode = trim($prodCode);
	header("Location: items.php?id=".urlencode($prodCode));
?>