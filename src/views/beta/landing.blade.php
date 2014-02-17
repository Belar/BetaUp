
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Beta Sign Up</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ URL::asset('packages/belar/betaup/css/bootstrap.css') }}" rel="stylesheet">
	  

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
		<div class="col-md-4 col-md-offset-4">
	  
		  {{ Form::open(array('url' => 'beta', 'class'=>'form-signin')); }}
		  	
				<h2 class="form-signin-heading">Sign Up</h2>
				
				<ul class="errors">
					@foreach($errors->all() as $message)
						<li class="text-danger">{{ $message }}</li>
					@endforeach
				</ul>
							
			  {{Form::label('email', 'Description', array('class'=>'sr-only'));}}
			  {{Form::email('email','', array('placeholder' => 'Email address', 'class' => 'form-control' ));}}
			  {{Form::submit('Submit', array('class' => 'btn btn-lg btn-primary btn-block'));}}
		  
		  {{Form::close();}}
		 </div> 
    </div> <!-- /container -->
      
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
