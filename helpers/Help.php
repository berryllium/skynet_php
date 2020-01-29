<?php

class Help {
  static function suffixMonth($number)
  {
    // определяем окончание у слова 'месяц'

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

  static function getDate($new_payday) {
    // преобразуем дату в удобный формат

    $UTC = (int)substr($new_payday, -5, 3);
    $time = (int)substr($new_payday, 0 ,-5);

    $date = $time+$UTC*3600;
    $date = date("d.m.Y", $date);

    return $date;
  }
}