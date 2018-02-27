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

<!--        <table class="tftable" border="1">
            <tr><th>Header 1</th><th>Header 2</th><th>Header 3</th><th>Header 4</th><th>Header 5</th></tr>
            <tr><td>Строка:1 Столбец:1</td><td>Строка:1 Столбец:2</td><td>Строка:1 Столбец:3</td><td>Строка:1 Столбец:4</td><td>Строка:1 Столбец:5</td></tr>
            <tr><td>Строка:2 Столбец:1</td><td>Строка:2 Столбец:2</td><td>Строка:2 Столбец:3</td><td>Строка:2 Столбец:4</td><td>Строка:2 Столбец:5</td></tr>
            <tr><td>Строка:3 Столбец:1</td><td>Строка:3 Столбец:2</td><td>Строка:3 Столбец:3</td><td>Строка:3 Столбец:4</td><td>Строка:3 Столбец:5</td></tr>
            <tr><td>Строка:4 Столбец:1</td><td>Строка:4 Столбец:2</td><td>Строка:4 Столбец:3</td><td>Строка:4 Столбец:4</td><td>Строка:4 Столбец:5</td></tr>
            <tr><td>Строка:5 Столбец:1</td><td>Строка:5 Столбец:2</td><td>Строка:5 Столбец:3</td><td>Строка:5 Столбец:4</td><td>Строка:5 Столбец:5</td></tr>
            <tr><td>Строка:6 Столбец:1</td><td>Строка:6 Столбец:2</td><td>Строка:6 Столбец:3</td><td>Строка:6 Столбец:4</td><td>Строка:6 Столбец:5</td></tr>
        </table>-->

        <!--
        1. Разложить каталоги по строкам.
        2. Разложить содержимое каталогов по столбцам в виде ПолныйПутьКФайлу.
        3. Завести отдельный css для админской панели.
        -->
        
        <table class="tftable" border="1">
            
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
                    echo '<td>' . $currentImage->path . '</td>';
                }
                
                echo '</tr>';
                
            }
            
            ?>
            
            <!--<tr><th>Header 1</th><th>Header 2</th></tr>
            <tr>
                <td>
                    <form action="gallery.php" method="post" enctype="multipart/form-data">                      
                        <input type="file" name="image" class="load-file-buttons">
                        <input type="submit" class="load-file-buttons">                                               
                    </form>
                </td>
                <td>Строка:1 Столбец:2</td>
            </tr>
            <tr>
                <td>Строка:2 Столбец:1</td>
                <td>Строка:2 Столбец:2</td>
            </tr>
            <tr>
                <td>Строка:3 Столбец:1</td>
                <td>Строка:3 Столбец:2</td>
            </tr>-->
        </table>
        
    </body>
</html>



