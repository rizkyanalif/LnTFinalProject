<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ChipiChapa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js"integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous">
    </script>
</head>
<body>

    <div class="text-center">
        <h4 class="text-center">Order History</h4>
        
        <a href="/" class="btn btn-secondary">Back</a>

    </div>

    
    {{-- <div class="d-flex flex-column">
        @if (count($barang) == 0)
        <h5 class="ml-4 mb-3 mt-5">Barang sudah habis, silakan tunggu hingga barang di restock ulang</h5>
        @endif --}}

        @foreach ($faktur as $f)
            @if($f->idUser != auth()->user()->id)
                @continue
            @endif
            <div class="col-4 mb-3 mt-5">
                <div class="card" style="width: 21rem;">
                    
                    <div class="card-body">
                        <img src=" {{ asset('storage/images/' . $f->fotoBarang) }} " class="card-img-top" style="width:18rem;height:15rem;" alt="gambar">
                        <h5 class="card-title text-truncate"> {{ $f->namaBarang}} </h5>
                        <p class="card-text text-secondary" style="font-size: 14px; font-style:italic;">Nomor Invoice: {{ $f->id }} </p>
                        <p class="card-text text-secondary" style="font-size: 14px; font-style:italic;">Category: {{ $f->categoryBarang }} </p>
                        <p class="card-text text-secondary" style="font-size: 14px; font-style:italic;">Harga Satuan: Rp{{ number_format($f->hargaBarang, 0, ',', '.')}} </p>
                        <p class="card-text text-secondary" style="font-size: 14px; font-style:italic;">Jumlah Pembelian: {{ number_format($f->kuantitas, 0, ',', '.') }} </p>
                        <p class="card-text text-secondary" style="font-size: 14px; font-style:italic;">Total Harga: Rp{{ number_format($f->total, 0, ',', '.') }} </p>
                        <p class="card-text text-secondary" style="font-size: 14px; font-style:italic;">Alamat Pengiriman: {{ $f->alamatPengiriman }} </p>
                        <p class="card-text text-secondary" style="font-size: 14px; font-style:italic;">Kode Pos: {{ $f->kodePos }} </p>
                        
                    </div>
                </div>
            </div>            
        @endforeach

    </div>

</body>
</html>