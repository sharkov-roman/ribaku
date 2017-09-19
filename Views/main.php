<div class="container cont">
    <div class="row content">

      <? include_once 'navigation.php';?>

        <div class="col-md-5">
            <?php foreach ($arts as $art) { ?>
                <a href="<?php echo '/'.$art->getType().'/'.$art->getId().'/';?>">
                    <article>
                        <img src="http://www.diva.by/i/photo/wellness/nutrition/bacukova_karp1.jpg" alt="Рыба" class="img-responsive" />
                        <p class="text-center"><?php echo $art->getDescription(); ?></p>
                        <hr>
                        <p class="text-left"><?php echo $art->getData(); ?></p>
                    </article>
                </a>
            <?php } ?>
        </div>

    </div>
</div>
