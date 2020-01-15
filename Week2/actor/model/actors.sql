CREATE TABLE IF NOT EXISTS actors (
	id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
        firstname VARCHAR(250) NOT NULL,
        lastname VARCHAR(250) NOT NULL,
        dob VARCHAR(25) NOT NULL,
        height VARCHAR(100) NOT NULL
        
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

INSERT INTO actors (firstname, lastname, dob, height) VALUES ('Robin', 'Williams', '07/21/1951', '5 feet 7 inches');
INSERT INTO actors (firstname, lastname, dob, height) VALUES ('John', 'DiMaggio', '09/04/1968', '6 feet 4 inches');
INSERT INTO actors (firstname, lastname, dob, height) VALUES ('Dave', 'Chappelle', '08/24/1973', '6 feet 0 inches');
INSERT INTO actors (firstname, lastname, dob, height) VALUES ('Eric', 'Andre', '04/04/1983', '6 feet 0 inches');
INSERT INTO actors (firstname, lastname, dob, height) VALUES ('Arin', 'Hanson', '01/06/1987', '6 feet 2 inches');