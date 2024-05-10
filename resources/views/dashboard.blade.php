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

    <div class="ml-3 mt-4 mr-4 d-flex justify-content-between">
        <h5> <img width="50" height="50" src=" {{ asset('assets/img/profileIcon.jpg') }} " alt="Profile Img">{{ auth()->user()->name }}</h5>
        <div class="mt-2">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>

    <div class="text-center">
        <h4 class="text-center">Welcome to ChipiChapa</h4>
        
        @if(auth()->user()->isAdmin)
            <a href="/add-barang" class="btn btn-primary">Add Barang</a>
            <a href="/edit-category" class="btn btn-primary">Edit Category</a>
        @endif
        <a href="/view-order" class="btn btn-primary">View Order</a>

    </div>

    @if (session('success'))
        <div class="alert alert-success text-center d-flex align-items-center justify-content-center gap-2">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
        </div>
    @endif
    @if (session('deleted'))
        <div class="alert alert-danger text-center d-flex align-items-center justify-content-center gap-2">
            {{ session('deleted') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
        </div>
    @endif

    
    <div class="d-flex flex-column">
        @if (count($barang) == 0)
        <h5 class="ml-4 mb-3 mt-5">Barang sudah habis, silakan tunggu hingga barang di restock ulang</h5>
        @endif

        @foreach ($barang as $b)
            <div class="col-4 mb-3 mt-5">
                <div class="card" style="width: 21rem;">
                    
                    <div class="card-body">
                        <img src=" {{ asset('storage/images/' . $b->foto) }} " class="card-img-top" style="width:18rem;height:15rem;" alt="gambar">
                        <h5 class="card-title text-truncate"> {{ $b->nama }} </h5>
                        <p class="card-text text-secondary" style="font-size: 14px; font-style:italic;">Category: {{ $b->category->nama ?? "Uncategorized" }} </p>
                        <p class="card-text text-secondary" style="font-size: 14px; font-style:italic;">Harga: Rp{{ number_format($b->harga, 0, ',', '.')}} </p>
                        <p class="card-text text-secondary" style="font-size: 14px; font-style:italic;">Stock: {{ number_format($b->jumlah, 0, ',', '.') }} </p>
                        <div class="d-flex justify-content-around">
                            @if ($b->jumlah >= 1)
                            <a href="/add-order/{{ $b->id }}" class="btn btn-success">Order</a>
                            @else
                            <a href="/add-order/{{ $b->id }}" class="btn btn-secondary disabled">Order</a>
                            @endif
                        @if(auth()->user()->isAdmin)
                            <a href="/edit-barang/{{ $b->id }}" class="btn btn-warning">Edit</a>

                            <form action="/delete-barang/{{$b->id}}" method="POST" id="deleteForm{{$b->id}}">
                                @csrf
                                @method('delete')
                                <button type="button" onclick="confirmDelete({{$b->id}})" class="btn btn-danger">Delete</button>
                            </form> 

                        </div>
                        @endif
                        
                    </div>
                </div>
            </div>            
        @endforeach

    </div>

</body>
<script>
    function confirmDelete(barangId) {
        var confirmation = confirm("Apakah anda benar-benar ingin menghapus barang ini?");
        if (confirmation) {
            document.getElementById('deleteForm' + barangId).submit();
        } else {
            return false;
        }
    }
</script>
</html>