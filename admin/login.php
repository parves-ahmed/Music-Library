<?php
include "../class/AdminLogin.php";

$ad = new AdminLogin();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $adminUser = $_POST['adminUser'];
    $adminPass = md5($_POST['adminPass']);

    $checkLogin = $ad->adminLogin($adminUser,$adminPass);
}


?>

<!Doctype html>
<head>
    <link rel="stylesheet" href="../css/admin-login.css">
    <script src="https://code.jquery.com/jquery-2.1.0.min.js" ></script>
</head>
<body>
<div id="formWrapper">

    <div id="form">
        <div class="logo">
            <h1 id="fh5co-logo"><a href="../index.php"><img src="../images/logo.png" alt="logo"></a></h1>
        </div>
        <span style="color:red;">
            <?php
            if(isset($checkLogin)){
                echo $checkLogin;
            }
            ?>
        </span>

        <form action="" method="post">
            <div class="form-item">
                <p class="formLabel">UserName</p>
                <input type="text" name="adminUser" id="email" class="form-style" autocomplete="off"/>
            </div>
            <div class="form-item">
                <p class="formLabel">Password</p>
                <input type="password" name="adminPass" id="password" class="form-style" />

            </div>

            <input type="submit" class="login pull-right" value="Log In" name="submit">
            <div class="clear-fix"></div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        var formInputs = $('input[type="text"],input[type="password"]');
        formInputs.focus(function() {
            $(this).parent().children('p.formLabel').addClass('formTop');
            $('div#formWrapper').addClass('darken-bg');
            $('div.logo').addClass('logo-active');
        });
        formInputs.focusout(function() {
            if ($.trim($(this).val()).length == 0){
                $(this).parent().children('p.formLabel').removeClass('formTop');
            }
            $('div#formWrapper').removeClass('darken-bg');
            $('div.logo').removeClass('logo-active');
        });
        $('p.formLabel').click(function(){
            $(this).parent().children('.form-style').focus();
        });
    });
</script>
</body>
</html>