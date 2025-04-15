<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta property="fb:pages" content="6076369564" />
	<title><?= $this->_titlepage ?></title>
	
	<!-- SEO -->
	<meta name="description" content="<?= $this->_data['meta_description']; ?>" />
	<meta name="keywords" content="<?= $this->_data['meta_keywords']; ?>" />
	<?php echo $this->_data['scripts'];  ?>


	<link rel="stylesheet" type="text/css" href="/scripts/carousel/carousel.css">
	<link rel="stylesheet" href="/components/bootstrap/dist/css/bootstrap.min.css">
  
	<link rel="stylesheet" href="/skins/page/css/global.css?v=1.53">

  <!-- FontAwesome -->
  <link rel="stylesheet" href="/components/Font-Awesome/css/all.css">

	<link rel="shortcut icon" href="/favicon.ico">
	<script type="text/javascript" id="www-widgetapi-script" src="https://s.ytimg.com/yts/jsbin/www-widgetapi-vflS50iB-/www-widgetapi.js" async=""></script>
	<script src="https://www.youtube.com/player_api"></script>
    <script src="/components/jquery/dist/jquery.min.js"></script>
	<script src="/scripts/popper.min.js"></script>
	<script src="/components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/scripts/carousel/carousel.js"></script>
	<script src="/skins/page/js/main.js?v=1.01"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWYVxdF4VwIPfmB65X2kMt342GbUXApwQ&sensor=true"></script>   
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<script src="https://cdn.rawgit.com/zenorocha/clipboard.js/v1.5.3/dist/clipboard.min.js"></script>
	
	
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link type="text/css" href="css/bootstrap.min.css" />
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-132776940-1"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-132776940-1');
	</script>

<script type="application/ld+json">
		{
			"@context": "https://schema.org",
			"@type": "Organization",
			"name": "Galería Café Libro",
			"url": "https://www.galeriacafelibro.com.co/",
			"logo": "https://www.galeriacafelibro.com.co/skins/page/images/logogaleria.png",
			"sameAs": [
				"https://www.facebook.com/galeriacafelibro/",
				"https://www.instagram.com/galeriacafelibro"
				"https://www.youtube.com/@galeriacafelibrotv7282"
				"https://x.com/cafelibro?lang=es"
				"https://www.tiktok.com/@galeriacafelibrobog"
			],
			"department": [{
					"@type": "LocalBusiness",
					"name": "Galería Café Libro - Sede Parque de la 93",
					"address": {
						"@type": "PostalAddress",
						"streetAddress": "Carrera 11 # 93-42",
						"addressLocality": "Bogotá",
						"addressCountry": "CO"
					},
					"telephone": "601 2183435",
					"openingHours": "Mo-Sa 18:00-02:00",
					"image": "https://www.galeriacafelibro.com.co/images/whatsapp_image_2023-05-25_at_10949_pm.jpeg"
				},
				{
					"@type": "LocalBusiness",
					"name": "Galería Café Libro - Sede Palermo",
					"address": {
						"@type": "PostalAddress",
						"streetAddress": "Trv. 15b #46-38",
						"addressLocality": "Bogotá",
						"addressCountry": "CO"
					},
					"telephone": "601 2851794",
					"openingHours": "Mo-Sa 18:00-02:00",
					"image": "https://www.galeriacafelibro.com.co/images/5.png"
				},
				{
					"@type": "LocalBusiness",
					"name": "Galería Café Libro - Sede Salón Café Bohemia",
					"address": {
						"@type": "PostalAddress",
						"streetAddress": "Trv 15b #46-38",
						"addressLocality": "Bogotá",
						"addressCountry": "CO"
					},
					"telephone": "601 2874079",
					"openingHours": "Mo-Sa 18:00-02:00",
					"image": "https://www.galeriacafelibro.com.co/images/whatsapp_image_2023-05-09_at_121927_pm.jpeg"
				}
			]
		}
	</script>

</head>
<body> 
	<header>
		<?= $this->_data['header']; ?>
	</header>
	<div class="contenedor-general"><?= $this->_content ?></div>
	 <?= $this->_data['flotantes']; ?>
	<footer>
		<?= $this->_data['footer']; ?>
	</footer>
</body>
</html>