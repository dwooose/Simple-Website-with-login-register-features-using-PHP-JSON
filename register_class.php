<?php 
    class RegisterUser{
        private $username;
        private $firstname;
        private $lastname;
        private $email;
        private $gender;
        private $birthday;
        private $password;
        private $encrypted_password;

        public $error;
        public $success;
        
        private $storage = "users_info.json";
        private $stored_users;
        private $new_user;

        public function __construct($username, $firstname, $lastname, $email, $gender, $birthday, $password){
            $this->username = filter_var(trim($username), FILTER_SANITIZE_STRING);
            $this->firstname = filter_var(trim($firstname), FILTER_SANITIZE_STRING);
            $this->lastname = filter_var($lastname, FILTER_SANITIZE_STRING);
            $this->email = filter_var($email, FILTER_VALIDATE_EMAIL);
            $this->gender = filter_var($gender, FILTER_SANITIZE_STRING);
            $this->birthday = filter_var($birthday, FILTER_SANITIZE_STRING);
            $this->password = filter_var(trim($password), FILTER_SANITIZE_STRING);
            $this->encrypted_password = password_hash($this->password, PASSWORD_DEFAULT);

            $this->stored_users = json_decode(file_get_contents($this->storage), true);

            $this->new_user = [
                "username" => $this->username,
                "firstname" => $this->firstname,
                "lastname" => $this->lastname,
                "email" => $this->email,
                "gender" => $this->gender,
                "birthday" => $this->birthday,
                "password" => $this->password,
                "password_hash" => $this->encrypted_password,
            ];

            if($this->checkFieldValues()){
                $this->insertUser();
            }
        }

        private function checkFieldValues(){
            if(strlen($this->password) < 7){
                $this->error = "Password should be at least 8 characters.";
                return false;
            }
            return true;
        }
        private function userNameExists(){
            foreach($this->stored_users as $user){
                if($this->username == $user['username']){
                    $this->error = "Username already exists.";
                    return true;
                }
            }
            return false;
        }
        private function insertUser(){
            if($this->userNameExists()==FALSE){
                array_push($this->stored_users, $this->new_user);
                if(file_put_contents($this->storage, json_encode($this->stored_users, JSON_PRETTY_PRINT ))){
                    return $this->success = "Registration Successful!";
                }else{
                    return $this->error = "Something went wrong, please try again";
                }
            }
        }
    }

?>