<?php
// include 'DBfunctions.php';

$pageName = str_replace(array("/index.php/", "/index.php"), "", "$_SERVER[PHP_SELF]");
$pageName = $pageName ?: "dashboard";
$title = ucfirst(preg_replace('/(?<=\w)(?=[A-Z])/', ' ', $pageName));


$path = explode('-', $pageName);
$folder = implode('/', array_slice($path, 0, -1)) . '/';
$file = !empty($path) ? end($path) : 'dashboard';
$page = $folder . $file . ".php";

// $page = $_GET["p1"].$_GET["p2"]."php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_GET["p2"]?></title>
    <?php
        include './files/styles.html';
    ?>
    <script src="assets/js/jquery-3.6.0.min.js"></script>
</head>

<body>

    <div id="global-loader">
        <div class="whirly-loader"></div>
    </div>
    <div class="main-wrapper">
        <?php
        if ($file == 'studentLoginForm' || $file == 'studentRegistrationForm') {
            include "$page";
        } else {
            include "./files/header.html";
            include "$page";
        }
        include "./files/script.html";

        ?>

    </div>
    <script>
        // document.title = "<?php echo $title; ?>";
        $(".<?php echo $file; ?>").addClass("active");

    </script>
</body>

</html>