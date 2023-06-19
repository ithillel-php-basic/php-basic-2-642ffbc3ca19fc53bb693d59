CREATE DATABASE `projects_and_work`;

CREATE TABLE `projects_and_work`.`users` (
    `id` INT NOT NULL AUTO_INCREMENT ,
    `name` VARCHAR(255) NOT NULL ,
    `email` VARCHAR(255) NOT NULL UNIQUE ,
    `password` VARCHAR(255) NOT NULL ,
     `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE `projects_and_work`.`projects`(
    `id` INT NOT NULL AUTO_INCREMENT ,
    `title` VARCHAR(255) NOT NULL ,
    `user_id` INT NOT NULL ,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    PRIMARY KEY (`id`),
    INDEX(`user_id`)
) ENGINE = InnoDB;

CREATE TABLE `projects_and_work`.`work`
(
    `id`          INT          NOT NULL AUTO_INCREMENT,
    `title`       VARCHAR(255) NOT NULL,
    `status`      VARCHAR(255) NOT NULL DEFAULT 'backlog',
    `description` TEXT NULL DEFAULT ' ',
    `file`        VARCHAR(255) NULL,
    `user_id`     INT          NOT NULL,
    FOREIGN KEY (`user_id`) REFERENCES users (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    `project_id`  INT          DEFAULT 1,
    FOREIGN KEY (`project_id`) REFERENCES projects (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    `deadline`    DATE DEFAULT NULL,
    `created_at`  TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    INDEX(`status`)
) ENGINE = InnoDB;