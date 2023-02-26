<?php
include('database.php');
class User extends Database
{
    public function insert($username, $email, $password)
    {
        $password = md5($password);
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
        $password = md5($password);
        $query = "SELECT * FROM `users` WHERE username = '$username' and password = '$password'";
        $rejult = mysqli_query($this->conn, $query);
        if(mysqli_num_rows($rejult)>0);
        return mysqli_fetch_assoc($rejult);
    }
}
?>