
INSERT INTO `7ie1z_roles` (`id`, `type`) VALUES
(1, 'administrateur'),
(2, 'client'),
(3, 'producteur');


INSERT INTO `7ie1z_categories` (`id`, `name`) VALUES
(1, 'vegetables'),
(2, 'fruits'),
(3, 'meats'),
(4, 'creamery'),
(5, 'grocery');

INSERT INTO `7ie1z_clients` (`id`, `pseudo`, `mail`, `password`, `id_7ie1z_roles`) VALUES
(1, 'lilise', 'e.pery@laposte.net', '$2y$10$MSRqvWI2srYG7bOCpZ5gPe2HPzuzwxSW/8StDAs0cBZwRj8cETnum', 1),
(2, 'alex02', 'alexandrie.jo@wanadoo.fr', '$2y$10$rlrX.Lsr42.AdKFa9JH8E.xGc0YJigwdJjGJMczp3sSo7OIo7AKpm', 2),
(3, 'cécé', 'celina.S@wanadoo.fr', '$2y$10$RD9VpKmbnGPZQhyazUuu/e9iwYagtSruAcj/Wpb9gAuWnWEgqPc4K', 2),
(4, 'Mel', 'm.parizeau@wanadoo.fr', '$2y$10$i.vtIzoblzpANaUgesXSMeLZJdJgwJlqSVxKMivzpQ..S1mbLNfVq', 2),
(5, 'lundy', 'l.genereux@wanadoo.fr', '$2y$10$rwLrjfrlDKaRYc56.CnTlOn.kISFrY4OXRE3yZY1rJ04baxXNaJLy', 2),
(6, 'sisi', 's.chaussee@wanadoo.fr', '$2y$10$hWMTWEakaL8wDoOtVddVc.QBR40chjk1i3KXlDrJLzRplj3YM7veO', 2),
(7, 'gerM', 'g.doucet@wanadoo.fr', '$2y$10$77WwMJx7n4y3rSmFmuUyYunr.NWXKdix2DHSbdHcLG4NEVmNUB1Ta', 2),
(8, 'nath', 'n.abril@wanadoo.fr', '$2y$10$PWowtg7MFtctNBNnm5yYGOgWjD3ZSHPt71LO.cAWO0ZcqvnXVICSK', 2),
(9, 'chEr', 'c.hebert@wanadoo.fr', '$2y$10$V/m0D2f0dIJHH2grcwxrP.Rucf2JsIHmOAWDk4rXAueI.22Owk50C', 2),
(10, 'mimile', 'e.grivois@wanadoo.fr', '$2y$10$ym78mtR20Pb1VcuE9Tof0Or7q0osvIJjIEFCF0fDmkJd0A223Rqde', 2),
(11, 'Killian', 'killian@gmail.com', '$2y$10$idaCiczJ9BdiuexlQ/tns.xLMzCVV3n6TC6vRIl3ejxfvOn.0s45a', 2);


INSERT INTO `7ie1z_producers` (`id`, `mail`, `password`, `lastname`, `firstname`, `companyName`, `city`, `fileUrl`, `description`, `id_7ie1z_roles`) VALUES
(1, 'c.bernard@wanadoo.fr', '$2y$10$Z1SQnq2fZSybnHz3BKx7BOiYzYcMFnpwWzY6GZmYsJe4mNOEqB2p2', 'Bernard', 'Cédric', 'Aux petits délices de chèvres', 'Villemontoire', 'home/elise/www/LaBelleCampagne/assets/img/logo/goatLogo.png', 'Mon activité d\'élevage caprin est née après une longue réflexion de 7 ans en août 2017.\r\nActuellement le troupeau se compose de 26 chèvres en lactation et nous transformons la totalité en fromage.\r\nLes animaux sont nourris avec des céréales issues d\'une agriculture en agri-écologie produites près de la ferme.', 3);


--
-- AUTO_INCREMENT pour la table `7ie1z_roles`
--
ALTER TABLE `7ie1z_roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `7ie1z_categories`
--
ALTER TABLE `7ie1z_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `7ie1z_clients`
--
ALTER TABLE `7ie1z_clients`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `7ie1z_producers`
--
ALTER TABLE `7ie1z_producers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
