<?php
    include 'functions.php';
    include './files/script.html';
    
    $pageName = str_replace(array("/index.php/", "/index.php"), "", "$_SERVER[PHP_SELF]");
    $pageName = $pageName ?: "dashboard";
    $title = ucfirst(preg_replace('/(?<=\w)(?=[A-Z])/',' ',$pageName));
    $page = $pageName.".php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php 
        include './files/styles.html';
        if($pageName == 'studentLoginForm' || $pageName == 'studentRegistrationForm'){
            include "$page";
        }else{
    ?>
</head>
<body>
    <div id="global-loader">
        <div class="whirly-loader"></div>
    </div>
    <div class="main-wrapper">
    <?php
        include './files/header.html';
        include "$page";
    ?>
</div>
<?php
     }
?>
<script>
    document.title = "<?php echo $title;?>";
    $(".<?php echo $pageName;?>").addClass("active");
</script>
</body>
</html>