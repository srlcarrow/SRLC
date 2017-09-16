<?php $form = $this->beginWidget('CActiveForm', array('id' => 'formStepOne')); ?>
<div class="col-md-12">
    <div class="row mb-15">
        <div class="col-md-12">
            <div class="input-wrapper">
                <input id="address" name="address" type="text">
                <div class="float-text">Address</div>
            </div>
        </div>
    </div>

    <div class="row mb-15">

        <div class="col-md-6">
            <div class="input-wrapper">
                <input id="dob" name="dob" type="text">
                <div class="float-text">Date of birth</div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="input-wrapper">
                <input id="contactNo" name="contactNo" type="text">
                <div class="float-text">Contact No ( Optional )</div>
            </div>
        </div>

    </div>

    <div class="row mb-15">

        <div class="col-md-6">
            <div class="input-wrapper">
                <input id="experience" name="experience" type="text">
                <div class="float-text">Total No of years experience</div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="input-wrapper">
                <input id="highestAcaQuali" name="highestAcaQuali" type="text">
                <div class="float-text">Highest Acadamic Qualification</div>
            </div>
        </div>

    </div>


    <div class="row mb-15">

        <div class="col-md-12">
            <div class="input-wrapper">
                <input id="nameOfAcaQuali" name="nameOfAcaQuali" type="text">
                <div class="float-text">Name of the Academic Qualification</div>
            </div>
        </div>

    </div>

    <div class="row mb-15">

        <div class="col-md-6">

            <div class="row input-collection">
                <div class="col-md-12 mb-15">
                    <button type="button" class="cm-btn text-uppercase right addInput">Add New</button>
                </div>

                <div class="col-md-12 input-container">
                    <div class="input-wrapper">
                        <input id="" name="" placeholder="Professional Qualification"  type="text">
                        <span class="icon icon-16 ic-cross btn-remove-input"></span>
                    </div>

                </div>
            </div>

        </div>

        <div class="col-md-6">
            <div class="row input-collection">
                <div class="col-md-12 mb-15">
                    <button type="button" class="cm-btn text-uppercase right membership addInput">Add New</button>
                </div>

                <div class="col-md-12 input-container">
                    <div class="input-wrapper">
                        <input id="" name="" placeholder="Membership" type="text" autofocus>
                        <span class="icon icon-16 ic-cross btn-remove-input"></span>
                    </div>

                </div>
            </div>
        </div>

    </div>

</div>

<div class="col-md-12 mt-20">
    <button type="button" class="cm-btn large text-uppercase light-blue right btn-next">Next</button>
</div>
<?php $this->endWidget(); ?>


<script>
    Input.init();

    $(function () {

        function htmlInput(placeholder) {
            var html = '';
            html += '<div class="input-wrapper">';
            html += '<input id="" placeholder="' + placeholder + '" name="" type="text">';
            html += '<span class="icon icon-16 ic-cross btn-remove-input"></span>';
            html += '<div class="input-line"></div>';
            html += '<div class="animate-line"></div>';
            html += '</div>';

            return html;
        }

        $('.addInput').on('click', function () {
            var $this = $(this),
                    $inputCollection = $this.parents('.input-collection'),
                    $inputContainer = $inputCollection.find('.input-container');

            if ($this.hasClass('membership')) {
                $inputContainer.append(htmlInput('Membership'));
                $inputContainer.find('.input-wrapper:last input[type="text"]').focus();
            } else {
                $inputContainer.append(htmlInput('Professional Qualification'));
                $inputContainer.find('.input-wrapper:last input[type="text"]').focus();
            }

        });

        $('.input-collection').on('click', '.btn-remove-input', function () {
            var $this = $(this);
            $this.parents('.input-wrapper').remove()
        });
    });

    //Next step
    $('.btn-next').on('click', function () {
        saveStepOne();
    });

    function saveStepOne() {
        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::app()->baseUrl . '/JobSeeker/SaveStepOne'; ?>",
            data: $('#formStepOne').serialize(),
            dataType: 'json',
            success: function (responce) {
                if (responce.code == 200) {
                    goToStepTwo();
                }
            }
        });
    }

    function goToStepTwo() {
        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::app()->baseUrl . '/JobSeeker/FormStepTwo'; ?>",
            data: '',
            success: function (responce) {
                $("#step").html(responce);
            }
        });
    }
</script>