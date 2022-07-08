<?= $this->extend("layout/masteruser") ?>

<?= $this->section("content") ?>

<section class="auth-section login-section text-center py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6" id="detailMobil">

            </div>
            <div class="col-md-6">
                <?php if(session()->getFlashdata('success')):?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif;?>
                <form class="auth-form login-form" action="<?=base_url('home/sewaPost')?>" method="post" autocomplete="off">
                    <input type="hidden" id="iduser" name="iduser" class="form-control" placeholder="Id" maxlength="11" required value="<?=session()->get('userid')?>">
                    <input type="hidden" id="idmobil" name="idmobil" class="form-control" placeholder="Id" maxlength="11" required>

                    <div class="form-group">
                        <label class="control-label" for="start_date">Tanggal Mulai Pinjam</label>
                        <input type="date" id="start_date" name="start_date" class="form-control" dateISO="true" >
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="end_date">Tanggal Akhir Pinjam</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" dateISO="true" >
                    </div>
                    <!--//form-group-->
                    <div class="form-group">
                        <label class="control-label" for="tujuan">Tujuan</label>
                        <input id="tujuan" name="tujuan" type="tujuan" class="form-control"
                            placeholder="Tujuan" required="required">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="ktp">No KTP</label>
                        <input id="ktp" name="ktp" type="ktp" class="form-control"
                            placeholder="ktp" required="required">
                    </div>
                    <!--//form-group-->
                    <div class="text-center">
                        <button id="login-button" type="submit"
                            class="btn btn-primary btn-block theme-btn mx-auto">Submit</button>


                    </div>
                </form>
            </div>
        </div>

    </div>
    <!--//container-->
</section>

<?= $this->endSection() ?>

<?= $this->section("pageScript") ?>

<script>
    $(function () {
        loadMobilCard();

    });

    function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
    };

    function loadMobilCard() {
        $.ajax({
            url: '<?php echo base_url("mobils/getOne") ?>',
            type: 'post',
            data: {
                "id": getUrlParameter("id")
            },
            dataType: 'json',
            success: function (response) {
                //insert data to card
                let html = "";
                console.log(response);
                html = mobilCard(response);
                $("#idmobil").val(response.id);

                $("#detailMobil").html(html);
            }
        });
    }

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function mobilCard(mobil) {
        let html = "";
        html += "<div class='card'>";
        html += "<img class='card-img-top' src='<?=base_url('img/mobil')?>/" + mobil.foto + "' alt='Card image cap'/>"
        html += "<div class='card-body'>";
        html += "<h5 class='card-title'>" + mobil.merks_name + " " + mobil.merks_produk + "</h5>";
        html += "<p class='card-text'>Rp. " + numberWithCommas(mobil.biaya_sewa) + "</p>";
        html += "</div>";
        html += "</div>";
        return html;
    }
</script>

<?= $this->endSection() ?>