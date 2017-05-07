<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
?>

<style>
    div#myDIV {
        position: relative;
        width: <?php echo $draw->width.'px'; ?>;
        height:<?php echo $draw->height.'px'; ?>;
    }
    
</style>
<br>
<div id="colors">
     <?php foreach($colors as $color): ?>
    <div id="blue" class="color" style="background-color: <?= $color ?>"></div>
    
    <?php endforeach; ?>
</div>
<div id="myDIV">
    <?= $svg ?>
    <canvas style="left: 0px; top: 0px; position: absolute; width: 100%; height: 100%; z-index: 99" width= "<?php echo $draw->width.'px'; ?>;" height= "<?php echo $draw->height.'px'; ?>;" id="c"></canvas>
</div>
<div id="brushes">
    <div id="drawing-mode-options">
    <label class="white" for="drawing-line-width">Grubość:</label>
    <div style="width:150px;"> <input type="range" value="15" min="0" max="150" id="drawing-line-width"></div><br>
    </div>
    <label class="white" for="drawing-color">Wypełnienie:</label>
    <button id="extender" value='n' class="btn btn-info">Wypełniacz</button>
    <label class="white" for="drawing-color">Malowanie:</label>
    <button id="pedzel" data-type="pedzel" class="btn btn-info">Pędzel</button>
    <button data-type="spray" class="btn btn-info">Spray</button>
    <label class="white" for="drawing-color">Wzory:</label>
    <button data-type="kola" class="btn btn-info">Kółka</button>
    <button data-type="paski" class="btn btn-info">Paski</button>
    <button data-type="kwadraty" class="btn btn-info">Kwadraty</button>
    <button data-type="diamenty" class="btn btn-info">Diamenty</button>
    <label class="white" for="drawing-color">Opcje:</label>
    <button id="print" class="btn btn-info">Drukuj</button>
    <button id="clear" class="btn btn-info">Wyczyść</button>
    <button id="redo" class="btn btn-info">Cofnij</button>
    <div class="infoq" id="infoq">Informacja: działa tylko dla narzędzi malowania i wzorów</div>
    <button id="random" value='n' class="btn btn-info">Wypełnienie losowymi kolorami</button>
    
    
</div>

<script src="http://localhost/projekt/vendor/bower/jquery/dist/jquery.js">
</script>
<script src="http://localhost/projekt/vendor/bower/jquery/dist/jquery.min.js">
</script>
<script src="http://localhost/projekt/vendor/bower/fabric/dist/fabric.js">
</script>
<script>
    var image = <?php echo json_encode($draw->image); ?>;
    var path = 'http://localhost/projekt/backend/web/' + image;
    var canvas = new fabric.Canvas('c', {
    isDrawingMode: true,
    });
    var drawingModeEl = document.getElementById('drawing-mode'),
            drawingOptionsEl = document.getElementById('drawing-mode-options'),
            drawingLineWidthEl = document.getElementById('drawing-line-width'),
            clearEl = document.getElementById('clear'),
            extender = document.getElementById('extender'),
            svg = document.getElementById("svg");
    redo = document.getElementById("redo");
    
    document.getElementById('blue').style.border = 'solid';
    choosenColor = 'blue';
    this.$colors = document.querySelector("#colors");
    this.$colors.addEventListener("click", function(e){
    choosenColor = e.target.style.backgroundColor;
    for (var i = 0; i < $colors.children.length; i++){
    $colors.children[i].style.border = '';
    }
    e.target.style.border = 'solid';
    if(choosenColor === 'white' || choosenColor === 'navajowhite'){
        e.target.style.borderColor = 'black';
    }
    canvas.freeDrawingBrush.color = choosenColor;
    });
    
    
    if (fabric.PatternBrush) {
    var penPatternBrush = new fabric.PatternBrush(canvas);
    penPatternBrush.getPatternSrc = function(){
    var patternCanvas = fabric.document.createElement('canvas');
    patternCanvas.width = patternCanvas.height = 10;
    var ctx = patternCanvas.getContext('2d');
    ctx.strokeStyle = this.color;
    ctx.lineWidth = 10;
    ctx.beginPath();
    ctx.moveTo(0, 5);
    ctx.lineTo(10, 5);
    ctx.lineJoin = ctx.lineCap = 'round';
    ctx.closePath();
    ctx.stroke();
    return patternCanvas;
    }


    var vLinePatternBrush = new fabric.PatternBrush(canvas);
    vLinePatternBrush.getPatternSrc = function() {
    var patternCanvas = fabric.document.createElement('canvas');
    patternCanvas.width = patternCanvas.height = 10;
    var ctx = patternCanvas.getContext('2d');
    ctx.strokeStyle = this.color;
    ctx.lineWidth = 5;
    ctx.beginPath();
    ctx.moveTo(0, 5);
    ctx.lineTo(10, 5);
    ctx.closePath();
    ctx.stroke();
    return patternCanvas;
    };
    var hLinePatternBrush = new fabric.PatternBrush(canvas);
    hLinePatternBrush.getPatternSrc = function() {
    var patternCanvas = fabric.document.createElement('canvas');
    patternCanvas.width = patternCanvas.height = 10;
    var ctx = patternCanvas.getContext('2d');
    ctx.strokeStyle = this.color;
    ctx.lineWidth = 5;
    ctx.beginPath();
    ctx.moveTo(5, 0);
    ctx.lineTo(5, 10);
    ctx.closePath();
    ctx.stroke();
    return patternCanvas;
    };
    var squarePatternBrush = new fabric.PatternBrush(canvas);
    squarePatternBrush.getPatternSrc = function() {
    var squareWidth = 10, squareDistance = 2;
    var patternCanvas = fabric.document.createElement('canvas');
    patternCanvas.width = patternCanvas.height = squareWidth + squareDistance;
    var ctx = patternCanvas.getContext('2d');
    ctx.fillStyle = this.color;
    ctx.fillRect(0, 0, squareWidth, squareWidth);
    return patternCanvas;
    };
    
    var sprayPatternBrush= new fabric.SprayBrush(canvas);
    var kola= new fabric.PatternBrush(canvas);
    
    var diamondPatternBrush = new fabric.PatternBrush(canvas);
    diamondPatternBrush.getPatternSrc = function() {
    var squareWidth = 10, squareDistance = 5;
    var patternCanvas = fabric.document.createElement('canvas');
    var rect = new fabric.Rect({
    width: squareWidth,
            height: squareWidth,
            angle: 45,
            fill: this.color
    });
    var canvasWidth = rect.getBoundingRectWidth();
    patternCanvas.width = patternCanvas.height = canvasWidth + squareDistance;
    rect.set({left: canvasWidth / 2, top: canvasWidth / 2});
    var ctx = patternCanvas.getContext('2d');
    rect.render(ctx);
    return patternCanvas;
    };
    }

    canvas.freeDrawingBrush = penPatternBrush;
    drawingLineWidthEl.onchange = function() {
    canvas.freeDrawingBrush.width = parseInt(drawingLineWidthEl.value, 10) || 1;
    };
    if (canvas.freeDrawingBrush) {
    canvas.freeDrawingBrush.color = choosenColor;
    canvas.freeDrawingBrush.width = parseInt(drawingLineWidthEl.value, 10) || 1;
    canvas.freeDrawingBrush.shadowBlur = 0;
    }

   
    extender.onclick = function(){
    for (var i = 0; i < $container.children.length; i++){
    $container.children[i].style.color = 'black';
    }
    
    extender.style.color = 'green';
   
   extender.value = 'clicked';
    
    svg.style.zIndex = "100";
    };
    
    redo.onclick = function(){
        var lastItemIndex = (canvas.getObjects().length - 1);
var item = canvas.item(lastItemIndex);
if(item.get('type') === 'path' || item.get('type') === 'group') {
  canvas.remove(item);
  canvas.renderAll();
}
    }
    

    function loadImage(){
    fabric.loadSVGFromURL(path, function(objects, options) {
        for (var i = 0; i < $container.children.length; i++){
    $container.children[i].style.color = 'black';
    }
    console.log(extender.style.color);
    extender.style.color = 'green';
    extender.value = 'clicked';
    svg.style.zIndex = "100";
    
    var color = choosenColor;
    
             shape = fabric.util.groupSVGElements(objects, options); // czy var?
    shape.set({
    left: 0,
    top: 0,
    });
       
           
    var target = '';
    svg.addEventListener("click", function(event){
    target = event.target;
    target = target.getAttribute("d").toString();
    target = target.replace(/ /g, "");
    target = target.substring(0, 20);
    shape.getObjects().forEach(o => {
    if (o.d){
    var object = o.d.toString().replace(/ /g, "");
    object = object.substring(0, 20);
    }
    if (object === target) {
    o.fill = choosenColor;
    canvas.renderAll();
    }
    else{
    canvas.freeDrawingBrush.color = choosenColor;
    }});
    })
            canvas.add(shape);
    });
    }


     document.getElementById("random").addEventListener("click", function(event){
    shape.getObjects().forEach(o => {
    var randomColor = "#" + ((1 << 24) * Math.random() | 0).toString(16);
    o.fill = randomColor;
    })
            canvas.renderAll();
    });

    clearEl.onclick = function() {
    canvas.clear();
    loadImage();
    };
    
    
    this.brush = "";
    this.init = function(){
    this.$container = document.querySelector("#brushes");
    };
    
    this.bind = function(){
    this.$container.addEventListener("click", function(e){
    if (typeof e.target.dataset.type != 'undefined'){
    var button = e.target.dataset.type;
    for (var i = 0; i < $container.children.length; i++){
    $container.children[i].style.color = 'black';
    }
    extender.style.color = 'black';
    extender.value = 'unclicked';
    svg.style.zIndex = "1";
    if (button === 'pedzel') {
        console.log(canvas);
        console.log(canvas.freeDrawingBrush);
    canvas.freeDrawingBrush = penPatternBrush;
    e.target.style.color = 'green';
    } else if (button === 'paski'){
    canvas.freeDrawingBrush = hLinePatternBrush;
    e.target.style.color = 'green';
    } else if (button === 'kwadraty'){
    canvas.freeDrawingBrush = squarePatternBrush;
    e.target.style.color = 'green';
    } else if (button === 'diamenty'){
    canvas.freeDrawingBrush = diamondPatternBrush;
    e.target.style.color = 'green';
    }
    else if (button === 'spray'){
    canvas.freeDrawingBrush = sprayPatternBrush;
    e.target.style.color = 'green';
    }
    else if (button === 'kola'){
    canvas.freeDrawingBrush = kola;
    e.target.style.color = 'green';
    }else {
    canvas.freeDrawingBrush = new fabric[button + 'Brush'](canvas);
    }}

    if (canvas.freeDrawingBrush) {
    canvas.freeDrawingBrush.color = choosenColor;
    canvas.freeDrawingBrush.width = parseInt(drawingLineWidthEl.value, 10) || 1;
    }
    }.bind(this));
    };
    
    this.getBrush = function(){
    return this.brush;
    };
    
    redo.onmouseover = function(){
       document.getElementById("infoq").style.position = "relative";
   document.getElementById("infoq").style.display = "block";
}
 redo.onmouseleave = function(){
       document.getElementById("infoq").style.position = "fixed";
   document.getElementById("infoq").style.display = "none";
}   
    
   redo.addEventListener("onmouseout", function(event){
   document.getElementById("infoq").style.position = "fixed";
   document.getElementById("infoq").style.display = "none";
}) 
    
    document.getElementById('print').onclick = function() {
        var dataUrl = canvas.toDataURL();
        var windowContent = '<!DOCTYPE html>';
        windowContent += '<html>'
                windowContent += '<head><title>Drukuj obrazek</title></head>';
        windowContent += '<body>'
                windowContent += '<img src="' + dataUrl + '">';
        windowContent += '</body>';
        windowContent += '</html>';
        var printWin = window.open('', '', 'width=612,height=792');
        printWin.document.open();
        printWin.document.write(windowContent);
        printWin.document.close();
        printWin.focus();
        printWin.print();
        printWin.close();
        };
    
   
    this.init();
    this.bind();
     loadImage();
     
    


</script>
</div>
