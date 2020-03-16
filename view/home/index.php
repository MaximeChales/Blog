<?php include_once './view/menu.php';?>
<div class="blocaccueil">
<div class="wrap">
    <div class="messageaccueil"><h2>Bonjour et bienvenue sur le blog dédié à l'auteur Jean Forteroche et à son prochain roman
        intitulé "Un billet pour l'Alaska".</h2>
    </div>


    <div class="lastpost">
        <div class="titreposteaccueil">
            <h3><?=$post['title']?></h3>
        </div>
    <br>
         <div id="contentaccueil"><?=$post['content']?></div>
    <a  class="submit" href="<?=APP_DIR?>/post/<?=$post['id']?>" >Lire l'article complet</a>

</div>
</div>
</div>

<div class="wrap">
    <div class="bio">
      <h2>Biographie</h2>
      <img src="./public/img/jean.png" alt="Jean Forteroche">

      <div class="biojean">

      Jean est né le 15 mai 1965 à Maisons Alfort dans le Val-de Marne où il à vécu jusqu'a ses 22 ans.
      Il à suivi des études dans la domotique avant de travailler en temps que tourneur-fraiseur dans une usie d'Issy-les-Moulineaux.
      <br><br>
      Quand sa grand mère est décédée, il  hérite d'une grande fortune qu'il à décidé d'utiliser pour réaliser son plus grand rève,
     faire le tour du monde et ecrire des livres pour faire voyager avec lui ses lecteurs. Son prochain récit est en cours de rédaction et
      se nomme "Un billet pour l'Alaska" que vous pourrez trouver <a href="/Projet_auteur/post/" > sur cette page</a>.

      </div>

    </div>
</div>
<?php include_once './view/footer.php';?>