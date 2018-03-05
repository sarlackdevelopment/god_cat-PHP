<html>
    <?php
    require 'includes/gallery/gallery.php';
    ?>
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
    <body>
        
        <style type="text/css">
            .tftable {font-size:12px;color:#333333;width:100%;border-width: 1px;border-color: #9dcc7a;border-collapse: collapse;}
            .tftable th {font-size:12px;background-color:#abd28e;border-width: 1px;padding: 8px;border-style: solid;border-color: #9dcc7a;text-align:left;}
            .tftable tr {background-color:#bedda7;}
            .tftable td {font-size:12px;border-width: 1px;padding: 8px;border-style: solid;border-color: #9dcc7a;}
            .tftable tr:hover {background-color:#ffffff;}
        </style>

        <!-- Общие требования
        1. Разложить каталоги по столбцам.
        2. Разложить содержимое каталогов по столбцам в виде миникопии изображения.
        3. Организовать форму добавления с возможностью выбора категории изображений.
        4. Завести отдельный css для админской панели.
        -->
        
        <!-- Трабования для каждой картинки
        1. Приложить рядом список ссылок: 
            1.1. Находится / Отсутствует в базе данных.
            1.2. Находится / Отсутствует во временном каталоге.
            1.3. Удалить из базы данных (гиперссылка).
            1.4. Удалить из временного каталога (гиперссылка).
        -->
        
        <!--<div>
            <form action="gallery.php" method="post" enctype="multipart/form-data">                      
                <input type="file" multiple name="image" class="load-file-buttons">
                <input type="submit" value="Добавить выбранное в:" class="load-file-buttons"> 
                <select class="load-file-buttons">
                    //<?php
//                    $allCategory = getAllCategory();
//                    foreach ($allCategory as $currentCategory) {
//
//                        $nameCategory = $currentCategory->name;
//                        echo '<option>' . $nameCategory . '</option>';
//                    }
//                    ?> 
                </select>
            </form>           
        </div>-->
        
        
        
        <div>
            
            <?php loadFilesInTemp(); ?>

            
                
            
<!--            <table class="tftable" border="3">-->

                <?php
//                echo '<tr>';
//
//                $allCategory = getAllCategory();
//                foreach ($allCategory as $currentCategory) {
//
//                    $nameCategory = $currentCategory->name;
//                    echo "
//                    <th>
//                        <div style='display: flex; justify-content: center; flex-wrap: wrap;'>
//                            <div style='margin: 3px; color: blue;'>
//                                $nameCategory
//                            </div>
//                            <div style='margin: 3px'>
//                                <form action='AdminPanel.php' method='post' enctype='multipart/form-data'>
//                                    <div style='display: flex; justify-content: center; flex-wrap: wrap;'>
//                                        <input type='file' name='image[]' multiple>
//                                        <input type='hidden' type='text' value=$nameCategory name='nameCategory'>
//                                        <input type='submit' value='Добавить файлы'>
//                                    </div>
//                                </form>
//                            </div>
//                        </div>
//                    </th>";
//                }
//
//                echo '</tr>';
//
//                foreach ($allCategory as $currentCategory) {
//
//                    echo '<tr>';
//
//                    $nameCategory = $currentCategory->name;
//                    $allImageByCategory = getAllImageByCategory($nameCategory);
//
//                    foreach ($allImageByCategory as $currentImage) {
//                        
//                        $path = $currentImage->path; 
//                        $alt = "Изображение отсутствует"; 
//                        $id = $currentImage->id;
//                        
//                        echo "
//                        <td id=$id>
//                            <div style='display: flex; justify-content: center; flex-wrap: wrap;'>
//                                <div style='margin: 3px'>
//                                    <img src=$path width=150px height=100px alt=$alt>
//                                </div>
//                                <div style='margin: 3px'>
//                                    <ul style='margin-left: 0; padding-left: 0;'>";                        
//                        echo            "<li style='list-style-type: none;'>" . imageExist($path) . "</li>";
//                        echo            "<li style='list-style-type: none;'><button id=$id>Удалить из базы</button></li>";
//                        echo            "<li style='list-style-type: none;'><button id=$id>Реальный размер</button></li>";                        
//                        echo "      </ul>
//                                </div>
//                            </div>
//                        </td>";
//                    }
//
//                    echo '</tr>';
//                }
//                
//                
                ?>

<!--            </table>-->
            
        </div>
        
        <?php
            
        function loadFilesInTemp() {
            
            $template = "<div style='display: flex; justify-content: center;'>
                
                <div style='display: flex; flex-direction: column; justify-content: center;'> 
                    <div style='background-color: blue; border: 4px solid red; width: 100px; height: 100px;'></div>
                    <div style='background-color: blue; border: 4px solid red; width: 100px; height: 100px;'></div>
                    <div style='background-color: blue; border: 4px solid red; width: 100px; height: 100px;'></div>
                    <div style='background-color: blue; border: 4px solid red; width: 100px; height: 100px;'></div>
                    <div style='background-color: blue; border: 4px solid red; width: 100px; height: 100px;'></div>
                </div>
                
                <div style='display: flex; flex-direction: column; justify-content: flex-start;'> 
                    <div style='background-color: blue; border: 4px solid red; width: 100px; height: 100px;'></div>
                    <div style='background-color: blue; border: 4px solid red; width: 100px; height: 100px;'></div>
                    <div style='background-color: blue; border: 4px solid red; width: 100px; height: 100px;'></div>
                    <div style='background-color: blue; border: 4px solid red; width: 100px; height: 100px;'></div>
                </div>
                
                <div style='display: flex; flex-direction: column; justify-content: flex-start;'> 
                    <div style='background-color: blue; border: 4px solid red; width: 100px; height: 100px;'></div>
                    <div style='background-color: blue; border: 4px solid red; width: 100px; height: 100px;'></div>
                </div>
                
            </div>";
            
            echo "<div style='display: flex; justify-content: center;'>";
            
            $allCategory = getAllCategory();
            foreach ($allCategory as $currentCategory) {

                $nameCategory = $currentCategory->name;
                $allImageByCategory = getAllImageByCategory($nameCategory);

                echo "<div style='display: flex; flex-direction: column; justify-content: flex-start;'>";
                
                echo "<div style='display: flex; justify-content: center; border: 1px solid #9dcc7a; border-collapse: collapse; font-size: 12px; background-color: #abd28e; color: #333333; max-width: 200px; max-height: 35px;'>";
                echo $nameCategory;
                echo "</div>";
                
                foreach ($allImageByCategory as $currentImage) {
                    echo "<div style='border: 1px solid #9dcc7a; border-collapse: collapse; font-size: 12px; background-color:#abd28e; color: #333333; max-width: 200px; max-height: 200px;'>";
                    $alt = "Изображение отсутствует";
                    $path = $currentImage->path;
                    echo "<img src=$path width=150px height=100px alt=$alt>";
                    echo "</div>";
                }
                
                echo "</div>";
            }

            echo "</div>";
            
            
            
            
            
            
//            $temp1 = array();
//            $temp_glog = array();
//            
//            $allCategory = getAllCategory();
//            
//            foreach ($allCategory as $currentCategory) { 
//                $nameCategory = $currentCategory->name;
//                $temp_glog[] = ['name' => $nameCategory, 'images' => getAllImageByCategory($nameCategory)];
//            }
//
//            foreach ($temp_glog as $currentElement) {
//                array_key_exists('first', $search_array)
//            }
            
//            echo '<pre>';
//            var_dump($temp_glog);
//            echo '</pre>';
            
//            $files = $_FILES;
//            
//            if (!empty($files)) {
//                
//                for ($i = 0; $i < count($files['image']['name']); $i++) {
//                    if (is_uploaded_file($files['image']['tmp_name'][$i])) {
//                        
//                        $path = $files['image']['name'][$i];
//                        
//                        move_uploaded_file($files['image']['tmp_name'][$i], 'temp/' . $path);
//                        addImageIn($path);
//                        
//                    }
//                }
//                
//            }
            
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



