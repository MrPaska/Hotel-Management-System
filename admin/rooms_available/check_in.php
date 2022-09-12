<?php
session_start();
include('../links/check_session.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../css/style.css">
	<title>Lasvi/Užimti Kambariai</title>
</head>
<body>
<?php include('../links/navbar.php'); ?>
	<h1 id="pav1">Laisvi/Užimti</h1>

	<!-- Edit Modal -->
<div class="modal fade" id="change" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Būsenos koregavimas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Uždaryti">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form name="edit_form" action="edit_free_busy_rooms.php" method="post">
              <input type="hidden" name="edit_id" id="edit_id">
          <div class="form-group">
            <label for="exampleInputName1">Kambarys</label>
              <input type="number" name="e_room" id="e_room" class="form-control" min="100" required readonly>
          </div>
           <div class="form-group">
            <label for="exampleInputSurname1">Būsena</label>
              <select class="form-control" name="e_status" id="e_status" required>
              	<option value="Laisvas">Laisvas</option>
              	<option value="Užimtas">Užimtas</option>
              	<option value="Rezervuota">Rezervuota</option>
              </select>
           </div>
          <div class="modal-footer">
              <button type="submit" name="save_edit" class="btn btn-dark">Išsaugoti</button>
              <button type="button" name="cancel" class="btn btn-danger" data-dismiss="modal">Atšaukti</button>
            </div>
      </form>
      </div>
  </div>
</div>
</div>
<div class="container-fluid">
	<div class="col-lg-12">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
             <form action="" method="get">
<div class="input-group mb-3 searchwindow col-lg-6 float-left">
  <input type="text" name="search" class="form-control" placeholder="Ieškoti">
  <div class="input-group-append">
    <button type="submit" class="btn btn-dark">Ieškoti</button>
  </div>
</div>
</form>
					<div class="card-body">
						<table class="table-striped table-bordered col-md-12">
							<thead>
								<!--<th class="text-center">#</th>-->
                <th class="text-center">#</th>
								<th class="text-center">Nuotrauka</th>
                <th class="text-center">Kambario Nr.</th>
								<th class="text-center">Kambario Tipo Nr.</th>
								<th class="text-center">Kaina</th>
								<th class="text-center">Būsena</th>
							</thead>
							<tbody>
								<?php include('show.php');?>
		
							</tbody>
						</table>
					</div>
				</div>
			</div>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
	$('.editbtn').on('click', function() {

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();

      console.log(data);

      var $id = $('#edit_id').val(data[0]);
      $('#e_room').val(data[2]);
      $('#e_status').val(data[5]);
      });
</script>
</body>
</html>

