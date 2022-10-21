<?php
    use app\controllers\SiteController;
    $utility = new SiteController();
?>

<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-3 text-primary"><b>
                    <?php
                        $cat = $utility->getCategoryName($id);
                        echo "News on " . $cat->title;
                    ?>
                </b></h2>
            </div>
        </div>
        <div class="row" data-aos="fade-up">
            <div class="col-lg-3 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">
                <h2>Category</h2>
                <ul class="vertical-menu">
                    <?php
                        $cats = $utility->getCategories(10);
                        foreach($cats as $cat){ 
                            echo "
                                <li><a href='/read/".$cat['id']."'>". $cat['title']. "</a></li>
                            ";
                        }  
                    ?>
                </ul>
                </div>
            </div>
            </div>
            <div class="col-lg-9 stretch-card grid-margin">
            <div class="card">
                <div class="card-body">

                <?php
                    foreach($posts as $post){ 
                ?>

                <div class="row">
                    <div class="col-sm-4 grid-margin">
                    <div class="position-relative">
                        <div class="rotate-img">
                        <?php echo "<a href='/read/".$post['id']."'>
                        <img src=/".$post['photo']." class='img-fluid' alt=".$post['title']." /></a>" ?>
                        
                        </div>
                        <div class="badge-positioned">
                        <span class="badge badge-danger font-weight-bold"
                            ><?php echo $post['tag'] ?></span
                        >
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-8  grid-margin">
                    <h2 class="mb-2 font-weight-600">
                        <?php echo "<a href='/read/".$post['id']."' class='text-body'>". $post['title']. "</a>" ?>
                    </h2>
                    <div class="fs-13 mb-2">
                        <span class="mr-2"><?php echo $post['category'] ?> </span><?php echo $post['created_at'] ?>
                    </div>
                    <p class="mb-0">
                        <?php echo $post['summary'] ?>
                    </p>
                    </div>
                </div>
                <?php } ?>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>