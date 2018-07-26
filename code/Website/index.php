<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Order 66</title>
    <link rel="shortcut icon" href="images/logo.ico">

    <!-- Bootstrap -->
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">

  </head>
  <body>
    <div class="fluid-container">

      <div class="heading-section"><!-- Headin Section Start -->
        <div class="col-lg-offset-2 col-lg-8 col-md-offset-1 col-md-10 col-sm-12">
          <!--Navbar Start -->
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <div class="navbar-header row">
                  <button id="collapsedBtn" type="button" class="navbar-toggle collapsed col-xs-2" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand hidden-xs" href="index.php" ><img src="images/logo2.png" width="150px"></a>
                  <a class="navbar-brand col-xs-6 visible-xs" href="index.php"><img src="images/logo2.png" width="150px"></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                  <ul id="primaryLinks" class="nav navbar-nav">
                    <li class="navbar-active"><a href="#">Home</a></li>
                    <li><a href="#content-section-3">Features</a></li>
                    <li><a href="pages/contactUs.php">Contact Us</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#logIn">Log In</a></li>

                    <!-- Modal -->
                    <div class="modal fade " id="logIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <div class="col-xs-4"><h3>Log In</h3></div>
                            <div class="col-xs-offset-3"><button type="button" class="close col-xs-1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                          </div>
                          <div class="modal-body">
                            <form name="logIn" method="post" action="pages/loginHandler.php">
                              <div class="row form-group">
                                <div class="col-xs-offset-1"><label for="login_email">Email</label></div>
                                <div class="col-xs-offset-1 col-xs-10"><input type="Email" class="form-control" id="login_email" name="login_email" placeholder="johnsmith@example.ie" maxlength="255" minlength="5"></div>
                              </div>

                              <div class="row form-group">
                                <div class="col-xs-offset-1"><label for="login_password">Password</label></div>
                                <div class="col-xs-offset-1 col-xs-10"><input type="password" class="form-control" id="login_password" name="login_password" placeholder="Password" maxlength="25" minlength="8"></div>
                              </div>

                              <div class="row form-group">
                                <div class="col-xs-offset-5 col-xs-1"><a href="#"><button id="logInSubmit" type="submit" class="btn btn-primary" >Submit</button></a></div>
                              </div>
                            </form>
                          </div>

                        </div>
                      </div>
                    </div>
                  </ul>
                  <ul id="signUpLink" class="nav navbar-nav navbar-right">
                    <li id="signUpBtn"><a href="pages/signUp.php">Sign Up</a></li>
                  </ul>
                </div>
            </nav>
          </div>
          <!-- Navbar End -->
          <div class="row">

            <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-12 text-center">
              <h1>Let <span class="green">Order 66</span> Take Care of Your Business</h1>

            </div>
          </div>

          <div class="row">
            <div class="col-lg-offset-5 col-lg-2 col-md-offset-5 col-md-2 col-xs-offset-4 col-xs-4">
              <a href="Files/Order66.zip"><button id="getStartedBtn" type="button" class="btn btn-primary btn-block" >Download Order 66</button></a>
            </div>
          </div>
        </div> <!-- Heading Section End -->

        <hr>

        <!-- Intro Paragraph Start -->
        <div id="content-section-1" class="row">

          <div class="col-lg-offset-5 col-lg-2 col-md-offset-3 col-md-6 col-xs-offset-2 col-xs-8 text-center">
            <h2>Save Money</h2>
          </div>
          <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-offset-1 col-xs-10 text-center">
            Reduce costs of equipment by using Order 66 as your Point of service application of choice. Order 66 allows employee's to download the app from the Google Play Store and be able to start creating and sending Orders between devices. Order 66 also handles all your reporting and allows you to focus on your business. We allow you to see usage statistics like busiest time of the day and most popular item. It also shows you graphs and charts comparing your earnings from each month and each year. Choose Order 66 for you Point of Service application of choice.
          </div>

        </div>
        <!-- Intro Paragraph End -->

        <hr>

        <!-- Video Walkthrough Start -->
        <div id="content-section-2" class="row">
          <div class="col-lg-offset-5 col-lg-2">
            <button id="playButton" type="button" class="btn btn-default btn-lg center-block" data-toggle="modal" data-target="#myModal">
              <span class="glyphicon glyphicon-play" aria-hidden="true"></span>
            </button>

              <!-- Modal -->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-body">
                      <div style="position:relative;height:0;padding-bottom:56.25%"><iframe src="https://www.youtube.com/embed/E5ln4uR4TwQ?ecver=2" width="640" height="360" frameborder="0" style="position:absolute;width:100%;height:100%;left:0" allowfullscreen></iframe></div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <!-- Video Walkthrough End -->

        <hr>

        <!-- Features Start -->
                <div id="content-section-3" class="hidden-xs"><!-- Features Layout for Computers & Tablets Start -->
          <div class="row text-center">
            <div class="col-lg-offset-1 col-lg-3 col-sm-4">
              <h2>Send Orders between Devices</h2>
              <img src="images/test1.jpg">
            </div>

            <div class="col-lg-4 col-sm-4">
              <h2>Unique Employer Overview</h2>
              <img src="images/test2.jpg">
            </div>

            <div class="col-lg-3 col-sm-4">
              <h2>Reporting & Statistics</h2>
              <img src="images/test3.png">
            </div>
          </div>

          <div class="row text-center">
            <div class="col-lg-offset-1 col-lg-3 col-sm-4">
              <p>With Order 66 you can have all your employee's be able to create and send orders to all other devices. A good example that highlights the use of this is Waitors/Waitresses can take an order at a table on their Android Phone. Then with a click of a button can send the Order to the kitchen in an instant.</p>
            </div>

            <div class="col-lg-4 col-sm-4">
              <p>The unique Employer overview allows empoyers to keep track of their employee records, automatically generate reports and view usefull statistics tailored just to your business. These statstics can help boost the efficency of your business and in turn save you money.</p>
            </div>

            <div class="col-lg-3 col-sm-4">
              <p>A great advantage of using a point of service application to handle your business is that it can automatically generate reports and usage statistics that are tailored especially to your business. The easy to read display simplifies data that can be difficult to interpret.  </p>
            </div>
          </div>
        </div><!-- Features Layout for Computers & Tablets End -->

        <div id="content-section-3" class="visible-xs"><!-- Features Layout for Mobile Devices Start -->
          <div class="row">
            <div class="col-xs-offset-3 xol-xs-6">
              <h2>Send Orders between Devices</h2>
              <img src="images/test1.jpg">
            </div>
            <div class="col-xs-offset-1 col-xs-10">
              <p>With Order 66 you can have all your employee's be able to create and send orders to all other devices. A good example that highlights the use of this is Waitors/Waitresses can take an order at a table on their Android Phone. Then with a click of a button can send the Order to the kitchen in an instant.</p>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-offset-3 xol-xs-6">
              <h2>Unique Employer Overview</h2>
              <img src="images/test2.jpg">
            </div>
            <div class="col-xs-offset-1 col-xs-10">
              <p>The unique Employer overview allows empoyers to keep track of their employee records, automatically generate reports and view usefull statistics tailored just to your business. These statstics can help boost the efficency of your business and in turn save you money.</p>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-offset-3 xol-xs-6">
              <h2>Reporting & Statistics</h2>
              <img src="images/test3.png">
            </div>
            <div class="col-xs-offset-1 col-xs-10">
              <p>A great advantage of using a point of service application to handle your business is that it can automatically generate reports and usage statistics that are tailored especially to your business. The easy to read display simplifies data that can be difficult to interpret.  </p>
            </div>
          </div>

        </div><!-- Features Layout for Mobile Devices Start -->
        <!-- Features End -->

        <hr>

      </div>
    
  
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  </body>
  <!--  =============Footer Start=================== -->
  <footer id="footer" >
    <div class="row ">

      <div class="col-lg-offset-2 col-lg-2 col-xs-offset-2 col-xs-2 footer-background">

        <a href="https://www.facebook.com/Order-66-1919549674943172/"><img class="center-block" src="images/glyphicons-social-31-facebook.png"></a>
      </div>
      <div class="col-lg-offset-1 col-lg-2 col-xs-offset-1 col-xs-2">
        <a href="https://gitlab.computing.dcu.ie/kellyi7/pointofserviceapp"><img class="center-block" src="images/glyphicons-social-22-github.png"></a>
      </div>
      <div class="col-lg-offset-1 col-lg-2 col-xs-offset-1 col-xs-2">
        <a href="https://ca326pointofserviceapp.wordpress.com/"><img class="center-block" src="images/glyphicons-social-38-rss.png"></a>
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