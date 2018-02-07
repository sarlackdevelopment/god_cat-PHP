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
                    <h2><a href="#" id="loginform">Авторизуйтесь или войдите</a></h2>

                    <div class="formwrapper">

                        <ul class="tab-group">
                            <li class="tab active"><a href="#signup">Авторизация</a></li>
                            <li class="tab"><a href="#login">Вход</a></li>
                        </ul>

                        <div class="tab-content">
                            <div id="signup">   
                                <h1>Авторизация</h1>

                                <form action="/" method="post">

                                    <div class="top-row">
                                        <div class="field-wrap">
                                            <label>
                                                Имя<span class="req">*</span>
                                            </label>
                                            <input type="text" required autocomplete="off" />
                                        </div>

                                        <div class="field-wrap">
                                            <label>
                                                Фамилия<span class="req">*</span>
                                            </label>
                                            <input type="text"required autocomplete="off"/>
                                        </div>
                                    </div>

                                    <div class="field-wrap">
                                        <label>
                                            Электронная почта (Email)<span class="req">*</span>
                                        </label>
                                        <input type="email"required autocomplete="off"/>
                                    </div>

                                    <div class="field-wrap">
                                        <label>
                                            Пароль<span class="req">*</span>
                                        </label>
                                        <input type="password"required autocomplete="off"/>
                                    </div>

                                    <button type="submit" class="button button-block"/>Вперед!</button>

                                </form>

                            </div>

                            <div id="login">   
                                <h1>С возвращением!</h1>

                                <form action="/" method="post">

                                    <div class="field-wrap">
                                        <label>
                                            Электронная почта (Email)<span class="req">*</span>
                                        </label>
                                        <input type="email"required autocomplete="off"/>
                                    </div>

                                    <div class="field-wrap">
                                        <label>
                                            Пароль<span class="req">*</span>
                                        </label>
                                        <input type="password"required autocomplete="off"/>
                                    </div>

                                    <!--<p class="forgot"><a href="#">Забыли пароль?</a></p>-->

                                    <button class="button button-block"/>Войти</button>

                                </form>

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
