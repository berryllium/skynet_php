<?php

if (isset($_GET['id']) && isset($_GET['group'])) {
  $groupID = $_GET['group'];
  $id = $_GET['id'];
}
else die('Такого тарифа не существует');

$tarif = $model->getTarif($groupID, $id);

echo $site->template('../views/tarif.php', array('model' => $model, 'tarif' => $tarif, 'groupID' => $groupID));
