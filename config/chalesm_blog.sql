-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: mysql-chalesm.alwaysdata.net
-- Generation Time: Jan 29, 2020 at 09:17 AM
-- Server version: 10.3.17-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chalesm_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_id` int(11) NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `title` varchar(100) COLLATE utf8_bin NOT NULL,
  `status` tinyint(1) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `email`, `date_add`, `post_id`, `content`, `title`, `status`, `name`) VALUES
(1, 'maxime.chales@yahoo.fr', '2019-10-25 16:33:24', 3, 'Un chef d\'oeuvre, j\'ai hâte de lire la suite !', 'Super !', 0, 'Ricardo'),
(2, 'Ricardo.milos@wanadoo.com', '2019-10-25 16:33:29', 3, 'Excellent !', 'J\'adore !', 0, 'Ricardo'),
(3, 'SidneyLeroux@jourrapide.com\r\n', '2019-10-25 16:33:30', 6, 'J\'aime !', 'Super !', 0, 'Sidney Leroux'),
(4, 'maxime.chales@yahoo.fr', '2019-10-25 16:33:31', 6, 'Extraordinaire contenu !', 'Génialissime !', 0, 'Etoile Simon'),
(5, 'ricardo.milos@yahoo.com', '2019-10-25 16:34:47', 1, 'J\'adore le contenu de cet auteur !', 'Ouais ! Super !', 0, 'Ricardo'),
(6, 'BriceVoisine@dayrep.com\r\n', '2019-10-25 16:34:48', 1, 'J\'apprécie énormément les récits de cet auteur.', 'Une bonne surprise', 0, 'Brice Voisine'),
(7, 'Louis.Blais@yahoo.fr', '2019-10-25 16:34:49', 5, 'Le contenu de cet article est tout bonnement spé-cta-cu-laire !', 'Extraordinaire !', 0, 'Louis'),
(8, 'ricardo.milos@yahoo.fr', '2019-10-25 16:34:51', 5, 'Trop bien ! ', 'génial ', 0, 'Ricardo'),
(10, 'SlainieHétu@yahoo.fr', '2019-10-25 16:38:24', 4, 'Je voyage à chaque nouveau chapitre !', 'Le rêve', 1, 'Slainie Hétu'),
(11, 'Philip Marquis@yahoo.fr', '2019-10-25 16:38:52', 4, 'J\'ai hâte de lire la suite !!', 'Super !', 1, 'Philip Marquis'),
(12, 'Pedro B. Long@wanadoo.com', '2019-10-25 16:39:00', 2, 'Wow, cet auteur à su me transporter de part ces récits !', 'Un voyage à chaque ligne', 1, 'Pedro B. Long'),
(13, 'Kevin S. Myron@yahoo.com', '2019-10-25 16:39:00', 2, 'Un grand auteur ! \r\n', 'Un Auteur en devenir !', 1, 'Kevin S. Myron'),
(14, 'Pedro B. Long@wanadoo.com', '2019-10-25 16:39:00', 7, 'Wow, cet auteur à su me transporter de part ces récits !', 'Un voyage à chaque ligne', 1, 'Pedro B. Long'),
(15, 'v.longchamps@wanadoo.com', '2019-10-25 16:39:00', 7, 'J\'aime pas trop.. désolé.', 'Bof..', 1, 'V.longchamps'),
(16, 'pascally@wanadoo.com', '2019-10-25 16:39:00', 8, 'J\'aurai presque envie d\'y aller !', 'Sympatique !', 1, 'pascally'),
(17, 'SlainieHétu@yahoo.fr', '2019-10-25 16:38:24', 8, 'Je voyage à chaque nouveau chapitre !', 'Le rêve', 1, 'Slainie Hétu'),
(18, 'ricardo.milos@yahoo.com', '2019-10-25 16:34:47', 9, 'Trop hâte !!!', 'vivement la suite !', 0, 'Ricardo');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `date_add` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_upd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `title`, `content`, `date_add`, `date_upd`) VALUES
(1, 1, 'CHAPITRE 1', 'Ode\r\n\r\n Des chants, voilà toute sa vie !\r\n\r\n<br>\r\n\r\n Ainsi qu\'un brouillard vaporeux,\r\n\r\n Le souffle animé de l\'envie\r\n\r\n Glissa sur son coeur généreux\r\n\r\n Toujours sa plus chère espérance\r\n\r\n Rêva le bonheur de la France ;\r\n\r\n<br><br>\r\n\r\n Toujours il respecta les lois...\r\n\r\n Mais les haines sont implacables,\r\n\r\n Et sur le banc des vils coupables\r\n\r\n La vertu s\'assied quelquefois.\r\n<br><br>\r\n\r\n Qu\'a-t-il fait ? pourquoi le proscrire ?\r\n\r\n Ah ! c\'est encor pour des chansons :\r\n\r\n Courage ! étouffez la satire,\r\n\r\n Au lieu d\'écouter ses leçons.\r\n<br><br>\r\n Quand une secte turbulente,\r\n\r\n Levant sa tête menaçante,\r\n\r\n Brave les décrets souverains,\r\n<br><br>\r\n Vous restez muets, sans vengeance,\r\n\r\n Et vous n\'usez de la puissance\r\n\r\n Que pour combattre des refrains…', '2019-10-25 16:18:15', '2020-01-07 09:08:16'),
(2, 1, 'CHAPITRE 2', 'La connais-tu, Daphné, cette vieille romance\r\n\r\n Au pied du sycomore... ou sous les mûriers blancs,\r\n\r\n Sous l\'olivier plaintif, ou les saules tremblants,\r\n\r\n Cette chanson d\'amour, qui toujours recommence ?\r\n<br><br>\r\n Reconnais-tu le Temple au péristyle immense,\r\n\r\n Et les citrons amers où s\'imprimaient tes dents,\r\n\r\n Et la grotte fatale aux hôtes imprudents\r\n\r\n Où du serpent vaincu dort la vieille semence ?\r\n<br><br>\r\n Sais-tu pourquoi, là-bas, le volcan s\'est rouvert ?\r\n\r\n C\'est qu\'un jour nous l\'avions touché d\'un pied agile,\r\n\r\n Et de sa poudre au loin l\'horizon s\'est couvert !\r\n<br><br>\r\n Depuis qu\'un Duc Normand brisa vos dieux d\'argile,\r\n\r\n Toujours sous le palmier du tombeau de Virgile\r\n\r\n', '2019-10-25 16:18:15', '2020-01-07 09:06:05'),
(3, 1, 'CHAPITRE 3', 'Le vieux père en tremblant ébranlait l\'univers.\r\n\r\n Isis, la mère enfin se leva sur sa couche,\r\n\r\n Fit un geste de haine à son époux farouche,\r\n\r\n Et l\'ardeur d\'autrefois brilla dans ses yeux verts.\r\n<br><br>\r\n Regardez-le ! dit-elle, il dort, ce vieux pervers,\r\n\r\n Tous les frimas du monde ont passé par sa bouche,\r\n\r\n Prenez garde à son pied, éteignez son oeil louche,\r\n\r\n C\'est le roi des volcans et le Dieu des hivers !\r\n<br><br>\r\n L\'aigle a déjà passé : Napoléon m\'appelle ;\r\n\r\n J\'ai revêtu pour lui la robe de Cybèle,\r\n\r\n C\'est mon époux Hermès et mon frère Osiris...\" ;\r\n<br><br>\r\n La Déesse avait fui sur sa conque dorée ;\r\n\r\n La mer nous renvoyait son image adorée\r\n\r\n Et les cieux rayonnaient sous l\'écharpe d\'Iris !', '2019-10-25 16:20:32', '2020-01-07 09:05:09'),
(4, 1, 'CHAPITRE 4', 'Colonne de saphir, d\'arabesques brodée,\r\n\r\nReparais ! Les ramiers s\'envolent de leur nid ;\r\n<br><br>\r\nDe ton bandeau d\'azur à ton pied de granit\r\n\r\nSe déroule à longs plis la pourpre de Judée.\r\n\r\nSi tu vois Bénarès, sur son fleuve accoudée,\r\n\r\nDétache avec ton arc ton corset d\'or bruni\r\n\r\nCar je suis le vautour volant sur Patani,\r\n\r\nEt de blancs papillons la mer est inondée.\r\n<br><br>\r\nLanassa ! fais flotter ton voile sur les eaux !\r\n\r\nLivre les fleurs de pourpre au courant des ruisseaux.\r\n\r\nLa neige du Cathay tombe sur l\'Atlantique.\r\n<br><br>\r\nCependant la prêtresse au visage vermeil\r\n\r\nEst endormie encor sous l\'arche du soleil,\r\n\r\nEt rien n\'a dérangé le sévère portique.', '2019-10-25 16:21:30', '2020-01-07 09:09:32'),
(5, 1, 'CHAPITRE 5', 'Ce roc voûté par art, chef-d\'oeuvre d\'un autre âge,\r\n\r\nCe roc de Tarascon hébergeait autrefois\r\n\r\nLes géants descendus des montagnes de Foix,\r\n<br><br>\r\nDont tant d\'os excessifs rendent sûr témoignage.\"\r\n\r\nO seigneur Du Bartas ! Je suis de ton lignage,\r\n\r\nMoi qui soude mon vers à ton vers d\'autrefois ;\r\n<br><br>\r\nMais les vrais descendants des vieux Comtes de Foix\r\n\r\nOnt besoin de témoins pour parler dans notre âge.\r\n\r\nJ\'ai passé près Salzbourg sous des rochers tremblant ;\r\n<br><br>\r\nLa Cigogne d\'Autriche y nourrit les Milans,\r\n\r\nBarberousse et Richard ont sacré ce refuge.\r\n\r\nLa neige règne au front de leurs pies infranchis ;\r\n\r\nEt ce sont, m\'a-t-on dit, les ossements blanchis\r\n', '2019-10-25 16:25:24', '2020-01-07 09:10:52'),
(6, 1, 'CHAPITRE 6', 'Tu demandes pourquoi j\'ai tant de rage au coeur\r\n<br>\r\nEt sur un col flexible une tête indomptée ;\r\n<br><br>\r\nC\'est que je suis issu de la race d\'Antée,\r\n\r\nJe retourne les dards contre le dieu vainqueur.\r\n<br><br>\r\nOui, je suis de ceux-là qu\'inspire le Vengeur,\r\n\r\nIl m\'a marqué le front de sa lèvre irritée,\r\n\r\nSous la pâleur d\'Abel, hélas ! ensanglantée,\r\n\r\nJ\'ai parfois de Caïn l\'implacable rougeur !\r\n\r\nJéhovah ! le dernier, vaincu par ton génie,\r\n\r\nQui, du fond des enfers, criait : \" Ô tyrannie ! \"\r\n<br><br>\r\nC\'est mon aïeul Bélus ou mon père Dagon...\r\n\r\nIls m\'ont plongé trois fois dans les eaux du Cocyte,\r\n\r\nEt, protégeant tout seul ma mère Amalécyte,\r\n\r\nJe ressème à ses pieds les dents du vieux dragon.', '2019-10-25 16:38:42', '2020-01-07 09:11:47'),
(7, 1, 'CHAPITRE 7', 'La Treizième revient... C\'est encor la première ;\r\n\r\nEt c\'est toujours la Seule, - ou c\'est le seul moment :\r\n<br><br>\r\nCar es-tu Reine, ô Toi! la première ou dernière ?\r\n\r\nEs-tu Roi, toi le seul ou le dernier amant ? ...\r\n\r\nAimez qui vous aima du berceau dans la bière ;\r\n\r\nCelle que j\'aimai seul m\'aime encor tendrement :\r\n<br><br>\r\nC\'est la Mort - ou la Morte... Ô délice ! ô tourment !\r\n\r\nLa rose qu\'elle tient, c\'est la Rose trémière.\r\n\r\nSainte napolitaine aux mains pleines de feux,\r\n\r\nRose au coeur violet, fleur de sainte Gudule,\r\n<br><br>\r\nAs-tu trouvé ta Croix dans le désert des cieux ?\r\n\r\nRoses blanches, tombez ! vous insultez nos Dieux,\r\n\r\nTombez, fantômes blancs, de votre ciel qui brûle :\r\n\r\n- La sainte de l\'abîme est plus sainte à mes yeux !', '2019-10-25 16:38:44', '2020-01-07 09:14:24'),
(8, 1, 'CHAPITRE 8', 'Toi, qui m\'avait donné son livre du Rhin\r\n\r\nDe votre amitié, maître, emportant cette preuve\r\n<br><br>\r\nJe tiens donc sous mon bras \"le Rhin\". - J\'ai l\'air d\'un fleuve\r\n\r\nEt je me sens grandir par la comparaison.\r\n\r\nMais le Fleuve sait-il lui pauvre Dieu sauvage\r\n<br><br>\r\nCe qui lui donne un nom, une source, un rivage,\r\n\r\nEt s\'il coule pour tous quelle en est la raison.\r\n\r\nAssis au mamelon de l\'immense nature,\r\n\r\nPeut-être ignore-t-il comme la créature\r\n<br><br>\r\nD\'où lui vient ce bienfait qu\'il doit aux Immortels :\r\n\r\nMoi je sais que de vous, douce et sainte habitude,\r\n\r\nMe vient l\'Enthousiasme et l\'Amour et l\'Etude,\r\n\r\nEt que mon peu de feu s\'allume à vos autels.', '2019-10-25 16:38:44', '2020-01-07 09:15:21'),
(9, 1, 'CHAPITRE 9', 'On se retrouve très prochainement pour le chapitre 9, merci pour votre patience et votre fidélité&nbsp;!\r\n<br>\r\n<div class=\"void\"></div>', '2019-10-25 16:38:44', '2020-01-16 10:30:41');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nickname` text COLLATE utf8_bin NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `surname` text COLLATE utf8_bin NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `password` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nickname`, `name`, `surname`, `email`, `password`) VALUES
(1, 'Jean_Forteroche', 'Forteroche', 'Jean', 'Jean_forteroche@wanadoo.com', '--');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_id` (`post_id`),
  ADD KEY `idx_status` (`status`) USING BTREE;

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_post_id` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
