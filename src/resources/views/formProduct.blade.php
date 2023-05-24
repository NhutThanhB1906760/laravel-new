<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Product</title>
    @include('cdn')
</head>

<body>
    <x-errors-validation :errors="$errors" />

    <form id="myForm" method="POST" action="/add" enctype="multipart/form-data">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
        <label for="description">Description:</label>
        <input type="text" name="description" id="description">
        <label for="image">Image:</label>
        <input type="file" name="image" id="image" accept="image/png, image/jpeg">
        <button type="submit">Submit</button>
    </form>

    <!-- <img src="{{ asset('images/6465b41ab6736.png') }}" alt=""> -->
</body>
<!-- <script>
const form = document.getElementById('myForm');
form.addEventListener('submit', function(event) {
    event.preventDefault(); // Ngăn chặn hành vi mặc định của biểu mẫu

    // Lấy dữ liệu từ biểu mẫu
    const formData = new FormData(form);
    console.log(formData);
    // Gửi yêu cầu POST bằng Axios
    axios.post('/add', formData)
        .then(response => {
            alert(response.data);
            // Xử lý phản hồi thành công
        })
        .catch(error => {
            console.error(error);
            // Xử lý lỗi
        });
});
</script> -->

</html>