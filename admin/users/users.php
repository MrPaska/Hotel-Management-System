<?php
session_start();
include('../links/check_session.php');
if ($_SESSION['role'] == "Administratorius") {
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./css/style.css">
  <title>Vartotojai</title>
</head>
<body>
<?php include('../links/navbar.php'); ?>
  <h1 id="pav1">Vartotojai</h1>

<!-- Add Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pridėti vartotoją</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Uždaryti">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="new_user.php" method="post">
          <div class="form-group">
            <label>Vardas</label>
              <input type="text" name="user" class="form-control" pattern="[A-Ža-ž]{4,}" required placeholder="Įveskite vardą">
           </div>
       
          <div class="form-group">
            <label>Pavardė</label>
              <input type="text" name="surname" class="form-control" pattern="[A-Ža-ž]{4,}" required placeholder="Įveskite pavardę">
           </div>
          <div class="form-group">
            <label>Rolė</label>
              <select class="form-control" name="role">
                <?php
                include('../links/db_connect.php');
                $sql = "SELECT * FROM roles";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                       while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <option value="<?php echo $row['Role_ID']?>"><?php echo $row['Role_Name']?></option>

                        <?php
                       }
                       
                     }
                     ?>
             </select>
           </div>
          <div class="form-group">
            <label>Vartotojo Vardas</label>
              <input type="text" name="user_name" class="form-control" pattern="[A-Za-z0-9]{4,}" required placeholder="Įveskite vartotojo vardą">
           </div>
      
          <div class="form-group">
            <label>Slaptažodis</label>
              <input type="password" name="password" class="form-control"  pattern=".{8,}" required placeholder="Įveskite slaptažodį">
           </div>
          <div class="form-group">
            <label>El. paštas</label>
              <input type="email" name="email" class="form-control" required placeholder="Įveskite el. paštą">
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
        <h5 class="modal-title" id="exampleModalLabel">Koreguoti Vartotoją</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Uždaryti">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form name="edit_form" action="edit_user.php" method="post">
              <input type="hidden" name="edit_id" id="edit_id">
          <div class="form-group">
            <label for="e_user">Vardas</label>
              <input type="text" name="e_user" id="e_user" class="form-control" pattern="[A-Ža-ž]{4,}" required>
           </div>
          <div class="form-group">
            <label for="e_surname">Pavardė</label>
              <input type="text" name="e_surname" id="e_surname" class="form-control" pattern="[A-Ža-ž]{4,}" required>
           </div>
          <div class="form-group">
            <label for="e_role">Rolė</label>
            <select class="form-control" name="e_role" id="e_role">
              <option value="Administratorius">Administratorius</option>
              <option value="Darbuotojas">Darbuotojas</option>
            </select>
           </div>
          <div class="form-group">
            <label for="e_user_name">Vartotojo Vardas</label>
              <input type="text" name="e_user_name" id="e_user_name" class="form-control" pattern="[A-Za-z0-9]{4,}" required>
           </div>
          <div class="form-group">
            <label for="e_password">Slaptažodis</label>
              <input type="password" name="e_password" id="e_password" class="form-control" pattern=".{8,}" required>
           </div>
          <div class="form-group">
            <label for="e_email">El. paštas</label>
              <input type="email" name="e_email" id="e_email" class="form-control" required>
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
        <!--<h5 class="modal-title" id="exampleModalLabel"></h5>-->
        <button type="button" class="close" data-dismiss="modal" aria-label="Uždaryti">
          <span>&times;</span>
        </button>
      </div>
<form action="delete_user.php" method="post">
  <div class="modal-body">
      <input type="hidden" name="delete_id" id="delete_id">
      <h4> Ar tikrai norite pašalinti šį vartotoją? </h4>
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
      <button class="btn btn-dark badge-pill" data-toggle="modal" data-target="#add">Pridėti Vartotoją</button>
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
          <th class="text-center">Vardas</th>
          <th class="text-center">Pavardė</th>
          <th class="text-center">Rolė</th>
          <th class="text-center">Vartotojo Vardas</th>
          <th class="text-center">El paštas</th>
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
      $('#e_user').val(data[1]);
      $('#e_surname').val(data[2]);
      $('#e_role').val(data[3]);
      $('#e_user_name').val(data[4]);
      $('#e_email').val(data[5]);

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

<?php
}
else{
 echo("<script>alert('Ooops... Puslapis Nerastas')</script>");
 echo("<script>window.location = 'home.php';</script>");}
?>
