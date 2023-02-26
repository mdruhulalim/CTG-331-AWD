<?php
include('database.php');
// class Question extends Database
// {
//     public function FunctionName($title, $details, $user_id,)
//     {
//         $created_at=date('y-m-d H:i:s');
//         $query="INSERT INTO `questions`(`title`, `description`, `user_id`, `created_at`) 
//         VALUES ('$title,','$details','$user_id','$created_at')";
//         $this->exec($query);
//         return true;
//     }
// }


class Question extends Database
{
    public function Question($title, $details, $user_id,)
    {
        $created_at=date('y-m-d H:i:s');
        $query = "INSERT INTO questions (title, description, user_id, created_at) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssss", $title, $details, $user_id, $created_at);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}