    <?php
    session_start();
    if (!$_SESSION['loggedInUser']){

        header("Location: index.php");
    }

    include 'includes/connection.php';

    include 'includes/functions.php';

    if (isset($_POST['add'])){
        $clientName=$clientEmail=$clientPhone=$clientAddress=$clientCompany=$clientNotes="";

        if(!$_POST["clientName"]){
            $nameError="Please enter a name <br>";
        }else {
            $clientName=validateFormData($_POST['clientName']);
        }

        if(!$_POST["clientEmail"]){
            $emailError="Please enter an email <br>";
        }else {
            $clientEmail=validateFormData($_POST['clientEmail']);
        }
        $clientPhone=validateFormData($_POST['clientPhone']);
        $clientAddress=validateFormData($_POST['clientAddress']);
        $clientCompany=validateFormData($_POST['clientCompany']);
        $clientNotes=validateFormData($_POST['clientNotes']);
        if ($clientName && $clientEmail){

            $query ="INSERT INTO `clients`(`id`, `name`, `email`, `phone`, `address`, `company`, `notes`, `date_added`) VALUES (NULL,'$clientName',
'$clientEmail','$clientPhone','$clientAddress','$clientCompany','$clientNotes', CURRENT_TIMESTAMP)";
            $result= mysqli_query($conn, $query);

            if ($result) {
                header("Location: clients.php?alert=success");
            }else {

                echo "Error:".$query."<br>".mysqli_errno($conn);
            }
        }



        /*
        if(!$_POST["clientPhone"]){
            $phoneError="Please enter a Phone <br>";
        }else {
            $clientPhone=validateFormData($_POST['clientPhone']);
        }

        if(!$_POST["clientAddress"]){
            $addressError="Please enter a Address <br>";
        }else {
            $clientAddress=validateFormData($_POST['clientAddress']);
        }
        if(!$_POST["clientCompany"]){
            $companyError="Please enter a Company <br>";
        }else {
            $clientCompany=validateFormData($_POST['clientCompany']);
        }
        if(!$_POST["clientNotes"]){
            $notesError="Please enter a Notes <br>";
        }else {
            $clientNotes=validateFormData($_POST['clientNotes']);
        }*/

    }
    mysqli_close($conn);

    include 'includes/header.php';

?>
<div class="container">
      <h1>Add Client</h1>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="row">
          <div class="form-group col-sm-6">

              <label for="client-name">Name *</label>
              <input type="text" class="form-control input-lg" id="client-name" name="clientName" value="" />
          </div>
          <div class="form-group col-sm-6">
              <label for="client-email">Email *</label>
              <input type="text" class="form-control input-lg" id="client-email" name="clientEmail" value=""/>
          </div>
          <div class="form-group col-sm-6">
              <label for="client-phone">Phone *</label>
              <input type="text" class="form-control input-lg" id="client-phone" name="clientPhone" value=""/>
          </div>
          <div class="form-group col-sm-6">
              <label for="client-address">Address *</label>
              <input type="text" class="form-control input-lg" id="client-address" name="clientAddress" value=""/>
          </div>
          <div class="form-group col-sm-6">
              <label for="client-notes">Notes *</label>
              <textarea type="text" class="form-control input-lg" id="client-notes" name="clientNotes" value="">
              </textarea>
          </div>
          <div class="form-group col-sm-6">
              <label for="client-company">Company *</label>
              <input type="text" class="form-control input-lg" id="client-company" name="clientCompany" value=""/>
          </div>

          <div class="col-sm-12">
          		<a hred="clients.php" type="button" class="btn-lg btn btn-default">Cancel</a>
          		<button type="submit" class="btn btn-lg btn-success pull-right" name="add">Add Client</button>

      </div>



      </form>



</div>
