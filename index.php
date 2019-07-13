<!DOCTYPE html>

<?php 
  include('db.php'); 
  $sql = "SELECT * FROM invoice";
  $rows = $db->query($sql);
?>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">  
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script> 
</head>

<body>
  <div class="container row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header card-title text-center">
          <h4 class="text-center">INVOICE DETAILS</h4>
        </div>
        <div class="card-body">
          <!-- Form -->
          <form class="text-center" style="color: #757575;" action="add.php" method="post">

            <!-- Invoice Number -->
            <div class="md-form">
              <input type="number" id="invoiceNo" name="invoiceNo" class="form-control" required>
              <label for="invoiceNo">Invoice No</label>
            </div>
            <!-- Invoice Date -->
            <div class="md-form">
              <input type="date" id="invoiceDate" name="invoiceDate" class="form-control" required>
              <label for="invoiceDate">Invoice Date</label>
            </div>
            <!-- Date Of Supply-->
            <div class="md-form">
              <input type="date" id="dateOfSupply" name="dateOfSupply" class="form-control" required>
              <label for="dateOfSupply">Date of Supply</label>
            </div>
            <!-- Name of Company -->
            <div class="md-form">
              <input type="text" id="nameOfCompany" name="nameOfCompany" class="form-control" required>
              <label for="nameOfCompany">Name of Company</label>
            </div>
            <!-- Address of Company -->
            <div class="md-form">
              <input type="text" id="addressOfCompany" name="addressOfCompany" class="form-control" required>
              <label for="addressOfCompany">Address of Company</label>
            </div>
            <!-- PO Number -->
            <div class="md-form">
              <input type="text" id="pono" name="pono" class="form-control" required>
              <label for="pono">PO No</label>
            </div>
            <!-- GST Number -->
            <div class="md-form">
              <input type="text" id="gst" name="gst" class="form-control" required>
              <label for="gst">GST No</label>
            </div>
            <!-- Product Description -->
            <div class="md-form">
              <input type="text" id="productName" name="productName" class="form-control" required>
              <label for="productName">Product Description</label>
            </div>
            <!-- HSN Code -->
            <div class="md-form">
              <input type="number" id="hsn" name="hsn" class="form-control" required>
              <label for="hsn">HSN Code</label>
            </div>
            <!-- Quantity -->
            <div class="md-form">
              <input type="number" id="quantity" name="quantity" class="form-control" required>
              <label for="quantity">Quantity</label>
            </div>
            <!-- Price -->
            <div class="md-form">
              <input type="number" id="price" name="price" class="form-control" required>
              <label for="price">Price</label>
            </div>

            <div class="card-footer">
              <button class="btn btn-outline-black btn-rounded btn-block waves-effect z-depth-0" type="submit" name="send">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header card-title text-center">
          <h4 class="text-center">QUOTATION DETAILS</h4>
        </div>
        <div class="card-body">
          <!-- Form -->
          <form class="text-center" style="color: #757575;" action="add.php" method="post">

            <!-- Invoice Number -->
            <div class="md-form">
              <input type="number" id="invoiceNo" name="invoiceNo" class="form-control" required>
              <label for="invoiceNo">Invoice No</label>
            </div>
            <!-- Invoice Date -->
            <div class="md-form">
              <input type="date" id="invoiceDate" name="invoiceDate" class="form-control" required>
              <label for="invoiceDate">Invoice Date</label>
            </div>
            <!-- Date Of Supply-->
            <div class="md-form">
              <input type="date" id="dateOfSupply" name="dateOfSupply" class="form-control" required>
              <label for="dateOfSupply">Date of Supply</label>
            </div>
            <!-- Name of Company -->
            <div class="md-form">
              <input type="text" id="nameOfCompany" name="nameOfCompany" class="form-control" required>
              <label for="nameOfCompany">Name of Company</label>
            </div>
            <!-- Address of Company -->
            <div class="md-form">
              <input type="text" id="addressOfCompany" name="addressOfCompany" class="form-control" required>
              <label for="addressOfCompany">Address of Company</label>
            </div>
            <!-- PO Number -->
            <div class="md-form">
              <input type="text" id="pono" name="pono" class="form-control" required>
              <label for="pono">PO No</label>
            </div>
            <!-- GST Number -->
            <div class="md-form">
              <input type="text" id="gst" name="gst" class="form-control" required>
              <label for="gst">GST No</label>
            </div>
            <!-- Product Description -->
            <div class="md-form">
              <input type="text" id="productName" name="productName" class="form-control" required>
              <label for="productName">Product Description</label>
            </div>
            <!-- HSN Code -->
            <div class="md-form">
              <input type="number" id="hsn" name="hsn" class="form-control" required>
              <label for="hsn">HSN Code</label>
            </div>
            <!-- Quantity -->
            <div class="md-form">
              <input type="number" id="quantity" name="quantity" class="form-control" required>
              <label for="quantity">Quantity</label>
            </div>
            <!-- Price -->
            <div class="md-form">
              <input type="number" id="price" name="price" class="form-control" required>
              <label for="price">Price</label>
            </div>

            <div class="card-footer">
              <button class="btn btn-outline-black btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="send">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- SCRIPTS -->
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
</body>

</html>
