 <include href="{{ @header }}"/>
 <body>
  <div class="container">
   <div class="col-sm-2" id="navbar">
    <include href ="{{ @navbar }}"/>
    </div>
   <div class="col-sm-8">
    <repeat group="{{ @bloggers }}" value="{{ @blogger}}">
     <div class="col-sm-3 text-center" id="profle">
      <div class="row">
       <img src="{{ @BASE }}/{{ @}}"
       
      </div>
      
     </div>
     
    </repeat>
    
   </div>
   
  </div>
 </body>
