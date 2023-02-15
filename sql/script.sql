CREATE TABLE `coches` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`marca` VARCHAR(50) NOT NULL COLLATE 'utf8_spanish_ci',
	`modelo` VARCHAR(50) NOT NULL COLLATE 'utf8_spanish_ci',
	`precio` FLOAT NULL DEFAULT NULL,
	PRIMARY KEY (`id`) USING BTREE,
	UNIQUE INDEX `marca_modelo` (`marca`, `modelo`) USING BTREE
)