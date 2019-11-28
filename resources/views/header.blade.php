
<!-- <div class="sidenav">
  <a href='javascript:void();'>Welcome, {{Session::get('email')}}</a>
  <hr/>
  <a href="/addemailtemplate">> Add Email Template</a>
  <a href="#services">> Email Template List</a>
  <a href="/addemailtask"><span class="glyphicon glyphicon-plus"></span>Add Email Task</a>
  <a href="#contact">> Email Tasl List</a>
  <a href="#contact">> Search Sent Email</a>
</div> -->
 
<header>
  
    <img src="{{ asset('images/fc_logo.jpg') }}"  height="50" width="120">
 

  <div class="topnav-right">
     <a href='javascript:void();'>Welcome, {{Session::get('email')}}</a>
    <label style="color:#ffff">|</label>
    <a class="logout" href="/logout">Logout</a>
  </div>
  
</header>
<nav class="nav nav-pills">
    <a href="/addemailtemplate" class="nav-item nav-link">
        <i class="fa fa-plus"></i> Email Template
    </a>
    <a href="#" class="nav-item nav-link">
        <i class="fa fa-eye"></i> Email Template
    </a>
    <a href="/addemailtask" class="nav-item nav-link">
        <i class="fa fa-plus"></i> Email Task
    </a>
     <a href="/SearchEmailTask" class="nav-item nav-link">
        <i class="fa fa-eye"></i> Email Task
    </a>
    <a href="#" class="nav-item nav-link" tabindex="-1">
        <i class="fa fa-search"></i> Sent Email
    </a>
</nav>

<script>
   $(".nav .nav-link").on("click", function(){
   $(".nav").find(".active").removeClass("active");
   $(this).addClass("active");
});
   $(function(){
    var current = location.pathname;
    $('.nav .nav-link').each(function(){
        var $this = $(this);
        // if the current path is like this link, make it active
        if($this.attr('href').indexOf(current) !== -1){
            $this.addClass('active');
        }
    })
})

</script>