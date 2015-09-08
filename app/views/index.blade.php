<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Inshorts</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link href="{{asset('inshorts/css/materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{{asset('inshorts/css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
		


  <nav class="top-menu">
    <div class="nav-wrapper mat-clr">
      <a href="{{route('home')}}" class="brand-logo"><img src="{{asset('inshorts/img/logo.png')}}"></a>
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
  <div class="container-fluid page">
 	<div class="row">
        @foreach($posts as $post)
      <div class="col m6 s12 l4">
          <div class="single-post card">

              <div class="card-image">
                <a href="#"><img src="{{{$post->image}}}"></a>
                <span class="card-title"><a href="#">{{{$post->title}}}</a></span>
              </div>
              <div class="card-content">
               <p class="text-justify">{{{$post->des}}}</p>
              </div>

              <div class="card-action text-center">

                <a href="http://www.facebook.com/sharer.php?u={{route('single',$post->link)}}" class="full waves-effect waves-light btn light-blue darken-4"><i class="fa fa-facebook left"></i>Share on Facebook</a>
                <a href="http://twitter.com/share?text={{$post->title}}&url={{route('single',$post->link)}}" class="full waves-effect waves-light btn no-right-mar light-blue accent-3"><i class="fa fa-twitter left"></i>Share on Twitter</a>
                <a href="{{{$post->url}}}" class="full-btn waves-effect waves-light btn no-right-mar mat-clr">View More</a>

              </div>
             
              
          </div>  	
      </div>
        @endforeach

    </div>
   </div>


  <footer class="page-footer mat-clr">
 
    <div class="footer-copyright mat-clr">
      <div class="container">
      <p class="text-center">&copy;2015 <a class="white-text text-lighten-3" href="#">Inshorts</a></p>
      </div>
    </div>
  </footer>


  <div id="modal1" class="modal bottom-sheet cat">
    <div class="modal-content">
      <h4>Select Categories</h4>
        @foreach($cats as $cat)
      <a href="{{route('selectCat',array('id' => $cat->id))}}" class="cat-link">
        <img src="{{{$cat->pics}}}">
        <span>{{{$cat->name}}}</span>
      </a>
        @endforeach
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
</script


  </body>
</html>
