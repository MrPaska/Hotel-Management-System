<?php
session_start();
include('../links/check_session.php');
include('../links/db_connect.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
	<title>Rezervacijos</title>
</head>
<body>
<?php include('../links/navbar.php'); ?>
<h1 id="pav1">Rezervacijos</h1>


<!-- Edit Modal -->
<div class="modal fade" id="change" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Koreguoti rezervaciją</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Uždaryti">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form name="edit_form" action="edit_reservation.php" method="post">
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
            <label for="e_room">Kambarys</label>
              <input type="number" name="e_room" id="e_room" class="form-control" min="1" required>
           </div>
           <div class="form-group">
            <label for="e_check_in">Atvykimo data</label>
              <input type="date" name="e_check_in" id="e_check_in" class="form-control" required>
           </div>
            <div class="form-group">
            <label for="e_check_out">Išvykimo data</label>
              <input type="date" name="e_check_out" id="e_check_out" class="form-control" required>
           </div>
           <div class="form-group">
            <label for="e_adults">Suaugusieji</label>
              <input type="number" name="e_adults" id="e_adults" class="form-control" min="0" required>
           </div>
           <div class="form-group">
            <label for="e_children">Vaikai</label>
              <input type="number" name="e_children" id="e_children" class="form-control" min="0" required>
           </div>
           <div class="form-group">
            <label for="e_sum">Suma</label>
              <input type="number" name="e_sum" id="e_sum" class="form-control" min="0" required>
           </div>
          <div class="form-group">
            <label for="e_status">Būsena</label>
            <select class="form-control" name="e_status" id="e_status" required>
            <option value="Atvyko">Atvyko</option>
            <option value="Rezervuota">Rezervuota</option>
            <option value="Išregistruota">Išregistruota</option>
            <option value="Atšaukta">Atšaukta</option>
            <option value="Neatvyko">Neatvyko</option> 
                </select>
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
<form action="delete_reserv.php" method="post">
  <div class="modal-body">
      <input type="hidden" name="delete_id" id="delete_id">
      <h4> Ar tikrai norite pašalinti šią rezervaciją? </h4>
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

<div class="container-fluid">
  <br>
   <form action="" method="get">
<div class="input-group mb-3 searchwindow col-lg-5 float-left">
  <input type="text" name="search" class="form-control" placeholder="Ieškoti">
  <div class="input-group-append">
    <button type="submit" class="btn btn-dark">Ieškoti</button>
  </div>
</div>
</form>
  <div class="row">
    </div>
    <div class="card col-lg-12">
      <div class="card-body">
        <table id="usertable" class="table col-md-12">
      <thead style="background: #333333; color: white;">
        <tr>
          <th class="text-center">#</th>
          <!--<th style="display: none;">telefone</th>-->
          <th class="text-center">Vardas</th>
          <th class="text-center">Pavardė</th>
          <th class="text-center">Kambarys</th>
          <th class="text-center">Atvykimas</th>
          <th class="text-center">Išvykimas</th>
          <th class="text-center">Suaugusieji</th>
          <th class="text-center">Vaikai</th>
          <th class="text-center">Suma</th>
          <th class="text-center">Būsena</th>
          <th class="text-center">Veiksmas</th>
        </tr>
      </thead>
      <tbody>
      	<?php include('show.php');?>
      </tbody>
  </table>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){

    $('.editbtn').on('click', function() {
      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();
      console.log(data);
      var $id = $('#edit_id').val(data[0]);
      $('#e_name').val(data[1]);
      $('#e_surname').val(data[2]);
      $('#e_room').val(data[3]);
      $('#e_check_in').val(data[4]);
      $('#e_check_out').val(data[5]);
      $('#e_adults').val(data[6]);
      $('#e_children').val(data[7]);
      $('#e_sum').val(data[8]);
      $('#e_status').val(data[9]);
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


	

