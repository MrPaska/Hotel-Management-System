 
               <?php
        if (!isset($_GET['search'])){
           $sql = "SELECT users.User_ID, users.Name, users.Surname, users.User_Name, users.Email, roles.Role_Name AS Role
                     FROM users
                     INNER JOIN roles ON users.Role_ID = roles.Role_ID
                     ORDER BY users.User_ID ASC";
                     
                     $result = mysqli_query($conn, $sql);

                     if (mysqli_num_rows($result) > 0) {
                       while ($row = mysqli_fetch_assoc($result)) {
                    
                    echo "<tr>
                          <td scope='row'>".$row['User_ID']."</td>
                          <td class='text-center'>".$row['Name']."</td>
                          <td class='text-center'>".$row['Surname']."</td>
                          <td class='text-center'>".$row['Role']."</td>
                          <td class='text-center'>".$row['User_Name']."</td>
                          <td class='text-center'>".$row['Email']."</td>
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
                      $sql = "SELECT users.User_ID, users.Name, users.Surname, users.User_Name, users.Email, roles.Role_Name AS Role
                     FROM users
                     INNER JOIN roles ON users.Role_ID = roles.Role_ID
                     WHERE CONCAT( users.User_ID, users.Name, users.Surname, users.User_Name, users.Email, roles.Role_Name) LIKE '%$searchvalues%'
                     ORDER BY users.User_ID ASC";
                     
                     $result = mysqli_query($conn, $sql);

                     if (mysqli_num_rows($result) > 0) {
                       while ($row = mysqli_fetch_assoc($result)) {

                        echo "<tr>
                          <td scope='row'>".$row['User_ID']."</td>
                          <td class='text-center'>".$row['Name']."</td>
                          <td class='text-center'>".$row['Surname']."</td>
                          <td class='text-center'>".$row['Role']."</td>
                          <td class='text-center'>".$row['User_Name']."</td>
                          <td class='text-center'>".$row['Email']."</td>
                          <td class='text-center'>
                          <button type='button' data-toggle='modal' data-target='#change' class='btn btn-dark editbtn'>Keisti</button>
                          <button type='button' data-toggle='modal' data-target='#delete_form' class='btn btn-danger deletebtn'>Trinti</button>
                          </td>
                        </tr>";
                    }
                  }
                  else{
                    echo "<tr>
                       <td colspan='7'>Įrašų nerasta</td>
                       </tr>";
                  }
                } 
                 
                ?>
