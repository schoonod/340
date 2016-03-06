CREATE TABLE `user` (
	`userID` INT AUTO_INCREMENT,
	`email` VARCHAR(255) NOT NULL UNIQUE,
	`password` VARCHAR(20) NOT NULL,
	`seller` BIT NOT NULL DEFAULT 0,
	`registrationDate` DATE NOT NULL,
	PRIMARY KEY (`userID`)
) ENGINE=InnoDB;


CREATE TABLE `seller` (
	`sellerID` INT AUTO_INCREMENT,
	`rating` INT NOT NULL DEFAULT 0,
	`userID` INT NOT NULL,
	PRIMARY KEY (`sellerID`),
	FOREIGN KEY (`userID`) REFERENCES `user` (`userID`)
) ENGINE=InnoDB;


CREATE TABLE `products` (
	`productID` INT AUTO_INCREMENT,
	`price` DECIMAL(5,2) NOT NULL,
	`name` VARCHAR(50) NOT NULL,
	`description` TEXT(500) NOT NULL,
	`ingredients` VARCHAR(255),
	`sellerID` INT NOT NULL,
	PRIMARY KEY (`productID`),
	FOREIGN KEY (`sellerID`) REFERENCES `seller` (`sellerID`)
) ENGINE=InnoDB;


CREATE TABLE `venues` (
	`venueID` INT AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL UNIQUE,
	`dateTime` dateTime NOT NULL,
	`address` INT NOT NULL,
	`streetName` VARCHAR(255) NOT NULL,
	`city` VARCHAR(50) NOT NULL,
	`zip` INT NOT NULL,
	`sellerID` INT NOT NULL,
	PRIMARY KEY (`venueID`),
	FOREIGN KEY (`sellerID`) REFERENCES `seller` (`sellerID`)
) ENGINE=InnoDB;


CREATE TABLE `orders` (
	`orderID` INT AUTO_INCREMENT,
	`timeStamp` dateTime NOT NULL,
	`totalPrice` DECIMAL(6,2) NOT NULL,
	`sellerID` INT NOT NULL,
	`venueID` INT NOT NULL,
	PRIMARY KEY (`orderID`),
	FOREIGN KEY (`sellerID`) REFERENCES `seller` (`sellerID`),
	FOREIGN KEY (`venueID`) REFERENCES `venues` (`venueID`)
) ENGINE=InnoDB;


CREATE TABLE `products_orders` (
	`pid` INT,
	`oid` INT,
	PRIMARY KEY (`pid`, `oid`),
	FOREIGN KEY (`pid`) REFERENCES `products` (`productID`),
	FOREIGN KEY (`oid`) REFERENCES `orders` (`orderID`)
) ENGINE=INNODB;


CREATE TABLE `venues_products` (
	`vid` INT,
	`pid` INT,
	PRIMARY KEY (`vid`, `pid`),
	FOREIGN KEY (`vid`) REFERENCES `venues` (`venueID`),
	FOREIGN KEY (`pid`) REFERENCES `products` (`productID`)
) ENGINE=INNODB;

INSERT INTO user (email, password, seller, registrationDate) VALUES
("john.doe@gmail.com", "bAERT#$", 1, "2016-01-01"),
("jane.doe@gmail.com", "ksdf6@!", 0, "2016-02-01");

INSERT INTO seller (rating, userID) VALUES
("5", (SELECT userID FROM user WHERE email="john.doe@gmail.com")),
("3", (SELECT userID FROM user WHERE email="jane.doe@gmail.com"));

INSERT INTO products (price, name, description, ingredients, sellerID) VALUES
("2.99", "Banana Fritter", "This fritter is everything you want..TRUST.", "Banana, Creme, Coconut Oil", (SELECT sellerID FROM seller WHERE userID=(SELECT userID FROM user WHERE email="john.doe@gmail.com"))),
("29.99", "Organic, Free-range Baked Chicken", "This chicken is raised on GREEN. Dig it?", "Chicken Chicken Chicken", (SELECT sellerID FROM seller WHERE userID=(SELECT userID FROM user WHERE email="john.doe@gmail.com"))),
("6.99", "Artisan Bread", "This bread is rye!", "Made with whole wheat flour and homegrown yeast", (SELECT sellerID FROM seller WHERE userID=(SELECT userID FROM user WHERE email="jane.doe@gmail.com"))),
("3.99", "Cheezy poofs", "You can't eat just one cheezy poof", "", (SELECT sellerID FROM seller WHERE userID=(SELECT userID FROM user WHERE email="jane.doe@gmail.com")));

INSERT INTO venues (name, dateTime, address, streetName, city, zip, sellerID) VALUES
("The Spot", "2016-05-08 18:00:00", "1100", "Woodward Way", "Tuscon", "88504", (SELECT sellerID FROM seller WHERE userID=(SELECT userID FROM user WHERE email="john.doe@gmail.com"))),
("Food Mountain", "2016-05-09 17:30:00", "1213", "Bootlegger Lane", "Anchorage", "12345", (SELECT sellerID FROM seller WHERE userID=(SELECT userID FROM user WHERE email="jane.doe@gmail.com")));

INSERT INTO venues_products (vid, pid) VALUES
((SELECT venueID FROM venues WHERE name="The Spot"), (SELECT productID FROM products WHERE name="Banana Fritter")),
((SELECT venueID FROM venues WHERE name="The Spot"), (SELECT productID FROM products WHERE name="Organic, Free-range Baked Chicken")),
((SELECT venueID FROM venues WHERE name="Food Mountain"), (SELECT productID FROM products WHERE name="Artisan Bread")),
((SELECT venueID FROM venues WHERE name="Food Mountain"), (SELECT productID FROM products WHERE name="Cheezy poofs"));






