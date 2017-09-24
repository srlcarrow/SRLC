<section class="main-block" id="searchContent">
    <div class="container">
        <div class="row">

            <div class="col-md-10 col-md-offset-1 col-xs-12">

                <div class="row">

                    <div class="total-jobs col-xs-12">
                        <h4><?php echo count($data) + (($currentPage - 1) * $limit); ?><span>of</span><?php echo $pageCount; ?></h4>
                    </div>

                    <div id="jobs" class="job-list-wrap col-xs-12">

                        <ul class="float-block job-list">
                            <?php
                            foreach ($data as $value) {
                                if (date('Y-m-d', strtotime($value->ad_created_time)) == date('Y-m-d') && (strtotime(date('Y-m-d H:i:s')) - strtotime($value->ad_created_time)) > 3600) {
                                    $datetime1 = new DateTime($value->ad_created_time);
                                    $datetime2 = new DateTime(date('Y-m-d H:i:s'));

                                    $interval = $datetime1->diff($datetime2);
                                    $adPublishedTime = $interval->format('%h') . " Hours ago";
                                } elseif (date('Y-m-d', strtotime($value->ad_created_time)) == date('Y-m-d') && (strtotime(date('Y-m-d H:i:s')) - strtotime($value->ad_created_time)) < 3600) {
                                    $datetime1 = strtotime(date('H:i:s'));
                                    $datetime2 = strtotime(date('H:i:s', strtotime($value->ad_created_time)));
                                    $adPublishedTime = (($datetime1 - $datetime2) - (($datetime1 - $datetime2) % 60)) / (60);

                                    $adPublishedTime = $adPublishedTime . " Mins ago";
                                } elseif (date('Y-m-d', strtotime($value->ad_created_time)) < date('Y-m-d')) {
                                    $datetime1 = strtotime(date('Y-m-d'));
                                    $datetime2 = strtotime(date('Y-m-d', strtotime($value->ad_created_time)));
                                    $adPublishedTime = ($datetime1 - $datetime2) / (24 * 3600);

                                    $adPublishedTime = $adPublishedTime . " Days ago";
                                }

                                $title = $value->ad_is_use_desig_as_title == 1 ? $value->desig_name : $value->ad_title;
                                $encryptedAdId = $value->ad_id;
                                ?>
                                <li>
                                    <a href="<?php echo Yii::app()->baseUrl . '/Advertisement/ViewAdvertisement/id/' . $encryptedAdId; ?> ">
                                        <h3><?php echo $title; ?></h3>
                                        <h6>
                                            <span><?php echo $value->employer_name; ?></span>
                                            <span class="time-left"><?php echo $adPublishedTime; ?></span>
                                        </h6>
                                        <ul class="more-details-list">
                                            <li>
                                                <i class="dot"></i>
                                                <?php echo $value->wt_name; ?>
                                            </li>
                                            <li>
                                                <i class="dot"></i>
                                                <?php echo explode('.', $value->ad_expected_experience)[0]; ?> Yrs
                                            </li>
                                            <li>
                                                <i class="dot"></i>
                                                <?php echo $value->city_name; ?>
                                            </li>
                                            <li>
                                                <i class="dot"></i>
                                                <?php
                                                $salary = $value->ad_is_negotiable == 0 ? $value->ad_salary : "Negotiable";
                                                echo $salary;
                                                ?>
                                            </li>

                                        </ul>
                                    </a>
                                </li>
                                <?php
                            }
                            ?>

                        </ul>

                    </div>


                </div>

            </div>

            <div class="col-xs-12 col-md-10 col-md-offset-1">
                <div class="site-pagination">
                    <?php
                    Paginations::setLimit(10);
                    Paginations::setPage($currentPage);
                    Paginations::setJSCallback("loadAdvertisementData");
                    Paginations::setTotalPages($pageCount);
                    Paginations::makePagination();
                    Paginations::drawPagination();
                    ?>
                </div>
            </div>

        </div>
    </div>
</section>