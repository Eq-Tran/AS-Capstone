CREATE TABLE if not exists movie_reviews (
	movie_review_id INT UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
        movie_id INT DEFAULT NULL,
        movie_review_rating INT DEFAULT NULL,
        movie_review_narrative VARCHAR(2000) DEFAULT NULL

        
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;

