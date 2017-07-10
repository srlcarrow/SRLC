<div class="navbar-fixed">
    <nav class=" light-blue accent-3">
        <div class="container">
            <div class="nav-wrapper">
                <a class="brand-logo logo-link" href="#">
                    <img src="<?php echo Yii::app()->baseUrl . '/images/system/logo/logo.png'; ?>" alt="">
                </a>
      
                <ul class="hide-on-med-and-down right">
                    <li><a href="#">Admin</a></li>
                    <li><a href="#">Category</a></li>
                </ul>
                          <?php
//                $menu = Links::model()->findAll(
//                        array(
//                            'select' => '*',
//                            'condition' => 'lnk_parent_id=0 AND lnk_depth=1',
//                            'order' => 'lnk_order'
//                ));
                $menu = Links::model()->findAll();
//                $menu = 'rajithiiiyyyyyygghngcccccccccccccccccccccccccccccccccccccccccccc';
                var_dump($menu);
                exit;

                ?>
            </div>
        </div>
    </nav>
</div>