
CREATE TABLE utilisateurs (
	id         	        INT UNSIGNED       NOT NULL AUTO_INCREMENT,
	identifiant         VARCHAR(255)       NOT NULL,
    mot_de_passe        VARCHAR(255)       NOT NULL,
    PRIMARY KEY(id)
)
ENGINE = InnoDB;

INSERT INTO utilisateurs VALUES (NULL, 'p21-admin', SHA2('P21&pWd514', 256));