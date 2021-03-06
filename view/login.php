<include href="{{ @header }}" />
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-2" id="sidebar">
         <include href="{{ @navbar }}" />
      </div>
      <div class="col-sm-8">
        <div class="jumbotron">
          <img src="{{ @lock }}" alt="lock.png" id="lock">
            <h1>Welcome back!</h1>
        </div>
        <div class="jumbotron">
          <div class="container">
            <form action="{{ @BASE }}/loggedIn" method="POST">
              <div class="form-group required">
                <label class="control-label col-sm-12">Username</label>
                  <div class= "col-sm-12">
                    <input type="text" class="form-control" name="username" id="username" required="true">
                  </div>
              </div>
              <div class="form-group required">
                <label class="control-label col-sm-12">Password</label>
                  <div class= "col-sm-12">
                    <input type="password" class="form-control" name="password" id="password" required="true">
                  </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-5 col-xs-offset-4"> 
                  <button type="submit" class=" btn btn-default btn-lg ">Log in</button>     
                </div>
              </div>
            </form>
          </div>
        </div>          
      </div>
    </div>
  </div>
</body>