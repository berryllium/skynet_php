<?php
$url = 'data.json';
function getTarifs($url)
{
  $json = file_get_contents($url);
  $data = json_decode($json);
  $tarifs = $data->tarifs;
  return  $tarifs;
}

function minPrice($tarif, $comp)
{
  $arr = $tarif->tarifs;
  $prices = [];
  foreach ($arr as $k => $v) {
    $prices[] = $v->price;
  }
  return $comp == 'max' ? max($prices) : min($prices);
}

function getGroup($url, $id)
{
  $group = getTarifs($url);
  return $group[$id];
}

function getTarif($url, $group, $serchID)
{
  $tarifs = getGroup($url, $group);
  $tarif = $tarifs->tarifs;
  $ids = array_column($tarif, 'ID');
  $id = array_search($serchID, $ids);
  return $tarif[$id];
}

function template($fileName, $vars = array())
{
  // Установка переменных для шаблона.
  foreach ($vars as $k => $v) {
    $$k = $v;
  }

  // Генерация HTML в строку.
  ob_start();
  include "$fileName";
  return ob_get_clean();
}

function suffix($number)
{
  switch ($number) {
    case 1: {
        return 'месяц';
      }
    case 3: {
        return 'месяца';
      }
    default: {
        return 'месяцев';
      }
  }
}

function getMod($title)
{
  if (preg_match("/Земля/i", $title, $matches)) {
    return 'earth';
  } elseif (preg_match('/Вода/i', $title)){
    return 'water';
  } else {
    return 'fire';
  }
}
