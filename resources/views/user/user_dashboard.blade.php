@extends('admin.master_admin')

@section('content')

    <section class="top-70">
        <div class="container">
            <h3 class="mb-4">Data Laporan Anda</h3>
            <div class="card shadow">
                <div class="card-header py-3">
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#modalPost">Tambah</button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col"></div>
                        <div class="col">
                            <div class="text-md-right dataTables_filter">
                                <form><label><input class="form-control form-control-sm" type="text"
                                            placeholder="Search"></label></form>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr style="text-transform: capitalize;">
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Provinsi</th>
                                    <th>Gejala</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($user as $users => $value)
                                <tr style="text-transform: capitalize;">
                                    <td>{{$users +1}}</td>
                                    <td>
                                    {{$value->nama}}
                                    </td>
                                    <td>
                                    {{$value->created_at}}
                                    </td>
                                    <td>
                                    {{$value->provinsi}}
                                    </td>
                                    <td>
                                    {{$value->gejala}}
                                    </td>
                                    <td>
                                        <div class="" role="group" aria-label="Basic example">
                                            <button type="button" class="btn btn-info btn-sm c-white">
                                            <svg width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
                                            </button>
                                            <a href="">
                                                <button type="button" class="btn btn-danger btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
                                                </button>
                                            </a>
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
    </section>

    <div role="dialog" tabindex="-1" class="modal fade" id="modalPost">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="/user/submiting" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" require/>
                        </div>
                        <div class="form-group">
                            <label>Umur</label>
                            <input class="form-control" rows="10" name="umur" require/>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="gender" class="form-control" require>
                                    <option value="Pria" >Laki-Laki</option>
                                    <option value="Wanita" >Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>No. Identitas</label>
                            <input class="form-control" maxlength="16" name="nik" placeholder="16 digit" require/>
                        </div>
                        <div class="form-group">
                            <label>No. HP</label>
                            <input class="form-control" rows="10" name="telepon" require/>
                        </div>
                        <div class="form-group">
                            <label>Provinsi</label>
                            <select id="provinsi" class="form-control" rows="10" name="provinsi" require> 
                            <option value="">-Pilih Provinsi-</option>
                                @foreach ($provinces as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="kota" class="form-group" style="display: none;">
                            <label>Kota</label>
                            <select name="kota" id="city" class="form-control" require>
                                <option value="">-Pilih Kabupaten-</option>
                            </select>                        
                        </div>
                        <!-- <div id="kecamatan" class="form-group" style="display: none;">
                            <label>Kecamatan</label>
                            <select name="kelurahan" id="village" class="form-control">
                                <option value="">-Pilih Kelurahan -</option>
                            </select>                        
                        </div> -->
                        <div class="form-group">
                            <label>Alamat</label>
                            <input class="form-control" rows="10" name="alamat"/>
                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold;">Keluhan: </label><br>
                            <div style="vertical-align:middle">
                                <label style="vertical-align:middle" for="male">Demam</label>
                                <input type="checkbox" id="demam" name="gejala[]" value="demam">
                            </div>
                            <div style="vertical-align:middle">
                                <label style="vertical-align:middle" for="male">Batuk/Pilek</label>
                                <input type="checkbox" id="batukPilek" name="gejala[]" value="batuk pilek">
                            </div>
                            <div style="vertical-align:middle">
                                <label style="vertical-align:middle" for="male">Sesak Nafas</label>
                                <input type="checkbox" id="sesak" name="gejala[]" value="sesak">
                            </div>
                            <div style="vertical-align:middle">
                                <label style="vertical-align:middle" for="male">Lemas</label>
                                <input type="checkbox" id="lemas" name="gejala[]" value="lemas">
                            </div>
                            <div style="vertical-align:middle">
                                <label style="vertical-align:middle" for="male">Diare</label>
                                <input type="checkbox" id="diare" name="gejala[]" value="diare">
                            </div>
                            <div style="vertical-align:middle">
                                <label style="vertical-align:middle" for="male">Kaku Kuduk</label>
                                <input type="checkbox" id="kakuKuduk" name="gejala[]" value="kaku kuduk">
                            </div>
                            <div style="vertical-align:middle">
                                <label style="vertical-align:middle" for="male">Kejang</label>
                                <input type="checkbox" id="kejang" name="gejala[]" value="kejang">

                            </div>
                            <div style="vertical-align:middle">
                                <label style="vertical-align:middle" for="male">Mata Memerah</label>
                                <input type="checkbox" id="mataMerah" name="gejala[]" value="mata memerah">

                            </div>
                            <div style="vertical-align:middle">
                                <label style="vertical-align:middle" for="male">Mata Kuning</label>
                                <input type="checkbox" id="mataKuning" name="gejala[]" value="mata kuning">

                            </div>
                            <div style="vertical-align:middle">
                                <label style="vertical-align:middle" for="male">Kulit ruam kemerahan</label>
                                <input type="checkbox" id="kulitRuam" name="gejala[]" value="kulit ruam merah">
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control-file" name="image" />
                        </div> -->
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>

    <script>
    $(document).ready(function(){

        $('#provinsi').on('change', function () {
            $('#kota').show();
            axios.post('{{route('provinsi.city')}}', {id: $(this).val()})
            .then(function (response) {
                $('#city').empty();

                $.each(response.data, function (id, name) {
                    $('#city').append(new Option(name, id));
                    $('#village').append(new Option(name, id));
                })
            });
        });
    });
    </script>

@endsection
