<?php
session_start();
include('../links/check_session.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../css/style.css">
	<title>Kambariai</title>
</head>
<body>
<?php include('../links/navbar.php'); ?>
	<!-- Edit Modal -->
<div class="modal fade" id="change" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Koreguoti kambarį</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Uždaryti">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form name="edit_form" action="edit_room.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="edit_id" id="edit_id">
          <div class="form-group">
            <label for="e_room">Kambarys</label>
              <input type="number" name="e_room" id="e_room" class="form-control" min="100" required>
           </div>
          <div class="form-group">
            <label for="e_type">Kambario tipas</label>
              <input type="number" name="e_type" id="e_type" class="form-control" min="0" required>
           </div>
           <div class="form-group">
            <label for="e_status">Būsena</label>
              <select class="form-control" name="e_status" id="e_status">
              	<option value="1">Laisvas</option>
              </select>
           </div>
          <div class="form-group">
            <label for="e_price">Kaina</label>
               <input type="number" name="e_price" id="e_price" class="form-control" min="0" required>   
           </div>
           <div class="form-group">
            <label for="e_img">Nuotrauka</label>
               <input type="file" name="e_img" id="e_img" class="form-control" required>   
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

<!-- Delete Modal -->
<div class="modal fade" id="delete_form" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Uždaryti">
          <span>&times;</span>
        </button>
      </div>
<form action="delete_room.php" method="post" >
  <div class="modal-body">
      <input type="hidden" name="delete_id" id="delete_id">
      <h4> Ar tikrai norite pašalinti šį kambarį? </h4>
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

	<h1 id="pav1">Kambariai</h1>
<div class="container-fluid">
	<div class="col-lg-13">
		<div class="row">
			<div class="col-md-4">
			<form action="new_room.php" method="post" enctype="multipart/form-data" id="forma">
				<div class="card">
					<div class="card-header">
						    Kambarių forma
				  	</div>
					<div class="card-body">
							<input type="hidden" name="edit_id" id="edit_id">
							<div class="form-group">
								<label class="control-label">Kambarys</label>
								<input type="number" class="form-control" name="room" min="1" required placeholder="Įrašykite kambario nr.">
							</div>
							<div class="form-group">
								<label>Kambario tipas</label>
								<select class="form-control" name="type">
                  <?php include('form.php'); ?>
									 
                </select>
              	 </div>
							
							<div class="form-group">
								<label class="control-label">Kaina</label>
								<input type="number" class="form-control text-right" name="price" min="0" required placeholder="Įveskite kainą">
							</div>
							<div class="form-group">
                  <label class="control-label">Pridėti Nuotrauką</label>
                  <input type="file" class="form-control-file text-righ" name="img">
                 </div>
					</div>
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button type="submit" name="save" class="btn btn-sm btn-primary col-sm-3 offset-md-3">Išsaugoti</button>
								<button type="button" id="cancel" class="btn btn-sm btn-default col-sm-3" type="button">Atšaukti</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>

			<div class="col-md-8">

				<div class="card">

					<div class="card-body">
             <form action="" method="get">
<div class="input-group mb-3 searchwindow col-lg-7 float-left">
  <input type="text" name="search" class="form-control" placeholder="Ieškoti">
  <div class="input-group-append">
    <button type="submit" class="btn btn-dark">Ieškoti</button>
  </div>
</div>
</form>
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
                  <th class="text-center">#</th>
									<th class="text-center">Nuotrauka</th>
                  <th class="text-center">Kambario Nr.</th>
									<th class="text-center">Tipas</th>
									<th class="text-center">Kaina</th>
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
		</div>
	</div>	
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript">
  $(document).ready(function(){
  	 $('#cancel').click(function(){
        $('#forma')[0].reset();
  });

  	 $('.editbtn').on('click', function() {

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function() {
        return $(this).text();
      }).get();

      console.log(data);

      var $id = $('#edit_id').val(data[0]);
      $('#e_room').val(data[2]);
      $('#e_type').val(data[3]);
      $('#e_price').val(data[4]);
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

