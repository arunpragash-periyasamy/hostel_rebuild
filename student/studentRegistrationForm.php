
    <div class="main-wrapper">
      <div class="account-content">
        <div class="login-wrapper">
          <div class="login-content">
            <div class="login-userset">
              <div class="login-logo">
                <img src="assets/img/kongu_logo.png" alt="img" />
              </div>
              <div class="login-userheading">
                <h3>Create an Account</h3>
              </div>
              <div class="form-login">
                <label>Roll Number</label>
                <div class="form-addons">
                  <input type="text" name="roll_number" id="roll_number" placeholder="Enter your roll number" />
                  <img src="assets/img/icons/users1.svg" alt="img" />
                </div>
              </div>
              <div class="form-login">
                <label>Full Name</label>
                <div class="form-addons">
                  <input type="text" name="student_name" id="student_name" placeholder="Enter your full name" />
                  <img src="assets/img/icons/users1.svg" alt="img" />
                </div>
              </div>
              <div class="form-login">
                <label>Email</label>
                <div class="form-addons">
                  <input type="text" name="email" id="email" placeholder="Enter your email address" />
                  <img src="assets/img/icons/mail.svg" alt="img" />
                </div>
              </div>
              <div class="form-login">
                <label>Password</label>
                <div class="pass-group">
                  <input
                    type="password"
                    class="pass-input" name="password"
                    placeholder="Enter your password" id="password"
                  />
                  <span class="fas toggle-password fa-eye-slash"></span>
                </div>
              </div>
              <div class="form-login">
                <label>Confirm Password</label>
                <div class="pass-group">
                  <input
                    type="password"
                    class="pass-input" name = "confirm_password" id="password"
                    placeholder="Enter your password"
                  />
                  <span class="fas toggle-password fa-eye-slash"></span>
                </div>
              </div>
              <div class="form-login">
                <button class="btn btn-login" class="signup" onclick="buttonclicked()" name="sign_up">Sign up</button>
              </div>
              <div class="signinform text-center">
                <h4>
                  Already a user?
                  <a href="student-studentLoginForm" class="hover-a">Sign In</a>
                </h4>
              </div>
            </div>
          </div>
          <div class="login-img">
            <img src="assets/img/login.jpg" alt="img" />
          </div>
        </div>
      </div>
    </div>

    <script>

      $(document).ready(() => {
        
        const buttonclicked = () =>{
          alert("button clicked");
        }
        $(".signup").on("click",() => {
          alert("button clciked");
        })

        $("[name='sign_up']").on("click", () =>{

          student_name = $("#student_name").val();
          if(student_name == ""){
            addError("student_name", "Enter the Student Name");
          }

          roll_number = $("#roll_number").val();
          if(roll_number == ""){
            addError("roll_number", "Enter the roll number");
          }

          email = $("#email").val();
          if(email == ""){
            addError("email", "Enter the email id");
          }

          if(!valid_email(email)){
            addError("email", "Enter a valid college mail id")
          }

          password = $("#password").val();
          if(password == ""){
            addError("password", "Enter the password");
          }

          if(!valid_password(password)){
            addError("password","week password");
          }

          confirm_password = $("#confirm_password").val();
          if(confirm_password == ""){
            addError("confirm_password", "Enter the password");
          }

          if(password !== confirm_password){
            addError("confirm_password", "Password does not match");
          }

        })



      });
    </script>