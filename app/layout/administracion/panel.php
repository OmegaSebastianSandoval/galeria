<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>
        <?= $this->_titlepage ?>
    </title>
    <script src="/components/jquery/dist/jquery.min.js"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWYVxdF4VwIPfmB65X2kMt342GbUXApwQ&sensor=true">
    </script>
    <link rel="stylesheet" href="/components/bootstrap/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.standalone.min.css">
    <link rel="stylesheet" href="/components/bootstrap-fileinput/css/fileinput.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="/components/Font-Awesome/css/all.css">


    <link rel="stylesheet" href="/components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="/components/wickedpicker/dist/wickedpicker.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/wickedpicker@0.4.3/dist/wickedpicker.min.css">
    <link rel="stylesheet" href="/skins/administracion/css/global.css?v=1.02">
    <script src="https://cdn.rawgit.com/zenorocha/clipboard.js/v1.5.3/dist/clipboard.min.js"></script>

    <link rel="stylesheet" href="/components/dropzone/dist/dropzone.css">
    <script src="/components/dropzone/dist/dropzone.js"></script>


    <script type="text/javascript">
        var map;
        var longitude = 0;
        var latitude = 0;
        var icon = '/skins/administracion/images/ubicacion.png';
        var point = false;
        var zoom = 10;

        function setValuesMap(longitud, latitud, punto, zoomm, icono) {
            longitude = longitud;
            latitude = latitud;
            if (punto) {
                point = punto;
            }
            if (zoomm) {
                zoom = zoomm;
            }
            if (icono) {
                icon = icono
            }
        }

        function initializeMap() {
            var mapOptions = {
                zoom: parseInt(zoom),
                center: new google.maps.LatLng(longitude, longitude),
            };
            // Place a draggable marker on the map
            map = new google.maps.Map(document.getElementById('map'), mapOptions);
            if (point == true) {
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(longitude, latitude),
                    map: map,
                    icon: icon
                });
            }
            map.setCenter(new google.maps.LatLng(longitude, latitude));
        }
    </script>
    <script src="/scripts/popper.min.js"></script>
    <script src="/components/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="/components/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js"></script>
    <script src="/components/bootstrap-validator/dist/validator.min.js"></script>
    <script src="/components/bootstrap-fileinput/js/fileinput.min.js"></script>
    <script src="/components/bootstrap-fileinput/js/locales/es.js"></script>
    <script src="/components/tinymce/tinymce.min.js"></script>
    <script src="/components/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
    <script src="/components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!--<script type="text/javascript" src="/components/wickedpicker/dist/wickedpicker.min.js"></script>-->
    <!--<script src="https://cdn.jsdelivr.net/npm/wickedpicker@0.4.3/dist/wickedpicker.min.js"></script>-->
    <script src="/skins/administracion/js/main.js?v=1.02"></script>
</head>

<body>
    <header>
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-2">
                    <img src="/skins/administracion/images/logooscuro.png" class="logo-blanco">
                </div>
                <div class="col-10">
                    <?= $this->_data['panel_header']; ?>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <nav id="panel-botones" class="col-2">
                <?= $this->_data['panel_botones']; ?>
            </nav>
            <article id="contenido_panel" class="col-10">
                <section id="contenido_general">
                    <!-- <div class="panel-titulo"><b>Dashboard</b> Versión 6.0</div> -->
                    <?= $this->_content ?>
                </section>
            </article>
        </div>
    </div>
    <footer class="panel-derechos col-md-12">&copy;<?php echo date('Y'); ?> Todos los derechos reservados | info@omegawebsystems.com - 310 6671747 - 310 6686780 | Diseñado por <a style="text-decoration: none;" href="http://www.omegasolucionesweb.com" target="_blank">OMEGA
            SOLUCIONES WEB</a>
    </footer>

    <!-- Charts -->
    <script src="/components/chart/chart.min.js"></script>
    <script src="/components/chart/chartjs-plugin-datalabels@2.js"></script>

</body>

</html>