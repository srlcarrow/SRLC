<?php $form = $this->beginWidget('CActiveForm', array('id' => 'formStepOne')); ?>
<div class="col-md-12">
    <div class="row mb-15">
        <div class="col-md-12">
            <div class="input-wrapper">
                <input id="address" name="address" type="text" value="<?php echo $jsBasicData->js_address; ?>">
                <div class="float-text">Address</div>
            </div>
        </div>
    </div>

    <div class="row mb-15">

        <div class="col-md-6">
            <div class="input-wrapper">
                <input id="dob" name="dob" type="text" value="<?php echo $jsBasicData->js_dob; ?>">
                <div class="float-text">Date of birth</div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="input-wrapper">
                <input id="contactNo" name="contactNo" type="text" value="<?php echo $jsBasicData->js_contact_no1; ?>">
                <div class="float-text">Contact No ( Optional )</div>
            </div>
        </div>

    </div>

    <div class="row mb-15">

        <div class="col-md-6">
            <div class="input-wrapper">
                <input id="experience" name="experience" type="text" value="<?php echo $jsBasicData->js_experience; ?>">
                <div class="float-text">Total No of years experience</div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="input-wrapper">
                <input id="highestAcaQuali" name="highestAcaQuali" type="text" value="<?php echo $jsBasicData->js_highest_academic_quali; ?>">
                <div class="float-text">Highest Acadamic Qualification</div>
            </div>
        </div>

    </div>


    <div class="row mb-15">

        <div class="col-md-6">
            <div class="input-wrapper">
                <input id="nameOfAcaQuali" name="nameOfAcaQuali" type="text" value="<?php echo $jsBasicData->js_nameof_academic_quali; ?>">
                <div class="float-text">Name of the Academic Qualification</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="input-wrapper">
                <input id="nameOfAcaQuali" name="nameOfAcaQuali" type="text" value="<?php echo $jsBasicData->js_nameof_academic_quali; ?>">
                <div class="float-text">Name of the Academic Qualification</div>
            </div>
        </div>

    </div>

    <div class="row mb-15">

        <!--Proffesional Qualification-->
        <div class="col-md-6">
            <div class="row input-collection">
                <div class="col-md-12 mb-15">
                    <button data-btn="profQuali" type="button" class="cm-btn text-uppercase right addInput">Add New</button>
                </div>

                <div class="col-md-12 input-container">
                    <?php
                    foreach ($jsProfQualifications as $jsProfQualification) {
                        ?>
                        <div class="input-wrapper">
                            <input id="profQualiHiddenId[]" name="profQualiHiddenName[]" value="<?php echo $jsProfQualification->jsquali_id ?>" placeholder="' + placeholder + '" type="hidden">
                            <input id="profQualiId[]" name="profQualiName[]" placeholder="Professional Qualification" value="<?php echo $jsProfQualification->jsquali_qualification ?>" type="text" autofocus>   
                            <span class="icon icon-16 ic-cross btn-remove-input"></span>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="input-wrapper">
                        <input id="profQualiHiddenId[]" name="profQualiHiddenName[]" value="0" placeholder="' + placeholder + '" type="hidden">
                        <input id="profQualiId[]" name="profQualiName[]" placeholder="Professional Qualification" type="text" autofocus>                        
                        <span class="icon icon-16 ic-cross btn-remove-input"></span>
                    </div>
                </div>

            </div>
        </div>

        <!--Memberships-->
        <div class="col-md-6">
            <div class="row input-collection">
                <div class="col-md-12 mb-15">
                    <button data-btn="membership" type="button" class="cm-btn text-uppercase right membership addInput">Add New</button>
                </div>

                <div class="col-md-12 input-container">
                    <!--<div class="input-wrapper">-->
                    <?php
                    foreach ($jsMemberships as $jsMembership) {
                        ?>
                        <div class="input-wrapper">
                            <input id="membershipHiddenId[]" name="membershipHiddenName[]" value="<?php echo $jsMembership->jsquali_id; ?>" placeholder="' + placeholder + '" type="hidden">                        
                            <input id="membershipId[]" name="membershipName[]" type="text" value="<?php echo $jsMembership->jsquali_qualification; ?>" placeholder="Membership" autofocus>    
                            <span class="icon icon-16 ic-cross btn-remove-input"></span>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="input-wrapper">
                        <input id="membershipHiddenId[]" name="membershipHiddenName[]" value="0" placeholder="' + placeholder + '" type="hidden">                        
                        <input id="membershipId[]" name="membershipName[]" type="text" placeholder="Membership" autofocus>                      
                        <span class="icon icon-16 ic-cross btn-remove-input"></span>
                    </div>
                    <!--</div>-->

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
            var i = 0;
            function htmlInput(placeholder, membership) {
                var id = membership + 'Id_' + i;
                var nameArray = membership + 'Name[]';
                var hiddenId = membership + 'HiddenId_' + i;
                var nameHiddenArray = membership + 'HiddenName[]';

                var html = '';
                html += '<div class="input-wrapper">';
                html += '<input id="' + hiddenId + '" name="' + nameHiddenArray + '" placeholder="' + placeholder + '" type="hidden" value="0">';
                html += '<input id="' + id + '" name="' + nameArray + '" placeholder="' + placeholder + '" type="text">';
                html += '<span class="icon icon-16 ic-cross btn-remove-input"></span>';
                html += '<div class="input-line"></div>';
                html += '<div class="animate-line"></div>';
                html += '</div>';

                return html;
            }

            $('.addInput').on('click', function () {
                var $this = $(this),
                        $inputCollection = $this.parents('.input-collection'),
                        $inputContainer = $inputCollection.find('.input-container'),
                        $dataButton = $this.attr('data-btn');

                if ($this.hasClass('membership')) {
                    $inputContainer.append(htmlInput('Membership', $dataButton));
                    $inputContainer.find('.input-wrapper:last input[type="text"]').focus();
                } else {
                    $inputContainer.append(htmlInput('Professional Qualification', $dataButton));
                    $inputContainer.find('.input-wrapper:last input[type="text"]').focus();
                }

            });

            $('.input-collection').on('click', '.btn-remove-input', function () {
                var $this = $(this);
                var idVal = $this.siblings('input[type="hidden"]').val();
                if (idVal > 0) {
                    deleteQualifications(idVal);
                }
                $this.parents('.input-wrapper').remove();
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
                data: $('#formStepOne').serialize() + '&jsBasicKey=<?php echo $jsBasicKey; ?>',
                dataType: 'json',
                success: function (responce) {
                    if (responce.code == 200) {
                        goToStepTwo(responce.data.jsBasicKey);
                    }
                }
            });
        }

        function deleteQualifications(id) {
            $.ajax({
                type: 'POST',
                url: "<?php echo Yii::app()->baseUrl . '/JobSeeker/DeleteQualification'; ?>",
                data: {id: id},
                dataType: 'json',
            });
        }

        function goToStepTwo(jsBasicKey) {
            $.ajax({
                type: 'POST',
                url: "<?php echo Yii::app()->baseUrl . '/JobSeeker/FormStepTwo'; ?>",
                data: {jsBasicKey: jsBasicKey},
                success: function (responce) {
                    $("#step").html(responce);
                }
            });
        }



    </script>