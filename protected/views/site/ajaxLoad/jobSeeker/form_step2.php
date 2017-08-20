<form>

    <div class="col-md-12 ">

        <div class="row mb-15">

            <div class="col-md-6">
                <div class="selector dark">
                    <div class="selected-option">
                        <span>Industry</span>
                    </div>
                    <ul class="option-list"></ul>

                    <select class="type" name="" id="">
                        <option value="" disabled="disabled">Industry</option>
                        <option value="2">lorem</option>
                        <option value="4">lorem</option>
                        <option value="3">lorem</option>
                    </select>
                </div>
            </div>
            
            <div class="col-md-6">
                    <div class="state-wrapper">
                        <input type="checkbox" id="s">
                        <label for="s">Looking for a Internship Opportunity</label>
                    </div>
            </div>

        </div>

        <div class="row mb-15">

            <div class="col-md-6">
                <div class="selector dark">
                    <div class="selected-option">
                        <span>Category (Field)</span>
                    </div>
                    <ul class="option-list"></ul>

                    <select class="type" name="" id="">
                        <option value="" disabled="disabled">Category (Field)</option>
                        <option value="2">lorem</option>
                        <option value="4">lorem</option>
                        <option value="3">lorem</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="selector dark">
                    <div class="selected-option">
                        <span>Sub Category</span>
                    </div>
                    <ul class="option-list"></ul>

                    <select class="type" name="" id="">
                        <option value="" disabled="disabled">Sub Category</option>
                        <option value="2">lorem</option>
                        <option value="4">lorem</option>
                        <option value="3">lorem</option>
                    </select>
                </div>
            </div>

        </div>


        <div class="row mb-15">

            <div class="col-md-6">
                <div class="selector dark">
                    <div class="selected-option">
                        <span>Current Job title</span>
                    </div>
                    <ul class="option-list"></ul>

                    <select class="type" name="" id="">
                        <option value="" disabled="disabled">Current Job title</option>
                        <option value="2">lorem</option>
                        <option value="4">lorem</option>
                        <option value="3">lorem</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-wrapper">
                    <input id="" name="" type="text">
                    <div class="float-text">If Others Enter your Job title</div>
                </div>
            </div>

        </div>

    </div>

    <div class="col-md-12 mt-20">
        <button type="button" class="cm-btn large text-uppercase light-blue right btn-next">Next</button>
    </div>
</form>


<script>
    Input.init();
    Select.init();

    //Next step
    $('.btn-next').on('click', function () {

        //GO to next step
        JobSeekerStep.next(2);
    });
</script>