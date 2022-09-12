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
	<title>Atsiliepimai</title>
</head>
<body class="comment">
<!-- View comment-->
	<div class="modal" tabindex="-1" role="dialog" id="view_modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Svečio duomenys</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Vardas:</td>
                        <td id="name"></td>
                      </tr>
                      <tr>
                        <td>Pavardė:</td>
                        <td id="surname"></td>
                      </tr>
                      <tr>
                        <td>Adresas</td>
                        <td id="address"></td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>El. paštas</td>
                        <td id="mail"></td>
                      </tr>
                        <tr>
                        <td>Telefonas</td>
                        <td id="telefone"></td>
                      </tr>
                      <tr>
                        <td>Miestas</td>
                        <td id="city"></td>
                      </tr>
                        <td>Šalis</td>
                        <td id="country">
                        </td>
                      </tr>
                    </tbody>
                  </table>
              </div>
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
<form action="delete_comment.php" method="post">
  <div class="modal-body">
      <input type="hidden" name="delete_id" id="delete_id">
      <h4> Ar tikrai norite pašalinti šį komentarą? </h4>
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

  <?php include('../links/navbar.php');?>
  <h1 id="pav1">Atsiliepimai</h1>
	<div class="wrapper">
		<?php include('show.php');?>
	</div>
			
				

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 <script type="text/javascript">
 	$(document).ready(function(){
 	$('.view').on('click', function() {
 		$tr = $(this).closest('div');

      var data = $tr.children("li").map(function() {
        return $(this).text();
      }).get();
       
    console.log(data);
    $('#name').html(data[2]);
    $('#surname').html(data[3]);
    $('#address').html(data[4]);
    $('#mail').html(data[5]);
    $('#telefone').html(data[6]);
    $('#city').html(data[7]);
    $('#country').html(data[8]);
});
 	$('.delete').on('click', function() {

      $tr = $(this).closest('div');

      var data = $tr.children("li").map(function() {
        return $(this).text();
      }).get();

      console.log(data);

      $('#delete_id').val(data[0]);

     });
 });
 </script>
</body>
</html>