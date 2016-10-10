CREATE TABLE `kontakt` (
`id` INT( 5 ) UNSIGNED NOT NULL AUTO_INCREMENT ,
`vorname` VARCHAR( 50 ) NOT NULL ,
`nachname` VARCHAR( 50 ) ,
`betreff` VARCHAR( 50 ) ,
`kategorie` VARCHAR( 20 ) ,
`email` VARCHAR( 50 ) NOT NULL ,
`message` TEXT NOT NULL ,
PRIMARY KEY ( `id` ) 
);

---

CREATE TABLE `newsletter` (
`email` VARCHAR( 50 ) NOT NULL UNIQUE,
`vorname` VARCHAR( 50 ) NOT NULL ,
`nachname` VARCHAR( 50 ) ,
PRIMARY KEY ( `email` ) 
);

---

CREATE TABLE `users` (
`email` VARCHAR( 50 ) NOT NULL UNIQUE,
`user` VARCHAR( 20 ) NOT NULL ,
`password` VARCHAR( 32 ) NOT NULL ,
`vorname` VARCHAR( 50 ) NOT NULL ,
`nachname` VARCHAR( 50 ) ,
`strasse` VARCHAR( 50 ) ,
`hausnr` VARCHAR( 5 ) ,
`land` VARCHAR( 3 ) ,
`telefon` VARCHAR( 30 ) ,
PRIMARY KEY ( `email` ) 
);

---

CREATE TABLE `admin` (
`email` VARCHAR( 50 ) NOT NULL UNIQUE,
`admin` VARCHAR( 20 ) NOT NULL ,
`password` VARCHAR( 32 ) NOT NULL ,
PRIMARY KEY ( `email` ) 
);

---

CREATE TABLE `merch` (
`artikelnr` INT( 5 ) UNSIGNED NOT NULL AUTO_INCREMENT ,
`artikelnrextern` INT( 5 ) NOT NULL ,
`bezeichnung` VARCHAR( 50 ) NOT NULL,
`preis` FLOAT( 20 ) NOT NULL,
`bild` VARCHAR( 50 ) NOT NULL ,
`bildlink` VARCHAR( 50 ) NOT NULL ,
`beschreibung` TEXT ,
PRIMARY KEY ( `artikelnr` ) 
);


