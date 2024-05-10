<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Barang | ChipiChapa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <h2 class="text-center mt-5">Order Barang</h2>
    
    <form action="/place-order/{{$barang->id}}" method="POST">
        @csrf

        <div class="d-flex flex-column align-items-center pt-3 gap-3">  
            
            <div class="form-group col-4">
                <label for="formFile" class="form-label">Foto Barang</label><br>
                <img style="width: 18rem; border: 1px solid black; padding: 1px" src="{{asset('storage/images/'.$barang->foto)}}" alt="">
            </div>

            <div class="form-group col-4">
                <label class="form-label">Nama Barang</label>
                <input type="text" disabled class="form-control" value="{{ $barang->nama }}">
            </div>

            <div class="form-group col-4">
                <label class="form-label">Harga Barang</label>
                <input type="text" disabled class="form-control" value="Rp{{ number_format($barang->harga, 0, ',', '.') }}">
            </div>

            <div class="form-group col-4">
                <label class="form-label">Kategori Barang</label>
                <input type="text" disabled class="form-control" value="{{ $barang->category->nama ?? "Uncategorized" }}">
            </div>

            <div class="form-group col-4">
                <label class="form-label">Jumlah Order (Stock: {{number_format($barang->jumlah, 0, ',', '.')}})</label>
                <input type="text" class="form-control @error('kuantitas') is-invalid @enderror" placeholder="Masukkan Jumlah Order" name="kuantitas" value="{{ old('kuantitas')}}">
                @error('kuantitas')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group col-4">
                <label class="form-label">Alamat Pengiriman</label>
                <input type="text" class="form-control @error('alamatPengiriman') is-invalid @enderror" placeholder="Masukkan Alamat Pengiriman" name="alamatPengiriman" value="{{ old('alamatPengiriman')}}">
                @error('alamatPengiriman')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group col-4">
                <label class="form-label">Kode Pos</label>
                <input type="text" class="form-control @error('kodePos') is-invalid @enderror" placeholder="Masukkan Kode Pos" name="kodePos" value="{{ old('kodePos')}}">
                @error('kodePos')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/" class="btn btn-secondary">Back</a>
            </div>

        </div>
    </form>
</body>

</html>