<div class="ajaxLoadAdd"></div>

<div class="row search-area ">
    <div class="col s12">
        <button class="cm-btn add right addNewCompany">
            <i class="material-icons left">&#xE148;</i>Add New
        </button>
    </div>

    <div class="col s12">
        <div class="card-panel">
            <div class="search-input-wrp grey lighten-3">
                <div class="search-input">
                    <i class="material-icons search-icon blue-text text-lighten-3">search</i>
                    <input class="input-search" type="text" placeholder="Search">
                </div>
                <div class="search-action">
                    <button class="btn waves-effect waves-light btn-search deep-orange">Search</button>
                </div>
            </div>
        </div>
    </div>
    <div class="ajaxLoad"></div>
</div>


<script>
    $(document).ready(function (e) {
        loadEmployerData();
    });

    function loadEmployerData() {
        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::app()->baseUrl . '/Admin/Employer/ViewEmployerData'; ?>",
            data: '',
            success: function (responce) {
                $(".ajaxLoad").html(responce);
            }
        });
    }
    
    $('.addNewCompany').on('click', function () {
        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::app()->baseUrl . '/Admin/Employer/EmployerAdd'; ?>",
            data: '',
            success: function (responce) {
                $('.search-area,.company-cards').slideUp('fast', function () {
                    $(".ajaxLoadAdd").html(responce);
                    $('.company-form').slideDown('slow');

                })
            }
        });

    });
</script>