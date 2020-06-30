<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    include 'DB/connect.php';
    $conn = OpenCon();
    $sql = "SELECT id, name FROM files where id =". $_GET['id'];
    $result = $conn->query($sql);
    $fileName = '';
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_array(MYSQLI_NUM)) {
            $fileName = $row[1];
        }

    ?>
    <pre class="prettyprint linenums">
        <code class="language-xml"><?php echo htmlspecialchars(file_get_contents($fileName), ENT_QUOTES); ?></code>
    </pre>    
    <?php
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>

</body>
</html>

