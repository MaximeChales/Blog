<?php include_once APP_DIR.'/view/menu.php';?>
<div class="wrap">
<div class="bloclogin">
    <h2>Se connecter</h2>
    <div id="bloformlogin">
    <form action="<?=WWW_DIR . 'User/check'?>" method="post">
        <input type="text" placeholder="Votre Identifiant" required name="login" <?=htmlspecialchars("")?> >

        <input type="password" placeholder="Votre Mot de Passe" required name="password" <?=htmlspecialchars("")?>>

        <input type="submit" value="Se connecter" name="connexion">
    </form>
</div>
</div>
</div>
<?php include_once APP_DIR.'/view/footer.php';?>