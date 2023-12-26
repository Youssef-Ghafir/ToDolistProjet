<?php
include 'connectiondb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_task']) && !empty($_POST['task'])) {
        $task = htmlspecialchars($_POST['task']);

        try {
            $stmt = $conn->prepare("INSERT INTO tasks (task, completed) VALUES (:task, 0)");
            $stmt->bindParam(':task', $task);
            $stmt->execute();
            echo "Task added successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

$conn = null;
?>
