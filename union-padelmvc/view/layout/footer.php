<?php if($access != 'VALID'){
    header('location:../../index.php');
}?>
<footer>
 		<nav id="nav_footer_g">
 			<h4>Plan du site:</h4>
 			<ul>
 				<li><a href="?module=home&amp;action=accueil" title="Accueil">Accueil</a></li>
 				<li><a href="?module=map&amp;action=map" title="Voir la map">Où jouer ?</a></li>
 				<li><a href="?module=blog&amp;action=liste" title="Voir l'actualité">Actualité</a></li>
 				<li><a href="?module=shop&amp;action=liste" title="Voir les équipements">Équipements</a></li>
 				<li><a href="?module=shop&amp;action=panier" title="Panier">Panier</a></li>
 			</ul>
 			<ul>
 				<li><a href="?module=user&amp;action=compte" title="compte">Compte</a></li>
 				<li><a href="?module=contact&amp;action=contact#contact" title="contact">Contact</a></li>
 				<li><a href="?module=mentions&amp;action=mentions" title="Mentions légales">Mentions légales</a></li>
 				<li><a href="?module=mentions&amp;action=conditions_utilisation" title="Conditions d'utilisation'">Conditions d'utilisation</a></li>
 				<li><a href="?module=mentions&amp;action=conditions_vente" title="Conditions de vente">Conditions de vente</a></li>
 			</ul>
 		</nav>
 		<nav id="nav_footer_c">
 			<h4>Suivez-nous sur les réseaux sociaux:</h4>
 			<ul>
 				<li><a href="#" title="Twitter"><img src="assets/img/reseaux/twitter.png" alt="Picto Twitter - ©Union Padel"></a></li>
 				<li><a href="#" title="Facebook"><img src="assets/img/reseaux/facebook.png" alt="Picto Facebook - ©Union Padel"></a></li>
 				<li><a href="#" title="Google +"><img src="assets/img/reseaux/google.png" alt="Picto Google+ - ©Union Padel"></a></li>
 			</ul>
 		</nav>
 		<nav id="nav_footer_d">
 			<h4>Plus d'informations:</h4>
 			<ul>
 				<li><a href="?module=contact&amp;action=contact" title="Union Padel">L'entreprise Union Padel</a></li>
 				<li><a href="?module=contact&amp;action=contact#equipe" title="L'équipe d'Union Padel">L'équipe</a></li>
 				<li><a href="?module=contact&amp;action=contact#contact" title="Contact">Contact</a></li>
 			</ul>
 		</nav>
 		<p>©2015 - union-padel.fr</p>
 	</footer>

  <script type="text/javascript" src="assets/js/script.js"></script>
 </body>
</html>
