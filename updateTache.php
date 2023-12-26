<?php
include 'connectiondb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_task']) && isset($_POST['task_id'])) {
        $task_id = $_POST['task_id'];

        try {
            $stmt = $conn->prepare("UPDATE tasks SET completed = NOT completed WHERE id = :task_id");
            $stmt->bindParam(':task_id', $task_id);
            $stmt->execute();
            echo "Task updated successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

$conn = null;
?>
