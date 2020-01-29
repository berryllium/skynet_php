 <?php require_once('../helpers/Help.php'); ?>
 
  <header class="page__header">
    <div onclick="getPage('index.php?page=main')" class="page__arrow">&lsaquo;</div>
    <h1 class="page__title">Тариф "<?= $title ?>"</h1>
  </header>
  <div class="card-wrapper">
    <?php foreach ($tarifs as $tarif) : ?>
      <section class="card">
        <header class="card__header">
          <?= $tarif->pay_period . ' ' . Help::suffixMonth($tarif->pay_period) ?>
        </header>
        <div onclick="getPage('index.php?page=tarif&group=<?= $groupID ?>&id=<?= $tarif->ID ?>')" class="card__param  card__param_link">
          <div class="card__arrow">&rsaquo;</div>
          <div class="card__price"><?= $tarif->price / $tarif->pay_period ?> &#8381;/мес</div>
          <div class="card__payment">разовый платеж &ndash; <?= $tarif->price ?> &#8381;</div>
          <?php if ($discount = $model->compPrice($groupID, 'min') * $tarif->pay_period - $tarif->price) : ?>
            <div class="card__discount">скидка &ndash; <?=  $discount ?> &#8381;</div>
          <?php endif; ?>
        </div>
      </section>
    <?php endforeach ?>
  </div>