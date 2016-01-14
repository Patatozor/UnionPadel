<?php
if($access != 'VALID'){
    header('location:../../index.php');
}
include("view/layout/header.php"); ?>
    <!-- SERVICE -->
    <div class="equipements compte">
        <!-- SERVICE_INTRO -->
        <div class="service_intro">
            <div class="service_intro_photo">

            </div>
            <h1><?php if($user['Userstype']==0){echo "M.".$user['Usersnom'];}else{echo "Mme.".$user['Usersnom'];}?></h1>
        </div>
        <!-- // SERVICE_INTRO -->

        <!-- SERVICE_CONTAINER -->
        <div class="container">
            <!-- service_nav -->
            <nav class="service_nav">
                <ul>
                    <li class="service_nav_principal"><a href="#passport" title="">Mes infos personnelles</a></li>
                    <li class="service_nav_principal"><a href="#modif" title="">Modifier mes infos perso</a></li>
                    <li class="service_nav_principal"><a href="#contact" title="">Contact</a></li>
                </ul>
            </nav>
            <!-- // service_nav -->

            <!-- service_contenu -->
            <section class="service_contenu">
                <article id="passport">
                    <h2>Passeport</h2>
                    <ul>
                        <li>Pseudo: <?php echo $user['Usersnom_affichage'];?></li>
                        <li>sexe: <?php if($user['Userstype']==0){echo "Homme";}else{echo "Femme";}?></li>
                        <li>date d'inscription: <?php echo $user['Usersdate'];?></li>
                        <li>adresse mail: <?php echo $user['Usersmail'];?></li>
                    </ul>
                </article>
                <article>
                    <h2>Modifier mes informations personnelles</h2>
                    <p><?php echo $retour; ?></p>
                    <form method="post" action="?module=user&amp;action=modif_compte&amp;b=<?php echo $user['idUsers']; ?>">
                        <?php if($user['Userstype']==0){
                            echo '<input class="radio" type="radio" name="sexe" id="monsieur" value="0" checked><label for="monsieur">monsieur</label>
                                    <input class="radio" type="radio" name="sexe" id="madame" value="1" ><label for="madame">madame</label>';
                        }else{
                            echo '<input class="radio" type="radio" name="sexe" id="monsieur" value="0" ><label for="monsieur">monsieur</label>
                                    <input class="radio" type="radio" name="sexe" id="madame" value="1" checked><label for="madame">madame</label>';
                        }?>
                        <input type="text" name="nom" placeholder="nom" required="required" value="<?php echo $user['Usersnom'];?>">
                        <input type="text" name="pseudo" placeholder="pseudo" required="required" value="<?php echo $user['Usersnom_affichage'];?>">
                        <input type="email" name="mail" placeholder="email" required="required" value="<?php echo $user['Usersmail'];?>">
                        <input type="password" name="mdp1" placeholder="mot de passe" required="required">
                        <input type="password" name="mdp2" placeholder="confirmer mot de passe" required="required">
                        <input class="radio" type="radio" name="newsletter" id="news" value="1"><label for="news">recevoir la newsletter</label>
                        <input class="radio" type="radio" name="newsletter" id="no_news" value=""  checked><label for="no_news">ne pas recevoir la newsletter</label>
                        <input class="service_form_btn" type="submit" name="" value="Enregistrer">
                    </form>
                </article>
                <article id="contact">
                    <h2>Contactez-nous:</h2>
                    <p>
                        Si vous avez la moindre interrogation, que vous voulez en savoir plus sur Union Padel envoyez-nous un message et nous vous répondrons dans les plus brefs délais.
                    </p>
                    <form method="post" action="?module=contact&amp;action=contact">
                        <?php if(isset($_SESSION['id'])){
                            echo '

                                <input type="text" name="sujet" placeholder="sujet du message" required="required" />
                                <textarea name="content" placeholder="votre message ..." required="required"></textarea>
                            ';
                        }else {
                            echo '
                                <input type="email" name="mail" placeholder="votre adresse mail" required="required" />
                                <input type="text" name="sujet" placeholder="sujet du message" required="required" />
                                <textarea name="content" placeholder="votre message ..." required="required"></textarea>
                        ';
                        }?>
                        <input class="service_form_btn" type="submit" value="Envoyer">
                    </form>
                </article>
            </section>
            <!-- // service_contenu -->
        </div>
        <!-- // SERVICE_CONTAINER -->
    </div>
    <!-- // SERVICE -->
<?php include("view/layout/footer.php"); ?>