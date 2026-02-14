<!DOCTYPE html>
<html>
<head>
    <title>Add New Post</title>
    <style>
        body { font-family: sans-serif; padding: 20px; }
        form { max-width: 400px; margin: 0 auto; }
        div { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        input, textarea { width: 100%; padding: 8px; }
        button { padding: 10px 15px; background: blue; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>

    <form action="{{ route('post.store') }}" method="POST">
        @csrf

        @if(session('success'))
            <p style="color: green">{{ session('success') }}</p>
        @endif

        <div>
            <label>Name:</label>
            <input type="text" name="name" required>
        </div>

        <div>
            <label>Title:</label>
            <input type="text" name="title" required>
        </div>

        <div>
            <label>Description:</label>
            <textarea name="description" rows="4" required></textarea>
        </div>

        <button type="submit">Submit</button>
    </form>

    <hr style="margin-top: 50px;">

    <h3>Stored Data</h3>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr style="background: #f2f2f2;">
                <th>ID</th>
                <th>Name</th>
                <th>Title</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->name }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
