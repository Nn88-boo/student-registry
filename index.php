<?php include "db.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Student Registry</title>
</head>
<body>
  <h1>Student Registry</h1>
  <a href="add.php">Add Student</a>
  <table border="1" cellpadding="5">
    <tr>
      <th>ID</th><th>Name</th><th>Surname</th><th>Course</th><th>Email</th><th>Actions</th>
    </tr>
    <?php
      $result = $conn->query("SELECT * FROM students");
      while($row = $result->fetch_assoc()){
        echo "<tr>
          <td>{$row['id']}</td>
          <td>{$row['name']}</td>
          <td>{$row['surname']}</td>
          <td>{$row['course']}</td>
          <td>{$row['email']}</td>
          <td>
            <a href='edit.php?id={$row['id']}'>Edit</a>
            <a href='delete.php?id={$row['id']}'>Delete</a>
          </td>
        </tr>";
      }
    ?>
  </table>
</body>
</html>
