<?php include "db.php"; ?>
<?php
if($_POST){
  $stmt = $conn->prepare("INSERT INTO students (name, surname, course, email) VALUES (?,?,?,?)");
  $stmt->bind_param("ssss", $_POST['name'], $_POST['surname'], $_POST['course'], $_POST['email']);
  $stmt->execute();
  header("Location: index.php");
}
?>
<form method="post">
  <h2>Add Student</h2>
  <input name="name" placeholder="Name" required><br>
  <input name="surname" placeholder="Surname" required><br>
  <input name="course" placeholder="Course" required><br>
  <input name="email" type="email" placeholder="Email" required><br>
  <button type="submit">Save</button>
</form>
