<?php
session_start();
include('bar.php');
?>
<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="utf-8">
    <title>STARHOTEL</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<body class="bd">
     <div class="masthead">
            <div class="main">
                <div class="row align-items-center justify-content-center text-center">
                    <div class="col-lg-11 align-self-end mb-4 ">
                        <div class="card" id="filter-book">
                            <div class="card-body">
                                <div class="container-fluid">
                                    <form action="list.php" method="POST">
                                        <div class="row">
                                             <?php 
                                            if (isset($_SESSION['id'])) {
                                            ?>
                                            <div class="col-md-3 sss">
                                                <label for="">Atvykimo data</label>
                                                <input type="date" class="form-control datepicker" name="date_in" autocomplete="off" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="">Išvykimo data</label>
                                                <input type="date" class="form-control datepicker" name="date_out" autocomplete="off" required>
                                            </div>
                                           
                                            <div class="col-md-3 sss">
                                                <br>
                                                <button type="submit" name="check" class="btn-btn-block btn-primary mt-3">Tikrinti užimtumą</button>
                                            </div>
                                    <?php     }else {?>
                                                <div class="col-md-12 sss">
                                                <br>
                                                <h5 class="text text-danger">Prisijunkite norint rezervuoti kambarį</h5>
                                            </div>
                                        
                                   <?php } ?>
                                            

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div style="height: 150px;"></div>
        <?php 
        include('copyright.php');
        ?>

</body>
</html>

       
         
