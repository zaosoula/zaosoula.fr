<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="Zao Soula">

    <meta name="description" content="Je m'appelle Zao Soula, j'ai <?echo date(Y)-2002?> ans et je suis passionné d'informatique et d'électronique. Depuis maintenant <?echo date(Y)-2012?> ans je pratique le développement web, et maitrise aujourd'hui l'HTML, le PHP, le CSS et le Javascript.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title><?echo $Page->getTitle();?></title>

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@zarque7">
    <meta name="twitter:creator" content="@zarque7">
    <meta name="twitter:title" content="Zao Soula - Développeur Web">
    <meta name="twitter:description" content="Je m'appelle Zao Soula, j'ai <?echo date(Y)-2002?> ans et je suis passionné d'informatique et d'électronique. Depuis maintenant <?echo date(Y)-2012?> ans je pratique le développement web, et maitrise aujourd'hui l'HTML, le PHP, le CSS et le Javascript.">
    <meta name="twitter:image" content="https://zaosoula.fr/assets/img/screen.png">

    <meta property="og:type" content="website">
    <meta property="og:title" content="Zao Soula - Développeur Web">
    <meta property="og:url" content="https://zaosoula.fr/">
    <meta property="og:image" content="https://zaosoula.fr/assets/img/screen.png">
    <meta property="og:description" content="Je m'appelle Zao Soula, j'ai <?echo date(Y)-2002?> ans et je suis passionné d'informatique et d'électronique. Depuis maintenant <?echo date(Y)-2012?> ans je pratique le développement web, et maitrise aujourd'hui l'HTML, le PHP, le CSS et le Javascript.">


    		<meta name="viewport" content="width=device-width, initial-scale=1" />
    		<!--[if lte IE 8]><script src="<?echo BaseUrl?>/assets/js/ie/html5shiv.js"></script><![endif]-->
    		<link rel="stylesheet" href="<?echo BaseUrl?>/assets/css/main.css" />
    		<!--[if lte IE 9]><link rel="stylesheet" href="<?echo BaseUrl?>/assets/css/ie9.css" /><![endif]-->
    		<!--[if lte IE 8]><link rel="stylesheet" href="<?echo BaseUrl?>/assets/css/ie8.css" /><![endif]-->

  </head>
  <body>
    <?
      if (in_array("header", $Page->getRequire())) //Check if header need to be include (set in php file of page)
        require_once('require/header.php');
  ?>
<?
    require_once('pages/html/'.$pageName.'.php'); //Load the html file of page

    if (in_array("footer", $Page->getRequire())) //Check if foter need to be include (set in php file of page)
      require_once('require/footer.php');
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
