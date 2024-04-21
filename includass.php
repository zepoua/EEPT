
<!DOCTYPE html>
<html lang="en">

<!--   Tue, 07 Jan 2020 03:33:27 GMT -->
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title></title>

<!-- General CSS Files -->
<link rel="stylesheet" href="Css/vendors/bootstrap.min.css">
<link rel="stylesheet" href="Css/vendors/all.min.css">
<link rel="stylesheet" a href="Css/fontawesome.min.css">


<!-- CSS Libraries -->
<link rel="stylesheet" href="Css/vendors/jqvmap.min.css">
<link rel="stylesheet" href="Css/vendors/summernote-bs4.css">
<link rel="stylesheet" href="Css/vendors/owl.carousel.min.css">
<link rel="stylesheet" href="Css/vendors/owl.theme.default.min.css">

<!-- Template CSS -->
<link rel="stylesheet" href="Css/vendors/style.min.css">
<link rel="stylesheet" href="Css/vendors/components.min.css">

</head>
<body class="layout-4">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <span class="loader"><span class="loader-inner"></span></span>
</div>

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        
        <!-- Start app top navbar -->
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                </ul>
                <div class="search-element">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="400">
                    <div class="search-backdrop"></div>
                </div>
            </form> 
            <ul class="navbar-nav navbar-right">
                
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <img alt="image" src="Média/avatar-1.png" class="rounded-circle mr-1">
                    <div class="d-sm-none d-lg-inline-block">
                        <?php
                            echo date("d/m/Y")." ".date("h:i"). "<br>";
                        ?>
                    </div></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-title">Vous êtes connectez</div>
                        <div class="dropdown-divider"></div>
                        <a href="index.php" class="dropdown-item has-icon text-danger"><i class="fas fa-sign-out-alt"></i> Se déconnecter</a>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- Start main left sidebar menu -->
        <div class="main-sidebar sidebar-style-3">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="index.php">EEPT</a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="index.php">CP</a>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">Gestion des AGENTS</li>
                    <li class="dropdown active">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Recrutement</span></a>
                        <ul class="dropdown-menu">
                            <li class="active"><a class="nav-link" href="listeagentass.php">Modifier un Agent</a></li>
                        </ul>
                    </li>
                    <li class="menu-header">Types d'agent et etats</li>
                    <li class="dropdown">
                        <a href="type_agentass.php" class="nav-link "><i class="fas fa-th"></i> <span>Gestion des Types d'Agent</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="etatass.php" class="nav-link "><i class="fas fa-th"></i> <span>Gestion des Etats</span></a>
                    </li>

                    <li class="menu-header">Affectations et mutations</li>
                    
                    <li class="dropdown">
                        <a href="affecterass.php" class="nav-link"><i class="fas fa-map-marker-alt"></i> <span>Affectations</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="muterass.php" class="nav-link "><i class="fas fa-plug"></i> <span>Mutations</span></a>
                    </li>
                    <li class="menu-header">Pages</li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Authentification</span></a>
                        <ul class="dropdown-menu">
                            <li><a href="login.php">Login</a></li> 
                        </ul>
                    </li>
                    
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i> <span>Listes et Affichages</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="agent.php">Liste des Agents</a></li>
                            <li><a class="nav-link" href="agent.php">Liste des Etats des agents</a></li>
                            <li><a class="nav-link" href="agent.php">Liste des Structures</a></li>
                            <li><a class="nav-link" href="agent.php">Liste des Fonctions</a></li>
                            <li><a class="nav-link" href="agent.php">Liste des Affectations</a></li>
                            <li><a class="nav-link" href="agent.php">Liste des Mutations</a></li>
                        </ul>
                    </li>
                   
                </ul>
                <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                    <a href="https://getcodiepie.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split"><i class="fas fa-rocket"></i> Documentation</a>
                </div>
            </aside>
        </div>
       
       
    </div>
</div>

<!-- General JS Scripts -->
<script src="Javascript/vendors/lib.vendor.bundle.js"></script>
<script src="Javascript/vendors/CodiePie.js"></script>

<!-- JS Libraies -->
<script src="Javascript/vendors/jquery.sparkline.min.js"></script>
<script src="Javascript/vendors/chart.min.js"></script>
<script src="Javascript/vendors/owl.carousel.min.js"></script>
<script src="Javascript/vendors/summernote-bs4.js"></script>
<script src="Javascript/vendors/jquery.chocolat.min.js"></script>

<!-- Page Specific JS File -->
<script src="Javascript/vendors/index.js"></script>

<!-- Template JS File -->
<script src="Javascript/vendors/scripts.js"></script>
<script src="Javascript/vendors/custom.js"></script>
</body>
</html>