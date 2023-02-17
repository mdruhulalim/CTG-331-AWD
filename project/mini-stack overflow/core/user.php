<?php
include('database.php');
class User extends Database
{
    public function insert($username, $email, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $username, $email, $password);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function userExists($username,$email)
    {
        $stmt = $this->conn->prepare("SELECT email FROM users WHERE username = ? or email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $stmt->store_result();
        $numRows = $stmt->num_rows;
        $stmt->close();
        return $numRows > 0;
    }

    public function login($username, $password)
    {
        $query = "SELECT * FROM `users` WHERE username = '$username' and password = '$password'";
        $rejult = mysqli_query($this->conn, $query);
        if(mysqli_num_rows($rejult)>0);
        return $datas=mysqli_fetch_assoc($rejult);

        // $stmt = $this->conn->prepare("SELECT email FROM users WHERE username = ? and password = ?");
        // $stmt->bind_param("ss", $username, $password);
        // $stmt->execute();
        // $stmt->store_result();
        // $numRows = $stmt->num_rows;
        // $stmt->close();
        // return $numRows > 0;
    }

    // public function login($username, $password)
    // {
    //     $stmt = $this->conn->prepare("SELECT ID, username, email, password FROM users WHERE username=? and password=?");
    //     $stmt->bind_param("ss", $username, $password);
    //     $stmt->execute();
    //     $result = $stmt->get_result();

    //     if ($result->num_rows === 1) {
    //         $user = $result->fetch_assoc();
    //         if (password_verify($password, $user['password'])) {
    //             unset($user['password']);
    //             return $user;
    //         }
    //     }

    //     return false;
    // }
}
?>