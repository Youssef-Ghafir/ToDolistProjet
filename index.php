<?php 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<nav class="navbar bg-dark" data-bs-theme="dark">
    <div class="container">
      <h3 class="navbar-brand" href="#">TodoList</h3>
    </div>
  </nav>
 <form action="">
  <div class="mb-3 container mt-5 mb-5 d-flex gap-2" style="width: 450px;">
    <input type="text" class="form-control" placeholder="Task Title" aria-label="Example text with two button addons">
    <button class="btn btn-primary" type="button">Add</button>
  </div>
  <div class="result-list container" style="width: 750px;">


  <?php
    include 'connectiondb.php';

    try {
        $stmt = $conn->query("SELECT * FROM tasks");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $task_id = $row['id'];
            $completed = $row['completed'] ? 'checked' : '';
            echo "
               <div class='alert $completed d-flex align-items-center justify-content-between' role='alert' id='$task_id'>
            <p class='mb-0'>". htmlspecialchars($row['task']). "</p>
            <div class='btns'>
                <button class='btn btn-primary' type='submit'>Undo</button>
                <button class='btn btn-danger' type='submit'>x</button>
            </div>
            </div>
            ";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
    ?>
  </div>
 </form>
</body>
</html>