<!-- <?php $pager->setSurroundCount(2) ?>
<?php 
;
?>
<ul class="pagination pagination-sm m-0 float-right">
   
        <li class="paginate_button  page-item <?php echo($pager->getPrevious()==false)?"disabled":'' ?>">
            <a href="<?= $pager->getFirst() ?>" class="page-link" >
                <i class="flaticon-arrow-left-1"></i><?= lang('Pager.first') ?>
            </a>
        </li>
        <li class="page-item <?php echo($pager->getPrevious()==false)?"disabled":'' ?>">
            <a href="<?= $pager->getPrevious() ?>" class="page-link previous"  <?php ($pager->getPrevious()==false)?"disabeled":'' ?>>
               <i class="flaticon-arrow-left-1"></i><?= lang('Pager.previous') ?>
            </a>
        </li>
    

    <?php foreach ($pager->links() as $link) : ?>
        <li class="paginate_button  page-item <?= $link['active'] ? ' active ' : '' ?>">
            <a class="page-link" href="<?= $link['uri'] ?>">
                <?= $link['title'] ?>
            </a>
        </li>
    <?php endforeach ?>

    
        <li class="paginate_button  page-item next <?php echo ($pager->hasNext()==false)?"disabled":'' ?>" >
            <a class="page-link" href="<?= $pager->getNext() ?>"  aria-label="<?= lang('Pager.next') ?>">
                <?= lang('Pager.next') ?><i class="flaticon-arrow-right"></i>
            </a>
        </li>
        <li class="paginate_button  page-item <?php echo ($pager->hasNext()==false)?"disabled":'' ?>">
            <a class="page-link" href="<?= $pager->getLast() ?>" >
                <?= lang('Pager.last') ?><i class="flaticon-arrow-right"></i>
            </a>
        </li>
 
</ul>
 -->