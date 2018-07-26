<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Order 66</title>
    <link rel="shortcut icon" href="../images/logo.ico">

    <!-- CSS -->
    <link href="../bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">

    <!-- Small style for FAQ Panels-->
    <style type="text/css">
      .panel-heading {
          cursor: pointer;
      }
    </style>

  </head>
  <body>
    <div class="fluid-container">

      <!-- Heading Section Start -->
      <div class="heading-section" style="height: 300px;">
        <div class="col-xs-12">
          <div class="row">
            <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-12 text-center">
              <h1><span class="green">F.A.Q.</span></h1>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-offset-5 col-lg-2 col-md-offset-5 col-md-2 col-xs-offset-4 col-xs-4">
              <a href="./dashboard.php"><button id="getStartedBtn" type="button" class="btn btn-primary btn-block" >Return to dashboard</button></a>
            </div>
          </div>
        </div> 
      </div>
      <!-- Heading Section End -->

      <!-- Content Section Start -->
      <div class="text-center" >
        <div class="panel-group" id="accordion">

          <div class="panel panel-default">
            <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne">
              <div class="panel-title">
                <a class="accordion-toggle"><h1>• Adding/Removing Employee's</h1></a>
              </div>
            </div>

            <div id="collapseOne" class="panel-collapse collapse in">
              <div class="panel-body" style="font-size:1.4em;">
                <h2>Adding an Employee</h2>
                <ol>
                  <li><p>Log in to your account by going to www.order66.ie and clicking the log in button on the naviagtion bar at the top of the page.</p></li>
                  <li><p>On the left hand side of your screen click the "+ Add Employee" button</p></li>
                  <li><p>Once you reach the employee page, fill out the add employee form on the top of the page.</p></li>
                  <li><p>Some points to remember when filling out the add employee form.</p>
                    <ul>
                      <li><p>Employee PPS Number must be unique.</p></li>
                      <li><p>Employee E-mail is required.</p></li>
                      <li><p>Employee Passwords must be between 8-25 characters long.</p></li>
                    </ul>
                  </li>
                </ol>
                <hr>
                <h2>Removing an Employee</h2>
                  <ol>
                    <li><p>Log in to your account by going to www.order66.ie and clicking the log in button on the naviagtion bar at the top of the page.</p></li>
                    <li><p>On the left hand side of your screen click the "- Remove Employee" button</p></li>
                    <li><p>Once you reach the employee page, fill out the remove employee form on the top of the page.</p></li>
                    <li><p>Some points to remember when filling out the remove employee form are that both Employee PPS Number and Employee Name fields are required to successfully remove an employee from your database.</p></li>
                  </ol>
              </div>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="panel-title"  data-toggle="collapse" data-parent="#accordion" data-target="#collapseTwo">
                <a class="accordion-toggle"><h1>• Creating a Menu</h1></a>
              </div>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
              <div class="panel-body" style="font-size:1.4em;">
                <h2>Creating a Menu</h2>
                <ol>
                  <li><p>Log in to your account by going to www.order66.ie and clicking the log in button on the naviagtion bar at the top of the page.</p></li>
                  <li><p>On the left hand side of your screen click the "+ Add Menu Item" button</p></li>
                  <li><p>Once you reach the Menu page, fill out the add Menu Item form on the top of the page.</p></li>
                  <li><p>Some points to remember when filling out the add Menu Item form.</p>
                    <ul>
                      <li><p>Item Description, Price & Catagory are required</p></li>
                    </ul>
                  </li>
                </ol>
              </div>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-heading">
              <div class="panel-title" data-toggle="collapse" data-parent="#accordion" data-target="#collapseThree">
                <a class="accordion-toggle"><h1>• How to logout</h1></a>
              </div>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
              <div class="panel-body" style="font-size:1.4em;">
              <p>Just click logout for the love of god...</p>      
              </div>
            </div>
          </div>

        </div>
      </div>
      <!-- Content Section End -->
  
    <!--  JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  </body>

  <!--  =============Footer Start=================== -->
  <footer id="footer" >
    <div class="row ">

      <div class="col-lg-offset-2 col-lg-2 col-xs-offset-2 col-xs-2 footer-background">

        <a href="https://www.facebook.com/Order-66-1919549674943172/""><img class="center-block" src="../images/glyphicons-social-31-facebook.png"></a>
      </div>
      <div class="col-lg-offset-1 col-lg-2 col-xs-offset-1 col-xs-2">
        <a href="https://gitlab.computing.dcu.ie/kellyi7/pointofserviceapp"><img class="center-block" src="../images/glyphicons-social-22-github.png"></a>
      </div>
      <div class="col-lg-offset-1 col-lg-2 col-xs-offset-1 col-xs-2">
        <a href="https://ca326pointofserviceapp.wordpress.com/"><img class="center-block" src="../images/glyphicons-social-38-rss.png"></a>
      </div>
    </div>
    <div class="row text-center">
      <div class="col-lg-offset-2 col-lg-2 col-xs-offset-2 col-xs-2">
        <h3>Facebook</h3>
      </div>
      <div class="col-lg-offset-1 col-lg-2 col-xs-offset-1 col-xs-2">
        <h3>Github</h3>
      </div>
      <div class="col-lg-offset-1 col-lg-2 col-xs-offset-1 col-xs-2">
        <h3>Blog</h3>
      </div>
    </div>
  </footer>
  <!--  =============Footer End=================== -->
  
</html>