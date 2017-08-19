<?php $form = $this->beginWidget('CActiveForm', array('id' => 'formRegister')); ?>
<div class="row">
    <div class="col-md-12">
        <h3 class="text-black mb-50 text-center">Create Account</h3>

        <form>
            <div class="row">
                <div class="col-md-6">
                    <input class="radio-group" data-show="job_seeker" id="job_seeker" checked="checked" name="group1"
                           type="radio">
                    <label for="job_seeker">Job Seeker</label>
                </div>
                <div class="col-md-6">
                    <input class="radio-group " data-show="employer" id="employer" name="group1" type="radio">
                    <label for="employer">Employer</label>
                </div>

                <div class="col-md-12 mt-10 hide-show job_seeker">
                    <div class="input-wrapper">
                        <input id="fname" name="fname" type="text">
                        <div class="float-text">First Name</div>
                    </div>

                    <div class="input-wrapper">
                        <input id="lname" name="lname" type="text">
                        <div class="float-text">Last Name</div>
                    </div>

                    <div class="input-wrapper">
                        <input id="email" name="email" type="text">
                        <div class="float-text">Email</div>
                    </div>

                    <div class="input-wrapper">
                        <input id="contactNo" name="contactNo" type="text">
                        <div class="float-text">Contact No</div>
                    </div>
                </div>
                <div class="col-md-12 mt-10 hide-show employer">
                    <div class="input-wrapper">
                        <input id="cname" name="cname" type="text">
                        <div class="float-text">Company Name</div>
                    </div>


                    <div class="input-wrapper">
                        <input id="email" name="email" type="text">
                        <div class="float-text">Email</div>
                    </div>

                    <div class="input-wrapper">
                        <input id="contactNo" name="contactNo" type="text">
                        <div class="float-text">Contact No</div>
                    </div>
                </div>

                <div class="col-md-12 mt-20">
                    <button id="Register" type="button" onclick="userRegistration()"
                            class="cm-btn large text-uppercase light-blue right">Register
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php $this->endWidget(); ?>


<script>
    $('.radio-group').on('change', function () {
        var $this = $(this);
        var show = $this.data('show');

        $('.hide-show').slideUp('fast', function () {

            $('.' + show).slideDown('slow')

        })
    });


    $("#formRegister").validate({
        submitHandler: function () {
            userRegistration();
        }
    });

    function userRegistration() {




        var isCheckedJobSeeker = $('#job_seeker').is(':checked');
        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::app()->baseUrl . '/Registration/Register'; ?>",
            data: $('#formRegister').serialize() + "&isCheckedJobSeeker=" + isCheckedJobSeeker,
            dataType: 'json',
            success: function (responce) {
                if (responce.code == 200) {
//                    Message.success(responce.msg);
                    Popup.loadNewLayout('<div class="pop-message success">Registration Successfully</div>');
                    $("#formRegister")[0].reset();
//                    $('.pr-20').attr('value', '');
//                    $('.row-input > .input-no-label').not(':first').remove();
//                    loadCategoryData();
                }
            }
        });
    }
</script>