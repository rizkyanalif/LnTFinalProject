<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Barang | ChipiChapa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <h2 class="text-center mt-5">Add Barang</h2>

    <form action="/store-barang" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="d-flex flex-column align-items-center pt-3 gap-3">  
            <div class="form-group col-4">
                <label class="form-label">Nama Barang</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama Barang" name="nama" value="{{ old('nama')}}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group col-4">
                <label class="form-label">Harga Barang</label>
                <div class="input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="text" class="form-control @error('harga') is-invalid @enderror" placeholder="Masukkan Harga Barang" name="harga" value="{{ old('harga')}}">
                @error('harga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                </div>
            </div>
            

            <div class="form-group col-4">
                <label class="form-label">Stock Barang</label>
                <input type="text" class="form-control @error('jumlah') is-invalid @enderror" placeholder="Masukkan Stock Barang" name="jumlah" value="{{ old('jumlah')}}">
                @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group col-4">
                <label for="formFile" class="form-label">Foto</label>
                <input type="file" id="formFile" class="form-control @error('foto') is-invalid @enderror" placeholder="Masukkan Nama Barang" name="foto">
                @error('foto')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">

                <label for="">Category</label><br>
                @forelse ($category as $c)
                    <input type="radio" id="{{ $c->id }}" name="CategoryId" value="{{ $c->id }}">
                    <label for="{{ $c->id }}">{{ $c->nama }}</label><br>
                @empty
                    <pc class="text-danger">No category added.</p>
                @endforelse

                @error('CategoryId')
                    <p style="color: red;">{{ $message }}</p>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="/" class="btn btn-secondary">Back</a>
        </div>
    </form>
</body>

</html>