<?php
include("../links/db_connect.php");
                     
        if (!isset($_GET['search'])){
           
                     $query = "SELECT * FROM guest
                     ORDER BY Guest_ID DESC";
                     $result = mysqli_query($conn, $query);
                     
                       if (mysqli_num_rows($result) > 0) {
                       while ($row = mysqli_fetch_array($result)) {
                    
                    echo "<tr>
                          <td scope='row'>".$row["Guest_ID"]."</td>
                          <td class='text-center'>".$row["Name"]."</td>
                          <td class='text-center'>".$row["Surname"]."</td>
                          <td class='text-center'>".$row["User_Name"]."</td>
                          <td class='text-center'>".$row["Telefone"]."</td>
                          <td class='text-center'>".$row["Email"]."</td>
                          <td class='text-center'>".$row["Address"]."</td>
                          <td class='text-center'>".$row["City"]."</td>
                          <td class='text-center'>".$row["Country"]."</td>
                          <td class='text-center'>
                          <button type='button' data-toggle='modal' data-target='#change' class='btn btn-dark editbtn'>Keisti</button>
                          <button type='button' data-toggle='modal' data-target='#delete_form' class='btn btn-danger deletebtn'>Trinti</button>
                          </td>
                        </tr>";
                      }
                    
                  }
                }
                    else{
                      $searchvalues = $_GET['search'];
                      $sql = "SELECT * FROM guest
                     WHERE CONCAT( Guest_ID, Name, Surname, Telefone, Email, Address, City, Country) LIKE '%$searchvalues%'
                     ORDER BY Guest_ID DESC";
                     
                     $result = mysqli_query($conn, $sql);

                     if (mysqli_num_rows($result) > 0) {
                       while ($row = mysqli_fetch_assoc($result)) {

                        echo "<tr>
                          <td scope='row'>".$row['Guest_ID']."</td>
                          <td class='text-center'>".$row['Name']."</td>
                          <td class='text-center'>".$row['Surname']."</td>
                          <td class='text-center'>".$row["User_Name"]."</td>
                          <td class='text-center'>".$row['Telefone']."</td>
                          <td class='text-center'>".$row['Email']."</td>
                          <td class='text-center'>".$row['Address']."</td>
                          <td class='text-center'>".$row['City']."</td>
                          <td class='text-center'>".$row['Country']."</td>
                          <td class='text-center'>
                          <button type='button' data-toggle='modal' data-target='#change' class='btn btn-dark editbtn'>Keisti</button>
                          <button type='button' data-toggle='modal' data-target='#delete_form' class='btn btn-danger deletebtn'>Trinti</button>
                          </td>
                        </tr>";
                    }
                  }
                  else{
                    echo "<tr>
                       <td colspan='4'>Įrašų nerasta</td>
                       </tr>";
                  }
                  }
                ?>