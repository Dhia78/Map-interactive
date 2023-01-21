-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 03 jan. 2023 à 21:41
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `espace_commentaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `monuments`
--

DROP TABLE IF EXISTS `monuments`;
CREATE TABLE IF NOT EXISTS `monuments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(5000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `monuments`
--

INSERT INTO `monuments` (`id`, `description`) VALUES
(1, 'La statue de la Liberté ou La Liberté éclairant le monde, ou simplement Liberté, plus connue sous le nom Statue of Liberty, est l\'un des monuments les plus célèbres des États-Unis. Cette statue monumentale est située à New York, sur la Liberty Island, au sud de Manhattan, à l\'embouchure de l\'Hudson et à proximité d’Ellis Island. '),
(3, 'La Sagrada Família, Temple Expiatori de la Sagrada Família de son nom complet en catalan, ou Templo Expiatorio de la Sagrada Familia en espagnol (en français : « temple expiatoire de la Sainte Famille ») est une basilique de Barcelone dont la construction a commencé en 1882. '),
(2, 'La Grande Muraille, aussi appelé « Les Grandes Murailles » est un ensemble de fortifications militaires chinoises construites, détruites et reconstruites en plusieurs fois et à plusieurs endroits entre le IIIe siècle av. J.-C. et le XVIIe siècle pour marquer et défendre la frontière nord de la Chine. C\'est la structure architecturale la plus importante jamais construite par l’être humain à la fois en longueur, en surface et en masse. '),
(4, 'Le plateau de Gizeh est situé sur la rive ouest du Nil dans le désert à 8 km du centre-ville de Gizeh et à 25 km du Caire. Ce plateau, nivelé par l\'homme il y a 4 500 ans, a la forme approximative d\'un carré de 1,6 à 1,9 km de côté. Le plateau est délimité au sud-est et au sud-ouest par deux failles orientées respectivement NE-SO et NO-SE, avec un escarpement côté sud-est descendant à 40 m de dénivellation, au pied duquel courait un canal du Nil séparant la zone désertique de la terre fertile. Ce canal présent au moment de la construction de la pyramide a dérivé vers l\'Est probablement en raison d\'une catastrophe naturelle, la rive ouest du Nil actuel étant désormais à 8 km à l’est du site. L’assise du plateau s’abaisse doucement vers le sud-est (l’inclinaison des roches va de moins de 5° à plus de 10°)'),
(5, 'Le Christ Rédempteur (en portugais : O Cristo Redentor) est une grande statue du Christ dominant la ville de Rio de Janeiro au Brésil, du haut du mont du Corcovado.\n\nElle est devenue au fil des ans un des emblèmes reconnus internationalement de la ville, au même titre que le Pain de Sucre, la plage de Copacabana ou le carnaval. '),
(6, 'La Tour de Pirelonge est une tour en pierre gallo-romaine, aussi appelée pile, située à l\'est de Saujon, sur le territoire de la commune de Saint-Romain-de-Benet (Charente-Maritime, France).\r\n\r\nLes dimensions de la tour sont d\'environ 6 m par 6 m à la base, pour une hauteur de 25 m. Elle se termine par un couronnement conique assez bien conservé. Il n\'y a pas de niche apparente. De nombreux sondages ont mis en évidence l\'absence de chambre intérieure : la tour est donc pleine. Des fouilles ont par contre identifié les restes d\'une enceinte. '),
(7, 'La tour Eiffel est une tour de fer puddlé de 330 m2 de hauteur (avec antennes) située à Paris, à l’extrémité nord-ouest du parc du Champ-de-Mars en bordure de la Seine dans le 7e arrondissement. Son adresse officielle est 5, avenue Anatole-France.\r\n\r\nConstruite en deux ans par Gustave Eiffel et ses collaborateurs pour l\'Exposition universelle de Paris de 1889, célébrant le centenaire de la Révolution française, et initialement nommée « tour de 300 mètres », elle est devenue le symbole de la capitale française et un site touristique de premier plan : il s’agit du quatrième site culturel français payant le plus visité en 2016, avec 5,9 millions de visiteurs. Depuis son ouverture au public, elle a accueilli plus de 300 millions de visiteurs. '),
(8, 'Le Taj Mahal est situé à Agra, au bord de la rivière Yamuna, dans l\'État de l\'Uttar Pradesh, en Inde. C\'est un mausolée de marbre blanc construit par l\'empereur moghol musulman Shâh Jahân en mémoire de son épouse Arjumand Bânu Begam, aussi connue sous le nom de Mumtaz Mahal, qui signifie en persan « lumière du palais ». Celle-ci meurt le 17 juin 1631 en donnant naissance à leur quatorzième enfant, alors qu\'elle accompagnait son mari pendant une campagne militaire. Elle trouve une première sépulture sur place dans le jardin Zainabad à Burhanpur. La construction du mausolée commence en 1631 et s\'achève dans sa plus grande partie en 16484. Son époux, mort le 31 janvier 1666, est inhumé auprès d\'elle. '),
(9, 'Machu Picchu est une ancienne cité inca du XVe siècle au Pérou, perchée sur un promontoire rocheux qui unit les monts Machu Picchu et Huayna Picchu (« le Jeune Pic » en quechua) sur le versant oriental des Andes centrales. Son nom aurait été Pikchu ou Picho. '),
(10, 'Angkor Vat ou Angkor Wat est le plus grand des temples et le plus grand monument religieux du monde1. Il fait partie du complexe monumental d\'Angkor au Cambodge réparti sur un site de 162,6 hectares2 . Il fut construit par le roi khmer Suryavarman II au début du XIIe siècle à Yasodharapura (Angkor actuel) capitale de l\'empire khmer en tant que temple d\'État et éventuel mausolée. Temple le mieux préservé d\'Angkor, l\'une des plus grandes villes médiévales du monde, il est le seul à être resté un important centre religieux depuis sa fondation, initialement hindou et dédié au dieu Vishnou pour l\'empire khmer rompant avec la tradition Shaiva des rois précédents. Il a progressivement été transformé en temple bouddhiste vers la fin du XIIe siècle. '),
(11, 'L’opéra de Sydney, à Sydney (Nouvelle-Galles du Sud, Australie), est l\'un des plus célèbres bâtiments du XXe siècle et un haut-lieu de représentation des arts notamment lyriques. Son architecture originale, qui ressemble à un voilier pour les uns, ou à un coquillage pour les autres, a été imaginée par le Danois Jørn Utzon. '),
(12, 'Le mémorial de Lincoln, en anglais Lincoln Memorial, est un monument construit en l\'honneur d\'Abraham Lincoln, 16e président des États-Unis, et, inauguré en 1922, dans le West Potomac Park, dans le prolongement du National Mall à Washington. Grand bâtiment de marbre blanc en forme de temple dorique grec, il abrite une statue monumentale d\'Abraham Lincoln assis et les inscriptions de deux de ses plus célèbres discours. '),
(13, 'Chichén Itzá est une ancienne ville maya située entre Valladolid et Mérida dans la péninsule du Yucatán au Mexique. Chichén Itzá fut probablement, au xe siècle, le principal centre religieux du Yucatán ; il reste aujourd’hui l’un des sites archéologiques les plus importants et les plus visités de la région. Le site a été classé au patrimoine mondial de l\'UNESCO en 1988, et a été élu, le 7 juillet 2007, comme l\'une des sept nouvelles merveilles du monde après un vote controversé organisé par la New Seven Wonders Foundation. '),
(14, 'La cathédrale Notre-Dame de Paris, communément appelée Notre-Dame, est l\'un des monuments les plus emblématiques de Paris et de la France. Elle est située sur l\'île de la Cité et est un lieu de culte catholique, siège de l\'archidiocèse de Paris, dédié à la Vierge Marie. '),
(15, 'Le Colisée (Colosseo en italien), à l\'origine amphithéâtre Flavien (amphitheatrum Flavium en latin), est un immense amphithéâtre ovoïde situé dans le centre de la ville de Rome, entre l\'Esquilin et le Cælius, le plus grand jamais construit dans l\'Empire romain. Il est l\'une des plus grandes œuvres de l\'architecture et de l\'ingénierie romaines. '),
(16, 'Le pont Charles est un pont qui relie la Vieille Ville de Prague (Staré Mesto en tchèque) au quartier de Malá Strana, au pied du château de Prague. Sa construction remonte au XIVe siècle. Il doit son nom à Charles IV, empereur du Saint-Empire, qui laisse dans la ville une empreinte considérable. '),
(17, 'Chichén Itzá est une ancienne ville maya située entre Valladolid et Mérida dans la péninsule du Yucatán au Mexique. Chichén Itzá fut probablement, au xe siècle, le principal centre religieux du Yucatán ; il reste aujourd’hui l’un des sites archéologiques les plus importants et les plus visités de la région. Le site a été classé au patrimoine mondial de l\'UNESCO en 1988, et a été élu, le 7 juillet 2007, comme l\'une des sept nouvelles merveilles du monde après un vote controversé organisé par la New Seven Wonders Foundation. '),
(18, 'Big Ben est le surnom de la grande cloche de 13,5 tonnes se trouvant au sommet de la tour Élisabeth (Elizabeth Tower), la tour horloge du palais de Westminster, qui est le siège du Parlement britannique (Houses of Parliament), à Londres. La tour a été renommée à l\'occasion du jubilé de diamant d\'Élisabeth II en 2012. Auparavant, elle était simplement appelée tour de l\'Horloge (Clock Tower). Par métonymie, le nom de la cloche est aussi communément employé pour désigner l\'horloge dans son ensemble et la tour qui abrite le tout. Il s\'agit d\'un symbole de la ville de Londres. '),
(19, 'Burj Khalifa est un gratte-ciel situé à Dubaï aux Émirats arabes unis, devenu en mai 2008 la plus haute structure humaine jamais construite. Sa hauteur finale, atteinte le 17 janvier 2009, est de 828 mètres1,2. Elle forme le cœur d’un nouveau quartier : Downtown Dubai. L\'inauguration et l\'ouverture partielle ont eu lieu le 4 janvier 2010. '),
(20, 'L’Empire State Building4 est un gratte-ciel de style Art déco situé dans l\'arrondissement de Manhattan, à New York. Il est situé dans le quartier de Midtown au 350 de la 5e Avenue, entre les 33e et 34e rues. Inauguré le 1er mai 1931, il mesure 381 mètres (443,2 avec l’antenne) et compte 102 étages. '),
(21, 'Times Square est un quartier de la ville de New York, situé dans l\'arrondissement de Manhattan, qui tire son nom de l\'ancien siège du New York Times. Situé entre la 42e rue et Broadway, il comprend les blocs (pâtés d\'immeubles) situés entre la Sixième et la Neuvième Avenue d\'est en ouest, d\'une part et les blocs entre les 3e à 52e rue du sud au nord, d\'autre part. Il constitue la partie ouest du quartier commerçant de Midtown. '),
(22, 'La Maison-Blanche est la résidence officielle et le bureau du président des États-Unis. Elle se situe au 1600, Pennsylvania Avenue NW à Washington D.C. Le bâtiment en grès d\'Aquia Creek et peint en blanc, construit entre 1792 et 1800, s\'inspire du style géorgien. Il est le lieu de résidence, de travail et de réception de tous les présidents américains depuis John Adams, deuxième président des États-Unis, qui y entre en 1800. '),
(23, 'Un arc de triomphe, et plus généralement un arc monumental, est une structure libre monumentale enjambant une voie et utilisant la forme architecturale de l\'arc avec un ou plusieurs passages voûtés. Ce type d\'ouvrage est un des éléments les plus caractéristiques de l\'architecture romaine, utilisé pour commémorer les généraux victorieux ou les évènements importants comme le décès d\'un membre de la famille impériale ou royale, l\'accession au trône d\'un nouvel empereur ou encore les fondations de nouvelles colonies, la construction d\'une route ou d\'un pont. '),
(24, 'La place Rouge est une place de Moscou, dont elle marque le centre. Elle est bordée à l\'ouest par le Kremlin, à l\'est par Kitaï-gorod ; la cathédrale Basile-le-Bienheureux est située au sud de la place. '),
(25, 'Le mont Fuji est une montagne du centre du Japon qui se trouve sur la côte sud de l\'île de Honshu, au sud-ouest de l\'agglomération de Tokyo. Avec 3 776 mètres d\'altitude, il est le point culminant du Japon. Situé dans une région où se rejoignent les plaques tectoniques pacifique, eurasienne et philippine, la montagne est un stratovolcan toujours considéré comme actif, sa dernière éruption certaine s\'étant produite fin 1707, bien que le risque éruptif soit actuellement considéré comme faible. '),
(26, 'Le palais de Buckingham est la résidence officielle des souverains britanniques. Situé dans la Cité de Westminster à Londres, le palais est à la fois le lieu où se produisent plusieurs événements en relation avec la famille royale, le lieu d\'accueil lors de visites de nombre de chefs d\'État, ainsi qu\'une attraction touristique de premier plan. Il est le point de convergence du peuple britannique lors des moments de joie, de crise et de peine. Le palais de Buckingham, ou tout simplement « le Palais », désigne la source des déclarations de presse émanant de bureaux royaux. Construit pour John Sheffield, duc de Buckingham et Normanby, en 1703, il est le lieu de résidence de la monarchie britannique. Il est agrandi au cours du XIXe siècle par John Nash pour le roi George IV. '),
(27, 'Le mont Rushmore est un sommet américain du massif des Black Hills, transformé en mémorial, situé dans le territoire de la ville de Keystone, près de Rapid City, dans l\'État du Dakota du Sud. Consistant en une sculpture monumentale de granite réalisée entre 1927 et 1941, il retrace cent cinquante ans de l\'histoire des États-Unis. '),
(28, 'Le Sphinx de Gizeh est la statue thérianthrope qui se dresse devant les grandes pyramides du plateau de Gizeh, en Basse-Égypte. Sculpture monumentale monolithique la plus grande du monde avec 73,5 mètres de longueur, 14 mètres de largeur et 20,22 mètres de hauteur, elle représente un sphinx couchant. Réalisée vers 2500 av. J.-C., elle est attribuée à Khéphren, l\'un des pharaons de la IVe dynastie de l\'Ancien Empire, ou à son père, Khéops. '),
(29, 'Le Sacré-Cœur est une dévotion au cœur de Jésus-Christ, en tant que symbole de l\'amour divin par lequel Dieu a pris la nature humaine et a donné sa vie pour les hommes1. Cette dévotion est particulièrement présente au sein de l\'Église catholique mais aussi, quoiqu\'à moindre échelle, dans l\'Église anglicane et dans certaines Églises luthériennes. Elle met l\'accent sur les concepts d\'amour et d\'adoration voués au Christ. La solennité du Sacré-Cœur a été instituée par le pape Clément XIII en 1765 et étendue à toute l\'Église catholique par le pape Pie IX en 1856. '),
(30, 'La Tour d\'Afrique est un imposant monument devenu un grand carrefour giratoire de Bamako, Mali.\r\n\r\nElle se trouve à l’une des portes des plus empruntées par les voyageurs. '),
(31, 'La montagne de la Table est un massif de la province du Cap-Occidental en Afrique du Sud, qui surplombe la ville du Cap.\r\n\r\nElle fait partie des sept nouvelles merveilles de la nature. ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
