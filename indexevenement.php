
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="topbar">
            <div class="logo">
                <h2><a href="indexx.php">Cyber robot.</a></h2>
            </div>
        </div>
        <div class="sidebar">
            <ul>
                <li>
                    <a href="indexmembre.php">
                        <i class="fas fa-user"></i>
                        <div >gestion des membres</div>
                    </a>
                </li>
                <li>
                    <a href="indexevenement.php">
                        <i class="fa-solid fa-calendar-days"></i>
                        <div >gestion des evenements</div>
                    </a>
                </li>
                <li>
                    <a href="indextache.php">
                        <i class="fa-solid fa-arrow-trend-up"></i>
                        <div >gestion des taches</div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main">
            <div class="cards">
                <div class="card">
                    <div class="card-content">
                        <div class="card-name"><a href="nouveauevenement.php">nouveau Evenement</a></div>
                    </div>
                    <div class="icon-box">
                        <i class="fa-solid fa-calendar-plus"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="card-name"><a href="rechevenement.php">recherche Evenement</a></div>
                    </div>
                    <div class="icon-box">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="card-name"><a href="listeevenement.php">liste des Evenement</a></div>
                    </div>
                    <div class="icon-box">
                        <i class="fa-solid fa-list"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>