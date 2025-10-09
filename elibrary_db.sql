-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 27 mars 2024 à 08:48
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `elibrary_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `ID_LIVRE` int(15) NOT NULL,
  `TITRE` varchar(255) NOT NULL,
  `AUTEUR` varchar(3255) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `QUANTITE` int(11) NOT NULL,
  `PRIX` int(11) NOT NULL,
  `IMAGE` varchar(2048) NOT NULL,
  `DATE_ENREGISTREMENT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`ID_LIVRE`, `TITRE`, `AUTEUR`, `DESCRIPTION`, `QUANTITE`, `PRIX`, `IMAGE`, `DATE_ENREGISTREMENT`) VALUES
(8, 'Les Horloges du Temps', 'Camille Durand', 'Dans un monde où le temps est une ressource précieuse, un groupe de révolutionnaires tente de libérer la société de l\'emprise des horlogers tyranniques. Une quête haletante où chaque seconde compte.', 10, 5, 'image1.png', '2024-03-27 03:34:02'),
(9, 'L\'Écho du Silence', 'Pierre Lambert', 'Description : Après avoir perdu sa voix dans un accident tragique, Emma découvre un monde de communication inattendu à travers la langue des signes. Une histoire émouvante sur la force du silence.', 3, 8, 'image2.png', '2024-03-27 03:34:02'),
(10, 'Le Jardin des Souvenirs', 'Marie Dupont', 'Sophie hérite d\'un jardin mystérieux où chaque fleur renferme un souvenir. Au fil de sa quête pour comprendre l\'origine de cet héritage, elle découvre les secrets enfouis de sa famille.', 12, 10, 'image3.png', '2024-03-27 03:34:02'),
(11, 'Les Ailes du Destin', 'Lucas Martin', 'Dans un univers fantastique où les humains coexistent avec des créatures ailées, une jeune orpheline découvre qu\'elle est liée à une prophétie ancienne qui pourrait changer le cours de l\'histoire.', 3, 15, 'image4.png', '2024-03-27 03:34:02'),
(12, 'La Clé des Mondes', ' Elise Berger', 'Lorsque Léo trouve une clé mystérieuse dans le grenier de sa grand-mère, il se lance dans un voyage à travers les mondes parallèles où il découvre des versions alternatives de lui-même et des choix qui pourraient changer sa vie à jamais.', 6, 27, 'image5.png', '2024-03-27 03:34:02'),
(13, 'L\'Ombre du Phénix', 'Antoine Leclerc', 'Dans un royaume ravagé par la guerre, une prophétie annonce le retour du Phénix, une créature légendaire capable de ramener la paix. Mais la véritable menace pourrait provenir de ceux qui cherchent à l\'empêcher de renaître.', 4, 8, 'image6.png', '2024-03-27 03:34:02'),
(14, 'Les Yeux de l\'Infini', 'Chloé Renaud', 'Un jeune archéologue découvre un artefact énigmatique qui lui confère le pouvoir de voir à travers le temps. Mais avec ce don vient une responsabilité immense et des forces obscures sont prêtes à tout pour s\'en emparer.', 4, 7, 'image7.png', '2024-03-27 03:34:02'),
(15, 'Les Saisons du Cœur', 'David Laurent', 'Dans un petit village au cœur des montagnes, les habitants sont liés par les cycles de la nature et les saisons de l\'amour. Mais quand un étranger arrive avec des secrets du passé, l\'équilibre fragile de leur communauté est menacé.', 2, 10, 'image8.png', '2024-03-27 03:34:02'),
(16, 'La Voix des Arbres', 'Juliette Marchand', 'À travers les yeux de trois générations de femmes, ce roman explore les liens intimes entre la nature et l\'âme humaine. Un récit poétique qui célèbre la magie des forêts et la sagesse des anciens.', 14, 8, 'image9.png', '2024-03-27 03:34:02'),
(17, 'Les Chemins de la Lune', 'Thomas Gauthier', 'Dans un futur dystopique où la Terre est devenue inhospitalière, une équipe d\'explorateurs se lance dans un voyage périlleux vers une colonie sur la lune. Mais ce qu\'ils découvrent sur la face cachée de notre satellite pourrait changer le destin de l\'humanité pour toujours.', 4, 4, 'image10.png', '2024-03-27 03:34:02');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `ID_USER` int(15) NOT NULL,
  `NOM` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `MOT_DE_PASSE` varchar(255) NOT NULL,
  `IMAGE` varchar(255) NOT NULL,
  `DATE_ENREGISTREMENT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`ID_USER`, `NOM`, `EMAIL`, `MOT_DE_PASSE`, `IMAGE`, `DATE_ENREGISTREMENT`) VALUES
(1, 'GUY', 'guy@gmail.com', '391efcabbca4a465c199383e151c4eef23ebb242', 'default.png', '2024-03-26 23:28:45'),
(2, 'JUN', 'jun@gmail.com', '20af88abb1b5bb5f5117832e9241b684bd273bb7', 'default.png', '2024-03-27 08:46:59');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`ID_LIVRE`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `livre`
--
ALTER TABLE `livre`
  MODIFY `ID_LIVRE` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
