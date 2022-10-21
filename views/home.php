<?php
    use app\controllers\SiteController;
    $utility = new SiteController();
?>

<div class="content-wrapper">
    <div class="container">
      <div class="row" data-aos="fade-up">
        <div class="col-xl-8 stretch-card grid-margin">
          <div class="position-relative">
            <?php
                $posts = $utility->displayPostByPosition($position = 'global_news', 1);
                foreach($posts as $post){ 
            ?>
            <?php echo "<a href='/read/".$post['id']."'>
                    <img src=/".$post['photo']." class='img-fluid' alt=".$post['title']." /></a>" ?>
            
            <div class="banner-content">
              <div class="badge badge-danger fs-12 font-weight-bold mb-3">
                <?php echo $post['tag'] ?>
              </div>
              <h1 class="mb-0">GLOBAL PANDEMIC</h1>
              <h1 class="mb-2">
                <?php echo "<a href='/read/".$post['id']."'>". $post['title']. "</a>" ?>
              </h1>
              <div class="fs-12">
                <span class="mr-2">Posted: </span><?php echo $post['created_at'] ?>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
        <div class="col-xl-4 stretch-card grid-margin">
          <div class="card bg-dark text-white">
            <div class="card-body">
              <h2>Latest news</h2>

              <?php $posts = $utility->latestNews();
                foreach($posts as $post){  ?>
              <div
                class="d-flex border-bottom-blue pt-3 pb-4 align-items-center justify-content-between"
              >
                <div class="pr-3">
                  <h5>
                    <?php echo "<a href='/read/".$post['id']."' class='text-white'>". $post['title']. "</a>" ?>
                  </h5>
                  <div class="fs-12">
                    <span class="mr-2">Posted: </span><?php echo $post['created_at'] ?>
                  </div>
                </div>
                <div class="rotate-img">
                  <?php echo "<a href='/read/".$post['id']."'>
                    <img src=/".$post['photo']." class='img-fluid img-lg' alt=".$post['title']." /></a>" ?>
                </div>
              </div>
              <?php } ?>
                
            </div>
          </div>
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
                            <li><a href='/category/".$cat['id']."'>". $cat['title']. "</a></li>
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
                $posts = $utility->displayPostByPosition($position = 'flash_news', 3);
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
      <div class="row" data-aos="fade-up">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-xl-12">
                  <div class="row">
                    <div class="col-sm-8">
                      <div class="card-title">
                        Sport light
                      </div>
                      <div class="row">
                      <?php
                          $posts = $utility->displayPostByPosition($position = 'sport_light', 4);
                          foreach($posts as $post){ 
                      ?>
                        <div class="col-sm-6">
                          <div class="border-bottom pb-3">
                            <div class="rotate-img">
                            <?php echo "<a href='/read/".$post['id']."'>
                            <img src=/".$post['photo']." class='img-fluid' alt=".$post['title']." /></a>" ?>
                            
                            </div>
                            <p class="fs-16 font-weight-600 mb-0 mt-3">
                              <?php echo "<a href='/read/".$post['id']."' class='text-body'>". $post['title']. "</a>" ?>
                            </p>
                            <p class="fs-13 text-muted mb-0">
                              <span class="mr-2">Posted </span><?php echo $post['created_at'] ?>
                            </p>
                          </div>
                        </div>
                      <?php } ?>
                      </div>
                      
                      
                    </div>
                    <div class="col-sm-4">
                      <div class="card-title">
                        Celebrity news
                      </div>
                      <?php
                          $posts = $utility->displayPostByPosition($position = 'celebrity_news', 4);
                          foreach($posts as $post){ 
                      ?>
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="border-bottom pb-3">
                              <div class="row">
                                <div class="col-sm-5 pr-2">
                                  <div class="rotate-img">
                                  <?php echo "<a href='/read/".$post['id']."'>
                                <img src=/".$post['photo']." class='img-fluid w-100' alt=".$post['title']." /></a>" ?>
                                    
                                  </div>
                                </div>
                                <div class="col-sm-7 pl-2">
                                  <p class="fs-16 font-weight-600 mb-0">
                                    <?php echo "<a href='/read/".$post['id']."' class='text-body'>". $post['title']. "</a>" ?>
                                  </p>
                                  <p class="fs-13 text-muted mb-0">
                                    <span class="mr-2">Posted: </span><?php echo $post['created_at'] ?>
                                  </p>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>