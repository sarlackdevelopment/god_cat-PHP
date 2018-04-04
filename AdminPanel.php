<html>
<?php require 'includes/gallery/gallery.php'; require 'includes/prices/prices.php';?>
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

                $(document).ready(function () {
 
                    var $result;
                    var targetId;
 
                    $("button[name='DeleteImage']").bind("click", function(event) {
                        
                        $result  = $("input:checkbox:checked");
                        targetId = event.target.id;
                        
                        if ($result.length) {
                        
                            event.preventDefault();
                            $('#overlay').fadeIn(400, function() { 
                                $('#modal_form').css('display', 'block').animate({opacity: 1, top: '50%'}, 200);
                            });	
	
                            $('#modal_close, #overlay').click( function() {
                                $('#modal_form').animate({opacity: 0, top: '45%'}, 200, function() { 
                                        $(this).css('display', 'none');
                                        $('#overlay').fadeOut(400); 
                                    });
                            });
                        }
                        
                    });
                    
                    $("button[name='Cancel']").bind("click", function(event) {
                        
                        $('#modal_form').animate({opacity: 0, top: '45%'}, 200, function() { 
                            $(this).css('display', 'none');
                            $('#overlay').fadeOut(400); 
                        });
                        
                    });
                    
                    $("button[name='Delete']").bind("click", function(event) {
                        
                        $('#modal_form').animate({opacity: 0, top: '45%'}, 200, function() { 
                            $(this).css('display', 'none');
                            $('#overlay').fadeOut(400, function() {
                                
                                var idForDelete = new Array();                            
                                $result.each(function(i, elem) {     
                                    
                                    var id = elem.id.replace("checkbox", "") + '_' + targetId;
                                    var $resultQuery = $('#' + id);
                                    
                                    if ($resultQuery.length) {
                                        idForDelete.push(id);
                                    }
                                
                                });
                       
                                $.get("WorkWithAjax.php", { 'targetId': targetId, 'idForDelete[]': idForDelete }, funcSuccess );
                        
                                function funcSuccess(data) {
                            
                                    for (var id in idForDelete) {
                                        $("#" + idForDelete[id]).remove();
                                    }
                                    
                                    if (data === '1') { 
                                        $('#' + targetId + '_category').remove();
                                    }
                            
                                }
                                
                            }); 
                            
                        });
                        
                    });
                    
                    $("button[name='FIX']").bind("click", function(event) {
                        
                        var idForAddPrice = event.target.id.replace("buttonFix", "");
                        $.get("WorkWithAjax.php", 
                            { 
                                'idForAddPrice': idForAddPrice, 
                                'currentPrice':  $('#' + idForAddPrice + 'price').val()} );
                        
                    });
                    
                    $("button[name='ComeBack']").bind("click", function(event) {
                        $(location).attr('href', 'index.php');
                    });
                    
                    $("button[name='AddCategory']").bind("click", function(event) {                       
                        
                        var $result       = $('#nameCategory');
                        var $nameCategory = $result.val();
                        
                        if (!$nameCategory.length) {
                            $result.val('Имя, сестра! ИМЯ!');
                            $result.css({'border': '1px solid red', 'font-style': 'oblique'});
                        } else {    
                            $.get("WorkWithAjax.php", { '$nameCategoryAdd': $nameCategory }, funcSuccessAdd );                            
                        }
                        
                        function funcSuccessAdd(data) {
                            
                            $templateCategory = '<div style="display: flex; flex-direction: column; justify-content: flex-start;">'
                                + '<div style="display: flex; justify-content: center; border: 1px solid #9dcc7a; border-collapse: collapse; font-size: 12px; background-color: #abd28e; color: #333333; max-width: 300px; max-height: 35px;">'
                                + $nameCategory
                                + '</div>'
                                + '<div style="display: flex; justify-content: center; flex-direction: column; border: 1px solid #9dcc7a; border-collapse: collapse; font-size: 12px; background-color:#abd28e; color: #333333;">'
                                + '<form action="AdminPanel.php" method="post" enctype="multipart/form-data">'
                                + '<div style="display: flex; justify-content: center; flex-direction: column;">'
                                + '<input type="file" name="image[]" multiple>'
                                + '<input type="hidden" type="text" value=' + $nameCategory + ' name="nameCategory">'
                                + '<input type="submit" name="AddImage" value="Добавить изображения">'
                                + '</div>'
                                + '</form>'
                                + '<button id= ' + data + ' name="DeleteImage" value="Удалить отмеченные изображения">Удалить отмеченные изображения</button>'
                                + '</div>'
                                + '</div>'
                            $('#containerImage').append($templateCategory);
                            
                        }
                            
                    });
                    
                    $("button[name='DeleteCategory']").bind("click", function(event) {
                        
                        event.preventDefault();
                        $('#overlay_category').fadeIn(400, function() { 
                            $('#modal_form_category').css('display', 'block').animate({opacity: 1, top: '50%'}, 200);
                        });	
	
                        $('#modal_close_category, #overlay_category').click( function() {
                            $('#modal_form_category').animate({opacity: 0, top: '45%'}, 200, function() { 
                                $(this).css('display', 'none');
                                    $('#overlay_category').fadeOut(400); 
                            });
                        });
                        
                    });
                    
                    $("button[name='Delete_category']").bind("click", function(event) {
                        
                        $('#modal_form_category').animate({opacity: 0, top: '45%'}, 200, function() { 
                            $(this).css('display', 'none');
                            $('#overlay_category').fadeOut(400, function() {
                                
                                var $id_Category = $("#combo option:selected").attr('id');
                                
                                $.get("WorkWithAjax.php", { '$id_Category': $id_Category }, function() {
                                    $('#' + $id_Category + '_category').remove();
                                });
                                
                            }); 
                        });
                        
                    });
                    
                    $("button[name='Cancel_category']").bind("click", function(event) {
                        
                        $('#modal_form_category').animate({opacity: 0, top: '45%'}, 200, function() { 
                            $(this).css('display', 'none');
                            $('#overlay_category').fadeOut(400); 
                        });
                        
                    });
                    
                });
            
        </script>
        
    </head>
    
    <!-- Общие требования
        1. Разложить каталоги по столбцам. - Got it
        2. Разложить содержимое каталогов по столбцам в виде миникопии изображения. - Got it
        3. Организовать форму добавления с возможностью выбора категории изображений (AJAX). - Got it
        4. Завести отдельный css для админской панели.
        5. Организовать перемещение файлов из каталога по умолчанию в каталог, соответствующий альбому. - Got it
        6. Добавить функциональность добавления каталога. - Got it
        7. Добавить функциональность добаления или изменения цен. (Похоже можно будет сделать скользящее общее окно с настройками). - Got it
        8. Добавить возможность удаления изображения (AJAX). - Got it
        9. Добавить работу с ценами (поле с абсолютным позиционированием, в которое можно будет вводить цену). - Got it
        10. Сделать кнопку возврата после редактирования. - Got it
        11. Подобрать рабочий фон. - Got it
        12. Подобрать названия для галлерей.
        14. Нужно организовать функционал добавления категории (альбома) картинок. - Got it
        15. Добавить функциональность удаления категории и организовать предупреждающего вопроса "Вы уверены?" - Got it
        16. В случае удаления категории удалить все изображения и цены. - Got it
        17. В случае удаления изображения, удалить все цены по нему. - Got it
        19. В случае если удаляем последнюю картинку из галлереи, удалять и галлерею. - Got it
        20. Попробывать обновить комбобокс при AJAX вызовах работы с категориями.
        21. Если категория с таким именем уже есть, то выводить предупреждение и не создавать новую.
        22. Добавить повторение фоновой картинки. - Got it
        23. Вне очереди. Адаптировать flex на случай многочисленных категорий. - Got it
        24. Добавить поле для ввода имени изображения.
        25. При добавлении изображения в базу задавать артикул изображения Y[N + 1], где Y - это первая цифра имени категории, 
            а N - количество избражений в категории.
        -->
    
    <body style='background: #abd28e url(images/fone-for-admin.jpg); background-position: center center; background-repeat: no-repeat; background-size: 100%;'>        
<?php
        constructAdminPanel();
        handleOfAddFiles();
        getPathForCategory();
        
        function constructAdminPanel() {
            
            $allCategory = getAllCategory();
            
            echo "<div style='display: flex; flex-direction: column; justify-content: center; align-items: center;'>
                <button style='padding: 0 5px 0 5px; margin: 3px 0 3px 0; font-weight: bold;' name='ComeBack' value='Закончить администрирование и вернуться на главную страницу'>
                Закончить администрирование и вернуться на главную страницу</button>
                <div style='display: flex; justify-content: space-between; flex-wrap: wrap; margin: 0 0 3px 0; font-weight: bold; width: 471px;'>
                    <input style='flex-grow: 3; opacity: 0.7;' id='nameCategory' type='text' placeholder='Юля, надо заполнить имя альбома'>
                    <button style='padding: 0 5px 0 5px; flex-grow: 1;' name='AddCategory' value='Добавить категорию'>Добавить категорию</button>
                </div>
                <div style='display: flex; justify-content: space-between; flex-wrap: wrap; margin: 0 0 3px 0; font-weight: bold; width: 471px;'>
                    <select id='combo' style='flex-grow: 4; opacity: 0.7;'>";
                    foreach ($allCategory as $currentCategory) {
                        
                        $nameCategory = $currentCategory->name;
                        $id           = $currentCategory->id;
                        
                        echo "<option id=$id>$nameCategory</option>";
                        
                    }   
            echo "</select>
                    <button style='padding: 0 5px 0 5px; flex-grow: 1;' name='DeleteCategory' value='Удалить категорию'>Удалить категорию</button>
                </div>";
            
            echo "<div id='containerImage' style='display: flex; justify-content: center; flex-wrap: wrap;'>";
    
            foreach ($allCategory as $currentCategory) {

                $nameCategory       = $currentCategory->name;
                $id_Category        = $currentCategory->id;
                $id_AreaCategory    = $id_Category . '_category';
                $allImageByCategory = getAllImageByCategory($nameCategory);
                
                echo "
                <div id=$id_AreaCategory style='display: flex; flex-direction: column; justify-content: flex-start;'>
                    <div style='display: flex; justify-content: center; border: 1px solid #9dcc7a; border-collapse: collapse; font-size: 12px; background-color: #abd28e; color: #333333; max-width: 300px; max-height: 35px;'>
                        $nameCategory
                    </div>
                    <div style='display: flex; justify-content: center; flex-direction: column; border: 1px solid #9dcc7a; border-collapse: collapse; font-size: 12px; background-color:#abd28e; color: #333333;'>
                        <form action='AdminPanel.php' method='post' enctype='multipart/form-data'>
                            <div style='display: flex; justify-content: center; flex-direction: column;'>
                                <input type='file' name='image[]' multiple>
                                <input type='hidden' type='text' value=$nameCategory name='nameCategory'>
                                <input type='submit' name='AddImage' value='Добавить изображения'>                                        
                            </div>
                        </form>
                        <button id=$id_Category name='DeleteImage' value='Удалить отмеченные изображения'>Удалить отмеченные изображения</button>
                    </div>";
                
                foreach ($allImageByCategory as $currentImage) {
                    
                    $id_image     = $currentImage->id . '_' . $id_Category;
                    $id_checkbox  = $currentImage->id . 'checkbox';
                    $id_buttonFix = $currentImage->id . 'buttonFix';
                    $id_price     = $currentImage->id . 'price';
                    $alt          = "Изображение отсутствует";
                    $path         = $currentImage->path;
                    
                    $currentPrice = getCurrentPriceByID($currentImage->id);
                    
                    echo "<div id='$id_image' style='position: relative; border: 1px solid #9dcc7a; border-collapse: collapse; font-size: 12px; background-color:#abd28e; color: #333333; max-width: 250px; max-height: 200px;'>
                        <input style='position: absolute; left: 5px;' id='$id_checkbox'; type='checkbox'>
                        
                        <div style='position: absolute; display: flex; top: 120px; left: 3px;'>
                            <div style='width: 50px; height: 30px; max-width: 50px; max-height: 30px; border: 3px solid #abd28e; opacity: 0.8;'>
                                <font size='2' color='red'>Цена:</font>
                            </div>
                            <div style='width: 145px; height: 30px; max-width: 145px; max-height: 30px; border: 3px solid #abd28e; opacity: 0.8;'>
                                <input id=$id_price style='width: 140px;' type='number' value='$currentPrice' size='40'>
                            </div>
                            <button id=$id_buttonFix name='FIX' value='FIX'>Фикс</button>
                        </div>

                        <img src=$path width=233px height=150px alt=$alt>
                        </div>";                    
                }
                
                echo "</div>";
            }

            echo "</div></div>";
                    
        }
        
        function handleOfAddFiles() {
            
            $parameters = $_POST;
            $files      = $_FILES;
           
            if (!empty($files) and !empty($parameters)) {
                addFilesIntoDB($files);
                print'<meta http-equiv="refresh" content="0;AdminPanel.php">';    
            }
            
        }
        
        function addFilesIntoDB($files) {
            
            for ($i = 0; $i < count($files['image']['name']); $i++) {
                    if (is_uploaded_file($files['image']['tmp_name'][$i])) {
                        
                        $path = getPathForCategory() . '/' . $files['image']['name'][$i];  
                        move_uploaded_file($files['image']['tmp_name'][$i], $path);
                        addImageIn($path);
                        
                    }
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
     
        <div id="modal_form" style='width: 250px; height: 65px; border-radius: 5px; border: 3px solid red; background: #fff; position: fixed; top: 45%; left: 50%; margin-top: -150px; margin-left: -150px; display: none; opacity: 0; z-index: 5;'>
            <div style='display: flex; flex-direction: column'>
                <div style='display: flex;'>
                    <p style='margin: 0 auto;'>Уверена что хочешь удалить?</p>
                    <span id="modal_close" style='width: 21px; height: 21px; cursor: pointer; display: block;'>X</span>
                </div>
                <div style='display: flex;'>
                    <button style='margin: 3px; padding: 3px;' name='Delete' value='Уверена, удаляем.'>Уверена, удаляем.</button>
                    <button style='margin: 3px; padding: 3px;' name='Cancel' value='Нет, подожди.'>Нет, подожди.</button>
                </div>
            </div>
        </div>
        <div id="overlay" style='z-index:3; position:fixed; background-color:#000; opacity:0.8; -moz-opacity:0.8; filter:alpha(opacity=80); width:100%; height:100%; top:0; left:0; cursor:pointer; display:none;'></div>
        
        <div id="modal_form_category" style='width: 250px; height: 65px; border-radius: 5px; border: 3px solid red; background: #fff; position: fixed; top: 45%; left: 50%; margin-top: -150px; margin-left: -150px; display: none; opacity: 0; z-index: 5;'>
            <div style='display: flex; flex-direction: column'>
                <div style='display: flex;'>
                    <p style='margin: 0 auto;'>Уверена что хочешь удалить?</p>
                    <span id="modal_close_category" style='width: 21px; height: 21px; cursor: pointer; display: block;'>X</span>
                </div>
                <div style='display: flex;'>
                    <button style='margin: 3px; padding: 3px;' name='Delete_category' value='Уверена, удаляем.'>Уверена, удаляем.</button>
                    <button style='margin: 3px; padding: 3px;' name='Cancel_category' value='Нет, подожди.'>Нет, подожди.</button>
                </div>
            </div>
        </div>
        <div id="overlay_category" style='z-index:3; position:fixed; background-color:#000; opacity:0.8; -moz-opacity:0.8; filter:alpha(opacity=80); width:100%; height:100%; top:0; left:0; cursor:pointer; display:none;'></div>
        
    </body>
</html>



