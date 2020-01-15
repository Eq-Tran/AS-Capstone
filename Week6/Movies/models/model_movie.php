<?php

    include (__DIR__ . '/db.php');
    
    function addMovie ($movie_name, $movie_year, $movie_rating, $movie_description, $movie_active ) {
       global $db;
        
        $stmt = $db->prepare("INSERT INTO movies SET movie_name = :mname, movie_year = :myear, movie_rating = :mrating, movie_description = :mdescription, movie_active =:mactive");

        $binds = array(
            ":mname" => $movie_name,
            ":myear" => $movie_year,
            ":mrating" => $movie_rating,
            ":mdescription" => $movie_description,
            ":mactive" => $movie_active   
        );
            
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'Data Added';
        }
        
        return ($results);
    }
    
    function listMovies () {
        global $db;
        
        $results = [];
        $sql = "SELECT m.movie_id, movie_name, movie_description, movie_year, movie_rating, COUNT(*) AS number_of_reviews, AVG(movie_review_rating) AS avg_rating FROM movies m ";
        $sql .= "LEFT OUTER JOIN movie_reviews r ON m.movie_id=r.movie_id GROUP BY m.movie_id;";
        
        
        $stmt = $db->prepare($sql);
 
        if ( $stmt->execute() && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetchAll(PDO::FETCH_ASSOC);               
         }
         
         return ($results);
    }
    
    function getMovie ($movie_id) {
        global $db;
        
        $results = [];
        $sql = "SELECT m.movie_id, movie_name, movie_description, movie_year, movie_rating, COUNT(*) AS number_of_reviews, ";
        $sql .= "AVG(movie_review_rating) AS avg_rating FROM movies m LEFT OUTER JOIN movie_reviews r ON m.movie_id=r.movie_id";
        $sql .= " WHERE m.movie_id=:id GROUP BY m.movie_id;";
        
        
        $stmt = $db->prepare($sql);
         $binds = array(
            "id" => $movie_id
        );
        if ( $stmt->execute($binds) && $stmt->rowCount() > 0 ) {
             $results = $stmt->fetch(PDO::FETCH_ASSOC);               
         }
         
         return ($results);
    }
    
    //function getMovieReviews ($id) {
        // must implement
    //}
    
    //function insertMovieReview ($id, $movie_review_rating, $movie_review_narrative) {
         
    //}
    
    function checkLogin ($user, $pass) {
       global $db;
       
       $results = [];
       $stmt = $db->prepare("SELECT * FROM user WHERE user_name = :user AND pass = sha1(:pass)");
       
       $binds = array(
           ":userame" => $user,
           ":password" => $pass
       
        );
       
       if($stmt->execute($binds) && $stmt->rowCount() > 0){
          
          $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
          
       }
       else{
           
           return (false);
           
       }
       
       
       return ($results);
       
   }
   
