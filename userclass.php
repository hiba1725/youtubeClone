<?php

    class UserClass {
        /* User Login */
        public function userLogin($email,$password)
        {
            try{
            $db = getDB();
            $hash_password= hash('sha256', $password); //Password encryption 
            $stmt = $db->prepare("SELECT id FROM users WHERE (email=:email) AND password=:hash_password");
            $stmt->bindParam("email", $email,PDO::PARAM_STR) ;
            $stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
            $stmt->execute();
            $count=$stmt->rowCount();
            $data=$stmt->fetch(PDO::FETCH_OBJ);
            $db = null;
            if($count) {
                $_SESSION['email']=$data->email; // Storing user session value
                return true;
                } else {
                    return false;
                }
            } catch(PDOException $e) {
                echo '{"error":{"text":'. $e->getMessage() .'}}';
            }

        }

        /* User Registration */
        public function userRegistration($username,$password,$email)
        {
            try {
            $db = getDB();
            $st = $db->prepare("SELECT id FROM users WHERE username=:username OR email=:email");
            $st->bindParam("username", $username,PDO::PARAM_STR);
            $st->bindParam("email", $email,PDO::PARAM_STR);
            $st->execute();
            $count=$st->rowCount();
            if($count<1) {
                $stmt = $db->prepare("INSERT INTO users(username,password,email) VALUES (:username,:hash_password,:email)");
                $stmt->bindParam("username", $username,PDO::PARAM_STR) ;
                $hash_password= hash('sha256', $password); //Password encryption
                
                echo '<script> alert('.$hash_password.'); </script>';
                $stmt->bindParam("hash_password", $hash_password,PDO::PARAM_STR) ;
                $stmt->bindParam("email", $email,PDO::PARAM_STR) ;
                $stmt->execute();
                $id=$db->lastInsertId(); // Last inserted row id
                $db = null;
                $_SESSION['email']=$email;
                    return true;
                } else {
                    $db = null;
                    return false;
                }

            } catch(PDOException $e) {
                echo '{"error":{"text":'. $e->getMessage() .'}}';
            }
        }

        /* User Details */
        public function userDetails($id)
        {
        try{
            $db = getDB();
            $stmt = $db->prepare("SELECT email,username FROM users WHERE id=:id");
            $stmt->bindParam("id", $id,PDO::PARAM_INT);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_OBJ); //User data
            return $data;
            }
            catch(PDOException $e) {
                echo '{"error":{"text":'. $e->getMessage() .'}}';
            }
        }
    }

?>