<?php

if (isset($_GET['group'])) $groupID = $_GET['group'];
else die('Такого тарифа не существует');

$group = $model->getGroup($groupID);
$title = $group->title;
$tarifs = $group->tarifs;
echo $site->template('../views/group.php', array('model' => $model, 'title' => $title, 'tarifs' => $tarifs, 'groupID' => $groupID));