<!-- Admin Login Modal -->
<div class="modal fade" id="adminLoginModal" tabindex="-1" role="dialog" aria-labelledby="adminLoginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="adminLoginModalLabel">Admin Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
        <form action="adminlogin_process.php" method="POST">
                  <div class="form-group">
                      <label for="adminEmail">Email</label>
                      <input type="email" class="form-control" id="adminEmail" name="adminEmail" placeholder="Enter email" required>
                  </div>
                  <div class="form-group">
                      <label for="adminPassword">Password</label>
                      <input type="password" class="form-control" id="adminPassword" name="adminPassword" placeholder="Password" required>
                  </div>
              
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <input class="btn btn-success" type="submit" value="Login">
          </div>
        </form>
      </div>
  </div>
</div>

<!-- Hospital & Doctor Registration Modal -->
<div class="modal fade" id="hospitalDoctorRegisterModal" tabindex="-1" role="dialog" aria-labelledby="hospitalDoctorRegisterModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="hospitalDoctorRegisterModalLabel">Hospital & Doctor Registration</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
          <form action="hospitalRegister_process.php" method="POST">
                  <div class="form-group">
                      <label for="hospitalName">Hospital Name</label>
                      <input type="text" class="form-control" id="hospitalName" name="hospitalName" placeholder="Enter hospital name">
                  </div>
                  <div class="form-group">
                      <label for="hospitalEmail">Hospital Email</label>
                      <input type="email" class="form-control" id="hospitalEmail" name="hospitalEmail" placeholder="Enter hospital email">
                  </div>
                  <div class="form-group">
                      <label for="hospitalPhone">Hospital Phone</label>
                      <input type="text" class="form-control" id="hospitalPhone" name="hospitalPhone" placeholder="Enter hospital phone">
                  </div>
                  <div class="form-group">
                      <label for="hospitalAddress">Hospital Address</label>
                      <input type="text" class="form-control" id="hospitalAddress" name="hospitalAddress" placeholder="Enter hospital address">
                  </div>
                  <div class="form-group">
                      <label for="hospitalPassword">Password</label>
                      <input type="password" class="form-control" id="hospitalPassword" name="password" placeholder="Enter password">
                  </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <input class="btn btn-success" type="submit" value="Register">
          </div>
          </form>
      </div>
  </div>
</div>

<!-- Hospital & Doctor Login Modal -->
<div class="modal fade" id="hospitalDoctorLoginModal" tabindex="-1" role="dialog" aria-labelledby="hospitalDoctorLoginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="hospitalDoctorLoginModalLabel">Hospital & Doctor Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form action="hospitalLogin_process.php" method="POST">
                  <div class="form-group">
                      <label for="hospitalDoctorEmail">Email</label>
                      <input type="email" class="form-control" id="hospitalDoctorEmail" name="hospitalEmail" placeholder="Enter email" required>
                  </div>
                  <div class="form-group">
                      <label for="hospitalDoctorPassword">Password</label>
                      <input type="password" class="form-control" id="hospitalDoctorPassword" name="password" placeholder="Password" required>
                  </div>
          </div>
          <div class="modal-footer">
            <p>Dont Have Account? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#hospitalDoctorRegisterModal">Register Now</a></p>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary" value="Login">
          </div>
          </form>
      </div>
  </div>
</div>






 <!-- Army & Users Registration Modal -->
 <div class="modal fade" id="armyUsersRegisterModal" tabindex="-1" role="dialog" aria-labelledby="armyUsersRegisterModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="armyUsersRegisterModalLabel">Army & Users Registration</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form action="armyRegister_process.php" method="POST">
                  <div class="form-group">
                      <label for="armyUserName">Name</label>
                      <input type="text" class="form-control" id="armyUserName" name="name" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                      <label for="armyUserID">Army ID</label>
                      <input type="text" class="form-control" id="armyUserID" name="army_id" placeholder="Enter Army ID">
                  </div>
                  <div class="form-group">
                      <label for="armyUserPhone">Phone</label>
                      <input type="text" class="form-control" id="armyUserPhone" name="phone" placeholder="Enter phone">
                  </div>
                  <div class="form-group">
                      <label for="armyUserEmail">Email</label>
                      <input type="email" class="form-control" id="armyUserEmail" name="email" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                      <label for="armyUserPassword">Password</label>
                      <input type="password" class="form-control" id="armyUserPassword" name="password" placeholder="Enter password">
                  </div>
             
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <input class="btn btn-success" type="submit" value="Register">
          </div>
          </form>
      </div>
  </div>
</div>

<!-- Army & Users Login Modal -->
<div class="modal fade" id="armyUsersLoginModal" tabindex="-1" role="dialog" aria-labelledby="armyUsersLoginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="armyUsersLoginModalLabel">Army & Users Login</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form action="armyLogin_process.php" method="POST">
                  <div class="form-group">
                      <label for="armyUsersEmail">Email</label>
                      <input type="email" class="form-control" id="armyUsersEmail" name="email" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                      <label for="armyUsersPassword">Password</label>
                      <input type="password" class="form-control" id="armyUsersPassword" name="password" placeholder="Password">
                  </div>
             
          </div>
          <div class="modal-footer">
            <p>Dont Have Account? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#armyUsersRegisterModal">Register Now</a></p>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <input type="submit" class="btn btn-primary" value="Login">
          </div>
          </form>
      </div>
  </div>
</div>