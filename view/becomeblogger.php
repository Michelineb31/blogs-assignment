 <body>
   <div class="row">
      <form action="{{ @BASE }}/ becomeBlogger" method ="POST" enctype="multipart/form-data">
         <div class="col-sm-6 col-span-6" id="vertical">
            <div class="form-group required">
               <label class="control-label col-sm-12">Username </label>
               <div class="col-sm-12">
                  <input type="text" class="form-control" name="username" required="true"> 
               </div>    
            </div>
            <div class="form-group required">
               <label class="control-label col-sm-12">Email</label>
               <div class="col-sm-12">
                  <input type="email" class="form-control" name="email" id="email" required="true">   
               </div>
            </div>
            <div class="form-group-required">
               <label class="control-label col-sm-12">Password</label>
               <div class="col-sm-12">
                  <input type="password" class="form-control" name="password" id="password" required="true">
               </div>        
            </div>
         </div>
         <div class="col-sm-6 col-span-6">
            <div class="form-group required">
               <label class="control-label col-sm-12" for="pic">Upload Portrait</label>
               <div class="col-sm-12">
                  <div class="form-inline form-control">
                     <label for="pic">
                        <input type="file" name="pic" id="pic" required="true">
                     </label>
                  </div>  
               </div>
               <div class="form-group required">
                  <label class="control-label col-sm-12">Biography</label>
                  <div class="col-sm-12">
                     <textarea class="form-control" name="biogrpahy" id="biography"
                               rows="4" required="true"></textarea>
                  </div>
               </div>
               <div class="form-group">
                  <div class="col-sm-offset-4 col-xs-offset-4">
                     <button type="submit" class="btn btn-default btn-lg">Start Blogging!</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
   </div>
</body>
