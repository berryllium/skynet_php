<?php 
// require_once('models/functions.php');
require_once('config/config.php');
require_once('controllers/SiteController.php');
require_once('models/Tarifs.php');

$site = new SiteController;
$model = new Tarifs($config);

if (isset($_GET['page'])) {
  $page = $_GET['page'];
  require_once("controllers/$page.php");
} else {
  require_once('views/header.php');
  require_once('views/footer.php'); 
}
?>