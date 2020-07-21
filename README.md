# echo

#Mysql

```
CREATE TABLE `customer` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`phone` CHAR(10) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`address` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`IDcard` INT(13) NULL DEFAULT NULL,
	`buy_productID` INT(11) NULL DEFAULT NULL,
	`paymentID` INT(11) NULL DEFAULT NULL,
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `buy_productID` (`buy_productID`) USING BTREE,
	INDEX `paymentID` (`paymentID`) USING BTREE,
	CONSTRAINT `FK_customer_buy_product` FOREIGN KEY (`buy_productID`) REFERENCES `echo`.`buy_product` (`id`) ON UPDATE RESTRICT ON DELETE RESTRICT,
	CONSTRAINT `FK_customer_payment` FOREIGN KEY (`paymentID`) REFERENCES `echo`.`payment` (`id`) ON UPDATE RESTRICT ON DELETE RESTRICT
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;

```

```
CREATE TABLE `product` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`price` DECIMAL(10,2) NULL DEFAULT NULL,
	`detail` TEXT(65535) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`photo` TEXT(65535) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;

```

```
CREATE TABLE `buy_product` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`sum_price` DECIMAL(10,2) NULL DEFAULT NULL,
	`amount` INT(11) NULL DEFAULT NULL,
	`active` TINYINT(4) NULL DEFAULT NULL,
	`productID` INT(11) NULL DEFAULT NULL,
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `productID` (`productID`) USING BTREE,
	CONSTRAINT `FK_buy_product_product` FOREIGN KEY (`productID`) REFERENCES `echo`.`product` (`id`) ON UPDATE RESTRICT ON DELETE RESTRICT
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;

```

```
CREATE TABLE `payment` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`credit` DECIMAL(10,0) NULL DEFAULT NULL,
	`price` DECIMAL(10,2) NULL DEFAULT NULL,
	`buy_productID` INT(11) NULL DEFAULT NULL,
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `buy_productID` (`buy_productID`) USING BTREE,
	CONSTRAINT `FK_payment_buy_product` FOREIGN KEY (`buy_productID`) REFERENCES `echo`.`buy_product` (`id`) ON UPDATE RESTRICT ON DELETE RESTRICT
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
;

```