<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Zao Soula">

    <meta name="description" content="Je m'appelle Zao Soula, j'ai <?echo date("Y")-2002?> ans et je suis passionné d'informatique et d'électronique. Depuis maintenant <?echo date("Y")-2012?> ans je pratique le développement web, et maitrise aujourd'hui l'HTML, le PHP, le CSS et le Javascript.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title><?echo $Page->getTitle();?></title>


    <link rel="apple-touch-icon" sizes="180x180" href="<?echo BaseUrl?>/assets/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="<?echo BaseUrl?>/assets/icons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?echo BaseUrl?>/assets/icons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?echo BaseUrl?>/assets/icons/manifest.json">
    <link rel="mask-icon" href="<?echo BaseUrl?>/assets/icons/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="<?echo BaseUrl?>/assets/icons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Zao Soula">
    <meta name="application-name" content="Zao Soula">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-TileImage" content="<?echo BaseUrl?>/assets/icons/mstile-144x144.png">
    <meta name="msapplication-config" content="<?echo BaseUrl?>/assets/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@zarque7">
    <meta name="twitter:creator" content="@zarque7">
    <meta name="twitter:title" content="Zao Soula - Développeur Web">
    <meta name="twitter:description" content="Je m'appelle Zao Soula, j'ai <?echo date("Y")-2002?> ans et je suis passionné d'informatique et d'électronique. Depuis maintenant <?echo date("Y")-2012?> ans je pratique le développement web, et maitrise aujourd'hui l'HTML, le PHP, le CSS et le Javascript.">
    <meta name="twitter:image" content="https://zaosoula.fr/assets/images/screen.png">

    <meta property="og:type" content="website">
    <meta property="og:title" content="Zao Soula - Développeur Web">
    <meta property="og:url" content="https://zaosoula.fr/">
    <meta property="og:image" content="https://zaosoula.fr/assets/images/screen.png">
    <meta property="og:description" content="Je m'appelle Zao Soula, j'ai <?echo date("Y")-2002?> ans et je suis passionné d'informatique et d'électronique. Depuis maintenant <?echo date("Y")-2012?> ans je pratique le développement web, et maitrise aujourd'hui l'HTML, le PHP, le CSS et le Javascript.">




    		<meta name="viewport" content="width=device-width, initial-scale=1" />
    		<!--[if lte IE 8]><script src="<?echo BaseUrl?>/assets/js/ie/html5shiv.js"></script><![endif]-->
    		<link rel="stylesheet" href="<?echo BaseUrl?>/assets/css/main.css" />
    		<link rel="stylesheet" href="<?echo BaseUrlAdmin?>/assets/css/main.css" />
    		<!--[if lte IE 9]><link rel="stylesheet" href="<?echo BaseUrl?>/assets/css/ie9.css" /><![endif]-->
    		<!--[if lte IE 8]><link rel="stylesheet" href="<?echo BaseUrl?>/assets/css/ie8.css" /><![endif]-->

  </head>
  <body>
<?
    require_once('pages/html/'.$pageName.'.php'); //Load the html file of page
  ?>

  		<!-- Scripts -->
  			<script src="<?echo BaseUrl?>/assets/js/jquery.min.js" ></script>
  			<script src="<?echo BaseUrl?>/assets/js/jquery.scrollex.min.js" ></script>
  			<script src="<?echo BaseUrl?>/assets/js/jquery.scrolly.min.js" ></script>
  			<script src="<?echo BaseUrl?>/assets/js/skel.min.js" ></script>
  			<script src="<?echo BaseUrl?>/assets/js/particles.min.js" ></script>
  			<script src="<?echo BaseUrl?>/assets/js/util.js" ></script>
  			<!--[if lte IE 8]><script src="<?echo BaseUrl?>/assets/js/ie/respond.min.js"></script><![endif]-->
  			<script src="<?echo BaseUrl?>/assets/js/main.js" ></script>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-42595785-8', 'auto');
          ga('send', 'pageview');

        </script>
<?
  $Page->load(); //Load all assets (set in php file of page)
?>
</body>
</html>
