<?php include_once './view/menu.php';?>
<div class="wrap">
<div class="bloclogin">
    <h2>Se connecter</h2>
    <div id="bloformlogin">
    <form action="<?=APP_DIR . '/user/check'?>" method="post">
        <input type="text" placeholder="Votre Identifiant" required name="login" <?=htmlspecialchars("")?> >

        <input type="password" placeholder="Votre Mot de Passe" required name="password" <?=htmlspecialchars("")?>>

        <input type="submit" value="Se connecter" name="connexion">
    </form>
</div>
</div>
</div>
<?php include_once './view/footer.php';?>