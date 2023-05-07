<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="./assets/bootstrap-5.1.3-dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="./assets/css/general_styles.css" />
    <link rel="stylesheet" href="./assets/icons/fontawesome/css/all.css" />
    <title>La Casa de Convivencia | E-commerce Store</title>
  </head>
  <body class="bgc-light">
    <div class="container">
      <form action="" method="POST">
        <div
          class="row d-flex align-items-center justify-content-center vh-100">
          <div class="col-md-4 col-sm-8 mx-auto text-center">
            <h2 class="txt-dark mb-5">LOGO</h2>
            <h4 class="fw-bold mb-4">Create an account</h4>

            <div class="form-group">
              <div class="input-group">
                <i
                  class="fa-solid fa-user"
                  style="font-size: 30px; margin-right: 0.2rem"
                ></i>
                <input
                  type="text"
                  class="reg-input rounded-3 mx-3 bgc-light px-3 txt-primary"
                  placeholder="Name"
                  name="user_name"/>
              </div>
              <div class="input-group">
                <i class="fa-solid fa-envelope" style="font-size: 30px"></i>
                <input
                  type="text"
                  class="reg-input rounded-3 mx-3 bgc-light px-3 txt-primary"
                  placeholder="Email"
                  name="user_email"/>
              </div>
              <div class="input-group">
                <i
                  class="fa-solid fa-bag-shopping"
                  style="font-size: 30px; margin-right: 0.2rem"></i>
                <input
                  type="password"
                  class="reg-input rounded-3 mx-3 bgc-light px-3 txt-primary"
                  placeholder="Password"
                  name="user_password"/>
              </div>
              <div class="input-group">
                <i class="fa-solid fa-key" style="font-size: 30px"></i>
                <input
                  type="password"
                  class="reg-input rounded-3 mx-3 bgc-light px-3 txt-primary"
                  placeholder="Repeat Password"
                  name="repeat_pass"/>
              </div>
            </div>
            <div>
              <button class="btn bgc-primary rounded-pill px-3" name="register_btn" id="register-btn" onclick="window.location.href='http://example.com/signup'">
                Sign Up
              </button> 
              
            </div>
          </div>
        </div>
      </form>
    </div>
  </body>
</html>
