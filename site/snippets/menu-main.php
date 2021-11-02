<!-- snippet/menu-main -->

<?php

// https://getkirby.com/docs/cookbook/templating/menus#nested-menu

$items = $pages->listed();

if($items->isNotEmpty()):

?>
<nav>
  <ul>
      <li class="menu <?php e($page->isHomePage(), ' active') ?>">
        <a href="<?= $site->url() ?>"><?= $site->title()->html() ?></a>
      </li>
    <?php foreach($items as $item): ?>
        <?php 

          $isActive = true;

          if( $item->isOpen() ){ $isActive == true ;}
          else if( $page->template() == "keyword" && $item->slug() == "mots-cles"){ $isActive == true ;}
          else{ $isActive = false; }

         ?>
        <li class="menu <?php e($isActive, ' active') ?>">
          <a href="<?= $item->url() ?>"><?= $item->title()->html() ?></a>
        </li>
    <?php endforeach ?>
  </ul>
</nav>
<?php endif ?>

<!-- fin snippet/menu-main -->