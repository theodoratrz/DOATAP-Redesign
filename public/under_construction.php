<!-- purple x moss 2020 -->
<link rel="stylesheet" href="/public/css/under_construction.css">
<link rel="stylesheet" href="/public/css/index.css">

<head>
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600;900&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/4b9ba14b0f.js" crossorigin="anonymous"></script>
  <script>
// Set the date we're counting down to
var countDownDate = new Date("Jun 28, 2022 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d ";
  document.getElementById("demo1").innerHTML = hours + "h ";
  document.getElementById("demo2").innerHTML = minutes + "m ";
  document.getElementById("demo3").innerHTML = seconds + "s ";


  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>
</head>
<body>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . "/components/template.php" ?>
  <div class="mainbox">
    
  <i class="err fas fa-cog fa-spin"></i>
  <i class="err2 fas fa-cog fa-spin"></i>
  <div style="display:flex; flex-direction: row; column-gap:1rem;  justify-content:center; align-items:center; padding-top:25rem; padding-left:10rem;padding-right:10rem;">
  
  <p class="rounded-circle" style="background-color:white; border:2px solid black; padding:1rem;" id="demo"></p>
  <p class="rounded-circle" style="background-color:white; border:2px solid black; padding:1rem;" id="demo1"></p>
  <p class="rounded-circle" style="background-color:white; border:2px solid black; padding:1rem;" id="demo2"></p>
  <p class="rounded-circle" style="background-color:white; border:2px solid black; padding:1rem;" id="demo3"></p>
</div>
    <div class="msg">Something Awesome Is In The Work!<p>We'll be up and running soon with our improved site</p></div>
</div>
</body>