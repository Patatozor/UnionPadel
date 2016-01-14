<?php if($access != 'VALID'){
header('location:../../index.php');
}?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title><?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link rel="stylesheet" href="assets/css/fonts.css" type="text/css">
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="assets/css/design.css" type="text/css">
  <link rel="stylesheet" media="screen and (max-width: 925px)" href="assets/css/responsive-max_925.css" type="text/css">
  <script type="text/javascript" src="assets/js/jquery.js"></script>
 </head>
 <body>

 	<header>
 		<a id="logo" href="index.php" title="accueil"><img src="assets/img/logo.png" alt="Logo Union Padel"></a>
 		<div id="bt_nav_header_responsive"><img src="assets/img/pictos/menu_responsive.png"></div>
 		<nav id="nav_header" class="nav_header_responsive">
 			<ul id="nav_words">
 				<li><a href="?module=home&amp;action=accueil" title="">Accueil</a></li>
 				<li><a href="?module=map&amp;action=map" title="">Où jouer ?</a></li>
 				<li><a href="?module=blog&amp;action=liste" title="">Actualité</a></li>
 				<li><a href="?module=shop&amp;action=liste" title="">Équipements</a></li>
 				<?php if(isset($_SESSION['id'])){
                    echo '<li><a href="index.php?a=dc" title="">Déconnexion</a></li>';
                }else{
                    echo '<li class="bt_connexion"><a href="#" title="">Connexion</a></li>';
                }?>
 			</ul>
 			<ul id="nav_pictos">
			<?php if(isset($_SESSION['id'])){
				echo '<li class="nav_pictos"><a href="?module=user&amp;action=compte" title=""><img src="assets/img/pictos/compte.png" alt="Picto compte"></a></li>';
			}else{
				echo '<li class="nav_pictos bt_connexion"><a href="?module=user&amp;action=compte" title=""><img src="assets/img/pictos/compte.png" alt="Picto compte"></a></li>';
			}?>
 				<li class="nav_pictos"><a href="?module=shop&amp;action=panier" title=""><img src="assets/img/pictos/panier.jpg" alt="Picto panier"></a></li>
 			</ul>
 		</nav>
 	</header>

 	<div id="light_b_connexion">
 			
 			<div id="connexion">
 				<h2>Connexion</h2>
				<form class="demi" method="post" action="?module=login&amp;action=login">
					<input class="form_champ" type="email" name="login" id="pseudo_connexion" placeholder="email" required="required">
					<input class="form_champ" type="password" name="mdp" id="pass_connexion" placeholder="mot de passe" required="required">
					<input class="form_bt" type="submit" id="submit_connexion" value="se connecter">
				</form>
 			</div>

 			<div id="passe_perdu">
 				<form class="demi" method="post" action="?module=login&amp;action=mdp">
					<input class="form_champ" type="email" name="mail" id="pseudo_connexion" required="required" placeholder="email">
					<input class="form_bt" type="submit" name="" id="submit_connexion" value="Envoyer">
				</form>
 			</div>
 			
 			<div id="inscription">
 				<h2>Inscription</h2>
				<form class="demi" method="post" action="?module=login&amp;action=inscription">
					<input class="form_radio" type="radio" name="type" id="monsieur_inscription" value="0" required="required" checked><label for="monsieur_inscription">monsieur</label>
					<input class="form_radio" type="radio" name="type" id="madame_inscription" value="1" required="required"><label for="madame_inscription">madame</label>
					<input class="form_champ" type="text" name="nom" id="nom_inscription" placeholder="nom" required="required">
					<input class="form_champ" type="text" name="pseudo" id="pseudo_inscription" placeholder="pseudo" required="required">
					<input class="form_champ" type="email" name="login" id="mail_inscription" placeholder="email" required="required">
					<input class="form_champ" type="password" name="mdp" id="pass_inscription" placeholder="mot de passe" required="required">
	                <input class="form_champ" type="password" name="mdp2" id="pass_inscription2" placeholder="confirmez le mot de passe" required="required">
					<input class="form_radio" type="radio" name="newsletter" id="newsletter_oui_inscription" value="1" checked><label for="newsletter_oui_inscription">recevoir la newsletter</label>
					<input class="form_radio" type="radio" name="newsletter" id="newsletter_non_inscription" value="0"><label for="newsletter_non_inscription">ne pas recevoir la newsletter</label>
					<input class="form_bt" type="submit"  id="submit_inscription" value="s'inscrire">
				</form>
 			</div>
 		<a href="#" id="bt_01">connexion</a>
 		<a href="#" id="bt_02">inscription</a>
 		<a href="#" id="bt_03">(mot de passe oublié)</a>
 	</div>