<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
        <link rel="stylesheet" href="css\style.css">

        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js/gallery/gallery.js"></script>

    </head>
    <body>

        <div id="drop-files" ondragover="return false">
            <p>Перетащите изображение сюда</p>
            <form id="frm">
                <input type="file" id="uploadbtn" multiple />
            </form>
        </div>

        <!-- Область предварительного просмотра -->
        <div id="uploaded-holder"> 
            <div id="dropped-files">
                <!-- Кнопки загрузить и удалить, а также количество файлов -->
                <div id="upload-button">
                    <center>
                        <span>0 Файлов</span>
                        <a href="#" class="upload">Загрузить</a>
                        <a href="#" class="delete">Удалить</a>
                        <!-- Прогресс бар загрузки -->
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
        
        <!-- Список загруженных файлов -->
        <div id="file-name-holder">
            <ul id="uploaded-files">
                <h1>Загруженные файлы</h1>
            </ul>
        </div>

        <?php
        /*
         * To change this license header, choose License Headers in Project Properties.
         * To change this template file, choose Tools | Templates
         * and open the template in the editor.
         */
        ?>

    </body>

</html>

