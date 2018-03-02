
<?php
if (isset($_FILES['image'])) {
    $errors = array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    //$file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
    //echo $_FILES['image']['name'];
    
    $extentions = array('jpeg', 'jpg', 'png');
    
    if ($file_size > 209752) {
        $errors[] = 'Файл должен весить не больше двух мегабайтов';
    }
    
    if (empty($errors) == TRUE) {
        move_uploaded_file($file_tmp, 'images/testupload/'.$file_name);
        echo '<div style="color: green;">' . 'Файлы успешно загружены' . '</div><hr>';
    } else {
        echo '<div style="color: red;">' . array_shift($errors) . '</div><hr>';
    }
    
}
?>

<!DOCTYPE html>
<html>
    <?php
    require 'includes/db.php';
    ?>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Тестовая страница загрузки изображений</title>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="images/favicon.png">
        <!--<link rel="stylesheet" href="css\style.css">-->

        <!--<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>-->
        <!--<script src="js/gallery/gallery.js"></script>-->

    </head>
    <body>
        
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="image">
            <input type="submit">
        </form>

        

    </body>

</html>

