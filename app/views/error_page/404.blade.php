<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>{{Setting::get('sitename')}}</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link href="{{asset('inshorts/css/materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{{asset('inshorts/css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
		


  <nav class="top-menu">
    <div class="nav-wrapper mat-clr">
      <a href="{{route('home')}}" class="brand-logo"><img src="{{Setting::get('logo')}}"></a>
      <!-- <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a> -->
     
      <ul class="right">  
        <li><a data-target="modal1" class="waves-effect waves-light modal-trigger"><i class="fa fa-bars"></i></a></li>      
        <li><a class="waves-effect waves-light search-btn" href="#!" id="search-icon" data-activates="search-content"><i class="search-ico material-icons">search</i></a></li>      
               
      </ul>
      
    </div>
  </nav>


   <nav class="search" id="search-content">
    <div class="nav-wrapper mat-clr1">
      <form action="{{route('search')}}" method="get">
        <div class="input-field">
          <input id="search" type="search" name="q" required>
          <label for="search"><i class="material-icons">search</i></label>

        </div>
      </form>
    </div>
  </nav>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    Oops!</h1>
                <h2>
                    404 Not Found</h2>
                <div class="error-details">
                    Sorry, an error has occured, Requested page not found!
                </div>
                <div class="error-actions">
                    <a href="{{route('home')}}" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                        Take Me Home </a><a href="#" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Contact Support </a>
                </div>
            </div>
        </div>
    </div>
</div>




  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

  <script src="{{asset('inshorts/js/materialize.js')}}"></script>
  <script src="{{asset('inshorts/js/init.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){


      $('#search-icon').click(function(){ $('#search-content').toggle('slide');});


      $('.modal-trigger').leanModal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      in_duration: 300, // Transition in duration
      out_duration: 200, // Transition out duration
      
    }
  );
   
    });
</script>


  </body>
</html>
