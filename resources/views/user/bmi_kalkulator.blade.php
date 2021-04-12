@extends('layouts.app')

@section('content')

<style>
#pria-card:hover {
  cursor: pointer;
}
#wanita-card:hover {
  cursor: pointer;
}
</style>

    <section class="mt-3">
        <div class="container">
            <div class="card shadow">
                <div class="card-header" style="select:selectable">
                <h3 class="">BMI Kalkulator</h3>
                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#modalPost">Tambah</button> -->
                </div>
                <div class="card-body">
                    <div class="row">
                    </div>
                    <div class="">
                        <form action="/bmi/calculate" method="post">
                        @csrf
                        <div class="d-flex justify-content-around">
                            <div id="pria-card" class="card shadow p-3 mb-5 bg-white rounded" style="width: 13rem;">
                                <img class="card-img-top rounded-circle" src="{{asset('assets/img/laki_laki.png')}}" alt="Card image">
                                <div class="card-body">
                                    <h5 class="text-center font-weight-bold">Laki - Laki</h5>
                                    <input type="checkbox" name="gender" value="pria" id="pria" style="display: none;">
                                </div>
                            </div>
                            <div id="wanita-card" class="card shadow p-3 mb-5 bg-white rounded" style="width: 13rem;">
                                <img class="card-img-top" src="{{asset('assets/img/perempuan.png')}}" alt="Card image">
                                <div class="card-body">
                                    <h5 class="text-center font-weight-bold">Perempuan</h5>
                                    <input type="checkbox" name="gender" value="wanita" id="wanita" style="display: none;">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-around">
                            <div class="text-center">
                            <label class="font-weight-bold" for="">Berat Badan</label> <br>
                            <input name="bb" type="number" placeholder="(kg)"/>
                            </div>
                                <div class="text-center">
                                <label class="font-weight-bold" for="">Umur</label> <br>
                                <input name="umur" type="number"/>
                                </div>
                            <div class="text-center">
                            <label class="font-weight-bold" for="">Tinggi Badan</label> <br>
                            <input name="tb" type="number" placeholder="(cm)"/>
                            </div>
                        </div>
                            <div class="text-center m-3">
                            <button type="submit" class="btn btn-primary">Hitung</button>                        
                            </div>
                        </form>
                    </div>
                    <div class="d-flex justify-content-center">
                    <h2>Hasil IBM</h2>
                    </div>
                    <h2 class="d-flex justify-content-center font-weight-bold">{{round($bmi, 1)}}</h2>
                    <h2 class="d-flex justify-content-center">{{$output}}</h2>
                </div>
            </div>
        </div>
    </section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js" integrity="sha512-bZS47S7sPOxkjU/4Bt0zrhEtWx0y0CRkhEp8IckzK+ltifIIE9EMIMTuT/mEzoIMewUINruDBIR/jJnbguonqQ==" crossorigin="anonymous"></script>

    <script>
    $(document).ready(function(){
        $('#pria-card').click(function() {
            document.getElementById("wanita-card").style.border = "";
            document.getElementById("pria-card").style.border = "thick solid #A0A0A0";

            $('#wanita').prop('checked', false);
            $('#pria').prop('checked', true);
        })
        $('#wanita-card').click(function() {
            document.getElementById("pria-card").style.border = "";
            document.getElementById("wanita-card").style.border = "thick solid #A0A0A0";

            $('#pria').prop('checked', false);
            $('#wanita').prop('checked', true);
        })
    });
    </script>

@endsection
