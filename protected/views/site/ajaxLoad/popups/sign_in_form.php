<?php $form = $this->beginWidget('CActiveForm', array('id' => 'login')); ?>
<div class="row">

    <div class="col-md-12">
        <h3 class="text-black mb-50 text-center">Sign In</h3>

        <form>
            <div class="row">

                <div class="col-md-12">
                    <div class="input-wrapper">
                        <input type="text" id="username"  name="username" required>
                        <div class="float-text">Username</div>
                    </div>

                    <div class="input-wrapper">
                        <input name="password" type="password" autocomplete="off" type="password" required> 
                        <div class="float-text">Password</div>
                    </div>
                </div>
                <div class="col-md-12 text-right mt-10">
                    <a class="forget_password" href="#">Forget Password</a>
                </div>
                <div class="col-md-12 mt-20">  
                    <button type="button" onclick="login()" class="cm-btn large text-uppercase light-blue right">Login</button>
                </div>
            </div>
        </form>

    </div>

</div>
<?php $this->endWidget(); ?>

<script>
    $(function () {
        $('#pword').keypress(function (e) {
            if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
                login()
                return false;
            }
        });

        $("#username").keypress(function (e) {
            if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13)) {
                login()
                return false;
            }
        });
    });

    function login() {
        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::app()->baseUrl . '/Default/Login'; ?>",
            data: $('#login').serialize(),
            dataType: 'json',
            success: function (responce) {
                if (responce.code == 200) {
//                Message.success('Login Success..');
<?php if ($url != '') { ?> window.location = http_path + "<?php echo $url; ?>";
<?php } else { ?> window.location = http_path + "Admin/Default/Index";
<?php } ?>
                }
                else {
//                Message.danger('Ops!, Something went wrong.');
                }
            }
        });
    }
</script>
