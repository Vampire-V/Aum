<?php
    include 'DB/connect.php';
    
    $_POST['fname'];
    $_POST['lname'];
    $contenfile = '
    <?xml version="1.0" encoding="UTF-8"?>
    <note>
          <to>Tove</to>
          <from>Jani</Ffrom>
          <heading>'.$_POST['fname'].'</heading>
          <body>'.$_POST['lname'].'</body>
    </note> 
    ';
    
    $fileName = "file-".generateRandomString().".xml";
    $file = fopen($fileName, "a+");

    fwrite($file,$contenfile);
    fclose($file);

    $sql = "INSERT INTO files (name) VALUES ('".$fileName."')";
    $conn = OpenCon();
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    header( "refresh: 2; url=/Aum/index.php" );
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    

?>