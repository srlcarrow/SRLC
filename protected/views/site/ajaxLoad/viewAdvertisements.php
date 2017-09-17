<section class="main-block" id="searchContent">
    <div class="container">
        <div class="row">

            <div class="col-md-10 col-md-offset-1 col-xs-12">

                <div class="row">

                    <div class="total-jobs col-xs-12">
                        <h4><?php echo $currentPage * $limit; ?><span>of</span><?php echo $pageCount; ?></h4>
                    </div>


                    <div id="jobs" class="job-list-wrap col-xs-12">

                        <ul class="float-block job-list">
                            <?php
                            foreach ($data as $value) {
                                $title = $value->ad_is_use_desig_as_title == 1 ? $value->desig_name : $value->ad_title;
                                $encryptedAdId = $value->ad_id;
                                ?>
                                <li>
                                    <a href="<?php echo Yii::app()->baseUrl . '/Advertisement/ViewAdvertisement/id/' . $encryptedAdId; ?> ">
                                        <h3><?php echo $title; ?></h3>
                                        <h6>
                                            <span><?php echo $value->employer_name; ?></span>
                                            <span class="time-left">Yesterday</span>
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