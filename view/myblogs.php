<include href="{{ @header }}" />
    
<body>
<div class="container">
  <div class="row">
    <div class="col-sm-2">
      <include href ="{{ @navbar }}"/>
    </div>
    <div class="col-sm-10">
      <div class="jumbotron">
        <div class="container">
          <img src="{{  @image['path'] }}" alt="{{ @image['path'] }}">
            <h1>{{ ucFirst(@username) }} Blogs</h1>
        </div>
      </div>
      <div class="jumbotron">
        <div class="container">
          <div class="row">
            <div class="col-sm-7" id="blogback">
              <table class="table table-striped">
                <thead><th>Blog</th><th>Update</th><th>Delete</th></thead>
                  <tbody>
                    <repeat group="{{ @blogs }}" value="{{ @blog }}">
                      <tr>
                        <td>{{ ucFirst(@blog['title']) }}</td>
                          <td><a href="{{ @BASE }}/updateBlog/{{ @blog.blogID }}" type="button"
                                class="btn btn-default btn-sm">
                              <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                                    {{ @blogCounts[ @user ] }} </a>
                          </td>
                          <td><a href="{{ @BASE }}/delete/{{ @blog.blogID }}" type="button"
                                class="btn btn-default btn-sm">
                              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                    {{ @blogCounts[ @user ] }} </button>
                          </td>
                      </tr>
                    </repeat>
                   </tbody>
                  </table>
            </div>         
            <div class="col-sm-4 text-center" >                
              <div class="row" >
                <div id="blogback">
                  <h3>{{ ucFirst(@username) }}</h3>
                  <hr>
                  {{ @biography }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>