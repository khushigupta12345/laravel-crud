<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container w-50 bg-info">
    <h1 class="text-center bg-secondary w-100 text-light mt-5">Create a product</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all () as $errors)
               <li>{{$errors}}</li>
            @endforeach
        </ul>
        @endif
    </div>
   <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
    @csrf
    <div>
        <lable>Image:<lable>
        <input type="file" name="image" class='form-control' placeholder="Please upload your product image">
    </div>
    <div>
        <lable>Name:<lable>
        <input type="text" name="name" class='form-control' placeholder="Please enter your product name">
    </div>
    <div>
        <lable>Qty:<lable>
        <input type="text" name="qty" class='form-control' placeholder="Enter your product qty">
    </div>
    <div>
        <lable>Price:<lable>
        <input type="text" name="price" class='form-control' placeholder="Enter your product price">
    </div>
    <div>
        <lable>Description:<lable>
        <input type="text" name="description" class='form-control' placeholder="Enter your description...">
    </div><br>
    <div>
        <input type="submit" value="Save a new product" class="btn btn-primary mt-3 btn-center mb-2">
    </div>
   </form>
</div>
</body>
</html>