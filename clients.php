    <?php
    session_start();
    if (!$_SESSION['loggedInUser']){

        header("Location: index.php");
    }

    include 'includes/connection.php';
    $query="SELECT * FROM `clients`";
        $result= mysqli_query($conn, $query);

   
        
    include ('includes/header.php');
    ?>

    <div class="container">
        <h1>Clients Address Book</h1>
        <table class="table table-striped table-bordered">
          <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Company</th>
              <th>Notes</th>
              <th>Edit</th>
          </tr>

          <?php
          if (mysqli_num_rows($result)>0){
              while ($row=mysqli_fetch_assoc($result)){
                  echo "<tr>";
                  echo "<td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['phone']."</td><td>".$row['address']."</td><td>".$row['company'].
                  "</td><td>".$row['notes']."</td>";
                  echo '
                <td><a href="edit.php" type="button" class="btn btn-default btn-primary btn-sm">
                  <span class="glyphicon glyphicon-edit"></span> Edit Client</a>
              </td>';

                  echo "</tr>";
              }
          }else {
              echo "<div class='alert alert-warning'>
              You have no clients
              </div>";
          }
          mysqli_close($conn);

          ?>
          <tr>
              <td>Abdeoo</td>
              <td>abdoo@honsh.com</td>
              <td>(123)4545-5645</td>
              <td>11 district 20 group 9 buiding 1</td>
              <td>Kind of piza</td>
              <td>usualy get up early</td>
              <td><a href="edit.php" type="button" class="btn btn-default btn-primary btn-sm">
                  <span class="glyphicon glyphicon-edit"></span> Edit Client</a>
              </td>
          </tr>
          <tr>
              <td>Abdeoo</td>
              <td>abdoo@honsh.com</td>
              <td>(123)4545-5645</td>
              <td>11 district 20 group 9 buiding 1</td>
              <td>Kind of piza</td>
              <td>usualy get up early</td>
              <td><a href="edit.php" type="button" class="btn btn-default btn-primary btn-sm">
                  <span class="glyphicon glyphicon-edit"></span> Edit Client</a>
              </td>
          </tr>
        </table>
    </div>
    <?php
    include('includes/footer.php');
    ?>
