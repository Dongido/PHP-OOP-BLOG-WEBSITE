<?php
    use app\controllers\SiteController;
    $utility = new SiteController();
?>
<div class="col-sm-12">
    <div class="card" data-aos="fade-up">
        <div class="card-body">
            <div class="row">
            <div class="col-lg-8">
                <div>
                <h1 class="font-weight-600 mb-1">
                    <?php echo $post->title; ?>
                </h1>
                <p class="fs-13 text-muted mb-0">
                    <span class="mr-2">Photo </span><?php echo $post->created_at; ?>
                </p>
                <div class="rotate-img">
                    <?php echo "<img src=/".$post->photo." class='img-fluid mt-4 mb-4' alt=".$post->title." />" ?> 
                </div>
                <p class="mb-4 fs-15">
                    <?php echo htmlspecialchars_decode($post->content); ?>
                </p>
                </div>

                <div class="d-lg-flex">
                    <span class="fs-16 font-weight-600 mr-2 mb-1"
                        >Tags</span
                    >
                    <span class="badge badge-outline-dark mr-2 mb-1"
                        ><?php echo $post->display_position; ?></span
                    >
                </div>
                
            </div>
            <div class="col-lg-4">
                <h2 class="mb-4 text-primary font-weight-600">
                Latest news
                </h2>

                <?php $posts = $utility->latestNews();
                foreach($posts as $post){  ?>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="border-bottom pb-4 pt-4">
                            <div class="row">
                                <div class="col-sm-8">
                                <h5 class="font-weight-600 mb-1">
                                    <?php echo "<a href='/read/".$post['id']."' class='text-body'>". $post['title']. "</a>" ?>
                                </h5>
                                <p class="fs-13 text-muted mb-0">
                                    <span class="mr-2">Posted: </span> <?php echo $post['created_at']; ?>
                                </p>
                                </div>
                                <div class="col-sm-4">
                                    <div class="rotate-img">
                                        <?php echo "<img src=/".$post['photo']." class='img-fluid' 
                                        alt=".$post['title']." />" ?>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>