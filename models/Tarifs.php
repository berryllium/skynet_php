<?php

class Tarifs
{

  public $url;  // указываем путь к файлу json
  public $data; // распарсенные данные, содержащиеся в json

  public function __construct($config)
  {
    // устанавливаем url из конфигурационного файла и иполучаем тарифы
    $this->url = $config['url'];
    $this->setTarifs();
  }

  public function setTarifs()
  {
    // получение тарифов из json

    $json = file_get_contents($this->url);
    $tarifs = json_decode($json)->tarifs;

    //сортируем по скорости тарифа и записываем в свойство data
    uasort($tarifs, function ($f1, $f2) {
      if ($f1->speed < $f2->speed) return -1;
      elseif ($f1->speed > $f2->speed) return 1;
      else return 0;
    });

    $this->data = $tarifs;
  }


  public function compPrice($id_group, $comp)
  {
    // метод для получения минимальной/максимальной цены для группы тарифов по ее id
    $arr = $this->data[$id_group]->tarifs;
    $prices = [];
    foreach ($arr as $k => $v) {
      $prices[] = $v->price;
    }
    return $comp == 'max' ? max($prices) : min($prices);
  }

  public function getGroup($id_group)
  {
    // получаем группу тарифов по ее id
    return $this->data[$id_group];
  }

  public function getTarif($id_group, $serchID)
  {
    // получаем тариф по 
    $tarifs = $this->getGroup($id_group);
    $tarif = $tarifs->tarifs;
    $ids = array_column($tarif, 'ID');
    $id = array_search($serchID, $ids);
    return $tarif[$id];
  }

  public function getProfit($id_group, $id_tarif)
  {
  }

  public function getMod($title)
  {
    if (preg_match("/Земля/i", $title, $matches)) {
      return 'earth';
    } elseif (preg_match('/Вода/i', $title)) {
      return 'water';
    } else {
      return 'fire';
    }
  }
}
