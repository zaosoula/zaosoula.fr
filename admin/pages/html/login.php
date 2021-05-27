<!-- Wrapper -->
<div id="wrapper">
  <?php  
  if(!empty($resume->basics)){
  ?>
  <!-- Header -->
  <header id="header" class="alt">
    <span class="logo"><img src="<?php   echo $resume->basics['picture'];?>" alt="<?php   echo $resume->basics['name'];?>" /></span>
    <h1><?php   echo $resume->basics['name'];?></h1>
    <p><?php   echo $resume->basics['label'];?></p>
  </header>
  <?php   } ?>


  <div id="main">
    <section class="main special">
      <header class="major">
        <h2>Connexion</h2>
      </header>
      <form id="loginform" method="post" action="#">
      	<div class="row uniform">
      		<div class="12u$">
      			<input type="text" name="username" placeholder="Nom d'utilisateur">
      		</div>
      		<div class="12u$">
      			<input type="password" name="password" placeholder="Mot de passe">
      		</div>
      		<div class="12u$">
      			<ul class="actions">
      				<li><input type="submit" value="Connexion" class="special"></li>
      			</ul>
      		</div>
      	</div>
      </form>
    </section>
  </div>
</div>
