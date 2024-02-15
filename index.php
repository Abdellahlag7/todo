<?php
$db = mysqli_connect('localhost','root','','todolist');
if(isset($_POST['submit'])){
    $task =$_POST['task'];
    mysqli_query($db,"INSERT INTO tasks (task) VALUES ('$task')");
    header('location: index.php');
}

// Récupérer les tâches depuis la base de données
$result = mysqli_query($db, "SELECT * FROM tasks");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Todo Lists</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="heading">
        <h2>Todo List Application</h2>
    </div>
    <form method="POST" action="index.php">
        <input type="text" name="task" class="task_input">
        <button type="submit" class="task_btn" name="submit">Add Task</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>N</th>
                <th>Task</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Afficher les tâches dans le tableau
            $i = 1;
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $i++ . "</td>";
                echo "<td>" . $row['task'] . "</td>";
                echo "<td>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
