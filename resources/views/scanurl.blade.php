<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scan URL</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
    body {
    text-align: center;
    
}
form {
    display: inline-block;
    border-radius: 10px;
    margin: 10px;
    padding: 50px;
    border: 1px solid;
}
</style>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <h2 class="navbar-brand">Scan URL</h2>
</nav>
<br><br><br><br>
<form action="scanurl" method="post">

  <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
  
        <label for="username">URL</label>
        <input type="text" id="url" name="url" class="form-control" placeholder="Insert URL">
 <br>   
    <button type="submit" class="btn btn-primary">Confirm</button>
  </form>

</body>
</html>