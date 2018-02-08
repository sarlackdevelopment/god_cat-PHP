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

                                <form action="index.php" method="post">

                                    <div class="field-wrap">
                                        <label>
                                            Логин<span class="req">*</span>
                                        </label>
                                        <input type="text" name="login" required autocomplete="off" />
                                    </div>

                                    <div class="field-wrap">
                                        <label>
                                            Пароль<span class="req">*</span>
                                        </label>
                                        <input type="password" name="password" required autocomplete="off"/>
                                    </div>

                                    <div class="field-wrap">
                                        <label>
                                            Подтверждние пароля<span class="req">*</span>
                                        </label>
                                        <input type="password" name="confirm_password" required autocomplete="off"/>
                                    </div>

                                    <div class="field-wrap">
                                        <label>
                                            Электронная почта (Email)<span class="req">*</span>
                                        </label>
                                        <input type="email" name="email" required autocomplete="off"/>
                                    </div>

                                    <button type="submit" name="do_singup" class="button button-block"/>Вперед!</button>

                                </form>

                            </div>

                            <div id="login">   
                                <h1>С возвращением!</h1>

                                <form action="index.php" method="post">

                                    <div class="field-wrap">
                                        <label>
                                            Логин<span class="req">*</span>
                                        </label>
                                        <input type="text" name="login" required autocomplete="off"/>
                                    </div>

                                    <div class="field-wrap">
                                        <label>
                                            Пароль<span class="req">*</span>
                                        </label>
                                        <input type="password" name="password" required autocomplete="off"/>
                                    </div>

                                    <!--<p class="forgot"><a href="#">Забыли пароль?</a></p>-->

                                    <button type="submit" name="do_login" class="button button-block"/>Войти</button>

                                </form>

                            </div>

                        </div> 

                    </div> 

                </div>
            </div>
        </div>


        <?php
        
        $data = $_POST;
        if (isset($data['do_singup'])) {

            $errors = array();
            
            if (R::count('usertable', 'login = ?', array($data['login'])) > 0) {
                $errors[] = 'Пользователь с таким логином уже существует!';
            }
            
            if (R::count('usertable', 'email = ?', array($data['email'])) > 0) {
                $errors[] = 'Пользователь с таким email уже существует!';
            }

            if (empty($errors)) {
                $user = R::dispense('usertable');
                $user->login = $data['login'];
                $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
                $user->email = $data['email'];
                R::store($user);
                echo '<div style="color: green;">Вы успешно зарегистрированы!</div><hr>';
            }
            else {
                echo '<div style="color: red;">'. array_shift($errors).'</div><hr>';
            }
        }
        
        if (isset($data['do_login'])) {
            
            $errors = array();
            
            $user = R::findOne('usertable', 'login = ?', array($data['login']));  
            if( $user ){
                if (password_verify($data['password'], $user->password)){
                    $_SESSION['logged_user'] = $user;
                    // 'Все хорошо!';
                    echo '<div style="color: green;">Вы авторизованы!</div><hr>';
                } else {
                    $errors[] = 'Пароль введен неверно!';
                }
            } else {
                $errors[] = 'Пользователь с таким логином не найден!';
            }
            if ( !empty($errors) ) {
                echo '<div style="color: red;">'. array_shift($errors).'</div><hr>';
            }
        }
        
        if(isset($_SESSION['logged_user'])){
            echo '<h2 style="color: green;">Пользователь авторизован</h2>';
        } else {
            echo '<h2 style="color: red;">Пользователь не авторизован</h2>';
        }
        
        //print_r('Привет из Net Beance');
        
        ?>
        
        
        
    </body>
</html>
