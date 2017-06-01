<?php echo $this->render($header,NULL,get_defined_vars(),0); ?>
<?php echo $this->render($navbar,NULL,get_defined_vars(),0); ?>
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
                <form action="<?= $BASE ?>/submitCreateAccount" method="POST" enctype="multipart/form-data">
                  <div class="col-sm-6 col-span-6" id="vertical"> 
                    <div class="form-group required">
                      <label class="control-label col-sm-12">Username </label>
                        <div class= "col-sm-12">
                          <input type="text" class="form-control" name="username" id="username" required="true">
                        </div>
                    </div>
                    <div class="form-group required">
                      <label class="control-label col-sm-12">Email </label>
                      <div class= "col-sm-12">
                        <input type="email" class="form-control" name="email" id="email" required="true">
                      </div>
                    </div>
                    <div class="form-group required">
                      <label class="control-label col-sm-12">Password </label>
                      <div class= "col-sm-12">
                        <input type="password" class="form-control" name="password" id="password" required="true">
                      </div>
                    </div>
                  <!-- Password verification -->
                    <div class="form-group required">
                      <label class="control-label col-sm-12">Verify</label>
                      <div class= "col-sm-12">
                       <input type="password" class="form-control" name="verify" id="verify" onkeyup="verifyPassword();
                       return false;" required="true">
                       <span id="confirmMessage" class="confirmMessage"></span>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-span-6">
                    <div class="form-group required">
                     <label class="control-label col-sm-12" for="pic">Upload Portrait</label>
                       <div class="col-sm-12">
                         <div class="form-inline form-control">
                           <label for="pic"> 
                             <input type="file" name= "pic" id="pic">
                              </label>  
                         </div>
                       </div>
                    </div>   
                    <div class="form-group required">
                      <label class ="control-label col-sm-12">Biography</label>
                      <div class= "col-sm-12">
                        <textarea class="form-control" name="biography" id="biography"
                                rows="4" required="true"></textarea>
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
