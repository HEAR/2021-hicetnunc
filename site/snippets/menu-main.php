<!-- snippet/menu-main -->

<?php

// https://getkirby.com/docs/cookbook/templating/menus#nested-menu

$items = $pages->listed();

if($items->isNotEmpty()):

?>
<nav>
  <ul>
    <?php foreach($items as $item): ?>
      <?php if ($item->title() == "Hic & nunc" && $page->isHomePage()): ?>
        <li class="active menu">
          <a href="<?= $item->url() ?>"><?= $item->title()->html() ?></a>
        </li>
      <?php else: ?>
        <?php 

          $isActive = true;

          if( $item->isOpen() ){ $isActive == true ;}
          else if( $page->template() == "keyword" && $item->slug() == "mots-cles"){ $isActive == true ;}
          else{ $isActive = false; }

         ?>
        <li class="menu <?php e($isActive, ' active') ?>">
          <a href="<?= $item->url() ?>"><?= $item->title()->html() ?></a>
        </li>
      <?php endif; ?>
    <?php endforeach ?>
  </ul>
</nav>
<?php endif ?>

<!-- fin snippet/menu-main -->