<?php
include('database.php');
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

    public function getAllQuestions() {
        $query = "SELECT q.*, u.username FROM questions q JOIN users u ON q.user_id = u.id";
        $result = mysqli_query($this->conn, $query);
        $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $questions;
    }
}