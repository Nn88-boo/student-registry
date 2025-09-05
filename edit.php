<?php include "db.php"; ?>
<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM students WHERE id=$id");
$student = $result->fetch_assoc();

if($_POST){
  $stmt = $conn->prepare("UPDATE students SET name=?, surname=?, course=?, email=? WHERE id=?");
  $stmt->bind_param("ssssi", $_POST['name'], $_POST['surname'], $_POST['course'], $_POST['email'], $id);
  $stmt->execute();
  header("Location: index.php");
}
?>
<form method="post">
  <h2>Edit Student</h2>
  <input name="name" value="<?php echo $student['name']; ?>" required><br>
  <input name="surname" value="<?php echo $student['surname']; ?>" required><br>
  <input name="course" value="<?php echo $student['course']; ?>" required><br>
  <input name="email" type="email" value="<?php echo $student['email']; ?>" required><br>
  <button type="submit">Update</button>
</form>
