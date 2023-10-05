<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, $crud->name = $request->name;
        $crud->email = $request->email;initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

   <div class="container">
    <a href="{{'/'}}" class="btn btn-primary my-4">Show info</a>

<form action="{{'/store-data'}}" method="post" enctype="multipart/form-data">
    @csrf
 <div class="form-group">
    <label>Enter Booke Name</label>
    <input type="text" name="book_name"class="form-control" value="{{ old('book_name') }}" placeholder="Name">
    @error('book_name')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>


  <div class="form-group">
    <label>Enter Book Price</label>
    <input type="text" name="book_price"class="form-control" value="{{ old('book_price') }}" placeholder="Price">
    @error('book_price')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>


  <div class="form-group">
    <label>Enter Book Writer</label>
    <input type="text" name="book_writer"class="form-control" value="{{ old('book_writer') }}" placeholder="Writer">
    @error('book_writer')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>
  <div class="form-group">
    <input type="file" name="book_image" class="form-control">
    @error('book_image')
    <span class="text-danger">{{ $message }}</span>
    @enderror
  </div>

  <input type="submit" class="btn btn-primary my-3"value="Submit">
</form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

