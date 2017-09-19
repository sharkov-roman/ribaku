

<div class="container cont">
    <div class="row content">
        <? include_once 'navigation.php';?>
        <div class="col-md-8">
            <h1><?php echo $arts[0]->getTitle();?></h1>
            <p> <?php echo $arts[0]->getText();?></p>
        </div>
    </div>
</div>