CREATE TABLE IF NOT EXISTS `products` (
 `id` int(9) NOT NULL,
 `product` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
 `price` float NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
ALTER TABLE `products` ADD PRIMARY KEY (`id`);
ALTER TABLE `products` MODIFY `id` int(9) NOT NULL AUTO_INCREMENT;
INSERT INTO `products` (`id`, `product`, `price`) VALUES
(1, 'Product 1', 1.5),
(2, 'Product 2', 5),
(3, 'Product 3', 7.5),
(4, 'Product 4', 4.43);

GO

DROP TABLE IF EXISTS `authorized_users`;

CREATE TABLE `authorized_users` (
  `userid` varchar(64) NOT NULL,
  `passwd` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `authorized_users` VALUES ('user1','$2y$10$4e0MPBxUFwUM8yvIHk9wweSzjMVAeZnl9tgMOFSd3rlzjjOMXBv5u'),
('user2','$2y$10$sfTCuObDpcKaE63kdSZTn.LK9I/8qXUt.5Yk4fQTOCwLgxbWrN9Fi'),
('user3','$2y$10$RW6ECrM7eaxjz73bELxRvOnfmHrWC8CkGji/.a08vqVRlQArfDv8m');

GO

DROP TABLE IF EXISTS `carts`;

CREATE TABLE `carts` (
  cart_id int AUTO_INCREMENT NOT NULL,  
  `userid` varchar(64) NOT NULL,
  `productid` int(9) NOT NULL,
  `modifieddate` DATETIME NOT NULL,
  PRIMARY KEY (`cart_id`),
  CONSTRAINT FK_UserID FOREIGN KEY (userid) REFERENCES authorized_users(userid),
  CONSTRAINT FK_ProductID FOREIGN KEY (productid) REFERENCES products(id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

GO
