<div class="card-wrapper">
<?php
foreach ($model->data as $id => $tarif) :?>
  <section class="card">
    <header class="card__header">
      Тариф "<?= $tarif->title ?>"
    </header>
      <div onclick="getPage('index.php?page=group&group=<?= $id ?>')" class="card__param card__param_link">
        <div class="card__arrow">&rsaquo;</div>
        <div class="card__speed card__speed_<?= $model->getMod($tarif->title) ?>"><?= $tarif->speed ?> Мбит/с</div>
        <div class="card__price"><?= $model->compPrice($id, 'min'); ?> &ndash; <?= $model->compPrice($id, 'max'); ?> &#8381;/мес</div>
        <div class="card__options">
          <?php if ($options = $tarif->free_options) foreach ($options as $option) : ?>
            <p class="card__option"><?= $option ?></p> 
          <? endforeach; ?>
        </div>
      </div>
      <footer class="card__footer">
        <a class="card__more" href="<?= $tarif->link ?>">узнать подробнее на сайте www.sknt.ru</a>
      </footer>
  </section>
<?php 
endforeach; ?>
</div>