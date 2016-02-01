-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 25 Janvier 2016 à 00:11
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
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created` datetime NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `content_type` varchar(63) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `files`
--

INSERT INTO `files` (`id`, `title`, `user_id`, `file_type`, `file_size`, `url_file`, `nb_like`, `category`, `keywords`, `description`, `licence`, `content_type`, `created`) VALUES
(1, 'Titre 1', 1, 'mp3', 3.5, '', 0, 'pop', '', 'Et interdum acciderat, ut siquid in penetrali secreto nullo citerioris vitae ministro praesente paterfamilias uxori susurrasset in aurem, velut \n\nAmphiarao referente aut Marcio, quondam vatibus inclitis, postridie disceret imperator. ideoque etiam parietes arcanorum soli conscii timebantur.', 'tous publics', 'music', '2016-01-22 00:00:00'),
(2, 'Titre 2', 1, 'mp3', 3.2, '', 2, 'electro', '', 'Et interdum acciderat, ut siquid in penetrali secreto nullo citerioris vitae ministro praesente paterfamilias uxori susurrasset in aurem, velut \r\n\r\nAmphiarao referente aut Marcio, quondam vatibus inclitis, postridie disceret imperator. ideoque etiam parietes arcanorum soli conscii timebantur.', 'tous publics', 'music', '2016-01-21 00:00:00'),
(3, 'Titre 3', 2, 'mp3', 3.2, '', 1, 'electro pop', '', 'Et interdum acciderat, ut siquid in penetrali secreto nullo citerioris vitae ministro praesente paterfamilias uxori susurrasset in aurem, velut \r\n\r\nAmphiarao referente aut Marcio, quondam vatibus inclitis, postridie disceret imperator. ideoque etiam parietes arcanorum soli conscii timebantur.', 'tous publics', 'music', '2016-01-20 00:00:00'),
(4, 'Titre 4', 2, 'mp3', 3.2, '', 0, 'jazzy', '', 'Pas pour tous publics Et interdum acciderat, ut siquid in penetrali secreto nullo citerioris vitae ministro praesente paterfamilias uxori susurrasset in aurem, velut \n\nAmphiarao referente aut Marcio, quondam vatibus inclitis, postridie disceret imperator. ideoque etiam parietes arcanorum soli conscii timebantur.', 'sensible', 'music', '2016-01-17 00:00:00'),
(5, 'Titre 5', 3, 'mp3', 3, '', 0, 'country', '', 'country moderne.', 'tous publics', 'music', '2016-01-19 00:00:00'),
(6, 'Titre 6', 3, 'mp3', 3.1, '', 0, 'rock', '', 'Et interdum acciderat, ut siquid in penetrali secreto nullo citerioris vitae ministro praesente paterfamilias uxori susurrasset in aurem, velut \r\n\r\nAmphiarao referente aut Marcio, quondam vatibus inclitis, postridie disceret imperator. ideoque etiam parietes arcanorum soli conscii timebantur.', 'sensible', 'music', '2016-01-20 00:00:00'),
(7, 'Titre video 1', 1, 'mp4', 10.3, '', 1, 'doc', '', 'Documentaire court-métrage\r\n', 'tous publics', 'video', '2016-01-22 00:00:00'),
(8, 'Titre video 2', 1, 'mp4', 10, '', 1, 'fantastique', '', 'Documentaire court-métrage', 'tous publics', 'video', '2016-01-22 00:00:00'),
(9, 'Titre video 3', 2, 'mp4', 8.3, '', 2, 'aniamtion (pas pour tous publics)', '', 'Film d''animation', 'sensible', 'video', '2016-01-12 00:00:00'),
(10, 'Titre video 4', 2, 'mp4', 4.1, '', 4, 'doc animation', '', 'Documentaire animation', 'sensible', 'video', '2016-01-02 00:00:00'),
(11, 'Titre video 5 (pas pour tous publics)', 3, 'mp4', 7.3, '', 2, 'animation', '', 'Film d''animation', 'sensible', 'video', '2016-01-04 00:00:00'),
(12, 'Titre video 6', 3, 'mp4', 1.1, '', 3, 'documentaire', '', 'Documentaire animalier', 'tous publics', 'video', '2016-01-16 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `followers`
--

CREATE TABLE `followers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id_A` int(10) UNSIGNED NOT NULL,
  `user_id_B` int(10) UNSIGNED NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `keywords`
--

CREATE TABLE `keywords` (
  `id` int(10) UNSIGNED NOT NULL,
  `word` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `likes-files`
--

CREATE TABLE `likes-files` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `file_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(27) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(63) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(63) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `country` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `url-picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `biography` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `login`, `email`, `password`, `birthday`, `country`, `url-picture`, `biography`, `created`, `token`) VALUES
(1, 'phil', 'philippe.agm@gmail.com', 'phil', '2080-01-22', 'France', '', 'Et interdum acciderat, ut siquid in penetrali secreto nullo citerioris vitae ministro praesente paterfamilias uxori susurrasset in aurem, velut \r\n\r\nAmphiarao referente aut Marcio, quondam vatibus inclitis, postridie disceret imperator. ideoque etiam parietes arcanorum soli conscii timebantur.', '2016-01-22 00:00:00', ''),
(2, 'user1', 'user1@gmail.com', 'user1', '2070-01-22', 'France', '', 'Et interdum acciderat, ut siquid in penetrali secreto nullo citerioris vitae ministro praesente paterfamilias uxori susurrasset in aurem, velut \r\n\r\nAmphiarao referente aut Marcio, quondam vatibus inclitis, postridie disceret imperator. ideoque etiam parietes arcanorum soli conscii timebantur.', '2016-01-21 00:00:00', ''),
(3, 'user2', 'user2.agm@gmail.com', 'user2', '2090-01-22', 'France', '', 'Et interdum acciderat, ut siquid in penetrali secreto nullo citerioris vitae ministro praesente paterfamilias uxori susurrasset in aurem, velut \r\n\r\nAmphiarao referente aut Marcio, quondam vatibus inclitis, postridie disceret imperator. ideoque etiam parietes arcanorum soli conscii timebantur.', '2016-01-20 00:00:00', '');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_ids` (`file_id`),
  ADD KEY `user_ids` (`user_id`);

--
-- Index pour la table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ids` (`user_id`);

--
-- Index pour la table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ids_A` (`user_id_A`),
  ADD KEY `user_ids_B` (`user_id_B`);

--
-- Index pour la table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `likes-files`
--
ALTER TABLE `likes-files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ids` (`user_id`),
  ADD KEY `file_ids` (`file_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id-users` (`id`),
  ADD UNIQUE KEY `emails` (`email`),
  ADD UNIQUE KEY `logins` (`login`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `likes-files`
--
ALTER TABLE `likes-files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `files_comments` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`),
  ADD CONSTRAINT `users_comments` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `users_files` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `users_followersA` FOREIGN KEY (`user_id_A`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `users_followersB` FOREIGN KEY (`user_id_B`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `likes-files`
--
ALTER TABLE `likes-files`
  ADD CONSTRAINT `files_likes-files` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`),
  ADD CONSTRAINT `users_likes-files` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
