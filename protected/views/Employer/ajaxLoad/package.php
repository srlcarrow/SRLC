<div class="ajaxLoad_purchPackage"></div>

<?php foreach ($packages as $package) { ?>
    <div class="col-md-9">
        <div class="col-md-7">
            <h3 class="f-medium"><?php echo $package->pack_name; ?></h3>
            <h2 class="text-orange"><?php echo $package->pack_amount; ?> LKR</h2>  
        </div>

        <div class="col-md-5">
            <h6 class="text-dark-blue mb-15">
                <i class="dot mr-5"></i>
                <span><?php echo $package->pack_is_unlimited == 1 ? "Unlimited" : floor($package->pack_num_of_ads) . ' Advertisement(s)'; ?></span>
            </h6>

            <h6 class="text-dark-blue mb-15">
                <i class="dot mr-5"></i>
                <span>Valid <?php echo floor($package->pack_validity_period); ?> Month(s)</span> 
            </h6>

        </div>
    </div>

    <div class="col-md-3 mt-30 pr-0">
        <button type="button" class="cm-btn large light-blue-4 right" onclick="purchasePackage(<?php echo $package->pack_id; ?>)">Add</button>
    </div>

    <div class="col-md-12 mt-20 pl-30 pr-0">
        <div class="bottom-line"></div>
    </div>
<?php } ?>

<script type="text/javascript">
    
    $(document).ready(function (e) {
        //loadPurchPackagesData();
    });

    function loadPurchPackagesData() {
        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::app()->baseUrl . '/Employer/ViewPurchasedPackages'; ?>",
            data: '',
            success: function (responce) {
                $(".ajaxLoad_purchPackage").html(responce);
            }
        });
    }
    
    function purchasePackage(id) {
        $.ajax({
            type: 'POST',
            url: "<?php echo Yii::app()->baseUrl . '/Employer/PurchasePackage'; ?>",    
            data: {id: id},
            dataType: 'json',
            success: function (responce) {
                if (responce.code == 200) {
                       //loadPurchPackagesData();   
                }
            }
        });
    }
</script>