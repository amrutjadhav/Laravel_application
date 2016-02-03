<?php
/**
 * Created by PhpStorm.
 * User: aravinth
 * Date: 06/09/15
 * Time: 12:07 PM
 */
?> 
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>{{Setting::get('sitename')}}</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="{{asset('website_ui/css/materialize.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="{{asset('website_ui/css/style.css')}}" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link rel="stylesheet" type="text/css" href="{{asset('website_ui/css/animate.css')}}">
    <link rel="shortcut icon" type="image/png" href="{{Setting::get('logo')}}"/>


    <!-- Social Meta -->

    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{$post->title}}" />
    <meta property="og:description" content="{{$post->des}}" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="pointblank" />
    <meta property="og:image" content="{{$post->image}}" />

    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:description" content="{{$post->des}}"/>
    <meta name="twitter:title" content="{{$post->title}}"/>
    <meta name="twitter:image:src" content="{{$post->image}}"/>
    <!-- including google analytics script -->

@if(Setting::get('analytics_code') != "")
  {{Setting::get('analytics_code')}}
@endif




</head>
<body>



<nav class="top-menu">
    <div class="nav-wrapper mat-clr">
        <a href="{{route('home')}}" class="brand-logo"><img src="{{Setting::get('logo')}}"></a>
        <!-- <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a> -->

        <ul class="right">
            <li><a data-target="modal2" class="waves-effect waves-light modal-trigger"><i class="fa fa-mobile"></i></a></li> 
            <li><a data-target="modal1" class="waves-effect waves-light modal-trigger"><i class="fa fa-bars"></i></a></li>
            

        </ul>

    </div>
</nav>


<nav class="search" id="search-content">
    <div class="nav-wrapper mat-clr1">
        <form>
            <div class="input-field">
                <input id="search" type="search" required>
                <label for="search"><i class="fa fa-search"></i></label>

            </div>
        </form>
    </div>
</nav>
<div class="contasiner-fluid">
    <div class="row" style="min-height: 700px;">




        <div class="col m12 s12 l12 single-card card min-single">
            <?php

                $cat_name = $post->share_cat;
                ?>
            
            <div class="row">

                @if($post->image)
                    <div class="col l4 m4 s12" style="margin-top:15px;padding-left:15px;">
                        <img class="sin-img" style="width: 100%;" src="{{$post->image}}">       
                    </div>
                @endif

                <div class="col l8 m8 s12" style="margin-top:15px;padding-right:15px;">
                    <h3 style="font-size: 3.5vh;margin-top: 0px;">{{$post->title}}</h3>
                    <p class="text-justify">{{$post->des}}</p>
                    
                    @if($publisher_image)
                        <div class="sin-au-btm">
                           <div class="au-left">
                               <a href="{{$post->url}}" target="_blank">
                                    <img src="{{ $publisher_image }}">
                                </a>
                           </div>
                          
                        </div>
                    @endif 
                </div>

            </div>
            
            
            <div class="row sing-btm-btn" style="text-align:center;">

                <a href="http://www.facebook.com/sharer.php?u={{route('shareLink',array('id' => $cat_name,'data' => $post->link))}}" target="_blank" class="waves-effect waves-light btn light-blue darken-4"><i class="fa fa-facebook left"></i>{{tr('share')}} <span class="hidden-s">{{tr('on_fb')}}</span></a>
                    <a href="http://twitter.com/share?text={{$post->title}}...&url={{route('shareLink',array('id' => $cat_name,'data' => $post->link))}}" target="_blank" class="waves-effect waves-light btn no-right-mar light-blue accent-3"><i class="fa fa-twitter left"></i>{{tr('share')}} <span class="hidden-s">{{tr('on_twitter')}}</span></a>
                    <a href="{{{$post->url}}}" target="_blank" class="waves-effect waves-light btn no-right-mar dark-blue darken">{{tr('read_more')}}</a>
            </div>
            

        </div>

        <div class="clear-both"></div>

        <div class="row single-btm-blk hidden-s">
                @foreach($related as $post)

            <?php

                $cat_name = $post->share_cat;

                if ($publisher = Publisher::find($post->publisher_id)) {
                    $publisher_image = $publisher->image;
                } else {
                    $publisher_image = "";
                }

            ?>

                <div class="col m6 s12 l3 single-btm-blk-box">
                  <div class="single-post card animated zoomIn">
                        @if($post->image)
                          <div class="card-image">
                            <a href="javascript:void(0);"><img src="{{$post->image}}"></a>
                            <span class="card-title">{{$post->title}}</span>
                          </div>
                        @endif
                      <div class="card-content">
                       <p class="text-justify">{{$post->des}}</p>


                           <div class="au-btm">

                            @if($publisher_image)

                                <div class="au-left">
                                <a href="{{$post->url}}" target="_blank">
                                    <img src="{{ $publisher_image }}">
                                </a>
                            </div>

                            @endif

                        </div>



                      </div>

                                          <!-- Footer Start-->
                    <?php


                        $sharelink = route("shareLink", array("id" => $cat_name, "data" => $post->link));

                    ?>
                    <div class="card-action text-center">

                        <a target="_blank" href="http://www.facebook.com/sharer.php?u={{ $sharelink }}" class="full waves-effect waves-light btn light-blue darken-4">
                            <i class="fa fa-facebook left"></i>
                            Share on Facebook
                        </a>

                        <a target="_blank" href="http://twitter.com/share?text={{ substr($post->title, 0, 30)}}...&url={{$sharelink}}" class="full waves-effect waves-light btn no-right-mar light-blue accent-3">
                            <i class="fa fa-twitter left"></i>
                            Share on Twitter
                        </a>

                        
                            <a target="_blank" href="{{ $post->url }}" target="_blank" class="full-btn waves-effect waves-light btn no-right-mar mat-clr">
                                Read More
                            </a>
                    </div>

                    <!--Footer End -->
                  </div>    
              </div>
              @endforeach

            </div>

            <div class="row single-btm-blk" style="text-align:center;">
                 <a href="{{route('home')}}" class="full-btn waves-effect waves-light btn mat-clr">{{tr('more_news')}}</a> 
            </div>


    </div>

    <footer class="page-footer mat-clr">

        <div class="footer-copyright mat-clr">
            <div class="container">
                <p class="text-center"> <a class="white-text text-lighten-3" href="http://appoets.com" target="_blank">{{Setting::get('footer')}}</a></p>
            </div>
        </div>
    </footer>


    <div id="modal1" class="modal bottom-sheet cat">
        <div class="modal-content">
            <h4>{{tr('select_category')}}</h4>
            <div class="popup-top"></div>
             <a href="javascript:void(0);" class="pull-right modal-action modal-close waves-effect waves-green btn-flat"><i class="fa fa-times"></i></a>
            @foreach($cats as $cat)
                @if($cat->id == 1)
                @else
                <a href="{{route('selectCat',array('id' => $cat->id))}}" class="cat-link">
                    <img src="{{{$cat->pics}}}">
                    <span>{{{$cat->name}}}</span>
                </a>
                @endif
            @endforeach
        </div>

    </div>

     <div id="modal2" class="modal bottom-sheet cat">
    <div class="modal-content">
      <h4>{{tr('get_it_on')}}
        <a href="#!" class="pull-right modal-action modal-close waves-effect waves-green btn-flat"><i class="fa fa-times"></i></a>
      </h4>
      <div class="popup-top"></div>
      
      <a href="{{Setting::get('ios_app')}}" class="cat-link app" target="_blank">
        <img src="{{asset('image/appstore.png')}}">
      </a>

      <a href="{{Setting::get('google_play')}}" class="cat-link app" target="_blank">
        <img src="{{asset('image/playstore.png')}}">
      </a>

      <a href="{{Setting::get('website_link')}}" class="cat-link app" target="_blank">
        <img src="{{asset('image/webapp.png')}}">
      </a>
      
    </div>
    
  </div>

    <!--  Scripts-->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

    <script src="{{asset('website_ui/js/materialize.js')}}"></script>
    <script src="{{asset('website_ui/js/init.js')}}"></script>
    <!-- other scripts -->


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

