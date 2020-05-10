<?php

/* @var $this yii\web\View */


$this->title = 'Map';
$this->registerJsFile('http://www.openlayers.org/api/OpenLayers.js', ['position' => \yii\web\View::POS_END]);
$this->registerJsFile('https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.2.1/build/ol.js', ['position' => \yii\web\View::POS_END]);
$js = <<<JS
let country, country_code, region;
let sendRequest = (_this) => {
    country = _this.country;
    country_code = _this.country_code;
    region = _this.state;
    //console.log(country, country_code, region);
    fetch("/site/getlanguages?country="+_this.country+"&country_code="+_this.country_code+"&region="+_this.state)
        .then(function(response) {
            response.text().then(function(text) {
                //console.log(text);
                document.querySelector('#response').innerHTML = text;
            });
        });
};

//отображение карты
let map = new ol.Map({
    target: 'map',
    layers: [
      new ol.layer.Tile({
        source: new ol.source.OSM()
      })
    ],
    view: new ol.View({
      center: ol.proj.fromLonLat([37.61, 55.75]),
      zoom: 4
    })
  });
  
let coord = new Array();

//получение координат по клику
map.on('click', function(e){
    coord = ol.proj.toLonLat(e.coordinate);

    fetch("https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat="+coord[1]+"&lon="+coord[0])
        .then(Response=>Response.text())
        .then((data)=>{
            sendRequest(JSON.parse(data).address);
        })
})
JS;

$this->registerJs($js);

?>

  <head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.2.1/css/ol.css" type="text/css">
	<style>
      .map {
        height: 400px;
        width: 100%;
      }
    </style>
  <script src="https://cdn.jsdelivr.net/gh/openlayers/openlayers.github.io@master/en/v6.2.1/build/ol.js"></script>
  </head>
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div id="map" class="map"></div>
                <div id="response"></div>
			</div>
		</div>
	</div>
</div>