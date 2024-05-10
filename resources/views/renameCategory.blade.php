<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rename Category | ChipiChapa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div style="margin: 200px;">
        <h1>Rename Kategori</h1>
        <form action="/update-category/{{$category->id}}" method="POST">
            @csrf
            @method('patch')
            <div class="mb-3">
              <label for="nama" class="form-label">Nama Kategori</label>
              <input placeholder="Masukkan Nama Kategori" type="text" class="form-control" id="nama" aria-describedby="emailHelp" name="nama" value="{{ $category->nama }}">
              @error('nama')
                  <p style="color: red;">{{ $message }}</p>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/edit-category" class="btn btn-secondary">Back</a>
        </form>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>