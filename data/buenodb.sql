-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2020 at 09:24 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buenodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `galerija`
--

CREATE TABLE `galerija` (
  `id_g` int(10) NOT NULL,
  `slika_putanja` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `galerija`
--

INSERT INTO `galerija` (`id_g`, `slika_putanja`) VALUES
(1, 'assets/img/bg-img/insta1.jpg'),
(2, 'assets/img/bg-img/insta2.jpg'),
(3, 'assets/img/bg-img/insta3.jpg'),
(4, 'assets/img/bg-img/insta4.jpg'),
(5, 'assets/img/bg-img/insta5.jpg'),
(6, 'assets/img/bg-img/insta6.jpg'),
(7, 'assets/img/bg-img/insta7.jpg'),
(8, 'assets/img/bg-img/insta8.jpg'),
(9, 'assets/img/bg-img/insta9.jpg'),
(10, 'assets/img/bg-img/insta10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `id_kat` int(11) NOT NULL,
  `naziv` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `slika_putanja` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`id_kat`, `naziv`, `slika_putanja`) VALUES
(1, 'Vegetarian Food', 'assets/img/bg-img/6.jpg'),
(2, 'Deserts', 'assets/img/bg-img/4.jpg'),
(4, 'Chicken Food', 'assets/img/bg-img/17.jpg'),
(7, 'Healthy Food', 'assets/img/bg-img/4.jpg'),
(8, 'Soups', 'assets/img/bg-img/22.jpg'),
(9, 'Burgers', 'assets/img/bg-img/20.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id_korisnik` int(10) NOT NULL,
  `name` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_uloga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id_korisnik`, `name`, `lastname`, `email`, `password`, `id_uloga`) VALUES
(1, 'Helena', 'Nikolic', 'helena@gmail.com', 'd91403475649add4bde0361963a8a585', 2),
(2, 'Marko', 'Nikolic', 'marrko@gmail.com', 'a6d189cfbeeaa7f0787503651a4ebbe6', 1),
(3, 'Filip', 'Petrovic', 'filip@gmail.com', '77f5f0a8309f2908bbee19133f0d202b', 2),
(4, 'Jovana', 'Spasic', 'joksi@gmail.com', '24541cd5c89cd96bd5f2ae582779f2f2', 2),
(5, 'Stefan', 'Dimitrijevic', 'bradonja@gmail.com', 'df39a68ce526b7bffaadf3310f853b53', 2),
(6, 'Stefan', 'Aksentijevic', 'bata@gmail.com', '09befe735194a855a3f93a8033362fdf', 2),
(7, 'Aleksandar', 'Mijuskovic', 'mijusko@gmail.com', 'f6d9899c19684e08534153eb71cbfc0e', 2);

-- --------------------------------------------------------

--
-- Table structure for table `navmeni`
--

CREATE TABLE `navmeni` (
  `id_n` int(10) NOT NULL,
  `naziv` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `putanja` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(10) DEFAULT NULL,
  `pozicija` int(10) NOT NULL,
  `prikaz` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `navmeni`
--

INSERT INTO `navmeni` (`id_n`, `naziv`, `putanja`, `parent`, `pozicija`, `prikaz`) VALUES
(1, 'Home', 'index.php', NULL, 0, 0),
(2, 'Recipes', 'index.php?page=kategorije', NULL, 1, 0),
(3, 'Author', 'index.php?page=author', NULL, 2, 0),
(4, 'Login', 'index.php?page=logovanje', NULL, 3, 1),
(5, 'Register', 'index.php?page=registracija', NULL, 4, 1),
(6, 'Logout', 'models/korisnik/logout.php', NULL, 5, 2),
(7, 'Admin Panel', 'admin/pages/index.php', NULL, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `ocena`
--

CREATE TABLE `ocena` (
  `id_ocena` int(10) NOT NULL,
  `id_k` int(10) NOT NULL,
  `id_r` int(10) NOT NULL,
  `ocena` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ocena`
--

INSERT INTO `ocena` (`id_ocena`, `id_k`, `id_r`, `ocena`) VALUES
(5, 1, 7, 3),
(6, 2, 7, 5),
(7, 1, 1, 5),
(8, 1, 17, 5),
(9, 3, 17, 5),
(10, 3, 17, 5),
(11, 3, 17, 4),
(12, 3, 1, 4),
(13, 3, 26, 4),
(14, 3, 11, 5),
(15, 3, 22, 3),
(16, 3, 16, 5),
(17, 4, 1, 4),
(18, 4, 7, 5),
(19, 4, 8, 3),
(20, 4, 10, 4),
(21, 4, 13, 5),
(22, 4, 14, 4),
(23, 4, 15, 4),
(24, 4, 16, 5),
(25, 4, 17, 4),
(26, 4, 18, 5),
(27, 4, 19, 4),
(28, 4, 25, 4),
(29, 4, 26, 5),
(30, 4, 27, 5),
(31, 4, 21, 5),
(32, 4, 22, 4),
(33, 4, 23, 3),
(34, 4, 24, 4),
(35, 4, 9, 4),
(36, 4, 11, 4),
(37, 4, 12, 4),
(38, 3, 7, 4),
(39, 3, 8, 5),
(40, 3, 13, 4),
(41, 3, 10, 4),
(42, 3, 14, 4),
(43, 3, 15, 3),
(44, 3, 18, 4),
(45, 3, 19, 4),
(46, 3, 25, 5),
(47, 3, 27, 4),
(48, 3, 21, 4),
(49, 3, 23, 3),
(50, 3, 24, 4),
(51, 3, 9, 5),
(52, 3, 12, 5),
(53, 1, 8, 4),
(54, 1, 13, 4),
(55, 1, 10, 5),
(56, 1, 16, 4),
(57, 1, 15, 5),
(58, 1, 14, 4),
(59, 1, 18, 4),
(60, 1, 19, 5),
(61, 1, 25, 5),
(62, 1, 26, 4),
(63, 1, 27, 5),
(64, 1, 21, 5),
(65, 1, 22, 4),
(66, 1, 23, 4),
(67, 1, 24, 4),
(68, 1, 9, 4),
(69, 1, 11, 5),
(70, 1, 12, 5),
(71, 5, 1, 4),
(72, 5, 7, 4),
(73, 5, 8, 5),
(74, 5, 13, 4),
(75, 5, 10, 5),
(76, 5, 14, 4),
(77, 5, 15, 4),
(78, 5, 16, 5),
(79, 5, 17, 4),
(80, 5, 18, 5),
(81, 5, 19, 4),
(82, 5, 25, 4),
(83, 5, 26, 5),
(84, 5, 27, 4),
(85, 5, 21, 5),
(86, 5, 22, 4),
(87, 5, 23, 5),
(88, 5, 24, 4),
(89, 5, 9, 4),
(90, 5, 11, 5),
(91, 5, 12, 4),
(92, 6, 1, 5),
(93, 6, 7, 4),
(94, 6, 8, 4),
(95, 6, 13, 5),
(96, 6, 10, 4),
(97, 6, 16, 5),
(98, 6, 15, 4),
(99, 6, 14, 4),
(100, 6, 17, 5),
(101, 6, 18, 4),
(102, 6, 19, 4),
(103, 6, 25, 5),
(104, 6, 26, 4),
(105, 6, 27, 5),
(106, 6, 21, 4),
(107, 6, 22, 4),
(108, 6, 23, 3),
(109, 6, 24, 5),
(110, 6, 9, 5),
(111, 6, 11, 4),
(112, 6, 12, 5),
(113, 7, 1, 4),
(114, 7, 7, 4),
(115, 7, 8, 4),
(116, 7, 13, 4),
(117, 7, 10, 5),
(118, 7, 14, 5),
(119, 7, 15, 5),
(120, 7, 16, 5),
(121, 7, 17, 5),
(122, 7, 18, 5),
(123, 7, 19, 4),
(124, 7, 25, 5),
(125, 7, 26, 4),
(126, 7, 27, 4),
(127, 7, 21, 5),
(128, 7, 22, 4),
(129, 7, 23, 4),
(130, 7, 24, 5),
(131, 7, 9, 5),
(132, 7, 11, 4),
(133, 7, 12, 5);

-- --------------------------------------------------------

--
-- Table structure for table `recepti`
--

CREATE TABLE `recepti` (
  `id_r` int(10) NOT NULL,
  `naziv` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nacin_pripreme` text COLLATE utf8_unicode_ci NOT NULL,
  `sastojci` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_kat` int(10) NOT NULL,
  `slika` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `datum_kreiranja` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `vreme_pripreme` int(10) NOT NULL,
  `kalorije` int(10) NOT NULL,
  `za_posluziti` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `recepti`
--

INSERT INTO `recepti` (`id_r`, `naziv`, `nacin_pripreme`, `sastojci`, `id_kat`, `slika`, `datum_kreiranja`, `vreme_pripreme`, `kalorije`, `za_posluziti`) VALUES
(1, 'Mustardy Potato Salad With Watercress', 'Place potatoes in a medium pot and cover with water. Bring to a boil, add 2 teaspoons salt, reduce heat, and simmer until just tender, 15 to 18 minutes. Drain and run under cold water to cool. Halve any potatoes that are large and transfer to a large bowl. Meanwhile, in a medium bowl, toss cucumbers with lemon juice; let sit, tossing occasionally. When potatoes are done, using slotted spoon, transfer cucumbers to bowl with potatoes, leaving lemon juice behind. Into lemon juice, whisk mustards and 1/2 tsp salt; then toss with potatoes. Fold in watercress and herbs. ', '1 1/2 lb. baby potatoes, Kosher salt, 2 Persian cucumbers, cut into 1/4-in. pieces, 1/4 c. fresh lemon juice, 3 tbsp. whole-grain mustard, 1 tbsp. Dijon mustard, 2 c. watercress, 2 tbsp. chopped fresh dill, 2 tbsp. chopped fresh chives\r\n', 1, 'assets/img/recepti/potato-watercress-salad-recipe-main.jpg', '2020-05-25 14:18:32.714657', 30, 170, 4),
(7, 'Lemon Couscous\r\n', 'In a 2-qt saucepan, heat water to a boil. Add couscous and 1⁄2 tsp of the salt. Cover and reduce heat to low; simmer 9 minutes, stirring once.\r\nMeanwhile, in a small skillet, heat oil. Add scallion and saute 4 to 5 minutes until softened. Add garlic and cook 1 minute. Stir in lemon zest.\r\nStir scallion mixture into couscous; sprinkle with remaining salt and the pepper. Serve.', '1 1/4 c. water, 1 c. pearl couscous, \r\n3/4 tsp. kosher salt,\r\n1 tbsp. olive oil,\r\n3/4 c. sliced scallions,\r\n1 garlic clove,\r\n1 tsp. lemon zest,\r\n1/4 tsp. Pepper', 1, 'assets/img/recepti/lemon-couscous.jpg', '2020-05-30 10:03:17.125076', 14, 150, 4),
(8, 'Veggie Stuffed Shells', 'Heat oven to 400F. Cook pasta in large pot of salted boiling water, drain and cool on baking sheet as box directs.\r\nMeanwhile, heat oil in large skillet over medium-high heat. Saute broccoli, carrots, onions and garlic 3 minutes or until just tender. Add spinach and 1/2 cup water; cover and cook 2 minutes or until vegetables are tender.\r\nRemove cover; cook until liquid is mostly evaporated. from heat; stir in basil, cottage cheese, Parmesan, salt and pepper. Spread marinara sauce on bottom of 13 x 9-in. baking dish.\r\nSpoon 1 rounded Tbsp filling into each shell; arrange in baking dish. Sprinkle with mozzarella, cover tightly with foil, and bake 35 minutes until hot and bubbly.', '1 box jumbo pasta shells,\r\n2 tsp. olive oil,\r\n1/2 bunch broccoli,\r\n1 c. shredded carrots,\r\n1 small onion,\r\n1 clove garlic,\r\n1 box frozen leaf spinach,\r\n1/4 c. chopped fresh basil,\r\n1 c. lowfat small-curd cottage cheese,\r\n2 tbsp. grated Parmesan,\r\n1/4 tsp.', 1, 'assets/img/recepti/veggie-stuffed- shells.jpg', '2020-05-30 14:16:30.000000', 65, 382, 6),
(9, 'Cheese Stuffed Burgers', 'Mix the ground beef, salt and pepper in a large bowl and form the mixture into 8 equal-size balls. Press a cube of desired cheese into the center of each ball and cover completely with meat. Form the balls into hamburger patties, about 1/4-inch thick. Grill burgers until desired doneness. Top with lettuce, tomatoes, onions and pickles as desired on a toasted bun. Place the drained pimientos in a blender or food processor and puree until smooth. Using an electric mixer, combine the pimientos and cheese, beating until smooth. Beat in the mayonnaise.', '2 pounds ground beef, 1 teaspoon salt, 1/2 teaspoon pepper, 8 ounces blue cheese - cut into 1-inch cubes, 8 ounces Pimiento Cheese Spread,  8 ounces mozzarella - cut into 1-inch cubes, 4 hamburger buns, Lettuce, Sliced tomatoes, Grilled sweet onions, Slic', 9, 'assets/img/recepti/cheese-stuffed-burgers.jpeg', '2020-05-28 04:06:20.289429', 30, 400, 8),
(10, 'Butternut Squash and Kale Torte', 'Heat oven to 425F. Oil a 9-in. springform pan. Arrange half the butternut squash in the bottom of the pan, in concentric circles. Top with half the onion, separating the rings. Top with half the kale, drizzle with half the oil and season with 1/4 tsp salt. Top with the potatoes and half the provolone cheese.\r\nTop with remaining kale, drizzle with the remaining oil and season with 1/4 tsp each salt and pepper. Top with the remaining onion, tomatoes and provolone. Arrange the remaining squash on top and sprinkle with the Parmesan.\r\nCover with foil, place on baking sheet and bake for 20 minutes. Remove foil and bake until the vegetables are tender and the top is beginning to brown, 8 to 10 minutes more.', '1 tbsp. olive oil,\r\n1/2 small butternut squash (about 1 lb),\r\n1 medium Red Onion,\r\n1 small bunch kale,\r\nKosher salt and pepper,\r\n1 medium Yukon gold potato (about 6 oz),\r\n6 oz. thinly sliced provolone cheese (from the deli counter),\r\n1 plum tomato,\r\n1/4 c', 1, 'assets/img/recepti/butternut-squash-and-kale-torte.jpg', '0000-00-00 00:00:00.000000', 45, 340, 4),
(11, 'BBQ Burgers', 'Heat a large cast-iron skillet over medium-high heat for 20 minutes. Gently mix the chuck and sirloin together in a large bowl, making sure not to overwork the mixture. Combine the paprika, brown sugar, cayenne, coriander, cumin, garlic powder, mustard powder and onion powder in a small bowl. Sprinkle the spice mixture over the beef along with the Worcestershire sauce and fold gently to combine. Form the beef into 4 3/4-inch-thick patties, each about 4-inches in diameter. Sprinkle them generously with salt and a pepper. Put the patties in the hot skillet (do not press down with a spatula). When the patties are seared and browned on one side, about 3 1/2 minutes, flip and cook on the other side until browned and the burgers are medium-rare, about 3 1/2 minutes more.Put the burgers on buns and top with coleslaw and serve with potato chips if using. ', '12 ounces beef chuck - coarsely ground, 12 ounces beef sirloin - coarsely ground, 2 teaspoons smoked paprika, 1 teaspoon brown sugar, 1/2 teaspoon cayenne, 1/2 teaspoon coriander, 1/2 teaspoon cumin, 1/2 teaspoon garlic powder, 1/2 teaspoon dry mustard po', 9, 'assets/img/recepti/bbq-burgers.jpeg', '2020-05-28 22:00:00.000000', 20, 450, 4),
(12, 'Steakhouse Burger', 'Heat a large cast-iron skillet over medium-high heat for 20 minutes. For the steakhouse spice mix: Mix together the peppercorns, garlic, onion, parsley, dry mustard and red pepper flakes in a small bowl. For the burgers: Gently toss together the chuck and sirloin in a large bowl, making sure not to overwork the mixture. Form the beef into four 3/4-inch-thick patties, each about 4 inches in diameter. Sprinkle them generously with salt and a few grinds of pepper. Spread the steakhouse spice mix evenly on a plate. Coat both sides of the patties with the mixture. Place the patties in the hot skillet; do not press down with a spatula. Cook until the patties are seared and browned on one side, about 3 1/2 minutes, then flip and top each patty with one-quarter of the butter. Cook on the second side until browned and the burgers are medium-rare, about 3 1/2 minutes more. Assemble the burgers using your favorite buns, toppings and condiments. ', '2 teaspoons cracked black peppercorns, 1 1/2 teaspoons dried minced garlic, 1 1/2 teaspoons dried minced onion, 1 1/2 teaspoons dried parsley, 1/2 teaspoon dry mustard, 1/2 teaspoon crushed red pepper flakes, 12 ounces beef chuck, coarsely ground, 12 ounc', 9, 'assets/img/recepti/steakhouse-burger.jpeg', '2020-04-14 22:00:00.000000', 30, 300, 4),
(13, 'Warm Roasted Cauliflower and Spinach Salad', 'Heat oven to 425F. In a small saucepan, warm oil, spices, and 1/2 tsp salt just until hot. Finely chop shallot and place in a small bowl. Pour half of oil mixture over shallot and set aside. \r\nOn a large rimmed baking sheet, toss cauliflower with remaining oil mixture and roast until golden brown and tender, 20 to 25 minutes. \r\nAdd lentils and vinegar to shallot mixture and let sit 5 minutes. When ready to serve, toss with spinach, pecorino, pomegranate seeds, and roasted cauliflower. ', '3 tbsp. olive oil\r\n1 tsp. pumpkin pie spice\r\n1/2 tsp. ground cumin\r\n1/2 tsp. ground coriander\r\nKosher salt\r\n1 small shallot\r\n1 large head cauliflower - cut into florets (about 2 lbs)\r\n1 14-oz can lentils - rinsed\r\n3 tbsp. white wine vinegar\r\n5 c. baby spi', 1, 'assets/img/recepti/warm-roasted-cauliflower-and-spinach-salad.jpg', '2020-05-19 22:00:00.000000', 40, 270, 4),
(14, 'Chocolate Chip Cookie Delight', 'Let cookie dough stand at room temperature for 5-10 minutes to soften. Press into an ungreased 13x9-in. baking pan. Bake at 350F until golden brown, 14-16 minutes. Cool on a wire rack.\r\nIn a large bowl, beat cream cheese and confectioners\' sugar until smooth. Fold in 1-3/4 cups whipped topping. Spread over crust.\r\nIn a large bowl, whisk milk and pudding mixes for 2 minutes. Spread over cream cheese layer. Top with remaining whipped topping. Sprinkle with nuts and chocolate curls if desired.\r\nCover and refrigerate until firm, 8 hours or overnight.', '1 tube (16-1/2 ounces) refrigerated chocolate chip cookie dough, 1 package (8 ounces) cream cheese - softened, 1 cup confectioners sugar, 1 carton (12 ounces) frozen whipped topping - divided, 3 cups cold 2% milk, 1 package (3.9 ounces) instant chocolate ', 2, 'assets/img/recepti/chocolate-chip-cookie-delight.jpg', '2020-05-10 22:00:00.000000', 50, 365, 15),
(15, 'No-Bake Chocolate Chip Cannoli Cheesecake', 'Pulse cannoli shells in a food processor until coarse crumbs form. Add sugar, cracker crumbs and melted butter; pulse just until combined. Press onto bottom and sides of a greased 9-in. pie plate. Refrigerate until firm, about 1 hour.\r\nBeat the first 4 filling ingredients until blended. Beat in ricotta cheese and extracts. Stir in chocolate chips. Spread into crust.\r\nRefrigerate, covered, until set, about 4 hours. If desired, top with pistachios.', '1 package (4 ounces) cannoli shells,\r\n1/2 cup sugar,\r\n1/2 cup graham cracker crumbs,\r\n1/3 cup butter - melted,\r\n2 packages (8 ounces each) cream cheese - softened,\r\n1 cup confectioners sugar, \r\n1/2 teaspoon grated orange zest,\r\n1/4 teaspoon ground cinnamo', 2, 'assets/img/recepti/no-bake-chocolate-chip-cannoli-cheesecake.jpg', '2020-05-21 22:00:00.000000', 35, 548, 8),
(16, 'Favorite Pumpkin Cake Roll', 'Line a 15x10x1-in. baking pan with waxed paper; grease the paper and set aside. In a large bowl, beat egg yolks on high speed until thick and lemon-colored. Gradually add 1/2 cup sugar and pumpkin, beating on high until sugar is almost dissolved.\r\nIn a small bowl, beat egg whites until soft peaks form. Gradually add remaining sugar, beating until stiff peaks form. Fold into egg yolk mixture. Combine the flour, baking soda, cinnamon and salt; gently fold into pumpkin mixture. Spread into prepared pan.\r\nBake at 375F until cake springs back when lightly touched, 12-15 minutes. Cool for 5 minutes. Turn cake onto a kitchen towel dusted with confectioners sugar. Gently peel off waxed paper. Roll up cake in the towel jelly-roll style, starting with a short side. Cool completely on a wire rack.\r\nIn a small bowl, beat the cream cheese, butter, confectioners\' sugar and vanilla until smooth. Unroll cake; spread filling evenly to within 1/2 in. of edges. Roll up again, without towel. Cover and freeze until firm. May be frozen for up to 3 months. Remove from the freezer 15 minutes before cutting. If desired, dust with confectioners sugar.', '3 large eggs - separated - room temperature,\r\n1 cup sugar - divided,\r\n2/3 cup canned pumpkin,\r\n3/4 cup all-purpose flour,\r\n1 teaspoon baking soda,\r\n1/2 teaspoon ground cinnamon,\r\n1/8 teaspoon salt,\r\n8 ounces cream cheese - softened,\r\n2 tablespoons butter ', 2, 'assets/img/recepti/favorite-pumpkin-cake-roll.jpg', '2020-05-24 22:00:00.000000', 65, 285, 10),
(17, 'Mozzarella-Stuffed Chicken Parm', 'Preheat oven to 425F. Using a sharp paring knife, cut a deep slit into each chicken breast. Stuff pockets with mozzarella then press edges of the chicken together to seal the chicken. Season outside of chicken with salt and pepper.\r\nPut the flour, eggs and panko bread crumbs into three separate shallow bowls. Into the panko bread crumbs, whisk in garlic powder, dried oregano, 1/4 cup Parmesan and 1/2 teaspoon salt.\r\nDip the stuffed chicken in flour, shaking off excess, then dip the chicken into egg, tossing to coat. Dredge chicken in bread crumbs, making sure the chicken is evenly coated.\r\nIn a large skillet over medium heat, heat a thin layer of olive oil. Add chicken to skillet and cook until golden on both sides, about 4 minutes per side. Pour marinara around chicken and scatter basil on top of marinara. Turn off heat then sprinkle remaining Parmesan on top of chicken.\r\nTransfer skillet to oven and bake until the chicken is cooked through, about 20 minutes more. Garnish with parsley and serve warm.', '1 lb. boneless skinless chicken breasts,\r\n8 oz. fresh mozzarella,\r\nKosher salt,\r\nFreshly ground black pepper,\r\n1 c. all-purpose flour,\r\n3 Eggs - beaten,\r\n1 c. panko bread crumbs,\r\n1 tsp. dried oregano,\r\n1/2 tsp. garlic powder,\r\n1/2 c. freshly grated Parme', 4, 'assets/img/recepti/mozzarella-stuffed-chicken-parm.jpg', '2020-05-26 22:00:00.000000', 50, 350, 4),
(18, 'Parmesan Chicken Cutlets', 'Using a sharp knife, cut chicken breasts in half crosswise. Lay halves between 2 pieces of plastic wrap and place on a cutting board. Use a meat tenderizer or rolling pin to flatten chicken to 1/4 thickness. Season chicken on both sides with salt and pepper. \r\nPlace eggs and flour in 2 separate shallow bowls. In a third shallow bowl, combine panko, Parmesan, lemon zest, and cayenne. Season with salt and pepper. \r\nWorking with one at a time, dip chicken cutlets into flour, then eggs, and then panko mixture, pressing to coat. \r\nIn a large skillet over medium heat, heat 2 tablespoons oil. Add chicken and cook until golden and cooked through, 2 to 3 minutes per side. Work in batches as necessary, adding more oil when needed. \r\nServe with lemon wedges.', '4 boneless skinless chicken breasts,\r\nKosher salt,\r\nFreshly ground black pepper,\r\n3 large eggs - beaten,\r\n1 c. all-purpose flour,\r\n2 1/4 c. panko,\r\n3/4 c. freshly grated Parmesan,\r\n2 tsp. lemon zest,\r\n1/2 tsp. cayenne pepper,\r\nVegetable oil,\r\nLemon wedges', 4, 'assets/img/recepti/parmesan-chicken-cutlets.jpg', '2020-05-27 22:00:00.000000', 40, 300, 8),
(19, 'Cold Spiced Chicken', 'Heat oven to 450F. In a large bowl, combine sugar, paprika, coriander, chili powder, garlic powder, and 1 tsp each salt and pepper.\r\nPat chicken dry, then toss in spices to coat. Place drumsticks on a rimmed baking sheet and roast, turning after 10 minutes, until golden brown and cooked through, 15 to 25 minutes. Let cool slightly, then chill. If desired, sprinkle with parsley before serving.', '2 tbsp. light brown sugar,\r\n1 tbsp. sweet paprika,\r\n2 tsp. ground coriander,\r\n1 tsp. chili powder,\r\n1 tsp. garlic powder,\r\nKosher salt and pepper,\r\n16 small chicken drumsticks (3 to 4 lbs),\r\n1 tbsp. flat-leaf parsley - chopped - for serving', 4, 'assets/img/recepti/cold-spiced-chicken-recipe.jpg', '2020-05-26 22:00:00.000000', 35, 210, 8),
(20, 'Sheet Pan Chicken Nachos', 'Heat oven to 450F. On a large rimmed baking sheet, toss together chips, chicken, half of Cheddar, and beans. Sprinkle remaining Cheddar on top and bake until cheese is melted and beans are heated through, 6 to 7 minutes. \r\nMeanwhile, in a blender, puree avocado, lime juice, oil, cilantro stems, 2 Tbsp cilantro leaves, 2 Tbsp water, and pinch salt until smooth, adding more water if needed. \r\nDrizzle sauce over nachos and sprinkle with radishes, jalapeño, and remaining cilantro.', '6 oz. tortilla chips (about 7 cups),\r\n2 1/2 c. cups shredded white-meat rotisserie chicken,\r\n4 oz. sharp white Cheddar cheese, - coarsely grated (about 2 cups),\r\n1 15-oz. can low-sodium canned black beans -  rinsed\r\n1/2 ripe avocado,\r\n1/4 c. fresh lime ju', 4, 'assets/img/recepti/sheet-pan-chicken-nachos.jpg', '2020-05-29 22:00:00.000000', 25, 585, 4),
(21, 'Spiced carrot & lentil soup', 'Heat a large saucepan and dry-fry 2 tsp cumin seeds and a pinch of chilli flakes for 1 min, or until they start to jump around the pan and release their aromas.\r\nScoop out about half with a spoon and set aside. Add 2 tbsp olive oil, 600g coarsely grated carrots, 140g split red lentils, 1l hot vegetable stock and 125ml milk to the pan and bring to the boil. \r\nSimmer for 15 mins until the lentils have swollen and softened.\r\nWhizz the soup with a stick blender or in a food processor until smooth (or leave it chunky if you prefer).\r\nSeason to taste and finish with a dollop of plain yogurt and a sprinkling of the reserved toasted spices. Serve with warmed naan breads.', '2 tsp cumin seeds,\r\npinch chilli flakes,\r\n2 tbsp olive oil,\r\n600g carrots - washed and coarsely grated,\r\n140g split red lentils,\r\n1l hot vegetable stock (from a cube is fine),\r\n125ml milk,\r\nnaan bread - to serve', 8, 'assets/img/recepti/spiced-carrot-lentil-soup.jpg', '2020-05-29 22:00:00.000000', 25, 238, 4),
(22, 'Russian wild mushroom & barley soup', 'Cover the porcini mushrooms with 750ml boiling water and leave to soak. Heat the olive oil and butter in a large saucepan and add the chopped mushrooms, carrot and celery. Fry over a medium-high heat for around 10 mins or until the carrots are beginning to turn dark gold. Add the barley and stir the mixture for about 2 mins, then pour in the stock. Drain the porcini, retaining the soaking liquor, and cut up any large bits. Add these to the pan, along with the liquor. Bring to the boil, then turn the heat down and simmer for 30 mins (it might take a bit longer) until the barley is tender. Taste for seasoning. Stir in the dill. Serve with a dollop of soured cream on top of each bowlful and crusty bread on the side.', '30g dried porcini mushrooms,\r\n1 1/2 tbsp olive oil,\r\n20g unsalted butter,\r\n250g mushrooms - roughly chopped,\r\n1 medium carrot - peeled and finely diced,\r\n1 celery stick - finely diced,\r\n200g pearl barley,\r\n800ml chicken - beef or veal stock,\r\nsmall bunch ', 8, 'assets/img/recepti/russian-wild-mushroom-and-barley-soup.jpg', '2020-06-02 22:00:00.000000', 60, 217, 6),
(23, 'Mushroom soup', 'Heat the butter in a large saucepan and cook the onions and garlic until soft but not browned, about 8-10 mins. Add the mushrooms and cook over a high heat for another 3 mins until softened. Sprinkle over the flour and stir to combine. Pour in the chicken stock, bring the mixture to the boil, then add the bay leaf and simmer for another 10 mins. Remove and discard the bay leaf, then remove the mushroom mixture from the heat and blitz using a hand blender until smooth. Gently reheat the soup and stir through the cream (or, you could freeze the soup at this stage – simply stir through the cream when heating). Scatter over the parsley, if you like, and serve.', '90g butter,\r\n2 medium onions - roughly chopped,\r\n1 garlic clove - crushed,\r\n500g mushrooms finely chopped (chestnut or button mushrooms work well),\r\n2 tbsp plain flour,\r\n1l hot chicken stock,\r\n1 bay leaf,\r\n4 tbsp single cream,\r\nsmall handful flat-leaf par', 8, 'assets/img/recepti/mushroom_soup.jpg', '2020-06-08 22:00:00.000000', 35, 310, 4),
(24, 'Lentil soup', 'Heat the stock in a large pan and add the lentils. Bring back to the boil and allow the lentils to soften for a few mins. Add the carrots and leeks to the lentils and season (don\'t add salt if you use ham stock as it will make it too salty). Bring to the boil, the reduce the heat, cover and simmer for 45-60 mins until the lentils have broken down. Scatter over the parsley and serve with buttered bread, if you like. ', '2l veg or ham stock,\r\n150g red lentils,\r\n6 carrots - finely chopped,\r\n2 medium leeks - sliced (300g),\r\nsmall handful chopped parsley to serve', 8, 'assets/img/recepti/lentil_soup.jpg', '2020-05-29 22:00:00.000000', 70, 220, 4),
(25, 'Pan-Seared Salmon with Kale and Apple Salad', 'Bring the salmon to room temperature 10 minutes before cooking.\r\nMeanwhile, whisk together the lemon juice, 2 tablespoons of the olive oil and 1/4 teaspoon salt in a large bowl. Add the kale, toss to coat and let stand 10 minutes.\r\nWhile the kale stands, cut the dates into thin slivers and the apple into matchsticks. Add the dates, apples, cheese and almonds to the kale. Season with pepper, toss well and set aside.\r\nSprinkle the salmon all over with 1/2 teaspoon salt and some pepper. Heat the remaining 1 tablespoon oil in a large nonstick skillet over medium-low heat. Raise the heat to medium-high. Place the salmon, skin-side up in the pan. Cook until golden brown on one side, about 4 minutes. Turn the fish over with a spatula, and cook until it feels firm to the touch, about 3 minutes more.\r\nDivide the salmon, salad and rolls evenly among four plates.', 'our 5-ounce center-cut salmon fillets (about 1-inch thick),\r\n3 tablespoons fresh lemon juice,\r\n3 tablespoons olive oil,\r\nKosher salt,\r\n1 bunch kale - ribs removed - leaves very thinly sliced,\r\n1/4 cup dates,\r\n1 Honeycrisp apple,\r\n1/4 cup finely grated pec', 7, 'assets/img/recepti/pan-seared-salmon-with-kale-and-apple-salad.jpeg', '2020-06-09 22:00:00.000000', 40, 620, 4),
(26, 'Breakfast Casserole', 'Heat a large nonstick skillet over medium heat. Add the turkey and scallions and cook, stirring to break up any large chunks, until browned and cooked through, about 10 minutes. Remove from heat and let cool slightly.\r\nWhisk the eggs, egg whites, milk and 1/2 teaspoon each salt and pepper in a large bowl until combined. Add the cooked sausage, spinach, cheeses and bread and toss to distribute ingredients evenly.\r\nSpray a 3-quart casserole dish with cooking spray. Spread the egg mixture evenly in the dish. Cover and refrigerate for at least 6 hours or preferably overnight.\r\nPreheat the oven to 350 degrees F. Bake the casserole, uncovered, until set and lightly browned on top, about 30 minutes.', '8 ounces spicy or sweet turkey sausage links - meat crumbled\r\n2 scallions - sliced,\r\n6 large eggs and 6 large egg whites,\r\n1 3/4 cups 1-percent milk,\r\nKosher salt and freshly ground black pepper,\r\nOne 9-ounce package frozen chopped spinach,\r\n3/4 cup shred', 7, 'assets/img/recepti/breakfast-casserole.jpeg', '2020-06-01 22:00:00.000000', 40, 340, 6),
(27, 'Slow-Cooker Pork Tacos', 'Put the ancho and pasilla chiles and the garlic in a bowl; add 2 to 3 tablespoons water. Microwave on high until soft and pliable, 2 to 3 minutes. Stem and seed the chiles; peel the garlic. Transfer the chiles and garlic to a blender.\r\nAdd the chipotles, onion, 2 tablespoons olive oil, honey, vinegar, 1 tablespoon salt and the oregano to the blender; puree until smooth. Heat the remaining 1 tablespoon oil in a large skillet over high heat; add the chile sauce and fry, stirring, until thick and fragrant, about 8 minutes. Pour in the broth and reduce until slightly thickened.\r\nSeason the pork all over with salt and pepper and transfer to a large slow cooker. Add the bay leaves and cinnamon stick, then pour in the sauce. Cover and cook on high until the meat is tender, about 5 hours. (Or cook the meat in a large Dutch oven, covered, for 1 hour 45 minutes at 350 degrees; uncover and cook 30 more minutes.)\r\nDiscard the bay leaves and cinnamon stick. Shred the pork with 2 forks; season with salt and pepper. Serve the shredded pork in the tortillas, along with toppings.', '3 whole ancho chiles,\r\n3 whole pasilla chiles,\r\n4 cloves garlic - unpeeled,\r\n2 to 3 chipotles in adobo sauce,\r\n1/2 medium white onion, roughly chopped,\r\n3 tablespoons extra-virgin olive oil,\r\n2 tablespoons honey,\r\n1 tablespoon cider vinegar,\r\nKosher salt,', 7, 'assets/img/recepti/slow-cooker-pork-tacos.jpeg', '2020-05-20 22:00:00.000000', 75, 400, 8);

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE `uloga` (
  `id_uloga` int(10) NOT NULL,
  `uloga` varchar(35) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`id_uloga`, `uloga`) VALUES
(1, 'admin'),
(2, 'korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `galerija`
--
ALTER TABLE `galerija`
  ADD PRIMARY KEY (`id_g`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id_korisnik`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_uloga` (`id_uloga`);

--
-- Indexes for table `navmeni`
--
ALTER TABLE `navmeni`
  ADD PRIMARY KEY (`id_n`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `ocena`
--
ALTER TABLE `ocena`
  ADD PRIMARY KEY (`id_ocena`),
  ADD KEY `id_k` (`id_k`) USING BTREE,
  ADD KEY `id_r` (`id_r`) USING BTREE;

--
-- Indexes for table `recepti`
--
ALTER TABLE `recepti`
  ADD PRIMARY KEY (`id_r`),
  ADD KEY `id_kat` (`id_kat`) USING BTREE;

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
  ADD PRIMARY KEY (`id_uloga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `galerija`
--
ALTER TABLE `galerija`
  MODIFY `id_g` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `id_kat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id_korisnik` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `navmeni`
--
ALTER TABLE `navmeni`
  MODIFY `id_n` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ocena`
--
ALTER TABLE `ocena`
  MODIFY `id_ocena` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `recepti`
--
ALTER TABLE `recepti`
  MODIFY `id_r` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
  MODIFY `id_uloga` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`id_uloga`) REFERENCES `uloga` (`id_uloga`);

--
-- Constraints for table `ocena`
--
ALTER TABLE `ocena`
  ADD CONSTRAINT `ocena_ibfk_1` FOREIGN KEY (`id_r`) REFERENCES `recepti` (`id_r`),
  ADD CONSTRAINT `ocena_ibfk_2` FOREIGN KEY (`id_k`) REFERENCES `korisnik` (`id_korisnik`);

--
-- Constraints for table `recepti`
--
ALTER TABLE `recepti`
  ADD CONSTRAINT `recepti_ibfk_3` FOREIGN KEY (`id_kat`) REFERENCES `kategorija` (`id_kat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
