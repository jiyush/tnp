<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Slideshow</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.cycle2/2.1.6/jquery.cycle2.min.js"></script>
    <style type="text/css">
    * {
        margin: 0;
        padding: 0;
    }
    #container {
        width: 100%;
        height: 704px;
        overflow: hidden;
        background: #ff00ff;
    }
    #slideshow {
        height: 100%;
        width: 100%;
    }
    #slideshow img {
        height: 100%;
        width: 100%;
    }
    #pager {
        text-align: center;
        height: 120px;
        width: 100%;
        position: absolute;
        bottom: 5%;
        background: rgba(0,0,0,.5);
        z-index: 1000;
        opacity: 0;
        transition: all 0.3s ease-in-out 0s;
    }
    #pager:hover {
       opacity: 1;
    }    
    
    #prev {
        height: 120px;
        width: 120px;
        position: absolute;
        top: 0;
        bottom: 0;
        left:0;
        margin: auto 10px;
        z-index: 1000;
    }
     #next {
        height: 120px;
        width: 120px;
        position: absolute;
        top: 0;
        bottom: 0;
        right:0;
        margin: auto 10px;
      z-index: 1000;
    }
    
    #pager img {
		margin: 10px 5px;
		opacity:0.3;
		transition:all .3s ease-in-out 0s;
		}
	#pager img:hover {
		opacity:1;
		transform:scale(1.05);
		z-index:100;
		}
    </style>
</head>
<body>
   
<div id="container">
    <div id="slideshow" class="cycle-slideshow"
       data-cycle-fx = "fade"
       data-cycle-speed = "600"
       data-cycle-timeout = "3000"
       data-cycle-pager = "#pager"
       data-cycle-pager-template ="<a herf='#'><img src='' height=100 width=150/>"
       data-cycle-next = "#next"
       data-cycle-prev = "#prev"
       data-cycle-manual-fx = "scrollHorz"
       data-cycle-manual-speed = "400"
       data-cycle-pager-fx = "fade">
       <!--  <img src="img/back.jpg" alt="">
        <img src="img/Awesome%20Mountain.jpeg" alt="">
        <img src="img/Beige%20Lake%20Mt.jpg" alt="">
        <img src="img/keys.jpg" alt=""> -->
      {{--   @foreach($img as $i)
            <img src="{{ public_path('/gallery') }}/{{ $i->img }}">
        @endforeach --}}
        <img src="http://maheshgoyani.in/images/photography/nature/3.jpg">
        <img src="http://maheshgoyani.in/images/photography/nature/9.jpg">
    </div>
    <div id="pager"></div>
    <img id="prev" src="./img/prev1.svg"/>
    <img id="next" src="./img/next1.svg"/>
</div>
 
</body>
</html>