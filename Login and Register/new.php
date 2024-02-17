
<?php include('./config.php'); ?>

<?php 
// echo "<pre>";
// print_r($_POST);
// echo"</pre>";
if (isset($_POST['submit'])) {
  
    $name=$_POST['name'];
    $quary="SELECT * FROM  user_register_from WHERE name='$name'";
    $result=mysqli_query($conn,$quary);

  if ($result) {
      echo mysqli_num_rows($result);
      echo "Quary SuccessFull";

      $recod=mysqli_fetch_assoc($result);
        //echo mysqli_error($conn);
 
        echo "Quary SuccessFull";  
             echo "<pre>";
             print_r($recod);
             echo"</pre>";
            
  }
    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Style for the printed array */
        .output-container {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
        }

        .output-container pre {
            white-space: pre-wrap;
            word-wrap: break-word;
            margin: 0;
        }
    </style>
</head>
<body>
    
<form action="" method="post">
    <input type="text" placeholder="enter name" name="name">
    <input type="submit" name="submit">

    <div class="output-container">

    <?php 
// echo "<pre>";
// print_r($_POST);
// echo"</pre>";
if (isset($_POST['submit'])) {
  
    $name=$_POST['name'];
    $quary="SELECT * FROM  user_register_from WHERE name='$name'";
    $result=mysqli_query($conn,$quary);

  if ($result) {
      echo mysqli_num_rows($result);
      echo "Quary SuccessFull";

      $recod=mysqli_fetch_assoc($result);
        //echo mysqli_error($conn);
 
        echo "Quary SuccessFull";  
             echo "<pre>";
             print_r($recod);
             echo"</pre>";
            
  }
    
}


?>




    </div>
</form>

</body>
</html>