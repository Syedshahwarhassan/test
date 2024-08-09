<?php
if(isset($_POST['sub'])){
 if (isset($_FILES['image'])) {
    # code...
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";

    $file_name=$_FILES['image']['name'];
    $file_temp=$_FILES['image']['tmp_name'];
   echo $folder='./upload/'.$file_name;

    if (move_uploaded_file($file_temp,$folder)) {
        # code...
        $conn=mysqli_connect('localhost','root','','image');
        $sql="INSERT INTO images (Name) VALUES('$file_name')";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "Data Inserted Successfully";
        }else{
            echo "Data Not Inserted";
        }
        mysqli_close($conn);

        echo "File Uploaded Successfully";
    }else{
        echo "Error Uploading File";
    }

 }
 
 
}else{
    echo "Clieckpodfnioe";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">

    <input type="file" name="image" id="image"><br><br>
    <button name="sub">Submit</button>
    </form>
  <div class="">
<?php
        $conn=mysqli_connect('localhost','root','','image');
        $sql="SELECT * FROM images";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            echo "<img src='upload/{$row['Name']}' alt='{$row['Name']}' style='width:200px;height:200px;'>";
        }
?>

  </div>
</body>
</html>