<?php

// https://getkirby.com/docs/cookbook/templating/menus#nested-menu

// nested menu
if( ! $page->isHomePage() ):
  $items = $page->children()->listed();
  // only show the menu if items are available
  if($items->isNotEmpty()):

  ?>
  <nav>
    <ul>
      <?php foreach($items as $item): ?>
      <li class="<?php e($item->isOpen(), 'active') ?>">
        <a href="<?= $item->url() ?>"><?= $item->title()->html() ?></a>
      </li>
      <?php endforeach ?>
    </ul>
  </nav>
<?php endif;
endif;
