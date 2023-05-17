<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>ADMIN PAGE</title>
</head>

<body>
    WELCOME TO ADMIN ROUTE
    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
</body>

</html>