<?php
  // Start the login session
  session_start();

  // Database information
  $servername = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "posapp_database";
  $company_id = $_SESSION["company_id"];

  //create connection
  $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

  //check connection
  if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
  }

  // Retrieve Menu information from the database using the company_id and based on item_catagory
  $query = "SELECT item_name, item_description, item_price, item_catagory FROM menu_details WHERE menu_id = '$company_id' AND item_catagory = 'Starters'";

  $result = $conn->query($query) or die ("Failed to query database ".$conn->connect_error);

  $starters="";

  while($row = mysqli_fetch_array($result) ){
    $starters = $starters."<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
  }

  //---------------------------------------------------------------------------------------------------

  // Retrieve Menu information from the database using the company_id and based on item_catagory
  $query = "SELECT item_name, item_description, item_price, item_catagory FROM menu_details WHERE menu_id = '$company_id' AND item_catagory = 'Mains'";

  $result = $conn->query($query) or die ("Failed to query database ".$conn->connect_error);

  $mains="";

  while($row = mysqli_fetch_array($result) ){
        $mains = $mains."<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
  }

  //---------------------------------------------------------------------------------------------------

  // Retrieve Menu information from the database using the company_id and based on item_catagory
  $query = "SELECT item_name, item_description, item_price, item_catagory FROM menu_details WHERE menu_id = '$company_id' AND item_catagory = 'Desserts'";

  $result = $conn->query($query) or die ("Failed to query database ".$conn->connect_error);

  $desserts="";

  while($row = mysqli_fetch_array($result) ){
        $desserts = $desserts."<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
  }

  //---------------------------------------------------------------------------------------------------

  // Retrieve Menu information from the database using the company_id and based on item_catagory
  $query = "SELECT item_name, item_description, item_price, item_catagory FROM menu_details WHERE menu_id = '$company_id' AND item_catagory = 'Sides'";

  $result = $conn->query($query) or die ("Failed to query database ".$conn->connect_error);

  $sides="";

  while($row = mysqli_fetch_array($result) ){
        $sides = $sides."<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
  }

  //---------------------------------------------------------------------------------------------------

  // Retrieve Menu information from the database using the company_id and based on item_catagory
  $query = "SELECT item_name, item_description, item_price, item_catagory FROM menu_details WHERE menu_id = '$company_id' AND item_catagory = 'Drinks'";

  $result = $conn->query($query) or die ("Failed to query database ".$conn->connect_error);

  $drinks="";
  while($row = mysqli_fetch_array($result) ){
        $drinks = $drinks."<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Order 66</title>
    <link rel="icon" href="../images/logo.ico">
    <button onclick="removeItem();">Remove</button>

    <!-- CSS -->
    <link href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/dashboard.css" rel="stylesheet">

    <!-- JS for Charts-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- Pie Chart for most popular item-->
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Item Name');
        data.addColumn('number', 'Number Sold');
        data.addRows([
          ['Pizza', 300],
          ['Pasta', 150],
          ['Soup', 60],
          ['Chicken', 900],
          ['Steak', 300]
        ]);

        // Set chart options
        var options = {'height':300};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('most_popular_chart'));
        chart.draw(data, options);
      }
    </script>

    <!-- Bar Chart for items going out of date-->
    <script type="text/javascript">
      google.charts.load('current', {packages: ['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawMultSeries);

      function drawMultSeries() {
            var data = google.visualization.arrayToDataTable([
              ['Item Name', 'Number of Days til Out of Date'],
              ['Fish', 2],
              ['Butter', 14],
              ['Tomatoes', 0],
              ['Steak', 5],
              ['Chicken', 4],
              ['Pasta', 14]
            ]);

            var options = {
              chartArea: {width: '60%'},
              hAxis: {
                title: 'Number of Days Left',
                minValue: 0
              },
              vAxis: {
                title: 'Item Name'
              }
            };

            var chart = new google.visualization.BarChart(document.getElementById('timeline'));
            chart.draw(data, options);
          }
    </script>
  </head>

  <body>

    <!--Navbar Start -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="dashboard.php" style="color: #88d317; ">Order 66</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="faq.php">Help</a></li>
            <li><a href="logout.php">Log out</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>
    <!--Navbar End -->

    <div class="container-fluid">
      <div class="row">

        <!--Sidebar Start -->
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="dashboard.php">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="reporting.php">Reports</a></li>
            <li><a href="analytics.php">Analytics</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li><a href="dashboard_employee.php">Employee Overview</a></li>
            <li><a href="dashboard_employee.php">+ Add New Employee</a></li>
            <li><a href="dashboard_employee.php">- Remove Employee</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li class="active"><a href="dashboard_menu">Menu Overview</a></li>
            <li><a href="#addRemoveMenuItem">+ Add Menu Item</a></li>
            <li><a href="#addRemoveMenuItem">- Remove Menu Item</a></li>
          </ul>
        </div>
        <!--Sidebar Start -->

        <!--Content Start -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Menu_Overview</h1>

          <div class="row placeholders">
            <div class="col-xs-6 placeholder">
              <h4>Most Popular Menu Item</h4>
              <div id="most_popular_chart"></div>
              <span class="text-muted">Something else</span>
            </div>

            <div class="col-xs-6 placeholder">
              <h4>Number of Days til Out of Date</h4>
              <div id="timeline"></div>
              <span class="text-muted">Something else</span>
            </div>
          </div>

          <h2 class="sub-header">Menu Overview</h2>

          <h3 class="">Starters</h3>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Item Name</th>
                  <th>Description</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
                <?php echo $starters; ?>
              </tbody>
            </table>
          </div>

          <h3 class="">Mains</h3>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Item Name</th>
                  <th>Description</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
                <?php echo $mains; ?>
              </tbody>
            </table>
          </div>

          <h3 class="">Desserts</h3>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Item Name</th>
                  <th>Description</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
                <?php echo $desserts; ?>
              </tbody>
            </table>
          </div>

          <h3 class="">Sides</h3>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Item Name</th>
                  <th>Description</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
                <?php echo $sides; ?>
              </tbody>
            </table>
          </div>

          <h3 class="">Drinks</h3>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Item Name</th>
                  <th>Description</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>
                <?php echo $drinks; ?>
              </tbody>
            </table>
          </div>

          <hr>

          <!--Add Item Start -->
          <div id="addRemoveMenuItem" class="col-lg-6">

            <h3 class="text-center">Add Menu Item</h3>
            <form id="add_Menu_Item" name="add_Menu_Item" method="post" action="add_Menu_Item.php">
              <div class="row">
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-4"><label for="item_name">Item Name</label></div>
                  <div class="col-lg-6"><input type="Text" name="item_name" required maxlength="255"></div>
                </div>
              </div>

              <div class="row">
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-4"><label for="item_description">Item Description</label></div>
                  <div class="col-lg-6"><input type="Text" name="item_description"></div>
                </div>
              </div>

              <div class="row">
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-4"><label for="item_price">Item Price</label></div>
                  <div class="col-lg-6"><input type="Text" name="item_price" required maxlength="255"></div>
                </div>
              </div>

              <div class="row">
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-4"><label for="item_catagory" required>Item Catagory</label></div>
                  <div class="col-lg-6">
                    <select id="item_catagory" name="item_catagory" form="add_Menu_Item">
                      <option value="Starters">Starters</option>
                      <option value="Mains">Mains</option>
                      <option value="Desserts">Desserts</option>
                      <option value="Sides">Sides</option>
                      <option value="Drinks">Drinks</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-offset-4 col-lg-4">
                  <input id="add_menu_item_btn" type="submit" name="add_menu_item_btn" value="+ Add Menu Item" class="btn btn-success btn-block center-block"></input>
                </div>
              </div>
            </form>
            <!--Add Item End -->

          </div>

          <!--Remove Item Start -->
          <div class="col-lg-6">
            <h3 class="text-center">Remove Menu Item</h3>
            <form id="remove_menu_Item" name="remove_menu_Item" method="post" action="remove_menu_item.php">
              <div class="row">
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-4"><label for="item_name">Item Name</label></div>
                  <div class="col-lg-6"><input type="Text" name="item_name" required maxlength="255"></div>
                </div>
              </div>

              <div class="row">
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-4"><label for="item_description">Item Price</label></div>
                  <div class="col-lg-6"><input type="Text" name="item_description" maxlength="255"></div>
                </div>
              </div>

              <div class="row">
                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-4"><label for="item_catagory" required>Item Catagory</label></div>
                  <div class="col-lg-6">
                    <select id="item_catagory" name="item_catagory" form="remove_menu_Item">
                      <option value="Starters">Starters</option>
                      <option value="Mains">Mains</option>
                      <option value="Desserts">Desserts</option>
                      <option value="Sides">Sides</option>
                      <option value="Drinks">Drinks</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-offset-4 col-lg-4">
                  <input id="remove_menu_item_btn" type="submit" name="remove_menu_item_btn" value="- Remove Menu Item" class="btn btn-danger btn-block center-block" ></input>
                </div>
              </div>
            </form>

          </div>
          <!--Remove Item End -->

        </div>
        <!--Content End -->

      </div>
    </div>

    <!-- JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="bootstrap-3.3.7-dist/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script src="../bootstrap-3.3.7-dist/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
