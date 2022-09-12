<?php
session_start();
include("../links/check_session.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  
	<title>Svečiai</title>
</head>
<body>
    <?php include ("../links/navbar.php")?>
	<h1 id="pav1">Svečiai</h1>

<!-- Add Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pridėti Svečią</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Uždaryti">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="new_guest.php" method="post">
          <div class="form-group">
            <label>Vardas</label>
              <input type="text" name="name" class="form-control" pattern="[A-Ža-ž]{4,}" required placeholder="Įveskite vardą">
           </div>
          <div class="form-group">
            <label>Pavardė</label>
              <input type="text" name="surname" class="form-control" pattern="[A-Ža-ž]{4,}" required placeholder="Įveskite pavardę">
           </div>
           <div class="form-group">
            <label>Vartotojo vardas</label>
              <input type="text" name="username" class="form-control" pattern="[A-Ža-ž0-9]{4,}" required placeholder="Įveskite vartotojo vardą">
           </div>
          <div class="form-group">
            <label>Telefonas</label>
            <input type="text" name="telefone" class="form-control" pattern="[+0-9]{9,}" required placeholder="Įveskite telefono numerį">
           </div>
          <div class="form-group">
            <label>El. paštas</label>
              <input type="email" name="email" class="form-control" required placeholder="Įveskite el. paštą">
          </div>
          <div class="form-group">
            <label>Adresas</label>
            <input type="text" name="address" class="form-control" required placeholder="Įveskite adresą">
            <small>Pvz.: Šermūkšnių g., 69</small>
           </div>
           <div class="form-group">
            <label>Miestas</label>
            <input type="text" name="city" class="form-control" pattern="[A-Ža-ž]{4,}" required placeholder="Įveskite miestą">
           </div>
           <div class="form-group">
            <label>Šalis</label>
            <input type="text" name="country" class="form-control" pattern="[A-Ža-ž]{4,}" required placeholder="Įveskite šalį">
           </div>
           <div class="modal-footer">
              <button type="submit" name="save" class="btn btn-dark">Išsaugoti</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Atšaukti</button>
            </div>
      </form>
      </div>
  </div>
</div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="change" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Koreguoti svečią</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Uždaryti">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form name="edit_form" action="edit_guest.php" method="post">
              <input type="hidden" name="edit_id" id="edit_id">
          <div class="form-group">
            <label for="e_name">Vardas</label>
              <input type="text" name="e_name" id="e_name" class="form-control" pattern="[A-Ža-ž]{4,}" required>
           </div>
          <div class="form-group">
            <label for="e_surname">Pavardė</label>
              <input type="text" name="e_surname" id="e_surname" class="form-control" pattern="[A-Ža-ž]{4,}" required>
           </div>
           <div class="form-group">
            <label>Vartotojo vardas</label>
              <input type="text" name="e_username" id="e_username" class="form-control" pattern="[A-Ža-ž0-9]{4,}" required>
           </div>
          <div class="form-group">
            <label for="e_telefone">Telefonas</label>
            <input type="text" name="e_telefone" id="e_telefone" class="form-control"  pattern="[+0-9]{9,}" required>
           </div> 
          <div class="form-group">
            <label for="e_email">El. paštas</label>
              <input type="email" name="e_email" id="e_email" class="form-control" required>
           </div>
          <div class="form-group">
            <label for="e_address">Adresas</label>
              <input type="text" name="e_address" id="e_address" class="form-control" required>
              <small>Pvz.: Šermūkšnių g., 69</small>
           </div>
          <div class="form-group">
            <label for="e_city">Miestas</label>
              <input type="text" name="e_city" id="e_city" class="form-control" pattern="[A-Ža-ž]{4,}" required>
            </div>
            <div class="form-group">
            <label for="e_country">Šalis</label>
              <input type="text" name="e_country" id="e_country" class="form-control" pattern="[A-Ža-ž]{4,}" required>
            </div>
          <div class="modal-footer">
              <button type="submit" name="save_edit" class="btn btn-dark">Išsaugoti</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Atšaukti</button>
            </div>
      </form>
      </div>
  </div>
</div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="delete_form" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Uždaryti">
          <span>&times;</span>
        </button>
      </div>
<form action="delete_guest.php" method="post">
  <div class="modal-body">
      <input type="hidden" name="delete_id" id="delete_id">
      <h4> Ar tikrai norite pašalinti šį svečią? </h4>
           </div>
             <div class="modal-footer">
              <button type="submit" name="delete_data" class="btn btn-dark">Pašalinti</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Atšaukti</button>
              </div>
            </form>
          </div>
        </div>
      </div>
</form>

<!-- Button -->
<div class="container-fluid">
  <div class="row">
  <div class="col-lg-12">
      <button class="btn btn-dark badge-pill" data-toggle="modal" data-target="#add">Pridėti Svečią</button>
  </div>
  </div>
  <br>
  <!-- Search -->
   <form action="" method="get">
<div class="input-group mb-3 searchwindow col-lg-5 float-left">
  <input type="text" name="search" class="form-control" placeholder="Ieškoti">
  <div class="input-group-append">
    <button type="submit" class="btn btn-dark">Ieškoti</button>
  </div>
</div>
</form>

<!-- Table -->
    <div class="card col-lg-12">
      <div class="card-body" id="usertable">
        <table class="table col-md-12">
      <thead class="table">
        <tr>
          <th class="text-center">#</a></th>
          <th class="text-center">Vardas</a></th>
          <th class="text-center">Pavardė</a></th>
          <th class="text-center">Vartotojas</a></th>
          <th class="text-center">Telefonas</a></th>
          <th class="text-center">Paštas</a></th>
          <th class="text-center">Adresas</a></th>
          <th class="text-center">Miestas</a></th>
          <th class="text-center">Šalis</a></th>
          <th class="text-center">Veiksmas</th>
        </tr>
      </thead>
      <tbody>  
               <?php include('show.php')?>       
               
            </tbody>
        </table>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
	$(document).ready(function(){
    $('#add').on('hidden.bs.modal', function () {
       $('#add form')[0].reset();
    });

    $('.editbtn').on('click', function() {

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();

      console.log(data);

      var $id = $('#edit_id').val(data[0]);
      $('#e_name').val(data[1]);
      $('#e_surname').val(data[2]);
      $('#e_username').val(data[3]);
      $('#e_telefone').val(data[4]);
      $('#e_email').val(data[5]);
      $('#e_address').val(data[6]);
      $('#e_city').val(data[7]);
      $('#e_country').val(data[8]);
      
      });

    $('.deletebtn').on('click', function() {

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();

      console.log(data);

      $('#delete_id').val(data[0]);
     });
    
});
</script>
</body>
</html>