<div class="row">

    <div class="col s12">
        <button class="cm-btn add right addNewCompany">
            <i class="material-icons left">&#xE148;</i>Add New
        </button>
    </div>

    <div class="col s12 company-form">
        <div class="card ">
            <div class="card-content">
                <h5 class="grey-text text-darken-1">Add Company</h5>

                <div class="row">
                    <div class="col s12 m4">
                        <div class="row">
                            <div class="col s12">Company logo</div>
                        </div>
                    </div>
                    <div class="col s12 m8">
                        <div class="row">
                            <div class="col s6">
                                <div class="input-field">
                                    <input type="text">
                                    <label>Company Name</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <div class="input-field">
                                    <input type="text">
                                    <label>Address</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s6">
                                <div class="input-field">
                                    <input type="text">
                                    <label>Contact No</label>
                                </div>
                            </div>
                            <div class="col s6">
                                <div class="input-field">
                                    <input type="text">
                                    <label>Contact No (Optional)</label>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col s6">
                                <div class="input-field">
                                    <input type="email">
                                    <label>Email</label>
                                </div>
                            </div>

                            <div class="col s6">
                                <div class="input-field">
                                    <input type="text">
                                    <label>Contact Person</label>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
            <div class="card-action right-align">
                <button type="button" class=" btn_close_Company btn waves-effect waves-light red lighten-1">Close
                </button>
                <button type="button" class=" btn waves-effect waves-light red lighten-1">Clear</button>
                <button type="submit" class="btn waves-effect waves-light blue lighten-1">Save</button>
            </div>
        </div>
    </div>
</div>

<div class="row search-area ">
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
</div>

<div class="row mb-0 company-cards ">
    <div class="col s12">
        <div class="card-panel expand-card detail-card outer-tb-15">
            <div class="row mb-0 expand-card-head">
                <div class="col s11">
                    <div class="row mb-0">
                        <div class="col s6">
                            <h6 class="grey-text text-darken-1 ">Abc Company</h6>
                        </div>
                        <div class="col s3">
                            <h6 class="grey-text text-darken-1">E0023</h6>
                        </div>
                    </div>
                </div>
                <div class="col s1 mt-5">
                    <i class="right material-icons btn_expand">expand_more</i>
                </div>
            </div>

            <div class="row expand-card-content mb-0 ">
                <div class="col s12 mt-20">
                    Content
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(function () {
        $('.btn_expand').on('click', function () {
            var $this = $(this);
            var card = $this.parents('.expand-card');

            if (!$this.hasClass('expand')) {
                $this.addClass('expand').html('expand_less');
                card.find('.expand-card-content').slideDown('fast');
            } else {
                $this.removeClass('expand').html('expand_more');
                card.find('.expand-card-content').slideUp('fast');
            }
        });
    });


    $('.addNewCompany').on('click', function () {
        $('.search-area,.company-cards').slideUp('fast', function () {
            $('.company-form').slideDown('slow');
        })
    });

    $('.btn_close_Company').on('click', function () {
        $('.company-form').slideUp('fast', function () {
            $('.search-area,.company-cards').slideDown('slow');
        })
    });

</script>