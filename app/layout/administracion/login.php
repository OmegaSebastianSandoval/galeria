<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?= $this->_titlepage ?></title>

<link rel="stylesheet" href="/components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="/components/Font-Awesome/web-fonts-with-css/css/fontawesome-all.min.css">
<link rel="stylesheet" href="/skins/administracion/css/global.css?v=1.01">
</head>
<body class="login-fondo">
	<div class="login-caja">
        <h1><?= $this->_titlepage ?></h1>
        <div class="login-logo"><img src="/skins/administracion/images/logoOmega.png"></div>
        <div class="login-content"><?= $this->_content ?></div>
    </div>

    <div class="login-derechos">&copy;<?php echo date('Y'); ?> Todos los derechos reservados | Versión 6.00 | Diseñado por <a href="http://www.omegasolucionesweb.com" target="_blank">OMEGA SOLUCIONES WEB</a> <br>
    info@omegawebsystems.com - 318 642 5229 - 350 708 7228
    </div>

    <script src="/components/jquery/dist/jquery.min.js"></script>
    <script src="/components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/components/bootstrap-validator/dist/validator.min.js"></script>
    <script src="/skins/administracion/js/main.js"></script>
</body>
</html>
