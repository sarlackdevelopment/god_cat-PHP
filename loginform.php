<html>
    <?php
    require 'includes/db.php';
    ?>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Страница авторизации</title>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="images/favicon.png">
        <link rel="stylesheet" href="css\form.css">

        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script  src="js/form.js"></script>
    </head>

    <body>

        <div id="regbar">

            <div class="formwrapper">

                <ul class="tab-group">
                    <li class="tab active"><a href="#signup">Авторизация</a></li>
                    <li class="tab"><a href="#login">Вход</a></li>
                </ul>

                <div class="tab-content">
                    <div id="signup">   
                        <h1>Авторизация</h1>

                        <form action="loginform.php" method="post">

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

                        <form action="loginform.php" method="post">

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

                            <button type="submit" name="do_login" class="button button-block"/>Войти</button>

                        </form>

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
            } else {
                echo '<div style="color: red;">' . array_shift($errors) . '</div><hr>';
            }
        }

        if (isset($data['do_login'])) {

            $errors = array();

            $user = R::findOne('usertable', 'login = ?', array($data['login']));
            if ($user) {
                if (password_verify($data['password'], $user->password)) {
                    $_SESSION['logged_user'] = $user;
                    // 'Все хорошо!';
                    echo '<div style="color: green;">Вы авторизованы!</div><hr>';
                } else {
                    $errors[] = 'Пароль введен неверно!';
                }
            } else {
                $errors[] = 'Пользователь с таким логином не найден!';
            }
            if (!empty($errors)) {
                echo '<div style="color: red;">' . array_shift($errors) . '</div><hr>';
            }
        }

//print_r('Привет из Net Beance');
        ?>

    </body>
</html>

