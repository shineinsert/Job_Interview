<?php
if (isset($_POST['submit'])) {
    $url   = $_POST['url'];
    $check = substr($url, 0, 11);

    if ($check == "http://www.") {
        $upper_case = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $lower_case = "abcdefghijklmnopqrstuvwxyz";
        $numbers    = "0123456789";

        $upper_case_shuffle = str_shuffle($upper_case);
        $lower_case_shuffle = str_shuffle($lower_case);
        $numbers_shuffle    = str_shuffle($numbers);

        $upper_case_new = substr($upper_case_shuffle, 0, 2);
        $lower_case_new = substr($lower_case_shuffle, 0, 2);
        $numbers_new    = substr($numbers_shuffle, 0, 2);

        $mixed         = "$upper_case_new$lower_case_new$numbers_new";
        $mixed_shuffle = str_shuffle($mixed);

        if (is_dir($mixed_shuffle)) {
            $error = "Error continue";
        } else {
            mkdir($mixed_shuffle);
            $file_path = dirname(_FILE_) . "/$mixed_shuffle/Index.php";
            $Index     = fopen($file_path, 'w');
            $data      = '<?php header("location: ' . $url . '");?>';
            fwrite($Index, $data);
            fclose($Index);

            $new_url = "Your new URL : http://localhost:8888/$mixed_shuffle";

        }
    } else {
        $error = "You must start with 'http://www.'";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mountshort_Jobinterview</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="assets/css/Mycss.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	<nav class="navbar navbar-inverse" id="cenfont">
	  <div class="container-fluid">
	    <div class="navbar-header" id="movehead">
	      <a class="navbar-brand" style="display: inline-flex;font-weight: bold;font-size: 20px;margin-top: -2px" href="#"><img src="../../images/logo2.png" style="width: 40px;height: 40px;margin-top: -10px">Mountshort</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li class=""><a href="#">ENTERPRISE</a></li>
	      <li><a href="#">LINK MANAGEMENT</a></li>
	      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Contacts<span class="caret"></span></a>
	        <ul class="dropdown-menu">
	          <li><a href="#">Social Contact</a></li>
	          <li><a href="#">Address</a></li>
	        </ul>
	      </li>
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	    </ul>
	  </div>
	</nav>
	<section id="banner">
		<div class="container" style="margin-bottom: 100px">
			<h2 style="color: white;text-shadow: 3px 2px 3px black;">Enter a url</h2>
			<form action="Index.php" method="POST">
				<div class="input-group" style="display: inline-flex;">
					<input id="txtUrl" class="form-control" style="width: 80%;margin-left: 10px" type="text" name="url" placeholder="Paste a link to shorten it" size="50">
						<div class="input-group-btn">
						<button id="btnNext" class="btn btn-success" onclick="submitClick();" type="submit" name="submit" value="Shorten" >Shorten</button>
						</div>
      			</div>
				<br>
				<br>
				<p  style="color: white;text-shadow: 3px 2px 3px black;"><?php
					if (isset($error)) {
					    echo $error;
					}
					if (isset($new_url)) {
					    echo $new_url;
					}
				?><br>
				Last Shorten :<span id="spUrl"></span></p><br>
	 		</form>
		</div>

	</section>
<!--<script src="https://www.gstatic.com/firebasejs/5.2.0/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyCvGDcnnsAZzWrCydrWuz5ADVVLXDCE3_Y",
    authDomain: "jobinterview-8bf22.firebaseapp.com",
    databaseURL: "https://jobinterview-8bf22.firebaseio.com",
    projectId: "jobinterview-8bf22",
    storageBucket: "jobinterview-8bf22.appspot.com",
    messagingSenderId: "287259833997"
  };
  firebase.initializeApp(config);
</script>
	<script src="index.js"></script>-->

</body>
<footer >
    <div class="text-center center-block" id="footblack">
            <p class="txt-railway" style="color: white">- Developed for Jobinterview -</p>
                <a href="https://www.facebook.com/"><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
	            <a href="https://twitter.com/"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
	            <a href="https://plus.google.com/"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
	            <a href=""><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
</div>
</footer>
<script type="text/javascript">
	$(document).ready(function(){
	if(typeof(Storage) == "undefined") {
		alert("Not storage support");
	}
	$("#btnNext").click(function(){
		localStorage.setItem("sUrl", $("#txtUrl").val());
		localStorage.setItem("sNew", $new_url.val());
		 window.localStorage ;
	});
	$("#spUrl").html( localStorage.getItem("sUrl"));
	$("#spNew").html( localStorage.getItem("sNew"));
});
</script>

</html>
