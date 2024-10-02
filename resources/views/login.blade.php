<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="/image/logo pkm.png" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <title>Poli Gigi</title>

</head>
<style>
    body{
        background-color: aliceblue;
        
    }
    
</style>



<body>
	
	<main class="position-absolute top-50 start-50 translate-middle container-fluid">
		

		

		<div class="container">
			
			<div class="row loginpanel">
	        <div class="position-absolute top-50 start-50 translate-middle col-lg-5 col-sm-12 loginform">

	            <h2 class="text-center text-white mb-4"></h2>

	            <div class="row">

	                <div class="col-md-12 mx-auto">
						<h1 class="text-center text-info-emphasis" > <b>Puskesmas Welahan 1</b></h1>
					<div class="alert alert-info">
	                

	                    
					<form action="/login/cek" method="POST">
						@csrf
	                    <div class="form-group">

	                        <label>Username</label>

	                        <input id="username" placeholder="Username" type="text" class="form-control form-control-lg rounded-0" name="username" value="{{ Session::get('name') }}">



	                                            </div>

	                    <div class="form-group">

	                        <label>Password</label>

	                        <input id="password" placeholder="your password" type="password" class="form-control form-control-lg rounded-0" name="password">



	                                            </div>



	                    <div class="form-group">

	                        <div class="row">

	                            <div class="">

	                                <button type="submit" name="submit" class="btn btn-success btn-lg col-12  mt-2" id="btnLogin">Login</button> 
									

	                            </div>

	                        </div>

	                    </div>
						
					</form>


	                </div>





	            </div>

	            <!--/row-->



	        </div>


	        <!--/col-->

	    </div>

	</main>

	

</body>

</html>


