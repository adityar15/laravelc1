<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/create-blog" method="POST">
        @csrf
        <input type="text" name="title" />
        <textarea name="article" placeholder="add your article text here" rows="5" cols="10"></textarea>
        <input type="email" name="email" />
        <button>Create Article</button>

        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </form>
</body>

</html>