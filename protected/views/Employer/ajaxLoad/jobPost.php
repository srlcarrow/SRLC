<div class="col-md-12">
    <div class="col-md-12">
        <button class="cm-btn large right light-blue-4" onclick="goToPostJob()">Post a Job</button>
    </div>

    <div class="col-md-12">
    </div>
</div>

<!--Back End-->
<script>
    function goToPostJob() {
        window.location.href = '<?php echo Yii::app()->baseUrl . '/Employer/CreateAdvertisement'; ?>';
    }
</script>    