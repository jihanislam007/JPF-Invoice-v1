<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    

</head>
<body>

    <div class="container-lg">

      <br>
      <br>
        <div class="card">
            <div class="card-body">
              <h1 class="text-center">Bismillah Enterprice</h1>
            </div>
          </div>        
    
        <div class="container m-3">
            <div class="row">
              <div class="col-sm ">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="ABC" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2">Driver's Name</span>
                  </div>
              </div>
              <div class="col-sm">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="01xxxxxxxxxx" aria-label="Recipient's username" aria-describedby="basic-addon2">
                  <span class="input-group-text" id="basic-addon2">Driver's Phone</span>
                </div>
              </div>
              <div class="col-sm">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="DMTa-02-1122" aria-label="Recipient's username" aria-describedby="basic-addon2">
                  <span class="input-group-text" id="basic-addon2">Truck No</span>
                </div>
              </div>
            </div>
          </div>

          <br>

          <!-- Dynamic Add row in table -->
          <div class="container">
            <form class="insert-form" id="insert_form" method="post" action="">
              <div class="input-field">

                <table class="table table-striped table-bordered border-primary" id="table_field">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Product Name</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Bag's</th>
                      <th scope="col">Price</th>
                      <th scope="col">Add/Remove</th>
                    </tr>
                  </thead>
                  <!--start Php code deploy -->
                  <?php
                    $conn = mysqli_connect("localhost","root","","jpf");
                    if (isset($_POST['save'])) {
                      $textProductname = $_POST['textProductname'];
                      $textQuantity = $_POST['textQuantity'];
                      $textBag = $_POST['textBag'];
                      $textPrice = $_POST['textPrice'];

                      foreach($textProductname as $key => $value){
                       $sql = "INSERT INTO invoice(productname,quantity,bag,price)Value('".$value."','".$textQuantity[$key]."','".$textBag[$key]."','".$textPrice[$key]."')";

                      
                          if(mysqli_query($conn,$sql)){
                            //$query = mysqli_query($conn, $sql);
                            echo 'Data saved';
                            header("Location:http://localhost/invoice/");
                          }else
                          {
                            echo mysqli_connect_error();
                          }
                        }
                          //$conn->close();
                      }
                      ?>

                  <!--End Php code deploy -->
                  <!-- for dropdown data download -->      
                  
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td >
                          <?php
                          $query = "SELECT * FROM product ORDER BY id ASC";
                          $result = mysqli_query($conn,$query);
                          ?>                       
                          <select class="form-control" name="textProductname[]">
                            <option value="">Select Product Name ....</option>
                            <?php 
                              foreach($result as $rows){
                                echo '<option value="'.$rows['productname'].'">'.$rows['productname'].'</option>';
                              }
                            ?>
                          </select>                          
                      </td>
                      <td><input class="form-control" type="text" name="textQuantity[]" required=""></td>
                      <td><input class="form-control" type="text" name="textBag[]" required=""></td>
                      <td><input class="form-control" type="text" name="textPrice[]" required=""></td>
                      <td><input class="btn btn-warning" type="button" name="add" id="add" value="ADD"></td>
                    </tr>
                  </tbody>
                </table>

                <center>
                <td><input class="btn btn-success" type="submit" name="save" id="save" value="Save Data"></td>
                </center>

              </div>
            </form>

          <!-- for view table start -->
            <table class="table">
              <tr>
              <th scope="col">SL</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Bag's</th>
                <th scope="col">Price</th>
              </tr>
              <?php
                $select = "SELECT * FROM invoice ORDER BY id DESC";
                $result = mysqli_query($conn,$select);
                while ($row = mysqli_fetch_array($result)) {?>
                  
                  <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['productname'] ?></td>
                    <td><?php echo $row['quantity'] ?></td>
                    <td><?php echo $row['bag'] ?></td>
                    <td><?php echo $row['price'] ?></td>
                  </tr>
              <?php
                }
              ?>
            </table>
            
          <!-- for view table end -->
          </div>
          <!--  -->

    </div>


<!--End JS Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>


    


</body>

<!-- <script src="jquery-3.5.1.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Start Dynamic add/remove raw js  -->
<script type="text/javascript">
        $(document).ready(function(){

          // var table_raw = '<tr><th scope="row">1</th><td><input class="form-control" type="text" name="textProductname[]" required=""></td><td><input class="form-control" type="text" name="textQuantity[]" required=""></td><td><input class="form-control" type="text" name="textBag[]" required=""></td><td><input class="form-control" type="text" name="textPrice[]" required=""></td><td><input class="btn btn-danger" type="button" name="remove" id="remove" value="Remove"></td></tr>';


          var table_raw = '<tr><th scope="row">1</th><td ><?php $query = "SELECT * FROM product ORDER BY id ASC"; $result = mysqli_query($conn,$query); ?> <select class="form-control" name="textProductname[]"> <option value="">Select Product Name ....</option> <?php  foreach($result as $rows){ echo '<option value="'.$rows['productname'].'">'.$rows['productname'].'</option>'; } ?> </select> </td> <td><input class="form-control" type="text" name="textQuantity[]" required=""></td> <td><input class="form-control" type="text" name="textBag[]" required=""></td> <td><input class="form-control" type="text" name="textPrice[]" required=""></td> <td><input class="btn btn-warning" type="button" name="add" id="add" value="ADD"></td> </tr>';

          var max = 6;
          var x = 1;

          $("#add").click(function(){
            //alert('ok');
            //
            if (x <= max) {
              $("#table_field").append(table_raw);
              x++;
            }
          });

          $("#table_field").on('click','#remove',function(){
            $(this).closest('tr').remove();
            x--;
          });

        });
      </script>

</html>

<!-- tutorial link -->
<!-- https://www.youtube.com/watch?v=7efeIJ7oFTc&ab_channel=ShajedulIslamShawon -->
<!--dropdown----------- https://www.youtube.com/watch?v=XVRA4XyN-m0 -->
<!--dropdown----------- https://www.youtube.com/watch?v=L1UFTbfKeF4 -->
<!-- https://www.youtube.com/watch?v=qgb_XqfwAec -->