-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 31 Janvier 2016 à 21:54
-- Version du serveur :  10.0.17-MariaDB
-- Version de PHP :  5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mudeo`
--

-- --------------------------------------------------------

--
-- Structure de la table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `file_type` varchar(63) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` float NOT NULL,
  `url_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_like` int(11) NOT NULL,
  `category` varchar(63) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(127) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `licence` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `licence_filter` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `content_type` varchar(63) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `files`
--

INSERT INTO `files` (`id`, `title`, `user_id`, `file_type`, `file_size`, `url_file`, `nb_like`, `category`, `keywords`, `description`, `licence`, `licence_filter`, `content_type`, `created`) VALUES
(1, 'Titre Timekeep', 4, 'mp3', 3.5, 'C:\\wamp\\www\\mudeo\\app\\medias\\files\\musics\\asap.mp3', 0, 'pop', 'clé3', 'Et interdum acciderat, ut siquid in penetrali secreto nullo citerioris vitae ministro praesente paterfamilias uxori susurrasset in aurem, velut \n\nAmphiarao referente aut Marcio, quondam vatibus inclitis, postridie disceret imperator. ideoque etiam parietes arcanorum soli conscii timebantur.', '', 'tous publics', 'musique', '2016-01-22 00:00:00'),
(2, 'Titre 2', 4, 'mp3', 3.2, '', 2, 'electro', 'clé1', 'Et interdum acciderat, ut siquid in penetrali secreto nullo citerioris vitae ministro praesente paterfamilias uxori susurrasset in aurem, velut \r\n\r\nAmphiarao referente aut Marcio, quondam vatibus inclitis, postridie disceret imperator. ideoque etiam parietes arcanorum soli conscii timebantur.', '', 'tous publics', 'musique', '2016-01-21 00:00:00'),
(3, 'Titre 3', 2, 'mp3', 3.2, '', 1, 'electro pop', 'clé1', 'Et interdum acciderat, ut siquid in penetrali secreto nullo citerioris vitae ministro praesente paterfamilias uxori susurrasset in aurem, velut \r\n\r\nAmphiarao referente aut Marcio, quondam vatibus inclitis, postridie disceret imperator. ideoque etiam parietes arcanorum soli conscii timebantur.', '', 'tous publics', 'musique', '2016-01-20 00:00:00'),
(4, 'Titre 4', 2, 'mp3', 3.2, '', 0, 'jazzy', 'clé2', 'Pas pour tous publics Et interdum acciderat, ut siquid in penetrali secreto nullo citerioris vitae ministro praesente paterfamilias uxori susurrasset in aurem, velut \n\nAmphiarao referente aut Marcio, quondam vatibus inclitis, postridie disceret imperator. ideoque etiam parietes arcanorum soli conscii timebantur.', '', 'sensible', 'musique', '2016-01-17 00:00:00'),
(5, 'Titre 5', 3, 'mp3', 3, '', 0, 'country', 'clé2', 'country moderne.', '', 'tous publics', 'musique', '2016-01-19 00:00:00'),
(6, 'Titre 6', 3, 'mp3', 3.1, '', 0, 'rock', 'clé2', 'Et interdum acciderat, ut siquid in penetrali secreto nullo citerioris vitae ministro praesente paterfamilias uxori susurrasset in aurem, velut \r\n\r\nAmphiarao referente aut Marcio, quondam vatibus inclitis, postridie disceret imperator. ideoque etiam parietes arcanorum soli conscii timebantur.', '', 'sensible', 'musique', '2016-01-20 00:00:00'),
(7, 'Titre video 1', 4, 'mp4', 10.3, '', 1, 'doc', 'clé3', 'Documentaire court-métrage\r\n', '', 'tous publics', 'vidéo', '2016-01-22 00:00:00'),
(8, 'Titre video 2', 4, 'mp4', 10, '', 1, 'fantastique', 'clé3', 'Documentaire court-métrage', '', 'tous publics', 'vidéo', '2016-01-22 00:00:00'),
(9, 'Titre video 3', 2, 'mp4', 8.3, '', 2, 'aniamtion (pas pour tous publics)', 'clé4', 'Film d''animation', '', 'sensible', 'vidéo', '2016-01-12 00:00:00'),
(10, 'Titre video 4', 2, 'mp4', 4.1, '', 4, 'doc animation', 'clé4', 'Documentaire animation', '', 'sensible', 'vidéo', '2016-01-02 00:00:00'),
(11, 'Titre video 5 (pas pour tous publics)', 3, 'mp4', 7.3, '', 2, 'animation', 'clé5', 'Film d''animation', '', 'sensible', 'vidéo', '2016-01-04 00:00:00'),
(12, 'Titre video 6', 3, 'mp4', 1.1, '', 3, 'documentaire', 'clé5', 'Documentaire animalier', '', 'tous publics', 'vidéo', '2016-01-16 00:00:00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ids` (`user_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `users_files` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
