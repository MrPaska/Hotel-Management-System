<?php
session_start();
include('../links/check_session.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">
	<title>Kambarių tipai</title>
</head>
<body>
<?php include('../links/navbar.php'); ?>
  <h1 id="pav1">Kambarių rūšys</h1>


<!-- Add Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pridėti kategorija</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Uždaryti">
          <span >&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="new_categorie.php" method="post">
          <div class="form-group">
            <label>Plotas</label>
              <input type="number" name="plot" class="form-control" min="0" required placeholder="Įrašykite kambario plotą">
           </div>
          <div class="form-group">
            <label>Lovos</label>
              <input type="number" name="beds" class="form-control" min="1" required placeholder="Įrašykite lovų skaičių">
           </div>
          <div class="form-group">
            <label>Viengulė</label>
             <input type="number" name="single" class="form-control" min="0" required placeholder="Įrašykite viengulių lovų skaičių">
           </div>
          <div class="form-group">
            <label>Dvigulė</label>
              <input type="number" name="duos" class="form-control" min="0" pattern="[A-Za-z0-9]{4,}" required placeholder="Įrašykite dvigulių lovų skaičių">
           </div>
          <div class="form-check">
          	<label class="form-check-label" for="defaultCheck1">
             <input class="form-check-input" name="tv" type="checkbox" value="1" id="defaultCheck1">
             Televizorius</label>
         </div>
             <div class="form-check">
             <label class="form-check-label" for="defaultCheck2">
             <input class="form-check-input" name="wc" type="checkbox" value="1" id="defaultCheck2">
             Tualetas</label>
           </div>
            <div class="form-check">
             <label class="form-check-label" for="defaultCheck3">
             <input class="form-check-input" name="shower" type="checkbox" value="1" id="defaultCheck3">
             Dušas</label>
           </div>
           <div class="form-check">
             <label class="form-check-label" for="defaultCheck4">
             <input class="form-check-input" name="bath" type="checkbox" value="1" id="defaultCheck4">
             Vonia</label>
           </div>
           <div class="form-check">
             <label class="form-check-label" for="defaultCheck5">
             <input class="form-check-input" name="balcony" type="checkbox" value="1" id="defaultCheck5">
             Balkonas</label>
           </div>
           <div class="form-check">
             <label class="form-check-label" for="defaultCheck6">
             <input class="form-check-input" name="wifi" type="checkbox" value="1" id="defaultCheck6">
             WiFi</label>
           </div>
           <div class="form-check">
             <label class="form-check-label" for="defaultCheck7">
             <input class="form-check-input" name="gas" type="checkbox" value="1" id="defaultCheck7">
             Dujinė</label>
           </div>
           <div class="form-check">
             <label class="form-check-label" for="defaultCheck8">
             <input class="form-check-input" name="ref" type="checkbox" value="1" id="defaultCheck8">
             Šaldytuvas</label>
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
        <h5 class="modal-title" id="exampleModalLabel">Koreguoti kategoriją</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Uždaryti">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="edit_categorie.php" method="post">
         	 <input type="hidden" name="edit_id" id="edit_id">
          <div class="form-group">
            <label for="e_plot">Plotas</label>
              <input type="number" name="e_plot" id="e_plot" class="form-control" min="0" required>
           </div>
          <div class="form-group">
            <label for="e_beds">Lovos</label>
              <input type="number" name="e_beds" id="e_beds" class="form-control" min="1" required>
           </div>
          <div class="form-group">
            <label for="e_single">Viengulė</label>
             <input type="number" name="e_single" id="e_single" class="form-control" min="0" required>
           </div>
          <div class="form-group">
            <label for="e_duos">Dvigulė</label>
              <input type="number" name="e_duos" id="e_duos" class="form-control" min="0" required>
           </div>
          <div class="form-group">
          	 <label for="e_tv">Televizorius</label>
              <input type="text" name="e_tv" id="e_tv" class="form-control" required>
              <small>„Yra“ arba „Nėra“</small>
         </div>
             <div class="form-group">
             	 <label for="e_wc">Tualetas</label>
              <input type="text" name="e_wc" id="e_wc" class="form-control" required>
                <small>„Yra“ arba „Nėra“</small>
           </div>
            <div class="form-group">
              <label for="e_shower">Dušas</label>
              <input type="text" name="e_shower" id="e_shower" class="form-control" required>
              <small>„Yra“ arba „Nėra“</small>
           </div>
           <div class="form-group">
            <label for="e_bath">Vonia</label>
              <input type="text" name="e_bath" id="e_bath" class="form-control" required>
              <small>„Yra“ arba „Nėra“</small>
           </div>
           <div class="form-group">
           <label for="e_balcony">Balkonas</label>
              <input type="text" name="e_balcony" id="e_balcony" class="form-control" required>
              <small>„Yra“ arba „Nėra“</small>
           </div>
           <div class="form-group">
             <label for="e_wifi">WiFi</label>
              <input type="text" name="e_wifi" id="e_wifi" class="form-control" required>
              <small>„Yra“ arba „Nėra“</small>
           </div>
           <div class="form-group">
              <label for="e_gas">Dujinė</label>
              <input type="text" name="e_gas" id="e_gas" class="form-control" required>
              <small>„Yra“ arba „Nėra“</small>
           </div>
           <div class="form-group">
            <label for="e_ref">Šaldytuvas</label>
              <input type="text" name="e_ref" id="e_ref" class="form-control" required>
              <small>„Yra“ arba „Nėra“</small>
           </div>
           <div class="modal-footer">
              <button type="submit" name="save_edit"class="btn btn-dark">Išsaugoti</button>
              <button type="button" class="btn btn-danger">Atšaukti</button>
            </div>
      </form>
      </div>
  </div>
</div>
</div>

<!-- Button -->
<div class="container-fluid">
  <div class="row">
  <div class="col-lg-12">
      <button class="btn btn-dark badge-pill" data-toggle="modal" data-target="#add">Pridėti Kategoriją</button>
  </div>
  </div>
  <br>
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
      <div class="card-body">
        <table id="usertable" class="table col-md-12">
      <thead class="table">
        <tr>
          <th class="text-center">#</th>
          <th class="text-center">Plotas</th>
          <th class="text-center">Lovos</th>
          <th class="text-center">Viengulė</th>
          <th class="text-center">Dvigulė</th>
          <th class="text-center">TV</th>
          <th class="text-center">WC</th>
          <th class="text-center">Dušas</th>
          <th class="text-center">Vonia</th>
          <th class="text-center">Balkonas</th>
          <th class="text-center">WiFi</th>
          <th class="text-center">Dujinė</th>
          <th class="text-center">Šaldytuvas</th>
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

 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

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
      $('#e_plot').val(data[1]);
      $('#e_beds').val(data[2]);
      $('#e_single').val(data[3]);
      $('#e_duos').val(data[4]);
      $('#e_tv').val(data[5]);
      $('#e_wc').val(data[6]);
      $('#e_shower').val(data[7]);
      $('#e_bath').val(data[8]);
      $('#e_balcony').val(data[9]);
      $('#e_wifi').val(data[10]);
      $('#e_gas').val(data[11]);
      $('#e_ref').val(data[12]);
      
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
