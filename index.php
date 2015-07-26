
<?php
require'templates/master.php';

?>

<!--<?php require 'app/views/master.php';?>
<!-- old master media queries-->


	<meta name="viewport" content="initial-scale=1">
<!-- -->
<!-- media queries  just for master-->
<link rel="stylesheet" type="text/css" media="only screen and (min-width:980px) and
(max-width: 2000px)" href="public/stylesheets/980/index.css"/>

<link rel="stylesheet" type="text/css" media="only screen and (min-width:768px) and
(max-width: 980px)" href="public/stylesheets/768/index.css"/>

<link rel="stylesheet" type="text/css" media="only screen and (min-width:600px) and
(max-width: 767px)" href="public/stylesheets/600/index.css"/>

<link rel="stylesheet" type="text/css" media="only screen and (min-width:300px) and
(max-width: 599px)" href="public/stylesheets/300/index.css"/>

<link rel="stylesheet" type="text/css" media="only screen and (min-width:100px) and
(max-width: 299px)" href="public/stylesheets/100/index.css"/>
<!-- end of media queries -->
<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
<script>
$(window).scroll(function(){

  var wScroll = $(this).scrollTop();

    $('#title').css({
      'transform' : 'translate(0px, '+ wScroll /2 +'%)'
    });

});
  </script>
</head>

<body>

  <div id="splashpage">

    <div id="title">
      Hello Mom
    </div>
  </div>
  <div class="content">
  <!-- <div class="filler">

  </div> -->
  <div class="container">
    jlkasjdflsjflksdjfslkjflksjdflkjslfkj
</div>
  <div class="footer">
    <h1>Footer</h1>
  </div>
</body>
</html>
