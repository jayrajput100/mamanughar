<?php

/**
 * @var \CodeIgniter\Pager\PagerRenderer $pager
 */

$pager->setSurroundCount(2);
?>


	  <div class="pagination_fg">
		<a href="<?= $pager->getFirst() ?>">&laquo;</a>
		<?php foreach ($pager->links() as $link) : ?>
			
				<a href="<?= $link['uri'] ?>"  <?= $link['active'] ? 'class="active"' : '' ?>>
					<?= $link['title'] ?>
				</a>
			
		<?php endforeach ?>

		
			
				<a href="<?= $pager->getnext() ?>">&raquo;</a>
		
			
				
			
		
	</ul>

