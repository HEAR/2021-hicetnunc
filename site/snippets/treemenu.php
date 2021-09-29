<?php

// https://getkirby.com/docs/cookbook/templating/menus#tree-menu

if(!isset($subpages)) $subpages = $site->children() ?>

<ul>
	<?php foreach($subpages->listed() as $p): ?>
		<li class="depth-<?= $p->depth() ?> <?php e($p->isActive(), 'active') ?>">
			<a href="<?= $p->url() ?>"><?= $p->title()->html() ?></a>
			<?php if($p->hasChildren()): ?>
				<?php snippet('treemenu', ['subpages' => $p->children()]) ?>
			<?php endif ?>
		</li>
	<?php endforeach ?>
</ul>