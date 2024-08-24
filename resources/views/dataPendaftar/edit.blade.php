@extends('head')
@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))
<div class="alert alert-{{ $msg }} border-0 bg-{{ $msg }} alert-dismissible fade show m-5 my-2 text-white">
    <div class="">{{ Session::get('alert-' . $msg) }}</div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@endforeach
@if($errors->any())
<div class="alert alert-danger border-0 alert-dismissible fade show m-5 my-2">
    <div class="">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

</div>
@endif
<div class="container border rounded-3 p-2 my-4">
    <div class="container text-center my-3">
        <h1 class="h2">Form Pendaftaran Mahasiswa Baru</h1>
    </div>
    <div class="container">
        <form action="{{route('dataPendaftar.editProses')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="oldid" id="oldid" value="{{$data->id}}">
            <input type="hidden" name="id_users" id="id_users" value="{{auth()->user()->id}}">
            <input type="hidden" name="old_foto" id="old_foto" value="{{$data->foto}}">

            <label>Nama</label><br>
            <input name="nama" class="form-control" type="text" value="{{$data->nama}}" required><br>

            <label>Nama Username</label><br>
            <select name=" id_users" id="id_user" class="form-control">
                <option value="" disabled selected>Pilih User Yang Akan Di Daftarkan</option>
                @foreach ($dataUser as $nomor => $value)
                <!-- <option  value="{{ $value->id }}">{{ $value->name }}</option> -->
                <option @if($data->id_users == $value->id) selected @endif value="{{ $value->id }}">{{ $value->name }}
                </option>
                @endforeach
            </select><br>

            <div class="row">
                <div class="col">
                    <label>Alamat KTP</label><br>
                    <textarea name="alamat_ktp" id="alamat_ktp" rows="5" class="form-control" required>{{$data->alamat_ktp}}
                    </textarea><br>
                </div>
                <div class="col">
                    <label>Alamat Sekarang</label><br>
                    <textarea name="alamat_sekarang" id="alamat_sekarang" rows="5" class="form-control" required>{{$data->alamat_sekarang}}
                    </textarea><br>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <label>Provinsi</label><br>
                    <select name="provinsi" id="provinsi" class="form-control">
                        <option value="" disabled selected>Pilih Provinsi Anda</option>
                        @foreach ($dataProvinsi as $nomor => $value)
                        <option @if($data->provinsi == $value->nama) selected @endif
                            value="{{ $value->id }}">{{ $value->nama }}
                        </option>
                        @endforeach
                    </select><br>
                </div>
                <div class="col">
                    <label>Kabupaten/Kota</label><br>
                    <select name="kabupaten" id="kabupaten" class="form-control">
                        <option value="">Pilih Kabupaten/Kota</option>
                        @foreach ($dataKabupaten as $nomor => $value)
                        <option @if($data->kabupaten == $value->nama) selected @endif
                            value="{{ $value->id }}">{{ $value->nama }}
                        </option>
                        @endforeach

                    </select><br>


                </div>
            </div>

            <label>Kecamatan</label><br>
            <input name="kecamatan" class="form-control" type="text" value="{{$data->kecamatan}}" required><br>

            <div class="row">
                <div class="col">
                    <label>No HP</label><br>
                    <input name="no_hp" class="form-control" type="number" value="0{{$data->no_hp}}" required><br>
                </div>
                <div class="col">
                    <label>Email</label><br>
                    <input name="email" class="form-control" value="{{$data->email}}" type="email" required><br>
                </div>
            </div>



            <div class="row">
                <div class="col">
                    <label>Tempat Lahir</label><br>
                    <input name="tempat_lahir" class="form-control" value="{{$data->tempat_lahir}}" type="text"
                        required><br>
                </div>
                <div class="col">
                    <label>Tanggal Lahir</label><br>
                    <input name="tanggal_lahir" class="form-control" value="{{$data->tanggal_lahir}}" type="date"
                        required><br>
                </div>
                <div class="col">
                    <label>Provinsi Tempat Lahir</label><br>
                    <select name="provinsi_lahir" id="provinsi_lahir" class="form-control">
                        <option value="" disabled selected>Pilih Provinsi Anda</option>
                        @foreach ($dataProvinsi as $nomor => $value)
                        <option @if($data->provinsi_lahir == $value->nama) selected @endif
                            value="{{ $value->id }}">{{ $value->nama }}
                        </option>
                        @endforeach
                    </select><br>
                </div>
                <div class="col">
                    <label>Kabupaten/Kota Tempat Lahir</label><br>
                    <input type="hidden" value="{{$data->kabupaten_lahir}}" id="idKabupatenLahir">
                    <select name="kabupaten_lahir" id="kabupaten_lahir" class="form-control">
                        <option value="">Pilih Kabupaten/Kota</option>
                        @foreach ($dataKabupatenLahir as $nomor => $value)
                        <option @if($data->kabupaten_lahir == $value->nama) selected @endif
                            value="{{ $value->id }}">{{ $value->nama }}
                        </option>
                        @endforeach
                    </select><br>
                </div>
            </div>


            <div class="row">
                <div class="col-3">
                    <label>Jenis Kelamin</label><br>

                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                        <option value="" disabled selected>Pilih Jenis Kelamin Anda</option>

                        <option value="Laki-Laki" {{ $data->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki
                        </option>
                        <option value="Perempuan" {{ $data->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan
                        </option>
                    </select><br>
                </div>
                <div class="col">
                    <label>Status Menikah</label><br>
                    <select name="status_menikah" id="status_menikah" class="form-control">
                        <option value="" disabled selected>Pilih Status Pernikahan Anda</option>
                        <option value="Sudah Menikah" {{ $data->status_menikah == 'Sudah Menikah' ? 'selected' : '' }}>
                            Sudah Menikah</option>
                        <option value="Belum Menikah" {{ $data->status_menikah == 'Belum Menikah' ? 'selected' : '' }}>
                            Belum Menikah</option>
                        <option value="Lain-lain(Janda/Duda)"
                            {{ $data->status_menikah == 'Lain-lain(Janda/Duda)' ? 'selected' : '' }}>
                            Lain-lain(Janda/Duda)</option>
                    </select><br>
                </div>
                <div class="col">
                    <label>Agama</label><br>
                    <select name="agama" id="agama" class="form-control">
                        <option value="" disabled selected>Pilih Agama Anda</option>
                        @foreach ($dataAgama as $nomor => $value)
                        <option @if($data->agama == $value->nama) selected @endif
                            value="{{ $value->nama }}">{{ $value->nama }}
                        </option>
                        @endforeach
                    </select><br>
                </div>
                <div class="col">
                    <label>Kewarganegaraan</label><br>
                    <select name="kewarganegaraan" id="kewarganegaraan" class="form-control">
                        <option value="" disabled selected>Pilih Kewarganegaraan Anda</option>
                        <option value="WNI Asli" {{ $data->kewarganegaraan == 'WNI Asli' ? 'selected' : '' }}>WNI Asli
                        </option>
                        <option value="WNI Keturunan" {{ $data->kewarganegaraan == 'WNI Keturunan' ? 'selected' : '' }}>
                            WNI Keturunan</option>
                        <option value="Warga Negara Asing"
                            {{ $data->kewarganegaraan == 'Warga Negara Asing' ? 'selected' : '' }}>Warga Negara Asing
                        </option>
                    </select><br>
                </div>
            </div>
            <label>Pas Foto</label><br>
            <input name="foto" id="foto" type="file" class="form-control" ><br>
            @if($data->foto)
                <img id="fotoBaru" src="/foto/{{$data->foto}}" alt="Foto sebelumnya" style="max-width: 150px; max-height: 150px;">
            @endif

            <div class="row my-5">
                <div class="col">
                    <a class="btn btn-outline-danger" href="{{route('dataPendaftar.index')}}"
                        style="width: 80px;">Back</a>
                    <input class="btn btn-outline-primary" type="submit" value="Save" style="width: 80px;">
                </div>
            </div>
        </form>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#foto').change (function() {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#fotoBaru').attr('src', e.target.result);
        }
        reader.readAsDataURL($(this)[0].files[0]);
    })
$('#provinsi').change(function() {
    var provinsiId = $(this).val();
    var kotaId = document.getElementById("idKabupatenLahir").value
    if (provinsiId) {
        $.ajax({
            url: '/get-kabupaten/' + provinsiId,
            type: 'GET',
            success: function(data) {
                $('#kabupaten').empty();
                $('#kabupaten').append('<option value="">Pilih Kabupaten/Kota</option>');
                $.each(data, function(key, value) {

                    $('#kabupaten').append('<option value="' + value.id + '">' + value
                        .nama +
                        '</option>');


                });
            }
        });
    } else {
        $('#kabupaten_lahir').empty();
        $('#kabupaten_lahir').append('<option value="">Pilih Kabupaten/Kota Kosong</option>');
    }
});

$('#provinsi_lahir').change(function() {
    var provinsiId = $(this).val();
    var kabupatenId = document.getElementById("idKabupatenLahir").value
    if (provinsiId) {
        $.ajax({
            url: '/get-kabupaten/' + provinsiId,
            type: 'GET',
            success: function(data) {
                $('#kabupaten_lahir').empty();
                $('#kabupaten_lahir').append('<option value="">Pilih Kabupaten/Kota</option>');
                $.each(data, function(key, value) {

                    $('#kabupaten_lahir').append('<option value="' + value.id + '">' + value
                        .nama +
                        '</option>');


                });
            }
        });
    } else {
        $('#kabupaten_lahir').empty();
        $('#kabupaten_lahir').append('<option value="">Pilih Kabupaten/Kota Kosong</option>');
    }
});
</script>

@extends('footer')