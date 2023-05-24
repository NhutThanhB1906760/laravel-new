<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    @include('cdn')
</head>

<body>
    <h3>Edit Product</h3>
    <form action="/edit/{{$data->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for=" name">Name:</label>
        <input type="text" name="name" id="" value="{{$data->name}}">
        <label for="description">Description:</label>
        <input type="text" name="description" id="" value="{{$data->description}}">
        <label for=" image">Image:</label>
        <input type="file" name="image" id="" accept="image/png, image/jpeg">
        <button type="submit">Submit</button>
    </form>
    <img src="{{ asset($data->image) }}" alt="">
</body>

</html>