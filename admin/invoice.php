<?php include 'includes/header.php'; ?>
  <main>
    <h3 class="text-center p-3">This is the Invoice Section</h3>
    <?php
      require_once $_SERVER['DOCUMENT_ROOT'].'/bill/db.php';  
      if(isset($_GET['delete'])){
        $id = sanitize($_GET['delete']);
        $db->query("UPDATE invoice SET deleted = 1 WHERE id = '$id'");
        header('Location: blog.php');
      }

      if(isset($_GET['add']) || isset($_GET['edit'])){
        $parentQuery = $db->query("SELECT * FROM invoice");
        $invoiceNo = ((isset($_POST['invoiceNo']) && $_POST['invoiceNo'] != '')?sanitize($_POST['invoiceNo']):'');
        $invoiceDate = ((isset($_POST['invoiceDate']) && $_POST['invoiceDate'] != '')?sanitize($_POST['invoiceDate']):'');
        $dateOfSupply = ((isset($_POST['dateOfSupply']) && $_POST['dateOfSupply'] != '')?sanitize($_POST['dateOfSupply']):'');
        $nameOfCompany = ((isset($_POST['nameOfCompany']) && $_POST['nameOfCompany'] != '')?sanitize($_POST['nameOfCompany']):'');
        $addressOfCompany = ((isset($_POST['addressOfCompany']) && $_POST['addressOfCompany'] != '')?sanitize($_POST['addressOfCompany']):'');
        $pono = ((isset($_POST['pono']) && $_POST['pono'] != '')?sanitize($_POST['pono']):'');    
        $gst = ((isset($_POST['gst']) && $_POST['gst'] != '')?sanitize($_POST['gst']):'');
        $productName = ((isset($_POST['productName']) && $_POST['productName'] != '')?sanitize($_POST['productName']):'');
        $hsn = ((isset($_POST['hsn']) && $_POST['hsn'] != '')?sanitize($_POST['hsn']):'');
        $quantity = ((isset($_POST['quantity']) && $_POST['quantity'] != '')?sanitize($_POST['quantity']):'');
        $price = ((isset($_POST['price']) && $_POST['price'] != '')?sanitize($_POST['price']):'');

        if(isset($_GET['edit'])){
          $invoiceNo = ((isset($_POST['invoiceNo']) && $_POST['invoiceNo'] != '')?sanitize($_POST['invoiceNo']):$blog['invoiceNo']);
          $invoiceDate = ((isset($_POST['invoiceDate']) && $_POST['invoiceDate'] != '')?sanitize($_POST['invoiceDate']):$blog['invoiceDate']);
          $dateOfSupply = ((isset($_POST['dateOfSupply']) && $_POST['dateOfSupply'] != '')?sanitize($_POST['dateOfSupply']):$blog['dateOfSupply']);
          $nameOfCompany = ((isset($_POST['nameOfCompany']) && $_POST['nameOfCompany'] != '')?sanitize($_POST['nameOfCompany']):$blog['nameOfCompany']);
          $addressOfCompany = ((isset($_POST['addressOfCompany']) && $_POST['addressOfCompany'] != '')?sanitize($_POST['addressOfCompany']):$blog['addressOfCompany']);
          
          $pono = ((isset($_POST['pono']) && $_POST['pono'] != '')?sanitize($_POST['pono']):$blog['pono']);
          $gst = ((isset($_POST['gst']) && $_POST['gst'] != '')?sanitize($_POST['gst']):$blog['gst']);
          $productName = ((isset($_POST['productName']) && $_POST['productName'] != '')?sanitize($_POST['productName']):$blog['productName']);
          $hsn = ((isset($_POST['hsn']) && $_POST['hsn'] != '')?sanitize($_POST['hsn']):$blog['hsn']);
          $quantity = ((isset($_POST['quantity']) && $_POST['quantity'] != '')?sanitize($_POST['quantity']):$blog['quantity']);
          $price = ((isset($_POST['price']) && $_POST['price'] != '')?sanitize($_POST['price']):$blog['price']);
        }

        if($_POST){
          $insertSql = "INSERT INTO invoice (`invoiceNo`,`nameOfCompany`,`addressOfCompany`,`invoiceDate`,`dateOfSupply`,`pono`,`gst`,`productName`,`hsn`,`quantity`,`price`) VALUES ('$invoiceNo','$nameOfCompany','$addressOfCompany','$invoiceDate','$dateOfSupply','$pono','$gst','$productName','$hsn','$quantity','$price')";
            if(isset($_GET['edit'])){
              $insertSql = "UPDATE invoice SET invoiceNo = '$invoiceNo', nameOfCompany = '$nameOfCompany', invoiceDate = '$invoiceDate', dateOfSupply = '$dateOfSupply', pono = '$pono', gst = '$gst', productName = '$productName', hsn = '$hsn', quantity = '$quantity', price = '$price' WHERE id = '$edit_id'";
            }
          $db->query($insertSql);
        }
    ?>
    <div class="container">
      <div class="">
        <div class="card">
          <div class="card-header card-title text-center">
            <h4 class="text-center"><?=((isset($_GET['edit']))?'EDIT':'ADD');?> INVOICE DETAILS</h4>
          </div>
          <div class="card-body">
            <!-- Form -->
            <form class="text-center" style="color: #757575;" action="invoice.php?<?=((isset($_GET['edit']))?'edit='.$edit_id:'add=1');?>" method="post" enctype="multipart/form-data">

              <!-- Invoice Number -->
              <div class="md-form">
                <input type="number" id="invoiceNo" name="invoiceNo" class="form-control" value="<?=$invoiceNo;?>" required>
                <label for="invoiceNo">Invoice No</label>
              </div>
              <!-- Invoice Date -->
              <div class="md-form">
                <input type="date" id="invoiceDate" name="invoiceDate" class="form-control" value="<?=$invoiceDate;?>" required>
                <label for="invoiceDate">Invoice Date</label>
              </div>
              <!-- Date Of Supply-->
              <div class="md-form">
                <input type="date" id="dateOfSupply" name="dateOfSupply" class="form-control" value="<?=$dateOfSupply;?>" required>
                <label for="dateOfSupply">Date of Supply</label>
              </div>
              <!-- Name of Company -->
              <div class="md-form">
                <input type="text" id="nameOfCompany" name="nameOfCompany" class="form-control" value="<?=$nameOfCompany;?>" required>
                <label for="nameOfCompany">Name of Company</label>
              </div>
              <!-- Address of Company -->
              <div class="md-form">
                <input type="text" id="addressOfCompany" name="addressOfCompany" class="form-control" value="<?=$addressOfCompany;?>" required>
                <label for="addressOfCompany">Address of Company</label>
              </div>
              <!-- PO Number -->
              <div class="md-form">
                <input type="text" id="pono" name="pono" class="form-control" value="<?=$pono;?>">
                <label for="pono">PO No</label>
              </div>
              <!-- GST Number -->
              <div class="md-form">
                <input type="text" id="gst" name="gst" class="form-control" value="<?=$gst;?>" required>
                <label for="gst">GST No</label>
              </div>
              <!-- Product Description -->
              <div class="md-form">
                <input type="text" id="productName" name="productName" class="form-control" required>
                <label for="productName">Product Description</label>
              </div>
              <!-- HSN Code -->
              <div class="md-form">
                <input type="number" id="hsn" name="hsn" class="form-control" value="<?=$hsn;?>" required>
                <label for="hsn">HSN Code</label>
              </div>
              <!-- Quantity -->
              <div class="md-form">
                <input type="number" id="quantity" name="quantity" class="form-control" value="<?=$quantity;?>" required>
                <label for="quantity">Quantity</label>
              </div>
              <!-- Price -->
              <div class="md-form">
                <input type="number" id="price" name="price" class="form-control" value="<?=$price;?>" required>
                <label for="price">Price</label>
              </div>

              <div class="card-footer">
                <button class="btn btn-black waves-effect z-depth-0" type="submit" name="add"><?=((isset($_GET['edit']))?'EDIT':'ADD');?> INVOICE</button>
              </div>
            </form>
          </div>      
        </div>
      </div>
      <?php } 
          else{
            $sql = "SELECT * FROM invoice WHERE deleted = 0";
            $presults = $db->query($sql);
          
      ?>
      <div class="container-fluid table-responsive">  
        <a href="invoice.php?add=1" class="btn text-white" style="background-color: #1c2a48" id="add-product-btn">Add Invoice</a>
        <div class="clearfix"></div><br>
        <table class="table table-striped table-bordered" style="display: table;">
          <thead>
            <th></th>
            <th></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Invoice No</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Invoice Date</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Date of Supply</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Company Name</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Company Address</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>PO No</b></h5></th>          
            <th class="text-center"><h5 class="h5-responsive"><b>HSN Code</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Product Description</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>GST No</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Quantity</b></h5></th>
            <th class="text-center"><h5 class="h5-responsive"><b>Price</b></h5></th>
          </thead>
          <tbody>
            <?php 
              $sql = "SELECT * FROM invoice WHERE deleted = 0";
              $invoices = $db->query($sql);
            ?>

            <?php while($invoice = mysqli_fetch_assoc($invoices)):?>
              <tr>
                <td>
                  <a href="invoice.php?edit=<?=$invoice['id'];?>"><i class="fas fa-edit"></i></a>
                </td>
                <td>
                  <a href="invoice.php?delete=<?=$invoice['id'];?>"><i class="fa fa-trash fa-lg"></i></a>
                </td>
                <td class="text-center"><?=$invoice['invoiceNo'];?></td>
                <td class="text-center"><?=$invoice['invoiceDate'];?></td>
                <td class="text-center"><?=$invoice['dateOfSupply'];?></td>
                <td class="text-center"><?=$invoice['nameOfCompany'];?></td>
                <td class="text-center"><?=$invoice['addressOfCompany'];?></td>
                <td class="text-center"><?=$invoice['pono'];?></td>
                <td class="text-center"><?=$invoice['gst'];?></td>
                <td class="text-center"><?=$invoice['productName'];?></td>
                <td class="text-center"><?=$invoice['hsn'];?></td>
                <td class="text-center"><?=$invoice['quantity'];?></td>
                <td class="text-center"><?=$invoice['price'];?></td>
              </tr>
            <?php endwhile;?>
          </tbody>
        </table>
      </div>
    <?php } ?>
    </div>
  </main>

<?php include 'includes/footer.php'; ?>