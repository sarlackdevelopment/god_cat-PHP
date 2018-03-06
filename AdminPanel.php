<html>
<?php require 'includes/gallery/gallery.php'; ?>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <title>Студи авторской посуды "Добрый кот"</title>
        
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="images/favicon.png">
        <link rel="stylesheet" href="css\style.css">
        <link rel="stylesheet" href="css\gallery.css">

        <script src="js/vendor/jquery-1.11.2.min.js"></script>
        <script>
            
//            $(document).ready(function () {
//                $('button').each(function(i, elem) {
//                    
//                    var elemId = elem.id;
//                    if (elemId.endsWith('DeleteDb')) {
//                        alert('Удаление из базы данных элемента: ' + elemId);
//                    } else if (elemId.endsWith('DeleteFileSystem')) {
//                        alert('Удаление элемента из временного каталога: ' + elemId);
//                    }
//                    
//                });
//            });
            
        </script>
        
    </head>
    
    <!-- Общие требования
        1. Разложить каталоги по столбцам.
        2. Разложить содержимое каталогов по столбцам в виде миникопии изображения.
        3. Организовать форму добавления с возможностью выбора категории изображений.
        4. Завести отдельный css для админской панели.
        5. Организовать перемещение файлов из каталога по умолчанию в каталог, соответствующий альбому.
        6. Добавить функциональность добавления каталога.
        7. Добавить функциональность добаления или изменения цен. (Похоже можно будет сделать скользящее общее окно с настройками).
        -->
    
    <body>        
<?php
        constructAdminPanel();
        handleOfAddFiles();
        getPathForCategory();
        
        function constructAdminPanel() {
            
            echo "<div style='display: flex; justify-content: center;'>";
            
            $allCategory = getAllCategory();
            foreach ($allCategory as $currentCategory) {

                $nameCategory = $currentCategory->name;
                $allImageByCategory = getAllImageByCategory($nameCategory);

                echo "<div style='display: flex; flex-direction: column; justify-content: flex-start;'>";
                
                echo "<div style='display: flex; justify-content: center; border: 1px solid #9dcc7a; border-collapse: collapse; font-size: 12px; background-color: #abd28e; color: #333333; max-width: 300px; max-height: 35px;'>";
                echo $nameCategory;
                
                echo "</div>";
                
                echo "<div style='border: 1px solid #9dcc7a; border-collapse: collapse; font-size: 12px; background-color:#abd28e; color: #333333;'>
                <form action='AdminPanel.php' method='post' enctype='multipart/form-data'>
                                    <div style='display: flex; justify-content: center; flex-direction: column;'>
                                        <input type='file' name='image[]' multiple>
                                        <input type='hidden' type='text' value=$nameCategory name='nameCategory'>
                                        <input type='submit' value='Добавить файлы'>
                                    </div>
                                </form>";
                
                echo "</div>";
                
                foreach ($allImageByCategory as $currentImage) {
                    
                    echo "<div style='border: 1px solid #9dcc7a; border-collapse: collapse; font-size: 12px; background-color:#abd28e; color: #333333; max-width: 250px; max-height: 200px;'>";
                    $alt = "Изображение отсутствует";
                    $path = $currentImage->path;
                    echo "<img src=$path width=233px height=150px alt=$alt>";
                    echo "</div>";
                    
                }
                
                echo "</div>";
            }

            echo "</div>";
                    
        }
        
        function handleOfAddFiles() {
            
            $parameters = $_POST;
            $files = $_FILES;
            
            if (!empty($files) and !empty($parameters)) {
                
                for ($i = 0; $i < count($files['image']['name']); $i++) {
                    if (is_uploaded_file($files['image']['tmp_name'][$i])) {
                        
                        $path = getPathForCategory() . '/' . $files['image']['name'][$i];  
                        move_uploaded_file($files['image']['tmp_name'][$i], $path);
                        addImageIn($path);
                        
                    }
                }
                
            print'<meta http-equiv="refresh" content="0;AdminPanel.php">';    
                
            }
            
        }
        
        function getPathForCategory() {
            
            $parameters = $_POST;           
            if (isset($parameters['nameCategory'])) {
                
                $nameCategory = $parameters['nameCategory'];
                $commonpath = 'images/Галлерея/'. $nameCategory;
            
                if (!file_exists($commonpath)){
                    mkdir($commonpath, 0700, true);        
                }
            
                return $commonpath;
            
            }
            
        }
        
        function addImageIn($path) {
            
            $parameters = $_POST;
            if (isset($parameters['nameCategory'])) {
                $imgInfo = ['path'     => $path,
                            'location' => $parameters['nameCategory'],
                            'width'    => '255',
                            'height'   => '322',
                            'alt'      => 'Изображение отсутсвует'];
                    
                addRelationIMG_Category($imgInfo);
                
            }
        }
        
?>
        
    </body>
</html>



