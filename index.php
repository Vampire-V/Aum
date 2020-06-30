<?php
    include 'DB/connect.php';
    $conn = OpenCon();
    // echo "<br> Connected Successfully";
    // CloseCon($conn);
    $sql = "SELECT id,name FROM files ORDER BY id";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <form action="insertAndCreateFile.php" method="POST">
      <label for="fname">First name:</label><br />
      <input type="text" id="fname" name="fname" value="" /><br />
      <label for="lname">Last name:</label><br />
      <input type="text" id="lname" name="lname" value="" /><br /><br />
      <input type="submit" value="Submit" />
      <input type="reset" value="reset" />
    </form>

    <br>
    <br>
    <table>
    <thead><th>#</th><th>ชื่อ</th><th>ดู</th></thead>
    <tbody>
    <?php 
    while($row = $result->fetch_array(MYSQLI_NUM))
      {
    ?>
        <tr>
          <td><?php echo $row[0] ?></td>
          <td><?php echo $row[1] ?></td>
          <td><a href="showFile?id=<?php echo $row[0] ?>">view</a></td>
        </tr>
    <?php
      }
    ?>
      
    </tbody>
    </table>
  </body>
</html>
