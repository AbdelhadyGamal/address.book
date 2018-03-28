    <?php
    session_start();
    if (!$_SESSION['loggedInUser']){

        header("Location: index.php");
    }


    include 'includes/connection.php';
    $query="SELECT * FROM `clients`";
        $result= mysqli_query($conn, $query);
        $alertMessage="";
        if(  isset( $_GET['alert'])=='success'){

            if ($_GET['alert']=='success'){
            $alertMessage="<div class='alert alert-success'>New client added! <a class='close' data-dismiss='alert'>&times;</a></div>";

        }elseif ($_GET['alert']=='updatesuccess') {
          $alertMessage="<div class='alert alert-success'>client updated! <a class='close' data-dismiss='alert'>&times;</a></div>";

        }elseif ($_GET['alert']=='deleted') {
          $alertMessage="<div class='alert alert-danger'>client deleted! <a class='close' data-dismiss='alert'>&times;</a></div>";
        }
        }

    include ('includes/header.php');
    ?>

    <div class="container">
        <h1>Clients Address Book</h1>
        <?php echo $alertMessage;?>
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

                  echo '<td><a href="edit.php?id=',$row['id'].'" type="button" class="btn btn-default btn-primary btn-sm">
                  <span class="glyphicon glyphicon-edit"></span> Edit Client</a></td>';

                  echo "</tr>";
              }
          }else {
              echo "<div class='alert alert-warning'>
              You have no clients
              </div>";
          }
          mysqli_close($conn);

          ?>

        </table>


<br>
<hr>
<style>
.text-center {
    text-align: center;
}
</style>
<div class="container-fluid">
  <div class="row text-center">
     <div class="col-md-12">

       <a href="add.php" type="update" class="btn btn-danger" name="add">Add Client</a>
      </div>
  </div>
</div>



    <?php
    include('includes/footer.php');
    ?>
