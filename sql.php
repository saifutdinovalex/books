CREATE TABLE `books`.`author` 
( `id` INT NOT NULL AUTO_INCREMENT , 
`name` TEXT NOT NULL , 
`user_add` INT NOT NULL , 
`date_create` INT NOT NULL , 
`active` INT(1) NOT NULL, 
 PRIMARY KEY (`id`), 
INDEX (`user_add`)) ENGINE = InnoDB;



CREATE TABLE `books`.`genre` 
( `id` INT NOT NULL AUTO_INCREMENT 
, `name` TEXT NOT NULL 
, `active` INT(1) NOT NULL 
, `user_add` INT NOT NULL 
, `date_create` INT NOT NULL 
, PRIMARY KEY (`id`)
, INDEX (`user_add`)) ENGINE = InnoDB;


CREATE TABLE `books`.`books2` ( 
`id` INT NOT NULL AUTO_INCREMENT , 
`author_id` INT NOT NULL , 
`name` TEXT NOT NULL , 
`year` INT(4) NOT NULL , 
`genre` INT NOT NULL , 
`number_page` INT(5) NOT NULL , 
`picture` TEXT NOT NULL , 
`active` INT(1) NOT NULL , 
`user_add` INT NOT NULL , 
`date_create` INT NOT NULL , 
PRIMARY KEY (`id`), 
INDEX (`user_add`), 
INDEX (`genre`), 
INDEX (`author_id`)) ENGINE = InnoDB;