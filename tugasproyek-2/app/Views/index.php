<?= $this->extend("layout/masteruser") ?>

<?= $this->section("content") ?>

<section class="hero-section py-3 py-md-5">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 pt-3 mb-5 mb-lg-0">
                <h1 class="site-headline font-weight-bold mb-3">Sewa dan rasakan rental mobil </br><span
                        class="text-depok">Tanpa Ribet</span></h1>
                <div class="site-tagline mb-4">Kami menawarkan Jasa Sewa Mobil Jakarta dan kota lainnya di Indonesia,
                    dengan service yang aman dan terpercaya.</div>
                <div class="cta-btns mb-lg-3">
                    <a class="btn btn-primary mr-2 mb-3" href="rekreasi.html">Cari Mobil Sekarang<i
                            class="fas fa-arrow-alt-circle-right ml-2"></i></a>
                </div>
            </div>
            <div class="col-12 col-lg-6 text-center">
                <img class="hero-figure mx-auto" src="<?=base_url('img/iconic.png')?>" alt="">
            </div>
        </div>
        <!--//row-->
    </div>
</section>
<section class="productlist">
    <div class="row col-sm-12" id="productList">

    </div>
</section>
<section class="herofeatures">
    <div class="row">
        <div class="row col-sm-12">
            <div class="col-sm-4 text-center">
                <div class="card-body">
                    <img class="hero-figure mx-auto mb-5" src="<?=base_url('img/money.png')?>" alt="">
                    <h5 class="card-title">Tanpa Uang Muka</h5>
                    <p class="card-text">Selalu mengerti kebutuhan anda, kini anda bisa langsung pakai mobil tanpa repot
                        urusan biaya diawal sewa mobil
                    </p>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="card-body">
                    <img class="hero-figure mx-auto mb-5" src="<?=base_url('img/website.png')?>" alt="">
                    <h5 class="card-title">Akses Online Kapan Saja</h5>
                    <p class="card-text">Dengan pelayanan serba digital, anda bisa pesan dan cek status langganan
                        melalui website, sesuai dengan kebutuhan anda
                    </p>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <div class="card-body">
                    <img class="hero-figure mx-auto mb-5" src="<?=base_url('img/price.png')?>" alt="">
                    <h5 class="card-title">Langganan Dengan Harga Tetap</h5>
                    <p class="card-text">Dengan harga langganan yang tetap dan tanpa biaya tambahan, kami memastikan
                        anda berkendara dengan nyaman
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="benefits-section productlist py-5">

    <div class="container">
        <h5 class="mb-2 text-center font-weight-bold section-title">Ulasan Pengguna</h5>
        <div class="mb-5 text-center section-intro">Ditampilkan berdasarkan ulasan terbaru dan ulasan yang sesuai</div>

        <div id="carouselExampleIndicators" class="carousel slide mx-auto" data-ride="carousel"
            style="max-width: 700px; max-height: 500px;">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner rounded">
                <div class="carousel-item active">
                    <div class="card d-block w-100 text-center">
                        <img class="card-img-top img-user mt-3" src="<?=base_url('img/user-1.png')?>" alt="Card image cap">
                        <div class="card-body">
                            <h6 class="card-title">Maria Ariana</h6>
                            <p class="card-text">Selama penyewaan mobil selama 3 hari merasa puas sekali dari pengambilan sampai pengembalian tidak ada kendala, untuk mobil di cek dengan baik dan kondisi mobil saat diterima dalam keadaan baik.</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="card d-block w-100 text-center">
                        <img class="card-img-top img-user mt-3" src="<?=base_url('img/user-2.png')?>" alt="Card image cap">
                        <div class="card-body">
                            <h6 class="card-title">Samuel Hengki</h6>
                            <p class="card-text">Sangat mendukung sekali proses wedding kami, mobil bersih dan semua berjalan dengan lancar. Terbaik bukan hanya dari segi harga, tetapi dari segi pelayanan dan unit mobilnya.</p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

</section>

<?= $this->endSection() ?>

<?= $this->section("pageScript") ?>

<script>
    $(function () {
        loadMobilCard();

    });

    function loadMobilCard() {
        $.ajax({
            url: '<?php echo base_url($controller . "/mobilList") ?>',
            type: 'get',
            dataType: 'json',
            success: function (response) {
                //insert data to card
                let html = "";
                console.log(response);
                for (let index = 0; index < response.length; index++) {
                    let element = response[index];
                    html += mobilCard(element);
                }
                $("#productList").html(html);

            }
        });
    }
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    function mobilCard(mobil) {
        let html = "";
        html += "<div class='col-sm-3'>";
        html += "<div class='card'>";
        html += "<img class='card-img-top' src='<?=base_url('img/mobil')?>/" + mobil.foto + "' alt='Card image cap'/>"
        html += "<div class='card-body'>";
        html += "<h5 class='card-title'>" + mobil.merks_name + " " + mobil.merks_produk + "</h5>";
        html += "<p class='card-text'>Rp. " + numberWithCommas(mobil.biaya_sewa) + "</p>";

        html += "<a href='<?=base_url('home/sewa')?>?id="+mobil.id+"' class='btn btn-primary'>Sewa</a>";
        html += "</div>";
        html += "</div>";
        html += "</div>";
        return html;
    }
</script>

<?= $this->endSection() ?>