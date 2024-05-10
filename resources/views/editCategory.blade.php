<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Kategori  | ChipiChapa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    
    <div style="margin: 200px;">
        <div style="position: absolute; top: 10%; margin-right:30%; margin-left:30%;">
            @if (session('success'))
                <div class="alert alert-success text-center d-flex align-items-center justify-content-center gap-2">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('deleted'))
                <div class="alert alert-danger text-center d-flex align-items-center justify-content-center gap-2">
                    {{ session('deleted') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        <h1>Add Kategori</h1>
        <form action="/store-category" method="POST">
            @csrf
            <div class="mb-3">
              <label for="Name" class="form-label">Nama Kategori</label>
              <input type="text" placeholder="Masukkan Nama Kategori" class="form-control" id="nama" aria-describedby="emailHelp" name="nama" value="{{ old('nama') }}">
              @error('nama')
                  <p style="color: red;">{{ $message }}</p>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/" class="btn btn-secondary">Back</a>
        </form>
        <p><br>
        </p>

        <h2 class="mb-4">List Kategori</h2>
        @foreach ($category as $c)
            <div style="display: flex; align-items: center;">
                <h5 style="margin-right: 10px;">{{ $c->nama }}</h5> 
                <a href="/rename-category/{{ $c->id }}" class="btn btn-primary" style="margin-right: 10px;">Rename</a>
                <form action="/delete-category/{{$c->id}}" method="POST" id="deleteForm{{$c->id}}">
                    @csrf
                    @method('delete')
                    <button type="button" onclick="confirmDelete({{$c->id}})" class="btn btn-danger">Delete</button>
                </form>
            </div>
            <br>
        @endforeach


    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
<script>
    function confirmDelete(categoryId) {
        var confirmation = confirm("Apakah anda benar-benar ingin menghapus kategori ini?");
        if (confirmation) {
            document.getElementById('deleteForm' + categoryId).submit();
        } else {
            return false;
        }
    }
</script>
</html>