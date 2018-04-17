<html>
    <?php require 'includes/gallery/gallery.php'; require 'includes/prices/prices.php';?>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title>Дебаггер</title>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="images/favicon.png">

    </head>
    <body>
                
        <?php 
            //echo '<pre>' . getCategoryByNameForIsotope("cat-1") . '</pre>'
            //outputAllImageFromGallery("cat-3");
            //echo getArticleForImage(getCategoryByNameForIsotope("cat-1"));
            //echo getAllImageByNameForIsotope($name_for_isotope)("cat-1");
            //phpinfo();
            //$data = $_SESSION;
            //echo $_SESSION['logged_user']['password'];
            //$user = R::findOne('usertable', 'login = ?', array($data['login']));
        
            //setItemAuthorization();
            //setLike('467');
            echo existLikeByID('467');
        //getAllLikes();
        
        ?>

    </body>

</html>