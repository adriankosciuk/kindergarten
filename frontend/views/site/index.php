<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Strona główna';
?>
<div>
<div class="slider-wrapper theme-default">

  
 <div id="slider" class="nivoSlider"> 
     <?php foreach($slides as $slide): ?>
     <img style="height: 600px; width: 1000px" src="http://localhost/projekt/backend/web/<?= $slide->image ?>" title="<?= $slide->title ?>" />   
<?php endforeach; ?>
 </div> 
 
    <br>
</div>

<hr>
    <div>
            <?= $text ?>
        </div>
     
   <br>
   <hr>
    <div class="body-content">

        <div class="row">
            <?php foreach($headings as $header): ?>
            <div class="col-lg-4">
                
                <h2><?= $header->header ?></h2>

                <p id="main_header"><?= $header->content ?></p>

                <p><a class="btn btn-default" href="<?= Url::to([$header->url.'/index']) ?>">Zobacz więcej &raquo;</a></p>
           
            </div>
            <?php endforeach; ?>
        </div>

    </div>
    </div> 