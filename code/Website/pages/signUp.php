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
    <link href="../css/signUp.css" rel="stylesheet">
    <link href="../css/styles.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">

  </head>
  <body>
    <div class="fluid-container">

  <!-- Heading Section Start -->
    <div class="heading-section">

      <!--Navbar Start -->
      <div class="col-lg-offset-2 col-lg-8 col-md-offset-1 col-md-10 col-sm-12">
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header row">
              <button id="collapsedBtn" type="button" class="navbar-toggle collapsed col-xs-2" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand hidden-xs" href="index.php" ><img src="../images/logo2.png" class="" width="150px"></a>
              <a class="navbar-brand col-xs-6 visible-xs" href="../index.php"><img src="../images/logo2.png" class="" width="150px"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul id="primaryLinks" class="nav navbar-nav">
                <li><a href="../index.php">Home</a></li>
                <li><a href="contactUs.php">Contact Us</a></li>
                <li><a href="#" data-toggle="modal" data-target="#logIn">Log In</a></li>

                <!-- Modal -->
                <div class="modal fade " id="logIn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <div class="col-sm-4"><h3>Log In</h3></div>
                        <div class="col-lg-offset-2 col-sm-offset-3"><button type="button" class="close col-lg-1 col-sm-1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
                      </div>
                      <div class="modal-body">
                        <form name="logIn" method="post" action="loginHandler.php">
                          <div class="row form-group">
                            <div class="col-sm-offset-1"><label for="login_email">Email</label></div>
                            <div class="col-sm-offset-1 col-sm-10"><input type="Email" class="form-control" id="login_email" name="login_email" placeholder="johnsmith@example.ie" required maxlength="255"></div>
                          </div>

                          <div class="row form-group">
                            <div class="col-sm-offset-1"><label for="login_password">Password</label></div>
                            <div class="col-sm-offset-1 col-sm-10"><input type="password" class="form-control" id="login_password" name="login_password" placeholder="Password" required maxlength="25"></div>
                          </div>

                          <div class="row form-group">
                            <div class="col-sm-offset-5 col-sm-1"><a href="#"><button id="logInSubmit" type="submit" class="btn btn-primary" >Submit</button></a></div>
                          </div>
                        </form>
                      </div>

                    </div>
                  </div>
                </div>

              </ul>
              <ul id="signUpLink" class="nav navbar-nav navbar-right">
                <li id="signUpBtn" class="navbar-active"><a href="signUp.php">Sign Up</a></li>
              </ul>
            </div>
        </nav>
      </div>
      <!-- Navbar End -->

        <div class="row">
          <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-12 text-center">
            <h1>Sign <span class="green">Up</span>Today</h1>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-offset-5 col-lg-2 col-md-offset-5 col-md-2 col-xs-offset-4 col-xs-4">
            <button id="getStartedBtn" type="button" class="btn btn-primary btn-block" >Get Started</button>
          </div>
        </div>
      </div> 
      <!-- Heading Section End -->

      <hr>

      <!-- Content Section Start -->
      <form name="registration" method="post" action="signUpHandler.php">
      <div class="companyDetails col-lg-offset-3 col-lg-6 panel panel-default">
        <div class="row panel-heading">
          <div class="col-lg-offset-4 col-lg-4 text-center panel-title"><h2>Company Details</h2></div>
        </div>

        <div class="panel-body ">
          <div class="row">
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-4"><label for="company_name">Company Name</label></div>
              <div class="col-lg-4"><input type="text" class="form-control" id="company_name" name="company_name" placeholder="ABC ltd." required maxlength="255"></div>
            </div>
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-4"><label for="company_address1">Company Address</label></div>
              <div class="col-lg-4"><input type="text" class="form-control" id="company_address1" name="company_address1" placeholder="123 abc street" maxlength="255"></div>
            </div>
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-4"><label for="company_address2">Line 2</label></div>
              <div class="col-lg-4"><input type="text" class="form-control" id="company_address2" name="company_address2" placeholder="Town Name" maxlength="255"></div>
            </div>
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-4"><label for="company_address3">Line 3</label></div>
              <div class="col-lg-4"><input type="text" class="form-control" id="company_address3" name="company_address3" placeholder="City Name" maxlength="255"></div>
            </div>
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-4"><label for="company_tel">Company Telephone</label></div>
              <div class="col-lg-4"><input type="tel" class="form-control" id="company_tel" name="company_tel" placeholder="12-345 6789" required minlength="7" maxlength="25"></div>
            </div>
        </div>
        
        </div>

      </div>

      <div class="companyDetails col-lg-offset-3 col-lg-6 panel panel-default">
        <div class="row panel-heading">
          <div class="col-lg-offset-3 col-lg-6 text-center panel-title"><h2>Employer/Manager Details</h2></div>
        </div>

        <div class="panel-body">
          <div class="row">
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-4"><label for="employer_name">Employer Name</label></div>
              <div class="col-lg-4"><input type="text" class="form-control" id="employer_name" name="employer_name" placeholder="John Smith" required maxlength="255"></div>
            </div>
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-4"><label for="employer_address1">Employer Address</label></div>
              <div class="col-lg-4"><input type="text" class="form-control" id="employer_address1" name="employer_address1" placeholder="123 abc street" maxlength="255"></div>
            </div>
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-4"><label for="employer_address2">Line 2</label></div>
              <div class="col-lg-4"><input type="text" class="form-control" id="employer_address2" name="employer_address2" placeholder="Town Name" maxlength="255"></div>
            </div>
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-4"><label for="employer_address3">Line 3</label></div>
              <div class="col-lg-4"><input type="text" class="form-control" id="employer_address3" name="employer_address3" placeholder="City Name" maxlength="255"></div>
            </div>
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-4"><label for="employer_tel">Employer Telephone</label></div>
              <div class="col-lg-4"><input type="tel" class="form-control" id="employer_tel" name="employer_tel" placeholder="12-345 6789" required minlength="7" maxlength="255"></div>
            </div>
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-4"><label for="employer_email">Employer Email</label></div>
              <div class="col-lg-4"><input type="email" class="form-control" id="employer_email" name="employer_email" placeholder="johnsmith@example.ie" required maxlength="255"></div>
            </div>
          </div>

          <div class="row">
            <div class="form-group">
              <div class="col-lg-offset-2 col-lg-4"><label for="employer_password">Password</label></div>
              <div class="col-lg-4"><input type="Password" class="form-control" id="employer_password" name="employer_password" maxlength="25" required></div>
            </div>
          </div>
        </div>
      </div>

        <div class="row">
          <div class="col-lg-offset-5 col-lg-2"><input id="signUpSubmitBtn" type="submit" name="submit" value="submit" class="btn btn-primary btn-block center-block"></input></div>
        </div>
      </form>
      <!-- Content Section Start -->

      <hr>

    </div>
  
    <!-- JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  </body>

  <!--  =============Footer Start=================== -->
  <footer id="footer" >
    <div class="row ">

      <div class="col-lg-offset-2 col-lg-2 col-xs-offset-2 col-xs-2 footer-background">

        <a href="https://www.facebook.com/Order-66-1919549674943172/"><img class="center-block" src="../images/glyphicons-social-31-facebook.png"></a>
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