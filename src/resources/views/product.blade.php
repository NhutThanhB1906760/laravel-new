<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    @include('cdn')
</head>
<style>
.img {
    height: 20rem;
}

body {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    align-items: center;
}
</style>

<body class='container '>
    @foreach($data as $item)
    <div class="card" style="width: 18rem; ">
        <img src="{{$item->image}}" class="card-img-top img" alt="...">
        <div class="card-body">
            <h6>{{ $item->name }}</h6>
            <p class="card-text">{{ $item->description }}</p>
        </div>
        <button><a href="/editForm/{{$item->id}}">Edit</a></button>
        <button onclick="deleteItem({{ $item->id }})">Delete</button>
    </div>
    @endforeach

    <script>
    function deleteItem(id) {
        console.log(window.axios);

        if (confirm("Are you sure you want to delete this item?")) {
            const csrfToken = '{{ csrf_token() }}'; // CSRF token
            axios.delete(`/delete/${id}`, {
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                })
                .then(response => {
                    alert(response.data)
                })
                .catch(error => {
                    // Xử lý lỗi
                });
        }
    }
    </script>

</body>

</html>