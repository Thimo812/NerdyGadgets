<!-- de inhoud van dit bestand wordt bovenaan elke pagina geplaatst -->
<?php
if (!isset($_SESSION)) {
    session_start();
}
include "database.php";
$databaseConnection = connectToDatabase();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>NerdyGadgets</title>

    <!-- Javascript -->
    <script src="Public/JS/fontawesome.js"></script>
    <script src="Public/JS/jquery.min.js"></script>
    <script src="Public/JS/bootstrap.min.js"></script>
    <script src="Public/JS/popper.min.js"></script>
    <script src="Public/JS/resizer.js"></script>

    <!-- Style sheets-->
    <link rel="stylesheet" href="Public/CSS/style.css" type="text/css">
    <link rel="stylesheet" href="Public/CSS/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="Public/CSS/typekit.css">
</head>
<body>
<div class="Background">
    <div class="row" id="Header">
        <div class="col-2"><a href="./" id="LogoA">
                <div id="LogoImage"><img src="Public/Img/NerdyGadgetsLogo.png"></div>
            </a></div>
        <div class="col-8" id="CategoriesBar">
            <ul id="ul-class">
                <?php
                $HeaderStockGroups = getHeaderStockGroups($databaseConnection);

                foreach ($HeaderStockGroups as $HeaderStockGroup) {
                    ?>
                    <li>
                        <a href="browse.php?category_id=<?php print $HeaderStockGroup['StockGroupID']; ?>"
                           class="HrefDecoration"><?php print $HeaderStockGroup['StockGroupName']; ?></a>
                    </li>
                    <?php
                }
                ?>
                <li>
                    <a href="categories.php" class="HrefDecoration">All categories</a>
                </li>
            </ul>
        </div>
        <!-- code voor US3: zoeken -->
        <div class="right-header">
            <ul id="ul-class-navigation">
                <li>
                    <a href="browse.php" class="HrefDecoration"><i class="fas fa-search search"></i> Search</a>
                    <a href="cart.php" class="HrefDecoration"><img style="margin-right: 10px" class="Cart-Image" src="Public/Img/winkelwagen.png">Cart</a>
                    <div class="dropdown">
                        <button class="account-button"><img style="margin-right: 10px" class="cart-image" src="Public/Img/account.png"><?php echo (ISSET($_SESSION["klantID"])) ? getName($databaseConnection, $_SESSION["klantID"]) : "Account"?></button>
                        <div class="dropdown-content">
                            <?php if (ISSET($_SESSION["klantID"])) { ?>
                                <a class="login-header" href="account.php">Account</a>
                                <a class="login-header" href="Logout.php">Log out</a>
                            <?php } else { ?>
                            <a class="login-header" href="Login.php">Log in</a>
                            <a class="login-header" href="register.php">Register</a>
                            <?php } ?>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <!-- einde code voor US3 zoeken -->
    </div>
    <div class="row" id="Content">
        <div class="col-12">
            <div id="SubContent">