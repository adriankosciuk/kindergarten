<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDHya39RKRnyf75IH1NszeerTBiodUT-I0&v=3"
    type="text/javascript"></script>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <div class= "header">
        <div class= "logo">
            <span style="color: #c34f4f; font-size: 40px">najlepsze-przedszkole</span>.com

           
        </div>		
    </div>
 <div class="nav">
			<ol>
				<li><a href="<?= Url::to(['site/index']) ?>">Strona główna</a></li>
				<li><a href="<?= Url::to(['offer/index']) ?>">Oferta</a>
				</li>
				<li><a href="<?= Url::to(['recruitment/index']) ?>">Rekrutacja</a>
				</li>
				<li><a href="#">Dla rodziców</a>
				<ul>
						<li><a href="<?= Url::to(['articles/index']) ?>">Artykuły</a></li>
						<li><a href="<?= Url::to(['menu/index']) ?>">Jadłospis</a></li>
                                                <li><a href="<?= Url::to(['employees/index']) ?>">Kadra</a></li>
                                                 <li><a href="#" id="modalButtonMenu" value ="<?= Url::to(['recruitment/create']) ?>">Formularz zgłoszenia</a></li>
					</ul>
				</li>
				<li><a href="#">Dla dzieci</a>
                                <ul>
                                   <li><a href="<?= Url::to(['kolorowanka/lista-kolorowanek']) ?>">Kolorowanki</a></li> 
                                </ul></li>
                                <li><a href="<?= Url::to(['gallery/index']) ?>">Galeria</a>
				</li>
				<li><a href="<?= Url::to(['contact/index']) ?>">Kontakt</a></li>
                                <?php if(!Yii::$app->user->isGuest): ?>
                                <li><a href="<?= Url::to(['site/logout']) ?>" data-method="post" >Wyloguj</a></li>
                                 
                                <?php endif; ?>
                                <?php if(Yii::$app->user->isGuest): ?>
                                <li><a href="<?= Url::to(['site/login']) ?>" class="signlog"><span style="color: #FFFFFF">Zaloguj</span></a></li>
                                <li><a href="<?= Url::to(['site/signup']) ?>" class="signlog"><span style="color: #FFFFFF">Zajerestruj</span></a></li>
                                <?php endif; ?>
			</ol>
		</div>
		


    <div class="container">
        
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>
 <?php
yii\bootstrap\Modal::begin([
    'id' => 'modal',
    'header' => '<h1>Karta zgłoszeniowa dziecka</h1>',
    'size' => 'modal-lg',
    'options' => ['placeholder' => 'Wybierz datę urodzenia...'],
    //keeps from closing modal with esc key or by clicking out of the modal.
    // user must click cancel or X to close
    'clientOptions' => ['keyboard' => FALSE]
]);
echo "<div id='modalContent'></div>";
yii\bootstrap\Modal::end();
?>
<div class="footer">najlepsze-przedszkole.com &copy; <?= date("Y"); ?> Dziękujemy za wizytę.</div>
	
      

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<link rel="stylesheet" href="js/Nivo-Slider-master/nivo-slider.css" type="text/css" /> 
<link rel="stylesheet" href="js/Nivo-Slider-master/themes/default/default.css" type="text/css" /> 
<script src="js/Nivo-Slider-master/jquery.nivo.slider.pack.js" type="text/javascript"></script>

<script>

	$(document).ready(function()
	{
	var NavY = $('.nav').offset().top;
	 
	var stickyNav = function()
	{
	var ScrollY = $(window).scrollTop();
		  
	if (ScrollY > NavY) 
	{ 
		$('.nav').addClass('sticky');
	} else {
		$('.nav').removeClass('sticky'); 
	}
	};
	 
	stickyNav();
        
        $(window).load(function() {
           $('#slider').nivoSlider({
        effect: 'slideInRight', // Specify sets like: 'fold,fade,sliceDown'
        
    });
        }); 
	 
	$(window).scroll(function()
	{
		stickyNav();
	});
        
        $('#modalButtonMenu').click(function(){
            $('#modal').modal('show')
                    .find('#modalContent')
                    .load($(this).attr('value'))
                    
        })
        $('#modalButton').click(function () {
        $('#modall').modal('show')
                .find('#modalContentt')
                .load($(this).attr('value'))

    })
    
     $('.photo').click(function(){
         $('#article_modal').find('#article_content').empty();
            $('#article_modal').modal('show')
                    .find('#article_content')
                    .load($(this).attr('value'))
       
	});
        
         
	});

               
	
</script>