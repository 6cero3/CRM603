CREATE TABLE `reports` (
  `id` int NOT NULL AUTO_INCREMENT,
  `folio` varchar(20) NOT NULL UNIQUE,
  `type` varchar(50) NOT NULL,
  `anonymous` tinyint(1) DEFAULT 0,
  `name` varchar(100) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `description` text,
  `lat` decimal(10,7) DEFAULT NULL,
  `lng` decimal(10,7) DEFAULT NULL,
  `evidence` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Pendiente',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
