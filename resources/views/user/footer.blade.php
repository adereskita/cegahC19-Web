<div class="bg-blue-one mt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-6 py-3">
            @if (session('login') == false)
                <h5 class="text-white">Apakah anda admin ?</h5>
                <a href="/admin/login">
                    <button type="button" class="btn btn-primary">Login</button>
                </a>
            @else

            @endif
            </div>
            <div class="col-md-6 py-3 text-white" id="kontak">
                <h5 class="">Hubungi kami</h5>
                <p>Gedung CegahCovid,Jalan 1234 , Kota Jakarta Selatan</p>
                <p class="mb-0">Phone : +6281243121721</p>
                <p>Email : cegahcovid@gmail.com</p>
            </div>
        </div>
    </div>
</div>
<div class="bg-blue-two">
    <div class="container">
        <div class="py-3">
            <H6 class="text-center text-white">©CEGAHCOVID, 2021. ALL RIGHTS RESERVED</H6>
        </div>
    </div>
</div>
