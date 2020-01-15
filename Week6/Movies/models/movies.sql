CREATE TABLE IF NOT EXISTS movies (
	movie_id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
        movie_name VARCHAR(200) DEFAULT NULL,
        movie_year VARCHAR(10) DEFAULT NULL,
        movie_description VARCHAR(2000) DEFAULT NULL,
        movie_rating VARCHAR(10) DEFAULT NULL,
        movie_active BOOL DEFAULT true

        
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

