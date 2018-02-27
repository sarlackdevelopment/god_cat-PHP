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

    </head>
    <body>
        
        <style type="text/css">
            .tftable {font-size:12px;color:#333333;width:100%;border-width: 1px;border-color: #9dcc7a;border-collapse: collapse;}
            .tftable th {font-size:12px;background-color:#abd28e;border-width: 1px;padding: 8px;border-style: solid;border-color: #9dcc7a;text-align:left;}
            .tftable tr {background-color:#bedda7;}
            .tftable td {font-size:12px;border-width: 1px;padding: 8px;border-style: solid;border-color: #9dcc7a;}
            .tftable tr:hover {background-color:#ffffff;}
        </style>

        <!--
        1. Разложить каталоги по строкам.
        2. Разложить содержимое каталогов по столбцам в виде ПолныйПутьКФайлу.
        3. У каждого заголовка столбца вписать форму добавления.
        4. Завести отдельный css для админской панели.
        -->
        <div >
            <form action="gallery.php" method="post" enctype="multipart/form-data">                      
                <input type="file" multiple name="image" class="load-file-buttons">
                <input type="submit" value="Добавить выбранное в:" class="load-file-buttons"> 
                <select class="load-file-buttons">
                    <?php
                    $allCategory = getAllCategory();
                    foreach ($allCategory as $currentCategory) {

                        $nameCategory = $currentCategory->name;
                        echo '<option>' . $nameCategory . '</option>';
                    }
                    ?> 
                </select>
            </form>           
        </div>
        
        <div>

            <table class="tftable" border="3">

                <?php
                echo '<tr>';

                $allCategory = getAllCategory();
                foreach ($allCategory as $currentCategory) {

                    $nameCategory = $currentCategory->name;
                    echo '<th>' . $nameCategory . '</th>';
                }

                echo '</tr>';

                foreach ($allCategory as $currentCategory) {

                    echo '<tr>';

                    $nameCategory = $currentCategory->name;
                    $allImageByCategory = getAllImageByCategory($nameCategory);

                    foreach ($allImageByCategory as $currentImage) {
                        
                        $path = $currentImage->path; 
                        $alt = "Изображение отсутствует"; 
                        
                        echo "
                        <td>
                            <div style='display: flex; justify-content: center; flex-wrap: wrap;'>
                                <div style='margin: 3px'>
                                    <img src=$path width=150px height=100px alt=$alt>
                                </div>
                                <div style='margin: 3px'>
                                    <img src=$path width=150px height=100px alt=$alt>
                                </div>
                            </div>
                        </td>";
                    }

                    echo '</tr>';
                }
                ?>

            </table>
            
        </div>
        
    </body>
</html>



