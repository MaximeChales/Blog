<footer class="blockfooter">
    <!--footer avec differents liens du site et les résaux sociaux de Jean Forteroche. -->
    <div class="wrap">
        <div class="copyright"> Création du site par <a href="https://mchales.alwaysdata.net/" target="blank">©Maxime CHALES </a> - 2020. Tous droits réservés</div>
        <div class="seclign">
            <div class="plandusite">
                <h2>Plan du site</h2>
                <a href="<?=WWW_DIR?>">Accueil</a>
                <a href="<?=WWW_DIR?>Post">Tout les chapitres</a>
                <a href="<?=WWW_DIR?>Admin">Administration</a>
                <!--le bouton de deconnexion n'apparait que si on est connécté. (le code verifie que is connected existe et si il est vrai.) -->
                <?php if (isset($_SESSION['is_connected']) && $_SESSION['is_connected'] == true): ?>
                    <a href="<?=WWW_DIR?>User/logout">Se deconnecter</a>
                    <?php endif?>
            </div>
            <div class="sn">
                <h2>Réseaux sociaux:</h2>
                <div class='logosrs'>
                    <a href="https://twitter.com/" target="target_blank"><i class="fab fa-twitter fa-2x"></i></a>
                    <a href="https://instagram.com/" target="target_blank"> <i class="fab fa-instagram fa-2x"></i></a>
                    <a href="https://facebook.com/" target="target_blank"> <i class="fab fa-facebook fa-2x"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

</body>

</html>