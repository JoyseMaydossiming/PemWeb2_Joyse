<?= $this->extend("layout/masteruser") ?>

<?= $this->section("content") ?>

<section class="auth-section login-section text-center py-5">
    <div class="container">

        <div class="auth-wrapper mx-auto shadow p-5 rounded">

            <h2 class="auth-heading text-center mb-5">Silahkan Masuk </h2>

            <div class="auth-form-container text-left mx-auto">
                <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                <?php endif;?>
                <form class="auth-form login-form" action="<?=base_url('home/auth')?>" method="post">
                    <div class="form-group username">
                        <label class="sr-only" for="username">Username</label>
                        <input id="username" name="username" type="text" class="form-control signin-username"
                            placeholder="Username" required="required">
                    </div>
                    <!--//form-group-->
                    <div class="form-group password pb-3">
                        <label class="sr-only" for="password">Password</label>
                        <input id="password" name="password" type="password"
                            class="form-control password" placeholder="Password" required="required">
                    </div>
                    <!--//form-group-->
                    <div class="text-center">
                        <button id="login-button" type="submit" class="btn btn-primary btn-block theme-btn mx-auto">LogIn</button>
                        <a id="login-button" href="<?=base_url('home/register')?>" class="btn btn-secondary btn-block theme-btn mx-auto">Register</a>

                            
                    </div>
                </form>

                <div class="auth-option text-center pt-5">Thank You <i class="fas fa-kiss-wink-heart"
                        style="color: red;"></i></div>
            </div>
            <!--//auth-form-container-->

        </div>
        <!--//auth-wrapper-->
    </div>
    <!--//container-->
</section>

<?= $this->endSection() ?>

<?= $this->section("pageScript") ?>

<script>    

</script>

<?= $this->endSection() ?>