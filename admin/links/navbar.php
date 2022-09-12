
<!DOCTYPE html>
<html lang="lt">
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <link rel="stylesheet" type="text/css" href="../css/style.css">
  </head>
  <body><div class="area"></div><nav class="main-menu">
            <ul>
                <li>
                    <a href="/Hotel%20Management%20System/admin/home/home.php">
                        <i class="fa fa-home"></i>
                        <span class="nav-text">
                           Pagrindinis
                        </span>
                    </a>

                    <li>
                    <a href="/Hotel%20Management%20System/admin/guest/guest.php">
                        <i class="fa fa-male"></i>
                        <span class="nav-text">
                           Svečiai
                        </span>
                    </a>
                  
                </li>
                <li class="has-subnav">
                    <a href="/Hotel%20Management%20System/admin/reservation/booked.php">
                        <i class="fa fa-book"></i>
                        <span class="nav-text">
                            Rezervacijos
                        </span>
                    </a>
                    
                </li>
                <li class="has-subnav">
                    <a href="/Hotel%20Management%20System/admin/rooms_available/check_in.php">
                       <i class="fa fa-sign-in"></i>
                        <span class="nav-text">
                            Laisvi/Užimti Kambariai
                        </span>
                    </a>
                    
                </li>
                <li>
                    <a href="/Hotel%20Management%20System/admin/categories/categories.php">
                        <i class="fa fa-list"></i>
                        <span class="nav-text">
                            Kambarių rušys
                        </span>
                    </a>
                </li>
                <li>
                    <a href="/Hotel%20Management%20System/admin/rooms/rooms.php">
                        <i class="fa fa-bed"></i>
                        <span class="nav-text">
                           Kambariai
                        </span>
                    </a>
                </li>
                <?php
                if ($_SESSION['role'] == "Administratorius") {
                ?>
                <li>
                   <a href="/Hotel%20Management%20System/admin/users/users.php">
                       <i class="fa fa-users"></i>
                        <span class="nav-text">
                            Vartotojai
                        </span>
                    </a>
                </li>
                <?php 
            }
            ?>
                <!--<li>
                   <a href="site_settings.php">
                        <i class="fa fa-cogs"></i>
                        <span class="nav-text">
                            Puslapio išvaizdos nustatymai
                        </span>
                    </a>
                </li>-->

                <li>
                   <a href="/Hotel%20Management%20System/admin/comments/comments.php">
                        <i class="fa fa-comments"></i>
                        <span class="nav-text">
                            Atsiliepimai
                        </span>
                    </a>
                </li>
                
            </ul>

            <ul class="logout">
                <li>
                   <a href="/Hotel%20Management%20System/admin/log_out.php">
                         <i class="fa fa-power-off fa-2x"></i>
                        <span class="nav-text">
                            Atsijungti
                        </span>
                    </a>
                </li>
                <li>
                   <a href="/Hotel%20Management%20System/admin//log_out_c.php">
                         <i class="fa fa-door-closed"></i>
                        <span class="nav-text">
                            Pereitį į kliento puslapį
                        </span>
                    </a>
                </li>   
            </ul>
        </nav>
  </body>
    </html>