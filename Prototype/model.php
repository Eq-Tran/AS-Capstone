<?php
function addUser ($username, $email, $pass, $firstname, $middlename, $lastname, $birthday, $profile_image, $image_test, $create_time) {
        global $db;
        
        $stmt = $db->prepare("INSERT INTO users SET username = :username, email = :email, pass = :pass, firstname = :firstname, middlename = :middlename, lastname = :lastname, birthday = :birthday, profile_image = :profileimage, image_test = :imagetest, create_time = now()");

        $binds = array(
            ":username" => $username,
            ":email" => $email,
            ":pass" => $pass,
            ":firstname" => $firstname,
            ":middlename" => $middlename,
            ":lastname" => $lastname,
            ":birthday" => $birthday,
            ":profileimage" => $profile_image,
            ":imagetest" => $image_test,
            
            
        );
            
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = 'User Added';
        }
        
        return ($results);
    }  