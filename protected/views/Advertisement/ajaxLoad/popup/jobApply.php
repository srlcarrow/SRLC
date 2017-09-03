<div class="row">
    <div class="col-md-12">
        <h3 class="text-black mb-50 text-center">Apply Job</h3>

        <form>
            <div class="row">
                <div class="col-md-6">
                    <input class="radio-group" data-show="newUser" id="newUser" checked="checked" name="group1"
                           type="radio">
                    <label for="newUser">New User</label>
                </div>
                <div class="col-md-6">
                    <input class="radio-group " data-show="registeredUser" id="registered" name="group1" type="radio">
                    <label for="registered">Registered User</label>
                </div>

                <div class="col-md-12 mt-10 hide-show newUser">

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

                    <div class="float-block mt-15">
                        <div class="d-table">
                            <div class="d-table-cell width-0">
                                <div class="text-nowrap pr-20"><h5>Upload CV</h5></div>
                            </div>
                            <div class="d-table-cell width-100">
                                <div class="file-uploader width-100">
                                    <div class="button width-100 text-center">Brows...</div>
                                    <input type="file">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="float-block mt-20">
                        <button id="Register" type="button" onclick=""
                                class="cm-btn large text-uppercase light-blue right">Register
                        </button>
                    </div>

                </div>


                <div class="col-md-12 hide-show hide-block registeredUser">
                    Registered User
                </div>
        </form>
    </div>
</div>

<script>
    Input.init();

    $('.radio-group').on('change', function () {
        var $this = $(this);
        var show = $this.data('show');

        $('.hide-show').slideUp('fast', function () {

            $('.' + show).slideDown('slow')

        })
    });
</script>
