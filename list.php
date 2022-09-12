<?php
session_start();

if (!isset($_SESSION['id'])) {
   echo("<script>alert('Puslapis nerastas')</script>");
                echo("<script>window.location = 'home.php';</script>");           
}
 if (isset($_POST['check'])) {

    $check_in = $_POST['date_in'];
    $check_out = $_POST['date_out'];
  }
  else{
    echo("<script>alert('Neįvestos datos!')</script>");
    echo("<script>window.location = 'home.php';</script>");
  }

 if ($check_in >= $check_out) {

  echo("<script>alert('Klaidingai įvestos datos!')</script>");
    echo("<script>window.location = 'home.php';</script>");
  }
  else{
?>

<!DOCTYPE html>
<html lang="lt">
<head>
	<meta charset="utf-8">
	<title>Laisvi Kambariai</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title>Sąrašas Kambarių</title>
</head>
<body >

<!-- Add Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rezervacija</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Uždaryti">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="reservation.php" method="post">
         	<input type="hidden" name="room_id" id="room_id">
         	<input type="hidden" name="in" id="in">
         	<input type="hidden" name="out" id="out">
          <input type="hidden" name="guest_id" id="guest_id">
         	<input type="hidden" name="status" class="form-control" value="Rezervuota">
          <div class="form-group">
            <label for="exampleInputName1">Vardas</label>
              <input type="text" name="name" class="form-control" pattern="[A-Ža-ž]{4,}" required placeholder="Įveskite vardą">
           </div>
          <div class="form-group">
            <label for="exampleInputSurname1">Pavardė</label>
              <input type="text" name="surname" class="form-control" pattern="[A-Ža-ž]{4,}" required placeholder="Įveskite pavardę">
           </div>
          <div class="form-group">
            <label for="exampleInputRole1">Telefonas</label>
            <input type="text" name="telefone" class="form-control" pattern="[+0-9]{9,}" required placeholder="Įveskite telefono numerį">
           </div>
          <div class="form-group">
            <label for="exampleInputEmail1">El. paštas</label>
              <input type="email" name="email" class="form-control" required placeholder="Įveskite el. paštą">
          </div>
          <div class="form-group">
            <label for="exampleInputRole1">Adresas</label>
            <input type="text" name="address" class="form-control" required placeholder="Įveskite adresą">
            <small>Pvz.: Šermūkšnių g., 69</small>
           </div>
           <div class="form-group">
            <label for="exampleInputRole1">Miestas</label>
            <input type="text" name="city" class="form-control" pattern="[A-Ža-ž]{4,}" required placeholder="Įveskite miestą">
           </div>
           <div class="form-group">
            <label for="exampleInputRole1">Šalis</label>
            <input type="text" name="country" class="form-control" pattern="[A-Ža-ž]{4,}" required placeholder="Įveskite šalį">
           </div>
            <div class="modal-footer">
              <button type="submit" name="save_edit"class="btn btn-dark">Pateikti</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Atšaukti</button>
            </div>
      </form>
      </div>
  </div>
</div>
</div>
<div class="rooms">
  <?php include('bar.php');?>
  <div class="list"></div>
            <div class="container h-50">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4">
                    	 <h1 class="text-uppercase text-white font-weight-bold">Kambariai</h1>
                    </div>
                </div>
            </div>
        </div>
<section class="page-section bg-dark">

		<div class="container">	
				<div class="col-lg-12">	
						<div class="card">

							<div class="card-body">	
									<form action="list.php" id="filter" method="POST">
			        					<div class="row">
			        						<div class="col-md-3">
			        							<label for="">Atvykimo data</label>
			        							<input type="date" class="form-control datepicker" name="date_in" autocomplete="off" value="<?php echo $check_in; ?>">
			        						</div>
			        						<div class="col-md-3">
			        							<label for="">Išvykimo data</label>
			        							<input type="date" class="form-control datepicker" name="date_out" autocomplete="off" value="<?php echo $check_out; ?>">
			        						</div>
			        						<div class="col-md-3">
			        							<br>
			        							<button class="btn-btn-block btn-primary mt-3" name="check">Tikrinti Užimtumą</button>
			        						</div>

			        					</div>
			        				</form>
							</div>

						</div>
						<hr>
						        <?php
                             include('db_connect.php');

                              if (isset($_POST['check'])) {
                                $duration = round((strtotime($check_out) - strtotime($check_in)) / (60 * 60 * 24));
                               
                                  $sql = "SELECT DISTINCT(Room_Number), Room_Number FROM room WHERE Room_Number not in (SELECT Room_Number FROM reservation
                                     WHERE '$check_in' BETWEEN date(Check_In) and  date(Check_Out) OR '$check_out' BETWEEN date(Check_In) and date(Check_Out))";
                                    

                                     $result = mysqli_query($conn, $sql);
                                      if (mysqli_num_rows($result) > 0) {
                                       while ($row = mysqli_fetch_assoc($result)) {
                                        $room = $row['Room_Number'];


                                         $sql1 = "SELECT r.Room_ID,  r.Room_Type_ID, r.Price, r.img, room_type.Room_Space, room_type.Beds, room_type.Bed_single, room_type.Bed_duos, room_type.TV, room_type.WC, room_type.Shower, room_type.Bath, room_type.Microwave_oven, room_type.Balcony, room_type.WiFi, room_type.Refrigerator, r.Room_Number AS room
                                           FROM room r
                                           LEFT JOIN room_type ON room_type.Room_Type_ID = r.Room_Type_ID
                                           WHERE r.Room_Number = '$room' ";
                                                 $result1 = mysqli_query($conn, $sql1);
                                                if (mysqli_num_rows($result1) > 0) {
                                          while ($row = mysqli_fetch_assoc($result1)) {

                                         $room1 = $row['room'];
                                         $price = $duration * ($row['Price']);

                                                  
                                                   echo $room1;
                                                   echo " ";
                                                  


?>
              <div class="card item-rooms mb-3">
							<div class="card-body">
								<div class="row">
								<div class="col-md-5">
									<img src="./img/<?php echo $row['img'];?>">
								</div>
								<div class="col-md-5">
									<h3><span> <?php echo $row['Price']; ?>&euro;/ naktis</span></h3>
									<h5><span> <?php echo $price; ?>&euro;</span></h5>

									<h6><b>Plotas:</b> <?php echo $row['Room_Space'];?></h6>
									<h6><b>Lovų skaičius:</b> <?php echo $row['Beds'];?></h6>
									<h6><b>Lovų tipas:</b>
                    <?php 
                    if ($row['Bed_single'] > 0) {
                      echo "<br>".$row['Bed_single']."x <i class='far fa-male' aria-hidden='true'></i><br>";
                    }else{
                      echo "<br>";

                    }
                    if ($row['Bed_duos'] > 0) {
                      echo "".$row['Bed_duos']."x <i class='far fa-male' aria-hidden='true'><i class='far fa-male' aria-hidden='true'></i></i>";
                    }else{
                      

                    }?>
                  </h6>
                    
                  
              
                  <?php
                       if ($row['TV'] == 1) {
                          echo "<i class='far fa-television' aria-hidden='true'> Televizorius</i>";
                        }
                        
                        else{
                          
                        }
                        if ($row['WC'] == 1) {
                         echo "<i class='far fa-toilet' aria-hidden='true'> Tualetas</i>";
                        }
                        else{
                          
                        }
                        if ($row['Shower'] == 1) {
                           echo "<i class='far fa-shower' aria-hidden='true'> Dušas</i>";
                        }
                        else{
                          
                        }
                        if ($row['Bath'] == 1) {
                          echo "<i class='far fa-bath' aria-hidden='true'> Vonia</i>";
                        }
                        else{
                          
                        }
                        if ($row['Balcony'] == 1) {
                         echo "<i class='far fa-cloud-sun' aria-hidden='true'> Balkonas</i>";
                        }
                        else{
                          
                        }
                        if ($row['WiFi'] == 1) {
                          echo "<i class='far fa-wifi' aria-hidden='true'> WiFi</i>";
                        }
                        else{
                          
                        }
                        if ($row['Microwave_oven'] == 1) {
                         echo "<i class='far fa-utensils' aria-hidden='true'> Orkaitė</i>";
                        }
                        else{
                          
                        }
                        if ($row['Refrigerator'] == 1) {
                          echo "<i class='far fa-snowflake' aria-hidden='true'> Šaldytuvas</i>";
                        }
                        else{
                          
                        }
                        ?>
									<div class="align-self-end mt-5">                                     
										<table id="usertable" class="table col-md-12">
                                         <thead>
                                          <tr>
                                           <th>#</th>
                                           <th>#</th>
                                           <th>#</th>
                                           <th>#</th>
                                           </tr>
                                            </thead>
                                            <tbody>
                                            	<tr>
                                                 <td class="hidden"><?php echo $row['Room_ID'];?></td>
                                                 <td class="hidden"><?php echo $check_in;?></td>
                                                 <td class="hidden"><?php echo $check_out;?></td>
                                                 <td class="hidden"><?php echo $_SESSION['id']?></td>
                                                 <td><button class="btn btn-primary float-right booking" type="button" data-toggle='modal' data-target='#add'>Rezervuoti</button></td>
                                             </tr>

                                                  </tbody>
                                                  </table>
                                                
										
									</div>
								</div>
							</div>
							</div>

						</div>

      <?php                                                             
         }
         }
}
}
        
  }
        

?>

				</div>	
		</div>
    <?php include('copyright.php'); ?>	
</section>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 <script type="text/javascript">
 	$(document).ready(function(){
     $('.booking').on('click', function() {

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();

      console.log(data);

      var $id = $('#room_id').val(data[0]);
      $('#in').val(data[1]);
      $('#out').val(data[2]);
      $('#guest_id').val(data[3]);    
      });
 });
 </script>
  <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
</body>
</html>

        <?php }?>