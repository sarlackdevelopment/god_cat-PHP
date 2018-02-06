<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Студи авторской посуды "Добрый кот"</title>
        
        <link rel="stylesheet" href="css\form.css">
        
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script  src="js/form.js"></script>
    </head>
    <body>
        
        <div id="wrap">
            <div id="regbar">
                <div id="navthing">
                    <h2><a href="#" id="loginform">Авторизация</a> | <a href="#">Регистрация</a></h2>
                    <div class="login">
                        <div class="arrow-up"></div>
                        <div class="formholder">
                            <div class="randompad">
                                <fieldset>
                                    <label name="email">Email</label>
                                    <input type="email" value="example@example.com" />
                                    <label name="password">Пароль</label>
                                    <input type="password" />
                                    <input type="submit" value="Login" />

                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <?php
            print_r('Привет из Net Beance');
        ?>
    </body>
</html>
