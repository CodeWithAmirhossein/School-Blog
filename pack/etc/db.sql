DROP TABLE `posts` IF EXISTS;
CREATE TABLE `posts` (
    `row`     INT(11) NOT NULL AUTO_INCREMENT,
    `title`   TEXT,
    `content` TEXT,
    `auther`  TEXT,
    `dt`      TEXT,
    `status`  TEXT,
    PRIMARY KEY (`row`)
);