
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contacts';
?>
    <h2>Kontakt</h2>
    <div class="contact">
    <div id="form" class="contact-form">
       <?php $form = ActiveForm::begin(); ?>
        <div class="form-group">
          <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Imię i nazwisko'])->label('') ?>
        </div>
        <div class="form-group">
          <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Twój E-mail'])->label('') ?>
        </div>
        <div class="form-group">
          <?= $form->field($model, 'subject')->textInput(['maxlength' => true, 'placeholder' => 'Temat'])->label('') ?>
        </div>
        <div class="form-group-content">
          <?= $form->field($model, 'message')->textArea(['maxlength' => true, 'placeholder' => 'Treść', 'style'=>'height: 150px'])->label('') ?>
        </div>
         <?= Html::submitButton('Wyślij wiadomość',['id' => 'send-email-btn']) ?>
       <?php ActiveForm::end(); ?>
    </div>
 
        <div class="contact-info">
     <div class="contact-data">
          <span>Adres:</span><br/>
        <p>ul. <?= $contact->addres ?>,<br/>
        <?= $contact->city ?></p>
        <span>E-mail:</span><br/>
       <p><?= $contact->email ?></p>
         <span>Numer telefonu:</span><br/>
       <p><?= $contact->phone_number ?></p>
        
          <span>Godziny otwarcia:</span><br/>
          <p>Pn-Pt: <?= $contact->DuringTheWeek ?></p>
          <p>Sob: <?= $contact->ForTheWeekend ?></p>
           
   
    </div>
     <div id="map_canvas"></div>
  </div>
  </div>
    <script>
   var address = "<?php echo $addres; ?>";
   function initialize() {
 
    geocoder = new google.maps.Geocoder();
    var myOptions = {
      zoom: 17,
      disableDefaultUI: true,
      zoomControl: true,
      zoomControlOptions: {
        style: google.maps.ZoomControlStyle.SMALL,
      },
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map_canvas"),
      myOptions);
    geocoder.geocode({'address': address}, function(results, status) {
        
      if (status == google.maps.GeocoderStatus.OK) {
        map.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location
        });
      } else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
    }

initialize();

   
function myFunction() {
  var form = document.getElementById("form")
  var originalContent = form.innerHTML
  form.innerHTML = "<span class='myClass'>Dziękujemy za wysłanie wiadomości.</span>"
  setTimeout(function() {
    form.innerHTML = originalContent
  }, 5000)
}
 </script>


    
   