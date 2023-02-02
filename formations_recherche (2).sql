-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 02 fév. 2023 à 08:51
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `formations_recherche`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

DROP TABLE IF EXISTS `appartenir`;
CREATE TABLE IF NOT EXISTS `appartenir` (
  `id_domaine` int NOT NULL,
  `id` int NOT NULL,
  PRIMARY KEY (`id_domaine`,`id`),
  KEY `Appartenir_formation0_FK` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `appartenir`
--

INSERT INTO `appartenir` (`id_domaine`, `id`) VALUES
(4, 1),
(1, 2),
(5, 2),
(3, 3),
(5, 3),
(1, 4),
(4, 4),
(1, 5),
(5, 5),
(3, 6),
(5, 6),
(1, 7),
(2, 7),
(3, 7),
(5, 7),
(1, 8),
(4, 8),
(5, 9);

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

DROP TABLE IF EXISTS `domaine`;
CREATE TABLE IF NOT EXISTS `domaine` (
  `id_domaine` int NOT NULL,
  `intitule` varchar(50) NOT NULL,
  PRIMARY KEY (`id_domaine`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `domaine`
--

INSERT INTO `domaine` (`id_domaine`, `intitule`) VALUES
(1, 'Programmation Informatique'),
(2, 'Data et Intelligence Artificielle'),
(3, 'Systeme, Reseau et Cloud'),
(4, 'Transformation Digitale'),
(5, 'Piratage et Cybersécurité');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id` int NOT NULL,
  `description` int DEFAULT NULL,
  `nom` varchar(255) NOT NULL,
  `niveau` int NOT NULL,
  `bac` int NOT NULL,
  `duree` varchar(250) NOT NULL,
  `alternance` tinyint(1) DEFAULT NULL,
  `formations_continue` tinyint(1) DEFAULT NULL,
  `certif` varchar(250) NOT NULL,
  `activite_type` varchar(4000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `prerequis` varchar(1000) NOT NULL,
  `metiers` varchar(1000) NOT NULL,
  `frais` varchar(1000) NOT NULL,
  `lieu` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id`, `description`, `nom`, `niveau`, `bac`, `duree`, `alternance`, `formations_continue`, `certif`, `activite_type`, `prerequis`, `metiers`, `frais`, `lieu`) VALUES
(1, 0, 'REFERENT DIGITAL', 3, 1, '987 h 00\r\ndont 140 h 00 en \r\nentreprise', 0, 1, '2 RS', 'RS5599\r\nRéaliser des applications web à l’aide d’un système de gestion de contenus (CMS)\r\n-Utiliser Wordpress\r\n-Naviguer dans l’interface Wordpress sur le site wordpress.com, version en ligne du CMS\r\n-Identifier les langages des paragraphes de code (HTML, CSS et PHP) ainsi que leur fonction\r\nInstaller Wordpress sur son ordinateur\r\n-Télécharger la version locale de Wordpress à partir de wordpress.org\r\n-Installer le package Bitnami qui réunit le serveur Apache, la base de donnée (MySQL) et l’interface d’administration de la base de données (PhPMyAdmin)\r\n-Identifier le rôle de ces différents éléments\r\n-Faire migrer un site existant vers Wordpress à partir du plugin Duplicator\r\nAdministrer et gérer un site participatif\r\n-Créer et gérer les différents types d’utilisateurs\r\n-Gérer les commentaires\r\nTravailler avec les thèmes\r\n-Choisir un thème et l’intégrer\r\n-Planifier l’arborescence du site\r\n-Créer un menu\r\n-Créer des articles et des pages\r\n-Créer des catégories et des tags\r\nModifier et personnaliser les thèmes\r\n-Déclarer et installer un thème enfant\r\n-Modifier le CSS\r\nAjouter des extensions\r\n-Choisir les widgets et plugins adaptés dans la base disponible\r\n-Ajouter des widgets\r\n-Ajouter des plugins\r\n-Créer un plugin\r\nSécuriser son site\r\n-Faire des sauvegardes\r\n-Créer des pages protégées par mot de passe\r\n-Créer des accès utilisateurs\r\nExploiter son site\r\n-Optimiser le référencement de son site pour les moteurs de recherches (SEO)\r\n-Analyser le trafic de son site à partir de Google Analytics\r\nMettre en ligne son site\r\n-Choisir une hébergeur\r\n-Utiliser un FTP\r\n-Héberger son site sur un serveur mutualisé ou un serveur dédié\r\n\r\nRS5487\r\nGérer un projet en mobilisant les méthodes agiles\r\n- Réaliser un diagnostic de l’environnement, des conditions matérielles, financières et humaines au regard des objectifs du projet, afin d’évaluer la pertinence d’une approche agile dans la gestion du projet.\r\n- Sélectionner la méthode de gestion de projet agile adaptée à un projet spécifique, à partir du diagnostic préalablement réalisé, afin de garantir l’adéquation entre la méthode utilisée et la réalisation des objectifs.\r\n- Préparer le déploiement du projet en concevant les artefacts adaptées et en programmant les rituels afin de garantir la communication et la transparence entre les différentes parties prenantes.\r\n- Animer les rituels d’un projet en méthode agile, en mobilisant les ressources sélectionnées afin de répondre de façon adaptée aux besoins potentiellement évolutifs du client.', 'Conditions d’admission et pré-requis\r\nTrès forte motivation, à prouver !\r\n- Aucune condition de diplôme\r\n- Tests en ligne\r\n- Entretien de sélection\r\n- Forte appétence pour le numérique\r\n', 'Métiers visés\r\nAdministrateur systèmes, réseaux et sécurité\r\n- Administrateur d’infrastructures\r\n- Administrateur Cloud\r\n- Responsable infrastructure systèmes et réseaux\r\n- Administrateur bases de Données', 'Frais de scolarité\r\n-Pris en charge par la région Grand Est\r\n-Rémunération pour l’apprenant (ASP)', 'Lieu\r\nPôle Formation UIMM – Campus Sup Ardenne\r\n8 rue Claude Chrétien- 08000 Charleville-Mézières'),
(2, 0, 'DÉVELOPPEUR WEB ET WEB MOBILE', 5, 2, '987 h 00\r\ndont 140 h 00 en \r\nentreprise', 0, 1, '1 RNCP', '\r\nRNCP31114BC01\r\nAnalyser et définir la stratégie d’un système d’information\r\n- Maquetter une application.\r\n- Réaliser une interface utilisateur web statique et adaptable.\r\n- Développer une interface utilisateur web dynamique.\r\n- Réaliser une interface utilisateur avec une solution de gestion de \r\ncontenu ou e-commerce.\r\nRNCP31114BC02\r\nAssurer la gestion du Système d’information\r\n- Créer une base de données.\r\n- Développer les composants d’accès aux données.\r\n- Développer la partie back-end d’une application web ou web mobile.\r\n- Elaborer et mettre en œuvre des composants dans une application de \r\ngestion de contenu ou e-commerce.\r\n', 'Conditions d’admission et pré-requis\r\n- Très forte motivation, à prouver !\r\n- Aucune condition de diplôme\r\n- Tests en ligne\r\n- Entretien de sélection\r\n- Forte appétence pour le numérique', 'Métiers visés\r\n- Développeur web et web mobile\r\n- Développeur logiciel\r\n- Développeur front\r\n- Développeur backend', 'Frais de scolarité\r\n- Pris en charge par la région Grand Est\r\n- Rémunération pour l’apprenant (ASP)', 'Lieu\r\nPôle Formation UIMM – Campus Sup Ardenne\r\n8 rue Claude Chrétien- 08000 Charleville-Mézières'),
(3, 0, 'TECHNICIEN SUPÉRIEUR SYSTÈMES \r\nET RÉSEAUX\r\nSpécialisation Analyste Cybersécurité', 5, 2, '987 h 00\r\ndont 140 h 00 en entreprise', 0, 1, '1 RNCP / 2 RS', '\r\nRNCP31115BC01\r\nAssister les utilisateurs en centre de services\r\n- Mettre en service un équipement numérique. \r\n- Assister les utilisateurs sur leurs équipements numériques. \r\n- Gérer les incidents et les problèmes. \r\n- Assister à l’utilisation des ressources collaboratives\r\nRNCP31115BC02\r\nMaintenir, exploiter et sécuriser une infrastructure centralisée\r\n- Maintenir et exploiter le réseau local et la téléphonie.\r\n- Sécuriser les accès à internet.\r\n- Maintenir et exploiter un environnement virtualisé.\r\n- Maintenir et exploiter un domaine Active Directory et les serveurs Windows.\r\n- Maintenir et exploiter un serveur Linux\r\nRNCP31115BC03\r\nMaintenir et exploiter une infrastructure distribuée et contribuer à sa sécurisation\r\n- Configurer les services de déploiement et de terminaux clients légers.\r\n- Automatiser les tâches à l’aide de scripts.\r\n- Maintenir et sécuriser les accès réseaux distants.\r\n- Superviser l’infrastructure.\r\n- Intervenir dans un environnement de Cloud Computing.\r\n- Assurer sa veille technologique\r\nRNCP31115BC04\r\nCertificat complémentaires de spécialisation Linux\r\n- Administrer les serveurs Linux :\r\n- Installer, paramétrer un service sous Linux.\r\n- S’appuyer sur les communautés d’utilisateurs.\r\n- Mettre une application en production.\r\n- Développer des scripts d’automatisation.\r\n- Superviser les serveurs Linux\r\nRS5021\r\nAnalyser les incidents de sécurité détectés\r\n- L’élaboration de l’analyse des événements de sécurité\r\n- L’analyse et gestion des incidents de sécurité\r\n- L’élaboration et mise en œuvre d’une stratégie de veille - technologique pour optimiser la gestion des risques\r\nRS5020\r\nSurveiller un système d’information sur des critères de sécurité informatique - L’analyse des métiers du commanditaire et évaluation globale de la vulnérabilité de son système d’information\r\n- L’élaboration et mise en œuvre d’une stratégie de collecte d’événements en provenance du système d’information du commanditaire\r\n- L’élaboration et mise en œuvre d’une stratégie de veille technologique pour renforcer la gestion des risques\r\n', 'Conditions d’admission et pré-requis\r\n- Très forte motivation, à prouver !\r\n- Aucune condition de diplôme\r\n- Tests en ligne\r\n- Entretien de sélection\r\n- Forte appétence pour le numérique', 'Métiers visés\r\n- Technicien systèmes et réseaux\r\n- Technicien support\r\n- Technicien réseau\r\n- Technicien informatique\r\n- Technicien d’exploitation', 'Frais de scolarité\r\n- Pris en charge par la région Grand Est\r\n- Rémunération pour l’apprenant (ASP)', 'Lieu\r\nPôle Formation UIMM – Campus Sup Ardenne\r\n8 rue Claude Chrétien- 08000 Charleville-Mézières'),
(4, 0, 'CONCEPTEUR DESIGNER UI', 6, 3, '1155 h 00\r\ndont 560 h 00 en \r\nentreprise\r\n-\r\n8 Mois', 0, 1, '1 RNCP', '\r\nRNCP35634BC01 \r\nConcevoir les éléments graphiques d’une interface et de supports de communication\r\n- Réaliser des illustrations, des graphismes et des visuels\r\n- Concevoir des interfaces graphiques et des prototypes\r\n- Réaliser une animation pour différents supports de diffusion\r\n- Créer des supports de communication\r\nRNCP35634BC02\r\nContribuer à la gestion et au suivi d’un projet de communication numérique\r\n- Mettre en œuvre une stratégie webmarketing\r\n- Assurer une veille professionnelle et développer les compétences collectives de son équipe\r\nRNCP35634BC03\r\nRéaliser, améliorer et animer des sites web\r\n- Intégrer des pages web\r\n- Adapter des systèmes de gestion de contenus\r\n- Optimiser en continu un site web ou une interface\r\n', 'Conditions d’admission et pré-requis\r\nBac +2 informatique ou selon expérience \r\nprofessionnelle équivalente\r\n- Tests en ligne\r\n- Entretien de sélection\r\n', 'Métiers visés\r\n- UI designer\r\n- Web designer\r\n- Chargé de communication digitale\r\n- Chargé de veille technologique et stratégique\r\n- Web marketeur', 'Frais de scolarité\r\n- Pris en charge par la région Grand Est\r\n- Rémunération pour l’apprenant (ASP)', 'Lieu\r\nPôle Formation UIMM – Campus Sup Ardenne\r\n8 rue Claude Chrétien- 08000 Charleville-Mézières\r\n'),
(5, 0, 'CONCEPTEUR DEVELOPPEUR \r\nD’APPLICATION', 6, 3, '1092 h 00\r\ndont 140 h 00 en \r\nentreprise\r\n-\r\n12 Mois', 1, 1, '1 RNCP\r\n', '\r\nRNCP35594BC01\r\nConcevoir et développer des composants d’interface utilisateur en intégrant les recommandations de sécurité\r\n- Maquetter une application.\r\n- Développer une interface utilisateur de type desktop.\r\n- Développer des composants d’accès aux données.\r\n- Développer la partie front-end d’une interface utilisateur web.\r\n- Développer la partie back-end d’une interface utilisateur web.\r\nRNCP35594BC02\r\nConcevoir et développer la persistance des données en intégrant les recommandations de sécurité\r\n- Concevoir une base de données.\r\n- Mettre en place une base de données.\r\n- Développer des composants dans le langage d’une base de données.\r\nRNCP35594BC03\r\nConcevoir et développer une application multicouche répartie en intégrant les recommandations de sécurité\r\n- Collaborer à la gestion d’un projet informatique et à l’organisation de l’environnement de développement.\r\n- Concevoir une application.\r\n- Développer des composants métier.\r\n- Construire une application organisée en couches.\r\n- Développer une application mobile.\r\n- Préparer et exécuter les plans de tests d’une application.\r\n- Préparer et exécuter le déploiement d’une application.\r\n', 'Conditions d’admission et pré-requis\r\n- Bac +2 informatique ou selon expérience \r\nprofessionnelle équivalente\r\n- Tests en ligne\r\n- Entretien de sélection', 'Métiers visés\r\n- Concepteur Web\r\n- Concepteur Application Smartphone\r\n- Concepteur Fullstack\r\n- Concepteur JS', 'Frais de scolarité\r\n- Pris en charge par l’entreprise\r\n- Rémunération par l’entreprise\r\n- Pris en charge par la région Grand Est\r\n- Rémunération pour l’apprenant (ASP)', 'Lieu\r\nPôle Formation UIMM – Campus Sup Ardenne\r\n8 rue Claude Chrétien- 08000 Charleville-Mézières\r\n\r\nPôle Formation UIMM – Reims\r\n3 rue Max Holste – 51100 Reims'),
(6, 0, 'ADMINISTRATEUR SYSTÈMES, \r\nRÉSEAUX ET BASES DE DONNÉES', 6, 3, '12 mois\r\ndont 490 h 00 de formation', 1, 0, '1 RNCP', '\r\nRNCP35594BC01\r\nAdministrer le Système d’Information\r\n- Assurer l’exploitation du Système d’Information (SI) \r\n- Concevoir l’infrastructure d’une plateforme virtuelle\r\n- Maintenir en conditions opérationnelles l’infrastructure de l’entreprise \r\n- Identifier rapidement les systèmes qui nécessitent des correctifs \r\n- Configurer les équipements réseaux pour \r\n- Administrer les bases de données \r\n- Mesurer et analyser les performances\r\n- Améliorer les performances des bases de données \r\n- Rationnaliser les tâches quotidiennes \r\n- Faciliter la résolution des problèmes \r\n- Automatiser les procédures de sauvegarde\r\nRNCP35594BC02\r\nAssurer la gestion du Système d’information\r\n- Gérer les évolutions des infrastructures Informatiques\r\n- Assurer l’évolution des équipements en tenant compte des technologies émergentes\r\n- Comparer les solutions pour faire des propositions de renouvellement\r\n- Ordonnancer le plan de déploiement \r\n- Maquetter les solutions de déploiements pour le test et la validation des solutions\r\n- Attribuer les ressources informatiques \r\n- Superviser l’infrastructure informatique et le patrimoine applicatif \r\n- Recenser les ressources de l’infrastructure \r\n- Migrer une architecture système ou réseau \r\n- Elaborer un tableau de bord sur la résolution des tickets d’incidents\r\n- Résoudre les tickets de niveau 3 & 4 en intervenant sur place ou à distance \r\n- Concevoir un service numérique dans le but de réduire empreinte carbone\r\nRNCP35594BC03\r\nDéfinir la politique de sécurisation du Système d’Information\r\n- Faire un état des lieux des risques de sécurité identifiables au sein du SI\r\n- Connaître et appliquer les normes ISO 27001\r\n- Configurer des solutions de sécurité classiques\r\n- Appliquer les techniques déployées afin de sécuriser les transactions numériques\r\n- Appliquer les procédures de sécurité liées aux accès physiques et logiques des données \r\n- Mettre en place une gestion unique et commune des terminaux mobiles\r\n- Mettre en œuvre des règles et processus de sécurité\r\n- Déployer des éléments passifs de protection systématique ou actifs \r\n- Evaluer les perturbations de services grâce aux alertes émises par les sondes\r\n- Déployer des solutions automatisées de mise à jour et de correctifs\r\nRNCP35594BC04\r\nCommuniquer avec tous les acteurs internes ou externes au service informatique\r\n- Collecter des informations auprès de spécialistes techniques et d’utilisateurs\r\n- Concevoir la documentation technique, en français et en anglais\r\n- Former les équipes supports sur l’utilisation des outils\r\n- Identifier les compétences techniques attendues\r\n- Conduire un entretien annuel en contrôlant l’atteinte des objectifs fixés\r\n- Mettre en place des outils collaboratifs pour transmettre des informations\r\n- Déléguer les tâches de niveau 1 & 2 à réaliser\r\n', 'Conditions d’admission et pré-requis\r\n- Bac +2 informatique ou selon expérience \r\nprofessionnelle équivalente\r\n- Tests en ligne\r\n- Entretien de sélection', 'Métiers visés\r\n- Administrateur systèmes, réseaux et sécurité\r\n- Administrateur d’infrastructures\r\n- Administrateur Cloud\r\n- Responsable infrastructure systèmes et réseaux\r\n- Administrateur bases de Données', 'Frais de scolarité\r\n- Pris en charge par l’entreprise\r\n- Rémunération par l’entreprise', 'Lieu\r\nPôle Formation UIMM – Campus Sup Ardenne\r\n8 rue Claude Chrétien- 08000 Charleville-Mézières\r\n\r\nPôle Formation UIMM – Reims\r\n3 rue Max Holste – 51100 Reims'),
(7, 0, 'EXPERT INFORMATIQUE ET SYSTÈME \r\nD’INFORMATION : EPSI', 7, 5, '24 mois\r\nDont 490 h 00 et 450 h 00 en \r\nformation', 1, 0, '1 RNCP', 'RNCP35584BC01\r\nAnalyser et définir la \r\nstratégie d\'un système \r\nd\'information\r\n- Mettre en place un dispositif de veille technologique en français et en anglais\r\n- Collecter les besoins des directions métiers de l’entreprise afin de bâtir le projet de \r\ndéveloppement du SI\r\n- Cartographier un système d’information existant selon 4 niveaux\r\n- Identifier les informations sensibles, les risques, les zones critiques \r\n- Elaborer la stratégie informatique de l’entreprise et les besoins en cybersécurité\r\n- Présenter des propositions de projet d’évolution de S.I. au comité de direction\r\n\r\nRNCP35584BC02\r\nManager un projet \r\ninformatique avec agilité \r\nen collaboration avec les \r\nparties prenantes\r\n\r\n- Identifier l’ensemble des étapes de réalisation du système d’information\r\n- Concevoir les cahiers des charges technique et fonctionnel d’un projet \r\n- Gérer un projet agile en utilisant les méthodes et outils adaptés \r\n- Etablir des tableaux de bord de suivi de performance \r\n- Piloter les presta', 'Conditions d’admission et pré-requis\r\n- BAC+3/niveau 6 RNCP dans l’environnement \r\ninformatique et numérique \r\n- Tests en ligne\r\n- Entretien de sélection', 'Métiers visés\r\n- Ingénieur études & développement\r\n- Ingénieur Infrastructures Cloud\r\n- Chef de projet informatique', 'Frais de scolarité\r\n- Pris en charge par l’entreprise\r\n- Rémunération par l’entreprise', 'Lieu\r\nPôle Formation UIMM – Reims\r\n3 rue Max Holste – 51100 Reims'),
(8, 0, 'EXPERT INFORMATIQUE ET SYSTÈME \r\nD’INFORMATION – WIS', 7, 5, '12 mois', 0, 1, '1 RNCP', 'RNCP35584BC01\r\nAnalyser et définir la \r\nstratégie d\'un système \r\nd\'information\r\n- Mettre en place un dispositif de veille technologique en français et en anglais\r\n- Collecter les besoins des directions métiers de l’entreprise afin de bâtir le projet de \r\ndéveloppement du SI\r\n- Cartographier un système d’information existant selon 4 niveaux\r\n- Identifier les informations sensibles, les risques, les zones critiques \r\n- Elaborer la stratégie informatique de l’entreprise et les besoins en cybersécurité\r\n- Présenter des propositions de projet d’évolution de S.I. au comité de direction\r\n\r\nRNCP35584BC02\r\nManager un projet \r\ninformatique avec agilité \r\nen collaboration avec les \r\nparties prenantes\r\n- Identifier l’ensemble des étapes de réalisation du système d’information\r\n- Concevoir les cahiers des charges technique et fonctionnel d’un projet \r\n- Gérer un projet agile en utilisant les méthodes et outils adaptés \r\n- Etablir des tableaux de bord de suivi de performance \r\n- Piloter les prestata', 'Conditions d’admission et pré-requis\r\n- BAC+3/niveau 6 RNCP dans l’environnement \r\ninformatique et numérique \r\n- Tests en ligne\r\n- Entretien de sélection\r\n', 'Métiers visés\r\n- Chef de projet informatique\r\n- Chef de projet IT \r\n- Consultant technico-fonctionnel PGI (ERP) ou \r\nCRM\r\n- Consultant informatique ou Consultant IT', 'Frais de scolarité\r\n- Pris en charge par la région Grand Est\r\n- Rémunération pour l’apprenant (ASP)\r\n', 'Lieu\r\nPôle Formation UIMM – Campus Sup Ardenne\r\n8 rue Claude Chrétien- 08000 Charleville-Mézières'),
(9, 0, 'INGÉNIEUR SYSTÈMES, RÉSEAUX ET \r\nCYBERSÉCURITÉ', 7, 5, '24 mois\r\n', 1, 0, '1 RNCP', 'RNCP36121BC01\r\nGérer un projet \r\ninternational\r\n- Identifier les parties prenantes afin d\'établir une communication et un rapport de confiance immédiat\r\n- Choisir la méthode de gestion de projet adaptée au contexte et au client\r\n- Identifier la Core Team afin d\'être à même de débuter le travail au plus vite\r\n- Rédiger le plan de management de projet afin de pouvoir le partager avec le client et partir sur des \r\nbases communes\r\n- Estimer les durées des différentes tâches afin de réaliser un planning de projet\r\n- Estimer les coûts de chaque tâche afin de définir le coût prévisionnel estimé du projet\r\n- Définir les indicateurs suivis afin de partager le tableau de bord projet\r\n\r\nRNCP36121BC02\r\nRecueillir et analyser les \r\nexigences du client\r\n- Identifier les problèmes ou manques à l’origine du besoin afin de mieux comprendre ce dernier\r\n- Identifier les différents types d\'utilisateurs afin de prendre en compte les spécificités\r\n- Extraire d\'un cahier des charges les exigences du client a', 'Conditions d’admission et pré-requis\r\n- Bac +3 informatique ou selon expérience \r\nprofessionnelle équivalente\r\n- Entretien de sélection\r\n', 'Métiers visés\r\n- Consultant en réseaux d’entreprise\r\n- Architecte réseau\r\n- Intégrateur systèmes et réseaux\r\n- Expert réseau\r\n- Architecte réseau et sécurité\r\n', '• Pris en charge par l’entreprise\r\n• Rémunération par l’entreprise', 'Lieu\r\nPôle Formation UIMM – Campus Sup Ardenne\r\n8 rue Claude Chrétien- 08000 Charleville-Mézières\r\n\r\nPôle Formation UIMM – Reims\r\n3 rue Max Holste – 51100 Reims');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD CONSTRAINT `Appartenir_domaine_FK` FOREIGN KEY (`id_domaine`) REFERENCES `domaine` (`id_domaine`),
  ADD CONSTRAINT `Appartenir_formation0_FK` FOREIGN KEY (`id`) REFERENCES `formation` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
