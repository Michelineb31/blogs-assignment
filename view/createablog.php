<include href="{{ @header }}" />
 <body>
   <div class="container">
      <div class="row">
         <div class="col-sm-8">
            <div class="jumbotron">
               <img src="{{ @write }}" alt="writing.png" id="writing">
               <h1>Hello </h1>
               <p>what's on your mind?</p>
            </div>
               
            <div class="jumbotron">
               <div class="container">
                  <form action="{{@BASE}}/addBlog" method="post">
                     <div class="form-group">
                      <label class="control-label col-sm-12">Title</label>
                        <div class="col-sm-12">
                        <input type="text" class="form-control" name="title" id="title" required="true"> 
                        </div>
                     </div>
               
                     <div class="form-group">
                        <label class="control-label col-sm-12">Blog Entry</label>
                         <div class="col-sm-12">
                        <textarea class="form-control" name="entry" id="entry"
                        rows="9" required="true"></textarea>
                        </div>
                     </div>
                     <div class="form-group">
                      <div class="col-sm-offset-5 col-xs-offset-4">
                        <button type="submit" class="btn btn-default btn-lg">Save</button>
                     </div>
                    </div>
                  </form>     
               </div> 
            </div>
         </div>
      </div>
   </div>
</body>