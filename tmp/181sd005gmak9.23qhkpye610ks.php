<?php echo $this->render($header,NULL,get_defined_vars(),0); ?>


<body>
  
      <div class="col-sm-2">
        
      </div>
      <div class="col-sm-8">
       
        <div class="jumbotron">
          <img src="<?= $write ?>" alt="writing">
          <h1>Become a Blogger!</h1>
          <p>Create a new account below</p>
        </div>
        <div class="jumbotron">
          <div class="container">
            <div class="row">
                <form action="<?= $BASE ?>/submitCreateAccount" method="POST" data-toggle="validator" enctype="multipart/form-data">
                  <div class="col-sm-6 col-span-6" id="vertical"> 
                    <div class="form-group">
                      <label class="control-label col-sm-12">Username </label>
                        <div class= "col-sm-12">
                          <input type="text" class="form-control" name="username" id="username" required="true"
                          value="<?= $username ?>" >
                          <div class="alert alert-danger error">
                              <strong>Error: </strong><span id="{{ @passwordConstraint['username'] }"></span>
                        </div>
                          <?php if ($userError  != null): ?>
                              
                                    <div class="alert alert-danger"><?= $userError ?></div>
                              
                          <?php endif; ?>
                        </div>
            
                    </div>
                        
                    <div class="form-group ">
                      <label class="control-label col-sm-12">Email </label>
                      <div class= "col-sm-12">
                        <input type="email" class="form-control" data-error="Email address is invalid" name="email" id="email" required="true" value=" <?= $email ?>">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label col-sm-12">Password </label>
                      <div class= "col-sm-12">
                        <input type="password" class="form-control" data-minlength="6" name="password" id="password" required="true">
                        <div class="alert alert-danger error">
                              <strong>Error: </strong><span id="<?= $passwordConstraint['password'] ?>"></span>
                        </div>
                          <?php if ($passwordConstraint['password']): ?>
                              
                                    <div class="alert alert-danger"><?= $passwordConstraint['password'] ?></div>
                              
                          <?php endif; ?>
                        
                      </div>
                    </div>
                  <!-- Password verification not working-->
                    <div class="form-group">
                      <label class="control-label col-sm-12">Verify</label>
                      <div class= "col-sm-12">
                       <input type="password" class="form-control" data=minLength="6" name="verify" id="verify" onkeyup="checkPassword(); return false;" required="true">
                       <span id="confirmMessage" class="confirmMessage"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-span-6">
                    <div class="form-group">
                     <label class="control-label col-sm-12" for="pic">Upload Portrait</label>
                       <div class="col-sm-12">
                         <div class="form-inline form-control">
                           <label for="pic"> 
                             <input type="file" name= "pic" id="pic">
                              </label>  
                         </div>
                       </div>
                    </div>   
                    <div class="form-group">
                      <label class ="control-label col-sm-12">Biography</label>
                      <div class= "col-sm-12">
                        <textarea class="form-control" required="true" name="biography"  id="biography"
                                rows="4" ><?= $biography ?></textarea>
                      </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                      <div class="col-sm-offset-4 col-xs-offset-4"> 
                       <button type="submit" class=" btn btn-default btn-lg ">Start Blogging</button>     
                      </div>
                    </div>
                  </div>          
                </form>
            </div>
          </div>
         </div>  
      </div>
      
   
 
</body>
