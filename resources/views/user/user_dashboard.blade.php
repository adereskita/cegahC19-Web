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
                                <tr>
                                    <th>No.</th>
                                    <th>Tanggal</th>
                                    <th>Provinsi</th>
                                    <th>Gejala</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>
                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                        </td>
                                        <td>
                                            <div class="" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-warning btn-sm c-white">
                                                Update
                                                </button>
                                                <a href="">
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                    Delete
                                                    </button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
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
                    <form action="/post/store" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" />
                        </div>
                        <div class="form-group">
                            <label>Umur</label>
                            <input class="form-control" rows="10" name="umur"/>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="category_id">
                                    <option value="Pria" >Laki-Laki</option>
                                    <option value="Wanita" >Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>No. Identitas</label>
                            <input class="form-control" maxlength="16" name="nik" placeholder="16 digit"/>
                        </div>
                        <div class="form-group">
                            <label>No. HP</label>
                            <input class="form-control" rows="10" name="umur"/>
                        </div>
                        <div class="form-group">
                            <label>Provinsi</label>
                            <select id="provinsi" class="form-control" rows="10" name="provinsi"> 
                            <option value="">-Pilih Provinsi-</option>
                                @foreach ($provinces as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="kota" class="form-group" style="display: none;">
                            <label>Kota</label>
                            <select name="kota" id="city" class="form-control">
                                <option value="">-Pilih Kabupaten-</option>
                            </select>                        
                        </div>
                        <div id="kecamatan" class="form-group" style="display: none;">
                            <label>Kecamatan</label>
                            <select name="kelurahan" id="village" class="form-control">
                                <option value="">-Pilih Kelurahan -</option>
                            </select>                        
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input class="form-control" rows="10" name="alamat"/>
                        </div>
                        <div class="form-group">
                            <label style="font-weight: bold;">Keluhan: </label><br>
                            <div style="vertical-align:middle">
                                <label style="vertical-align:middle" for="male">Demam</label>
                                <input type="checkbox" id="demam" name="demam" value="demam">
                            </div>
                            <div style="vertical-align:middle">
                                <label style="vertical-align:middle" for="male">Batuk/Pilek</label>
                                <input type="checkbox" id="batukPilek" name="batukPilek" value="batukPilek">
                            </div>
                            <div style="vertical-align:middle">
                                <label style="vertical-align:middle" for="male">Sesak Nafas</label>
                                <input type="checkbox" id="sesak" name="sesak" value="sesak">
                            </div>
                            <div style="vertical-align:middle">
                                <label style="vertical-align:middle" for="male">Lemas</label>
                                <input type="checkbox" id="lemas" name="lemas" value="lemas">
                            </div>
                            <div style="vertical-align:middle">
                                <label style="vertical-align:middle" for="male">Diare</label>
                                <input type="checkbox" id="diare" name="diare" value="diare">
                            </div>
                            <div style="vertical-align:middle">
                                <label style="vertical-align:middle" for="male">Kaku Kuduk</label>
                                <input type="checkbox" id="kakuKuduk" name="kakuKuduk" value="kakuKuduk">
                            </div>
                            <div style="vertical-align:middle">
                                <label style="vertical-align:middle" for="male">Kejang</label>
                                <input type="checkbox" id="kejang" name="kejang" value="kejang">

                            </div>
                            <div style="vertical-align:middle">
                                <label style="vertical-align:middle" for="male">Mata Memerah</label>
                                <input type="checkbox" id="mataMerah" name="mataMerah" value="Mata memerah">

                            </div>
                            <div style="vertical-align:middle">
                                <label style="vertical-align:middle" for="male">Mata Kuning</label>
                                <input type="checkbox" id="mataKuning" name="mataKuning" value="Mata Kuning">

                            </div>
                            <div style="vertical-align:middle">
                                <label style="vertical-align:middle" for="male">Kulit ruam kemerahan</label>
                                <input type="checkbox" id="kulitRuam" name="kulitRuam" value="kulit ruam merah">
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
