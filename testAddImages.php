
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
    
    //var_dump($_FILES['image']);
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

<!--        <div id="drop-files" ondragover="return false">
            <p>Перетащите изображение сюда</p>
            <form id="frm">
                <input type="file" id="uploadbtn" multiple />
            </form>
        </div>

         Область предварительного просмотра 
        <div id="uploaded-holder"> 
            <div id="dropped-files">
                 Кнопки загрузить и удалить, а также количество файлов 
                <div id="upload-button">
                    <center>
                        <span>0 Файлов</span>
                        <a href="#" class="upload">Загрузить</a>
                        <a href="#" class="delete">Удалить</a>
                         Прогресс бар загрузки 
                        <div id="loading">
                            <div id="loading-bar">
                                <div class="loading-color"></div>
                            </div>
                            <div id="loading-content"></div>
                        </div>
                    </center>
                </div>  
            </div>
        </div>
        
         Список загруженных файлов 
        <div id="file-name-holder">
            <ul id="uploaded-files">
                <h1>Загруженные файлы</h1>
            </ul>
        </div>-->

        

    </body>

</html>

