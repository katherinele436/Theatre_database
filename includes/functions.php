<?php
function printHeadContents($pageTitle) {
?>
	<title><?php echo $pageTitle; ?></title>
	<meta charset="UTF-8"/>
	<meta name="author" content="Peter O'Donnell, Katherine Le, Thomas Parker"/>
	<meta name="description" content="A web application to display our database. Developed for CISC 332."/>
	<meta name="keywords" content="database, movies, theatres"/>
	<link rel="stylesheet" href="./css/OMTS.css"/>
	<script src="js/OMTS.js"></script>
<?php 
}

function prepareFormData($form_data, $mysqli_obj = null) {
	$prepared_data = $form_data;
	$prepared_data = trim($prepared_data);
	$prepared_data = strip_tags($prepared_data);
	$prepared_data = htmlspecialchars($prepared_data);
	
	if ($mysqli_obj) {
		$prepared_data = $mysqli_obj->real_escape_string($prepared_data);	
	}
	
	return $prepared_data;
}

function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}
?>