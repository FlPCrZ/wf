create table if not exists role(
	id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    label VARCHAR(255) NOT NULL,
    description blob NOT NULL
) engine InnoDB;

create table if not exists `user`(
	id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nickname VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    roleId int unsigned not null,
    foreign key (roleId) references role(id)    
) engine InnoDB;

create table if not exists projectUser(
	projectId INTEGER UNSIGNED,
    userId INTEGER UNSIGNED,
    PRIMARY KEY (projectId, userId),
    FOREIGN KEY (userId) REFERENCES `user`(id),
    FOREIGN KEY (projectId) REFERENCES project(id)
) engine InnoDB;
