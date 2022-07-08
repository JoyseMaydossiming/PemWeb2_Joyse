<?= $this->extend("layout/masteruser") ?>

<?= $this->section("content") ?>

<section class="auth-section login-section text-center py-5">
    <div class="container" >
        <div class="row" id="productList">

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

    function loadMobilCard() {
        $.ajax({
            url: '<?php echo base_url($controller . "/allmobilList") ?>',
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