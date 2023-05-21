<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employeee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<form action="{{route('updateEmployee',['id' => $employee->employee_id])}}" method="POST">
   


  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Enter Name" name="name" value="{{$employee->name}}">
    @error('name')
    <br>
    {{$message}}

    @enderror
 </div>
 <div class="form-group">
    <label>Email</label>
    <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{$employee->email}}">
    @error('email')
    <br>
    {{$message}}

    @enderror
 </div>
 <div class="form-group">
    <label>Address</label>
    <input type="text" class="form-control" placeholder="Enter Address" name="address" value="{{$employee->address}}">
    @error('address')
    <br>
    {{$message}}

    @enderror
 </div>
 <div class="form-group">
    <label>Phone</label>
    <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone" value="{{$employee->phone}}">
    @error('phone')
    <br>
    {{$message}}

    @enderror
 </div>
 @csrf
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>