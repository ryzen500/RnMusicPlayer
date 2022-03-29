<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<style>
    .card {
        margin: 20 auto; /* Added */
        float: none; /* Added */
        margin-bottom: 10px; /* Added */
        padding: 50px;
}
</style>
</head>
<body>
    
<div class="card" >
    <div class="card-header">
        Forgot Password
    </div>
    <div class="card-body">

    <form action="processingForgot.php" method="POST">
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">username</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirmasi Password</label>
    <input type="password" name="password2" class="form-control" id="exampleInputPassword1">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>   
    </div>     
        </div>

     
</body>