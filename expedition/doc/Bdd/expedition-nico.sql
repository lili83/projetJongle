-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 22 août 2017 à 16:27
-- Version du serveur :  10.1.25-MariaDB
-- Version de PHP :  7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `expedition`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `titre` varchar(512) NOT NULL,
  `resume` text NOT NULL,
  `contenu` text NOT NULL,
  `date_publication` datetime NOT NULL,
  `date_modification` datetime NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `resume`, `contenu`, `date_publication`, `date_modification`, `id_user`) VALUES
(1, 'la balle noire', 'COUCOU\r\n            		                                	\r\n            		                                	\r\n            		                                	\r\n            		                                	\r\n            		                                	\r\n            		                                	\r\n            		                                	\r\n            		                                	\r\n            		                                	\r\n            		                                	\r\n            		                                	\r\n            		                                	\r\n            		                                	\r\n            		Et quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat...\r\n                                                                                                                                                                                                                                                                                ', '                	                	                	                	                	                	                	                	                	                	                	                	                	                	                	                	                	                	                	                	                	                	                	                	                	<h2>la balle noire c\'est mieux que bien</h2>\r\n                    <figure>\r\n                         <img src=\"/projetjongle-nico/expedition/web/projetjongle-nico/expedition/web/assets/img/test-blog.jpg\" alt=\"photo de la recherche\">\r\n                     </figure>\r\n        \r\n                    <p>Et quoniam inedia gravi adflictabantur, locum petivere Paleas nomine, vergentem in mare, valido muro firmatum, ubi conduntur nunc usque commeatus distribui militibus omne latus Isauriae defendentibus adsueti. circumstetere igitur hoc munimentum per triduum et trinoctium et cum neque adclivitas ipsa sine discrimine adiri letali, nec cuniculis quicquam geri posset, nec procederet ullum obsidionale commentum, maesti excedunt postrema vi subigente maiora viribus adgressuri. Ex turba vero imae sortis et paupertinae in tabernis aliqui pernoctant vinariis, non nulli velariis umbraculorum theatralium latent, quae Campanam imitatus lasciviam Catulus in aedilitate sua suspendit omnium primus; aut pugnaciter aleis certant turpi sono fragosis naribus introrsum reducto spiritu concrepantes; aut quod est studiorum omnium maximum ab ortu lucis ad vesperam sole fatiscunt vel pluviis, per minutias aurigarum equorumque praecipua vel delicta scrutantes.\r\n                    </p>\r\n                    \r\n                    <p>\r\n                    Dum apud Persas, ut supra narravimus, perfidia regis motus agitat insperatos, et in eois tractibus bella rediviva consurgunt, anno sexto decimo et eo diutius post Nepotiani exitium, saeviens per urbem aeternam urebat cuncta Bellona, ex primordiis minimis ad clades excita luctuosas, quas obliterasset utinam iuge silentium! ne forte paria quandoque temptentur, plus exemplis generalibus nocitura quam delictis. Itaque tum Scaevola cum in eam ipsam mentionem incidisset, exposuit nobis sermonem Laeli de amicitia habitum ab illo secum et cum altero genero, C. Fannio Marci filio, paucis diebus post mortem Africani. Eius disputationis sententias memoriae mandavi, quas hoc libro exposui arbitratu meo; quasi enim ipsos induxi loquentes, ne \'inquam\' et \'inquit\' saepius interponeretur, atque ut tamquam a praesentibus coram haberi sermo videretur.\r\n                    </p>\r\n        \r\n                    <p>\r\n                    Iam in altera philosophiae parte. quae est quaerendi ac disserendi, quae logikh dicitur, iste vester plane, ut mihi quidem videtur, inermis ac nudus est. tollit definitiones, nihil de dividendo ac partiendo docet, non quo modo efficiatur concludaturque ratio tradit, non qua via captiosa solvantur ambigua distinguantur ostendit; iudicia rerum in sensibus ponit, quibus si semel aliquid falsi pro vero probatum sit, sublatum esse omne iudicium veri et falsi putat.\r\n                    </p>\r\n        \r\n                    <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/KxY3PXhrI6A\" frameborder=\"0\" allowfullscreen></iframe>\r\n                    <p>Et quoniam inedia gravi adflictabantur, locum petivere Paleas nomine, vergentem in mare, valido muro firmatum, ubi conduntur nunc usque commeatus distribui militibus omne latus Isauriae defendentibus adsueti. circumstetere igitur hoc munimentum per triduum et trinoctium et cum neque adclivitas ipsa sine discrimine adiri letali, nec cuniculis quicquam geri posset, nec procederet ullum obsidionale commentum, maesti excedunt postrema vi subigente maiora viribus adgressuri. Ex turba vero imae sortis et paupertinae in tabernis aliqui pernoctant vinariis, non nulli velariis umbraculorum theatralium latent, quae Campanam imitatus lasciviam Catulus in aedilitate sua suspendit omnium primus; aut pugnaciter aleis certant turpi sono fragosis naribus introrsum reducto spiritu concrepantes; aut quod est studiorum omnium maximum ab ortu lucis ad vesperam sole fatiscunt vel pluviis, per minutias aurigarum equorumque praecipua vel delicta scrutantes.\r\n                    </p>\r\n        \r\n                <h1> YA TROP DE TEXTE !</H1>            	            	            	            	            	            	            	            	            	            	            	            	            	            	            	            	            	            	            	            	            	            	            	            	', '2017-08-17 00:00:00', '2017-08-22 14:23:37', 2),
(2, 'l’homme en bleu marine qui jongle', '                               Mon résumé            		                                	\r\n            		                                	\r\n            		                                	\r\n            		                                	\r\n            		                                	\r\n            		                                	\r\n            		                                	\r\n            		                                	\r\n            		                                	\r\n            		                                	\r\n            		                                	\r\n            		                                	\r\n            		                                	\r\n            		Et quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat...\r\n\r\n                                                                                                                                                                                                                                                ', '                	                	                	                	                	                	                	                	                	                	                	                	                	                	                	Et quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat...\r\n\r\nEt quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat...\r\n\r\n            	LA YA PAS BCP DE TEXTE            	            	            	            	            	            	            	            	            	            	            	            	            	            	', '2017-08-17 00:00:00', '2017-08-21 14:32:28', 2),
(3, 'Mon article à la noix', '                                	\r\n            		                                	\r\n            		                                	MORPIONIBUS            		                                	\r\n            		                                	\r\nRESUME                                                                       ', '                	                	                	                	                	                	Et quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat...\r\n\r\nEt quia Montius inter dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat, qui sint hi magna quaerebatur industria, et nequid intepesceret, Epigonus e Lycia philosophus ducitur et Eusebius ab Emissa Pittacas cognomento dilancinantium manus spiritum efflaturus Epigonum et Eusebium nec professionem nec dignitatem ostendens aliquotiens increpabat...\r\n\r\n            	            	            	            	            	sa            	', '2017-07-19 00:00:00', '2017-08-22 15:50:36', 1);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'spectacle'),
(2, 'danse'),
(3, 'jongle'),
(4, 'musique');

-- --------------------------------------------------------

--
-- Structure de la table `categoriearticle`
--

CREATE TABLE `categoriearticle` (
  `id` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `categoriearticle`
--

INSERT INTO `categoriearticle` (`id`, `id_article`, `id_categorie`) VALUES
(1, 1, 1),
(2, 3, 2),
(3, 2, 3),
(4, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `titre` varchar(512) NOT NULL,
  `texte` text NOT NULL,
  `date_envoi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `id_article`, `id_user`, `titre`, `texte`, `date_envoi`) VALUES
(1, 1, 2, 'Est-ce vraiment realisable ?', '<p>« Qui cum venisset ob haec festinatis itineribus Antiochiam, praestrictis palatii ianuis, contempto Caesare, quem videri decuerat, ad praetorium cum pompa sollemni perrexit morbosque diu causatus nec regiam introiit nec processit in publicum, sed abditus multa in eius moliebatur exitium addens quaedam relationibus supervacua, quas subinde dimittebat ad principem »\r\n				</p>', '2017-08-19 21:34:00'),
(2, 1, 3, 'pas mal mais j\'ai une question', '<p>« Qui cum venisset ob haec festinatis itineribus Antiochiam, praestrictis palatii ianuis, contempto Caesare, quem videri decuerat»\r\n				</p>', '2017-08-19 21:40:00'),
(3, 1, 4, 'Super, j\'adpterai a ma sauce....', 'Qui cum venisset ob haec festinatis itineribus Antiochiam, praestrictis palatii ianuis, contempto Caesare, quem videri decuerat, ad praetorium cum pompa sollemni perrexit morbosque diu causatus nec regiam introiit nec processit in publicum, sed abditus multa in eius moliebatur exitium addens quaedam relationibus supervacua, quas subinde dimittebat ad principem ad praetorium cum pompa sollemni perrexit morbosque diu causatus nec regiam introiit nec processit in publicum, sed abditus multa in eius moliebatur exitium addens quaedam relationibus supervacua, quas subinde dimittebat ad principem', '2017-08-19 17:00:00'),
(39, 1, 2, 'titre du commentaire', 'test 0529', '2017-08-21 05:29:06'),
(40, 1, 2, 'titre du commentaire', 'test 0529', '2017-08-21 05:29:06'),
(41, 1, 2, 'titre du commentaire', 'test 0529', '2017-08-21 05:35:40'),
(42, 1, 1, 'titre du commentaire', 'comment 6000', '2017-08-21 05:59:36'),
(43, 1, 1, 'titre du commentaire', 'comment 6000', '2017-08-21 06:00:43'),
(44, 1, 1, 'titre du commentaire', 'comment 6000', '2017-08-21 06:00:43'),
(45, 1, 2, 'titre du comment ', 'Test de 0950', '2017-08-21 09:50:10'),
(46, 1, 2, 'titre du comment ', 'Test de 0950', '2017-08-21 09:50:10'),
(47, 3, 1, 'commeny', 'blabal', '2017-08-21 16:32:16'),
(48, 3, 1, 'commeny', 'blabal', '2017-08-21 16:32:16');

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nom` varchar(512) NOT NULL,
  `prenom` varchar(512) NOT NULL,
  `email` varchar(512) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `nom`, `prenom`, `email`, `message`, `date`) VALUES
(1, 'Nicolas', '', '1611@mail.me', 'sasasasasa', '2017-08-14 16:27:00'),
(2, 'Nicolas', '', '', 'azadazdzadz', '2017-08-14 16:44:42'),
(3, 'user', '', 'user0603@email.me', 'blabla 0603', '2017-08-21 06:03:46');

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `lieu` text NOT NULL,
  `description` text NOT NULL,
  `id_creator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `evenementmedia`
--

CREATE TABLE `evenementmedia` (
  `id` int(11) NOT NULL,
  `id_evenement` int(11) NOT NULL,
  `id_media` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `intitule` text NOT NULL,
  `lien_url` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_modification` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `media`
--

INSERT INTO `media` (`id`, `intitule`, `lien_url`, `type`, `date_creation`, `date_modification`) VALUES
(1, 'image 1', 'image1', 'photo', '2017-08-17 00:00:00', '0000-00-00 00:00:00'),
(2, 'image 2', 'image2', 'photo', '2017-08-17 00:00:00', '0000-00-00 00:00:00'),
(3, 'image 3', 'image3', 'photo', '2017-08-17 00:00:00', '0000-00-00 00:00:00'),
(4, 'image 4 ', 'image4', 'photo', '2017-08-17 00:00:00', '0000-00-00 00:00:00'),
(5, 'image 5', 'image5', 'photo', '2017-08-17 00:00:00', '0000-00-00 00:00:00'),
(6, 'image 6', 'image6', 'photo', '2017-08-17 00:00:00', '0000-00-00 00:00:00'),
(7, 'image 7', 'image7', 'photo', '2017-08-17 00:00:00', '0000-00-00 00:00:00'),
(8, 'image 8', 'image8', 'photo', '2017-08-17 00:00:00', '0000-00-00 00:00:00'),
(9, 'pieces of love', 'https://www.youtube.com/embed/f3WK3VsXXak?list=PLjGyYq13QZt2vcvT6TlxMoTC-9KsVwqbU', 'video', '2017-08-17 00:00:00', '0000-00-00 00:00:00'),
(10, 'nouvel an chinois', 'https://www.youtube.com/embed/jTTo2UU7fvw?list=PLjGyYq13QZt2vcvT6TlxMoTC-9KsVwqbU', 'video', '2017-08-17 00:00:00', '0000-00-00 00:00:00'),
(11, 'La machine à fabriquer des pop corn', 'https://www.youtube.com/embed/CYt46yY4T8Q?list=PLjGyYq13QZt2vcvT6TlxMoTC-9KsVwqbU', 'video', '2017-08-17 00:00:00', '0000-00-00 00:00:00'),
(12, 'video', 'https://www.youtube.com/embed/5jQyhswn9Es?list=PLjGyYq13QZt2vcvT6TlxMoTC-9KsVwqbU', 'video', '2017-08-18 00:00:00', '0000-00-00 00:00:00'),
(13, 'video', 'https://www.youtube.com/embed/CQR27CIY2lw?list=PLjGyYq13QZt2vcvT6TlxMoTC-9KsVwqbU', 'video', '2017-08-18 00:00:00', '0000-00-00 00:00:00'),
(14, 'routine', 'https://www.youtube.com/embed/RiXLHz_wJFs?list=PLjGyYq13QZt2vcvT6TlxMoTC-9KsVwqbU', 'video', '2017-08-18 00:00:00', '0000-00-00 00:00:00'),
(15, 'makeba', 'https://www.youtube.com/embed/egagibEPiiw?list=PLjGyYq13QZt2vcvT6TlxMoTC-9KsVwqbU', 'video', '2017-08-18 00:00:00', '0000-00-00 00:00:00'),
(16, 'astro', 'https://www.youtube.com/embed/HFxQ6qYKTF0?list=PLjGyYq13QZt2vcvT6TlxMoTC-9KsVwqbU', 'video', '2017-08-18 00:00:00', '0000-00-00 00:00:00'),
(17, 'boulier', 'https://www.youtube.com/embed/kMN7UYYYBqg?list=PLjGyYq13QZt2vcvT6TlxMoTC-9KsVwqbU', 'video', '2017-08-18 00:00:00', '0000-00-00 00:00:00'),
(18, '104²', 'https://www.youtube.com/embed/tAsnojjAyr4?list=PLjGyYq13QZt2vcvT6TlxMoTC-9KsVwqbU', 'video', '2017-08-18 00:00:00', '0000-00-00 00:00:00'),
(19, 'ici et maintenant', 'https://www.youtube.com/embed/KxY3PXhrI6A?list=PLjGyYq13QZt2vcvT6TlxMoTC-9KsVwqbU', 'video', '2017-08-18 00:00:00', '0000-00-00 00:00:00'),
(20, 'uptown funk', 'https://www.youtube.com/embed/mLkjlWkP_uc?list=PLjGyYq13QZt2vcvT6TlxMoTC-9KsVwqbU', 'video', '2017-08-18 00:00:00', '0000-00-00 00:00:00'),
(21, 'courant d\'air', 'https://www.youtube.com/embed/x5eyvdFbkpo?list=PLjGyYq13QZt2vcvT6TlxMoTC-9KsVwqbU', 'video', '2017-08-18 00:00:00', '0000-00-00 00:00:00'),
(22, 'je suis allé à l\'académie fratellini', 'https://www.youtube.com/embed/OdzsO4DCT8g?list=PLjGyYq13QZt2vcvT6TlxMoTC-9KsVwqbU', 'video', '2017-08-18 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `mediaarticle`
--

CREATE TABLE `mediaarticle` (
  `id` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_media` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mediaarticle`
--

INSERT INTO `mediaarticle` (`id`, `id_article`, `id_media`) VALUES
(1, 2, 1),
(2, 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `titre` varchar(512) NOT NULL,
  `contenu` text NOT NULL,
  `dateCreation` datetime NOT NULL,
  `idUser` int(11) NOT NULL,
  `resume` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(512) NOT NULL,
  `nom` varchar(512) NOT NULL,
  `prenom` varchar(512) NOT NULL,
  `email` varchar(512) NOT NULL,
  `password_crypt` text NOT NULL,
  `resume` text NOT NULL,
  `url_photo` varchar(512) NOT NULL,
  `date_naissance` datetime NOT NULL,
  `date_inscription` datetime NOT NULL,
  `date_modification` datetime NOT NULL,
  `niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `nom`, `prenom`, `email`, `password_crypt`, `resume`, `url_photo`, `date_naissance`, `date_inscription`, `date_modification`, `niveau`) VALUES
(1, 'pyrrhus', 'Claudon', 'bibi', 'nclaudon.pro@gmail.com', '$2y$10$Q6PJcpjsuSpf2N/uTyB6I.Bz4X0OMn3Cw/slEgBYMsmKJf1FlHyha', 'Mon résumé à 2 balles												', '', '0000-00-00 00:00:00', '2017-08-14 16:30:28', '2017-08-22 16:00:03', 1),
(2, 'Sidonie', 'DODO', '', 'sidonie.bonnec@mail.me', '$2y$10$tC4sItEqBp9wJEvkqt7.mOwAgFELQ675I6KcjG/1OAALA9cfVWxqK', '', '/assets/img/presentation/profil_4.jpg', '0000-00-00 00:00:00', '2017-08-18 15:01:38', '2017-08-22 14:57:05', 11),
(3, 'marc', '', '', 'marc.toesca@mail.me', '$2y$10$651oWVzYQztJScZFF9xnF.AtWhZVI2Js3c5wzqaViPdcnvCDP1w0y', '', '/assets/img/presentation/profil_3.jpg', '0000-00-00 00:00:00', '2017-08-18 15:02:40', '0000-00-00 00:00:00', 1),
(4, 'mia', '', '', 'mia.frye@mail.me', '$2y$10$NgBw2R2680BAKeq/9mhwMOY6BbvDDKQ1LoH.RWGtrBmzbyBLVu3t6', '', '/assets/img/presentation/profil_7.jpg', '0000-00-00 00:00:00', '2017-08-18 15:04:22', '0000-00-00 00:00:00', 1),
(5, 'christophe', '', '', 'christophe.willem@mail.me', '$2y$10$oYBhSGZs0H49VBtJ6o/SbetVbNwcRvpIcjz6NBRseq2J4y0LhxCU.', '', '/assets/img/presentation/profil_8.jpg', '0000-00-00 00:00:00', '2017-08-18 15:05:10', '0000-00-00 00:00:00', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `categoriearticle`
--
ALTER TABLE `categoriearticle`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_article` (`id_article`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Index pour la table `evenementmedia`
--
ALTER TABLE `evenementmedia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_evenement` (`id_evenement`),
  ADD KEY `id_media` (`id_media`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mediaarticle`
--
ALTER TABLE `mediaarticle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_article` (`id_article`),
  ADD KEY `id_media` (`id_media`);

--
-- Index pour la table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `categoriearticle`
--
ALTER TABLE `categoriearticle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `evenement`
--
ALTER TABLE `evenement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `evenementmedia`
--
ALTER TABLE `evenementmedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `mediaarticle`
--
ALTER TABLE `mediaarticle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
