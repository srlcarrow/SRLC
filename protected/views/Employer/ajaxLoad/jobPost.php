
<div class="col-md-12 pr-0 mb-30">
    <div class="col-md-12 pr-0">
        <button class="cm-btn large right light-blue-4" onclick="goToPostJob()">Post a Job</button>
    </div>

    <div class="col-md-12">
    </div>
</div>

<div class="col-md-12 pl-30 pr-0 mb-50">
    <table class="data-table td-border-bottom">
        <colgroup>
            <col style="width: 15%">
            <col style="width: 10%">
            <col style="width: 10%">
            <col style="width: 10%">
            <col style="width: 10%">
            <col style="width: 10%">
        </colgroup>
        <thead>
        <tr>
            <th>Package</th>
            <th>Start</th>
            <th>Expire</th>
            <th>Used</th>
            <th>Balance</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><div class="data">Package</div></td>
            <td><div class="data">20 Jan 2017</div></td>
            <td><div class="data">28 Jan 2017</div></td>
            <td><div class="data">0</div></td>
            <td><div class="data">4</div></td>
            <td>
                <div class="data">
                    <span class="status-text green">Published</span>
                    <span class="icon icon-16 ic-view v-middle pointer ml-10"></span>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<!--Back End-->
<script>
    function goToPostJob() {
        window.location.href = '<?php echo Yii::app()->baseUrl . '/Employer/CreateAdvertisement'; ?>';
    }
</script>    