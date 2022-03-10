<section id="newest-additions">

  <div class="flex-container">
    <h2><?php echo __('Newest additions') ?></h2>
    <div class="edge-flair"></div>
  </div>
  <ul>
    <?php foreach ($newestAdditions as $item): ?>
      <?php $object = QubitObject::getById($item); ?>
      <li>
        <a href="<?php echo url_for(array($object)) ?>">
          <?php echo render_title($object) ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>

</section>
