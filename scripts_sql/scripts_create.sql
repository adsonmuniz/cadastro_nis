CREATE SCHEMA cadastro_nis;

use cadastro_nis;

CREATE TABLE pessoa
(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(128) NOT NULL,
    nis VARCHAR(11) NOT NULL
);

ALTER TABLE pessoa ADD CONSTRAINT unique_name_in_pessoa UNIQUE (name);
ALTER TABLE pessoa ADD CONSTRAINT unique_nis_in_pessoa UNIQUE (nis);