<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>laravel crud</title>
    <link rel="stylesheet" href="style.css">
    <!---bootstrap css link--->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--font awesome link--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container w-100 mt-2">
    <!-- view can get data with controller -->
      <div>
       <h1 class="text-center bg-secondary w-100 text-light mt-5">Product Details</h1>
       <a href="{{route('product.create')}}" class="btn btn-primary float-end">Create Product</a>
      </div>
    <div>
        @if(session()->has('success'))
        <div>
            {{session('success')}}
        </div>
        @endif
    </div>
    <!-- now print the data in the table -->
    <div>
      <table class="table table-bordered table-striped">
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Name</th>
            <th>Qty</th>
            <th>Price</th>
            <th>description</th>
            <th class="text-center" colspan="2">Action</th>
        </tr>
        @foreach($products as $i=> $product)
        <tr>
            <td>{{$i+1}}</td>
            <td><img src="http://127.0.0.1:8000/{{$product->image}}" width="150"></td>
            <td>{{$product->name}}</td>
            <td>{{$product->qty}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->description}}</td>
            <td>
                <!-- this link come to the web.php file  -->
                <a href="{{route('product.edit',['product'=> $product])}}" class='btn btn-info text-light'>
                    <i class='fa-solid fa fa-edit'></i></a>
            </td>
             <td>
                <form method="POST" action="{{route('product.destroy',['product'=> $product])}}">
                 <!-- for security  -->
                @csrf
                <!-- this method is go to  route -->
                 @method('delete')
                 <button type="submit" class='btn btn-info text-light'> <i class='fa-solid fa fa-trash-can'></i></button>
                
                </form>
             </td>
        </tr>
         @endforeach
      </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
 </div>
</body>
</html>