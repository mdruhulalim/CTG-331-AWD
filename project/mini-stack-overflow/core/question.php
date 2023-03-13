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

    public function getAllQuestions()
    {
        $query = "SELECT q.*, u.username FROM questions q JOIN users u ON q.user_id = u.id";
        $result = mysqli_query($this->conn, $query);
        $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $questions;
    }

    public function getOneQuestion($q_id)
    {
        $query = "SELECT * FROM `questions` WHERE ID=$q_id";
        $result = mysqli_query($this->conn, $query);
        $question = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $question;
    }

    public function addAnswer($question_id, $user_id, $answer_text)
    {
        $query = "INSERT INTO answers (question_id, user_id, details) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $question_id, $user_id, $answer_text);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getAnswer($q_id)
    {
        $query = "SELECT details FROM `answers` WHERE question_id = $q_id";
        $stmt = mysqli_query($this->conn, $query);
        $answer = mysqli_fetch_all($stmt, MYSQLI_ASSOC);
        return $answer;
    }

    public function updateQuestion($title, $description, $q_id)
    {
        $query = "UPDATE questions SET title=?, description=? WHERE ID = $q_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $title, $description);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}