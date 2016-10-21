<!-- Wrapper -->
<div id="wrapper">
  <?
  if(!empty($resume->basics)){
  ?>
  <!-- Header -->
  <header id="header" class="alt">
    <span class="logo"><img src="<? echo $resume->basics['picture'];?>" alt="<? echo $resume->basics['name'];?>" /></span>
    <h1><? echo $resume->basics['name'];?></h1>
    <p><? echo $resume->basics['label'];?></p>
  </header>
  <?}?>


  <div id="main">
    <section class="main special">
      <header class="major">
        <h2>Login</h2>
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
      				<li><input type="submit" value="Login" class="special"></li>
      			</ul>
      		</div>
      	</div>
      </form>
    </section>
  </div>
</div>
