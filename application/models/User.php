<?php
    class User extends CI_Model {
        public function add_user($post_values)
        {
            $salt = bin2hex(openssl_random_pseudo_bytes(22));
            $encrypted_password = md5($post_values["password_register"] . "" . $salt);

            $values = array(
                "first_name" => $post_values["first_name"],
                "last_name" => $post_values["last_name"],
                "contact" => $post_values["contact_register"],
                "email" => $post_values["email"],
                "password" => $encrypted_password,
                "salt" => $salt,
            );
            return $this->db->query("INSERT INTO users(first_name, last_name, contact, email, password, salt) VALUES(?, ?, ?, ?, ?, ?)", $values);
        }

        public function login_by_contact($contact, $password)
        {
            $user = $this->db->query("SELECT * FROM users WHERE users.contact = ?", $contact)->row_array();
            if(isset($user))
            {
                $login_pass = md5($password . '' . $user["salt"]);
                if($login_pass === $user["password"])
                {
                    $return_user = array(
                        "id" => $user["id"],
                        "first_name" => $user["first_name"],
                        "last_name" => $user["last_name"],
                        "contact" => $user["contact"],
                        "updated_at" => $user["updated_at"],
                    );
                    return $return_user;
                }
                else
                {
                    $this->db->query("UPDATE users SET updated_at = ? WHERE users.id = ?", array( date("Y:m:d H:i:s") ,$user["id"]));
                }
            }
            return FALSE;
        }

        public function get_user_by_id($id) 
        {
            return $this->db->query("SELECT first_name, last_name, contact, updated_at FROM users WHERE users.id = ?", $id)->row_array();
        }
    }