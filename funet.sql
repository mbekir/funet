-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 23 Avril 2018 à 14:55
-- Version du serveur :  10.1.19-MariaDB
-- Version de PHP :  5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `funet`
--

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `id_membre` int(11) NOT NULL,
  `id_publication` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `comment_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `contenu`, `id_membre`, `id_publication`, `date_creation`, `comment_status`) VALUES
(13, 'hiiiiiii', 5, 45, '2018-03-05', 0),
(14, 'hello', 5, 45, '2018-03-05', 0),
(15, 'bnjjj', 5, 38, '2018-03-05', 0),
(16, 'kooooora', 5, 19, '2018-03-05', 0),
(18, 'gazon', 5, 57, '2018-03-05', 0),
(19, 'ayih ', 5, 57, '2018-03-05', 0),
(20, 'dgdhgdh', 5, 61, '2018-03-07', 0),
(21, 'jcjcdn', 5, 61, '2018-03-17', 0),
(22, 'je suis', 5, 56, '2018-03-17', 0),
(23, 'salut', 5, 60, '2018-03-17', 0),
(24, 'hhhh', 5, 61, '2018-03-17', 0),
(25, 'video ', 5, 60, '2018-03-17', 0),
(26, 'kakak', 5, 61, '2018-03-17', 0),
(27, 'kakaka', 5, 55, '2018-03-17', 0),
(28, '', 5, 0, '2018-03-18', 0),
(29, '', 5, 0, '2018-03-18', 0),
(30, 'dsjkdfsn', 5, 61, '2018-03-18', 0),
(31, 'hhh', 3, 54, '2018-03-28', 0),
(32, 'bonjour', 5, 61, '2018-03-30', 0),
(33, 'slm', 5, 60, '2018-03-30', 0),
(34, 'slm', 5, 60, '2018-03-30', 0),
(35, 'slm', 5, 60, '2018-03-30', 0),
(36, 'bok', 5, 60, '2018-03-30', 0),
(37, 'kakak', 5, 54, '2018-03-30', 0),
(38, 'play 4', 5, 62, '2018-03-31', 0);

-- --------------------------------------------------------

--
-- Structure de la table `invitation`
--

CREATE TABLE `invitation` (
  `id_invitation` int(11) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `stat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `invitation`
--

INSERT INTO `invitation` (`id_invitation`, `sender`, `receiver`, `stat`) VALUES
(3, 'mbekir900@gmail.com', 'mohamedbekir04@gmail.com', 'friend'),
(4, 'sara@gmail.com', 'mohamedbekir04@gmail.com', 'friend'),
(5, 'sara@gmail.com', 'mbekir900@gmail.com', 'friend'),
(6, 'sara@gmail.com', 'sara@gmail.com', 'friend'),
(7, 'mohamedbekir04@gmail.com', 'sara@gmail.com', 'sent'),
(8, 'mohamedbekir04@gmail.com', 'mbekir900@gmail.com', 'friend');

-- --------------------------------------------------------

--
-- Structure de la table `likedislike`
--

CREATE TABLE `likedislike` (
  `id_likeDislike` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  `id_publication` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `likedislike`
--

INSERT INTO `likedislike` (`id_likeDislike`, `etat`, `id_publication`, `id_membre`) VALUES
(10, 1, 60, 5),
(22, 1, 6, 5),
(47, 1, 61, 5),
(48, 1, 57, 3),
(49, 1, 3, 3),
(50, 1, 4, 3),
(51, 1, 61, 3),
(52, 1, 60, 3),
(53, 1, 62, 5),
(54, 1, 62, 3),
(56, -1, 58, 5),
(57, -1, 58, 3),
(58, 1, 63, 10);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `Sexe` varchar(10) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `url_photo_profil` varchar(255) NOT NULL,
  `url_photo_couverture` varchar(255) NOT NULL,
  `login` int(11) NOT NULL,
  `logout` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `email`, `password`, `nom`, `prenom`, `date_naissance`, `Sexe`, `ville`, `url_photo_profil`, `url_photo_couverture`, `login`, `logout`) VALUES
(1, 'dlkdslksd@sdhsdj.com', 'password', 'jsndjdsn', 'jnsdjn', '2018-02-17', 'Homme', 'tunis', 'user.png', '', 68, 68),
(3, 'mbekir900@gmail.com', 'med', 'haythem', 'med', '2018-01-20', 'Femme', 'ABW', 'user.png', '', 19, 18),
(4, 'mbekir', '123456', 'jsdhjh', 'jsdkj', '2018-01-19', 'Homme', 'ARM', 'user.png', '', 7, 7),
(5, 'mohamedbekir04@gmail.com', 'med123', 'mohamed', 'bekir', '2018-02-21', 'Homme', 'AZE', '22550653_1689700771042004_121556401_o.jpg', 'Breaking Bad - MOhamed BEkir (1).png', 77, 76),
(6, 'haythemrzig@gmail.com', '123456', 'Rzig', 'haythem', '2018-02-17', 'Homme', 'AGO', 'user.png', '', 4, 4),
(7, 'mohamedbekir', '123456', 'hjh', 'ggvhb', '2018-02-17', 'Homme', 'AND', 'user.png', '', 1, 1),
(8, 'haythe', 'admin', 'nswjkdnj', 'sdnjn', '2018-02-03', '', '', 'user.png', '', 0, 0),
(9, 'mehdn@hsh.ci', 'admin', 'nkxwnxk', 'jdsksdfi', '2018-02-18', 'Homme', '', 'user.png', '', 0, 0),
(10, 'sara@gmail.com', 'sara', 'bensilmen', 'sara', '2018-04-11', 'Femme', 'ATA', 'user.png', '', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `id_dest` int(11) NOT NULL,
  `id_exp` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `message`
--

INSERT INTO `message` (`id_message`, `contenu`, `id_dest`, `id_exp`, `date`) VALUES
(1, 'bonjour', 5, 3, '2018-03-29'),
(2, 'salut', 3, 5, '2018-03-29'),
(3, 'bonjour', 5, 3, '2018-03-29'),
(4, 'cv', 3, 5, '2018-03-29'),
(9, 'labes frer', 5, 3, '2018-03-29'),
(10, 'inty jwk bhy', 3, 6, '2018-03-29'),
(11, 'wnk', 5, 3, '2018-03-30'),
(12, 'heniii wnk inty', 3, 5, '2018-03-30'),
(13, 'heni sa7bi tunisiii hh ', 5, 3, '2018-03-30'),
(14, 'sa7a lik wlh', 5, 3, '2018-03-30'),
(15, 'ma3lem', 3, 5, '2018-03-30'),
(16, 'belhi win ma3lem', 5, 3, '2018-03-30'),
(17, 'wn', 3, 5, '2018-03-30'),
(18, 'heni tw f dar', 5, 3, '2018-03-30'),
(19, 'henii  f dar', 3, 5, '2018-03-30'),
(20, 'tw nit3adlik ba3ed', 5, 3, '2018-03-30'),
(21, 'mrigle mchet im3ak', 3, 5, '2018-03-30'),
(22, ';*', 5, 3, '2018-03-30'),
(23, 'wnk', 3, 5, '2018-04-04'),
(24, 'heni f class', 5, 3, '2018-04-04'),
(25, 'ok', 3, 5, '2018-04-04'),
(27, 'hhhhh', 3, 5, '2018-04-04'),
(28, 'ok', 5, 3, '2018-04-04'),
(29, 'bonjour', 3, 10, '2018-04-06');

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

CREATE TABLE `publication` (
  `id_publication` int(11) NOT NULL,
  `date_creation` date NOT NULL,
  `id_membre` int(11) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `titre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `publication`
--

INSERT INTO `publication` (`id_publication`, `date_creation`, `id_membre`, `contenu`, `type`, `titre`) VALUES
(2, '2018-02-13', 5, 'maxresdefault.jpg', 'image', ''),
(3, '2018-02-13', 3, 'fond-decran-batman-192.jpg', 'image', ''),
(4, '2018-02-13', 5, '22550653_1689700771042004_121556401_o.jpg', 'image', ''),
(5, '2018-02-13', 5, 'Breaking Bad - MOhamed BEkir (1).png', 'image', ''),
(6, '2018-02-13', 5, '22550653_1689700771042004_121556401_o.jpg', 'image', 'hello'),
(8, '2018-02-14', 0, 'maxresdefault.jpg', 'image', 'sara'),
(9, '2018-02-14', 0, 'Breaking Bad - MOhamed BEkir (1).png', 'image', 'hhhhhh'),
(10, '2018-02-18', 0, '1.jpg', 'image', ''),
(13, '2018-02-18', 5, 'fond-decran-batman-192.jpg', 'image', ''),
(14, '2018-02-23', 0, 'pp.PNG', 'image', ''),
(15, '2018-02-23', 0, 'maxresdefault.jpg', 'image', ''),
(16, '2018-02-23', 0, 'Breaking Bad - MOhamed BEkir (1).png', 'image', ''),
(19, '2018-02-24', 0, '1 (3).jpg', 'image', 'dfjdn'),
(21, '2018-02-24', 0, 'coca.mp4', 'video', 'je suis '),
(38, '2018-02-24', 2, '1 (1).jpg', 'image', ''),
(44, '2018-02-24', 2, 'nnn.mp4', 'video', 'hsdjsdj sdsdi jsdjhisd isd'),
(45, '2018-02-28', 2, 'batman_arkham_origins_joker_red_cap_warner_bros_interactive_entertainment_devil_gotham_gotemsky_ripper_mr_jay_96368_3840x2400.jpg', 'image', 'mes'),
(46, '2018-02-28', 2, '1.jpg', 'image', 'hhhhh'),
(47, '2018-02-28', 2, 'nnn.mp4', 'video', ''),
(48, '2018-03-02', 0, 'logo_kawarji.png', 'image', ''),
(53, '2018-03-03', 5, '', 'image', 'i am not i dangir'),
(54, '2018-03-03', 5, '', 'image', 'i am not i dangir'),
(55, '2018-03-03', 5, '', 'image', 'i am not i dangir'),
(56, '2018-03-05', 5, '', 'image', 'haythem rzig gi'),
(57, '2018-03-05', 5, 'grass_texture241.jpg', 'image', 'terrain'),
(58, '2018-03-07', 5, '', 'image', 'jejejh'),
(60, '2018-03-07', 5, 'nnn.mp4', 'video', ''),
(61, '2018-03-07', 5, '22550653_1689700771042004_121556401_o.jpg', 'image', ''),
(62, '2018-03-30', 3, '3fd500988391b19a3732abbe35483bdf--games-logo-logo-game.jpg', 'image', 'play'),
(63, '2018-04-04', 10, '', 'image', 'helloooooo \r\n');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `invitation`
--
ALTER TABLE `invitation`
  ADD PRIMARY KEY (`id_invitation`);

--
-- Index pour la table `likedislike`
--
ALTER TABLE `likedislike`
  ADD PRIMARY KEY (`id_likeDislike`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id_publication`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT pour la table `invitation`
--
ALTER TABLE `invitation`
  MODIFY `id_invitation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `likedislike`
--
ALTER TABLE `likedislike`
  MODIFY `id_likeDislike` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `publication`
--
ALTER TABLE `publication`
  MODIFY `id_publication` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
