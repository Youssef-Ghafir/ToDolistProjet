<?php
include 'connectiondb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['delete_task']) && isset($_POST['task_id'])) {
        $task_id = $_POST['task_id'];

        try {
            $stmt = $conn->prepare("DELETE FROM tasks WHERE id = :task_id");
            $stmt->bindParam(':task_id', $task_id);
            $stmt->execute();
            echo "Task deleted successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

$conn = null;
?>
