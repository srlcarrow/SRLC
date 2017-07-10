<div class="navbar-fixed">
    
    
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="#!">one</a></li>
        <li><a href="#!">two</a></li>
        <!--<li class="divider"></li>-->
        <li><a href="#!">three</a></li>
    </ul>
    
    
    <nav class="light-blue accent-3">
        <div class="container">
            <div class="nav-wrapper">
                <a class="brand-logo logo-link" href="#">
                    <img src="<?php echo Yii::app()->baseUrl . '/images/system/logo/logo.png'; ?>" alt="">
                </a>
                <ul class="hide-on-med-and-down right">
                    <li><a href="#">Admin</a></li>
                    <li><a href="#">Category</a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>
<!--                    <li>
                        <a href="#">Category </a>
                        <ul>
                            <li><a href="#">Sub 1</a></li>
                            <li>
                                <a href="#">Sub 2</a>
                                <ul>
                                    <li><a href="#">Sub 1</a></li>
                                    <li>
                                        <a href="#">Sub 2</a>
                                        <ul>
                                            <li><a href="#">Sub 1</a></li>
                                            <li>
                                                <a href="#">Sub 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>


                    </li>-->
                </ul>
                <?php
                $menu = Links::model()->findAllByAttributes(array('lnk_parent_id'=>0),array('order'=>'lnk_order ASC'));              

                ?>
            </div>
        </div>
    </nav>
</div>

<script>
    $(function() {
        $(".dropdown-button").dropdown();
    })
</script>