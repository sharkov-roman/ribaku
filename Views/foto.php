<div class="container ">
    <div class="row content">

        <? include_once 'navigation.php';?>

        <div class="col-md-6">
            <?php foreach ($arts as $art) { ?>
                <article>
                    <img src="http://www.diva.by/i/photo/wellness/nutrition/bacukova_karp1.jpg" alt="Рыба" class="img-responsive" />
                    <p class="text-center"><?php echo $art->getDescription(); ?></p>
                    <hr>
                    <p class="text-left"><?php echo $art->getData(); ?></p>
                </article>
            <?php } ?>
        </div>
        <div class="col-md-3">
            <p>
                <button class="btn btn-primary btn-block btn-sm" type="button">Регистрация</button>
                <button class="btn btn-primary btn-block  btn-sm" type="button">Войти</button>
                <button class="btn btn-primary btn-block  btn-sm" type="button">Добавить описание водоёма</button>
            </p>
        </div>
    </div>
</div>
