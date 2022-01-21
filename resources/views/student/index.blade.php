<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Fauzan Taqiyuddin</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <main class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow-sm p-3">
                        <h1 class="mb-0">Pendaftaran Mahasiswa</h1>
                        <hr>
                        @if (session('success'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Selamat !</strong> {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <p><strong>Opps Something went wrong</strong></p>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nim">NIM Mahasiswa</label>
                                <input type="number" class="form-control" id="nim" placeholder="1910xxx" name="nim">
                            </div>
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" placeholder="subardi" name="name">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Jurusan</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="jurusan">
                                            <option value="IF">Teknik Informatika</option>
                                            <option value="RPL">Rekayasa Perangkat Lunak</option>
                                            <option value="SI">Sistem Informasi</option>
                                            <option value="DS">Data Sains</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>JenisKelamin</label>
                                        <div class="form-checkform-check-inline">
                                            <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                id="laki_laki" value="L"
                                                {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }}><label
                                                class="form-check-label" for="laki_laki">Laki-laki</label>
                                        </div>
                                        <div class="form-checkform-check-inline"><input class="form-check-input"
                                                type="radio" name="jenis_kelamin" id="perempuan" value="P"
                                                {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }}><label
                                                class="form-check-label" for="perempuan">Perempuan</label></div>
                                        @error('jenis_kelamin')<div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Example textarea</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                    name="alamat"></textarea>
                            </div>
                            <button class="btn btn-secondary btn-block">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm p-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">JK</th>
                                    <th scope="col">action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($data as $mahasiswa)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $mahasiswa->nim }}</td>
                                        <td>{{ $mahasiswa->name }}</td>
                                        <td>{{ $mahasiswa->gender }}</td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-secondary btn-sm"><i
                                                        class="fas fa-edit"></i></button>
                                                <form action="{{route('student.destroy', $mahasiswa->id)}}"
                                                    method="post">
                                                    <button type="submit" class="btn btn-secondary btn-sm"><i
                                                            class="fas fa-trash"></i></button>
                                                    @method('delete')
                                                    @csrf
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
</body>

</html>
