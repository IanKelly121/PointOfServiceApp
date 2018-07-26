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
    <link href="../css/contactUs.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bree+Serif" rel="stylesheet">

  </head>
  <body>
    <div class="fluid-container">

    <!-- Heading Section Start -->
    <div class="heading-section">
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
                <a class="navbar-brand hidden-xs" href="index.php" ><img src="../images/logo2.png" class="" width="150px"></a>
                <a class="navbar-brand col-xs-6 visible-xs" href="../index.php"><img src="../images/logo2.png" class="" width="150px"></a>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <ul id="primaryLinks" class="nav navbar-nav">
                  <li><a href="../index.php">Home</a></li>
                  <li class="navbar-active"><a href="contactUs.php">Contact Us</a></li>

                  <li><a href="#" data-toggle="modal" data-target="#logIn">Log In</a></li>

                  <!-- Login Modal Start-->
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
                              <div class="col-sm-offset-1 col-sm-10"><input type="Email" class="form-control" id="login_email" name="login_email" placeholder="johnsmith@example.ie"></div>
                            </div>

                            <div class="row form-group">
                              <div class="col-sm-offset-1"><label for="login_password">Password</label></div>
                              <div class="col-sm-offset-1 col-sm-10"><input type="password" class="form-control" id="login_password" name="login_password" placeholder="Password"></div>
                            </div>

                            <div class="row form-group">
                              <div class="col-sm-offset-5 col-sm-1"><a href="#"><button id="logInSubmit" type="submit" class="btn btn-primary" >Submit</button></a></div>
                            </div>
                          </form>
                        </div>

                      </div>
                    </div>
                  </div>
                  <!-- Login Modal End-->

                </ul>
                <ul id="signUpLink" class="nav navbar-nav navbar-right">
                  <li id="signUpBtn"><a href="signUp.php">Sign Up</a></li>
                </ul>
              </div>
          </nav>
        </div>
        <!-- Navbar End -->

        <div class="row">

          <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-offset-2 col-sm-8 col-xs-12 text-center">
            <h1>Contact <span class="green">Us</span></h1>

          </div>
        </div>

        <div class="row">

          <div class="col-lg-offset-5 col-lg-2 col-md-offset-5 col-md-2 col-xs-offset-4 col-xs-4">
            <a href="signUp.php"><button id="getStartedBtn" type="button" class="btn btn-primary btn-block" >Get Started</button></a>
          </div>
        </div>
      </div>
      <!-- Heading Section End --> 

      <hr>

      <!-- Contact Us Start -->
      <div class="contactUs">
        <form name="contactUs" method="post" action="contactHandler.php">
          <div class="form-group row">
            <div class="col-lg-offset-4 col-lg-1">
              <label for="name" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
            </div>
            <div class="col-lg-3">
              <input type="name" class="form-control form-control-lg" id="name" name="name" placeholder="John Smith" required="true">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-lg-offset-4 col-lg-1">
              <label for="email" class="col-sm-2 col-form-label col-form-label-lg">Email</label>
            </div>
            <div class="col-lg-3">
              <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="johnsmith@example.com" required="true">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-lg-offset-4 col-lg-1">
              <label for="message" class="col-sm-2 col-form-label col-form-label-lg">Message</label>
            </div>
            <div class="col-lg-3">
              <textarea type="message" class="form-control form-control-lg" id="message" name="message" rows="6" required="true"></textarea> 
            </div>
          </div>

          <div class="form-group row">
            <div class="col-lg-offset-6 col-lg-1">
              <button  type="submit" class="btn btn-primary btn-block center-block">Sign in</button>
            </div>
          </div>
        </form>
      </div>
      <!-- Contact Us End -->

      <hr>

    </div>
    
  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
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