<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<!-- Mirrored from madebyamp.com/themes/slate/ by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 18 May 2011 05:55:38 GMT -->
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>PRASAD Admin Login</title>
	
	<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
	<link rel="stylesheet" href="css/plugin.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
	<link rel="stylesheet" href="css/custom.css" type="text/css" media="screen" title="no title" charset="utf-8" />
	<link rel="stylesheet" href="css/login.css" type="text/css" media="screen" title="no title" charset="utf-8" />
	<link rel="stylesheet" href="css/plugin.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
	<link rel="stylesheet" href="css/custom.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
    <link rel="stylesheet" type="text/css" href="css/jquery-ui-1.8.13.custom.css" />
    
	<script  type="text/javascript" src="js/jquery/jquery.1.4.2.min.js"></script>
<script  type="text/javascript" src="js/slate/slate.js"></script>
<script  type="text/javascript" src="js/slate/slate.portlet.js"></script>
<script  type="text/javascript" src="js/plugin.js"></script>
<script  type="text/javascript" src="js/functions/adminLogIn.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.13.custom.min.js"></script>

</head>

<body >

<div id="login">
	
	<h1 id="title"><a href="#">PRASAD Admin</a></h1>
	
<div id="login-body" class="clearfix"> 

	         
	<form action="" name="login" id="login_form" method="post">
		
		
	                    <div class="content_front">

	        <div class="pad">
	        	
	        	<div class="field">
					<label>Username:</label>
					
					<div class=""><span class="input"><input name="ADMIN_USERNAME" id="ADMIN_USERNAME" class="text" type="text" value="admin" /></span></div>
				</div> <!-- .field -->
				
				<div class="field">
					<label>Password:</label>

					
					<div class=""><span class="input"><input name="ADMIN_PSWRD" id="ADMIN_PSWRD" class="text" type="password" value="password" /> 
						<a style="" href="javascript:;" id="forgot_my_password">Forgot password?</a></span></div>
				</div> <!-- .field -->
				
				<div class="checkbox">
					<span class="label">&nbsp;</span>
					
					<div class=""><input name="remember" id="remember" class="checkbox" value="yes" type="checkbox" /> &nbsp;&nbsp;<label style="display: inline;" for="remember">Remember me on this computer</label></div>
				</div> <!-- .field -->

				
				<div class="field">
					<span class="label">&nbsp;</span>
					
					<div class=""><button type="button" class="btn" onclick="logIn();">Login</button></div>
				</div> <!-- .field -->
                
		<div class="field">
					
					<div id="loginmsg"></div>
				</div> 

	        </div>
	    </div>

		
	</form>

</div>

</div> <!-- #login -->


</body>


</html>