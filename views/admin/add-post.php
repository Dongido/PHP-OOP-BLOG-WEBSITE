<?php
    use app\controllers\DashboardController;
    $utility = new DashboardController();
?>

<!-- Content -->
<section>
    <header class="main">
        <h1>Add New Post</h1>
    </header>

    <div>
        <form method="post" action="#" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="row uniform">
                        <span>Post Title</span>
                        <div class="12u$">
                            <input type="text" name="title" id="demo-name" value="" placeholder="Enter title" />
                        </div>

                        <div class="12u$">
                            <div class="select-wrapper">
                                <select name="category_id" id="demo-category">
                                    <option value="">- Choose Category -</option>
                                    <?php
                                        $cats = $utility->getCategories();
                                        foreach($cats as $cat){ 
                                            echo "
                                                <option value=".$cat['id'].">". $cat['title']. "</option>
                                            ";
                                        }  
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="12u$">
                            <div class="select-wrapper">
                                <select name="tag_id" id="demo-category">
                                    <option value="1">- Choose Post Tag -</option>
                                    <?php
                                        $tags = $utility->getTags();
                                        foreach($tags as $tag){ 
                                            echo "
                                                <option value=".$tag['id'].">". $tag['title']. "</option>
                                            ";
                                        }  
                                    ?>
                                </select>
                            </div>
                        </div>

                        

                        <div class="12u$">
                            <input type="file" name="photoupload" id="photoupload" />
                        </div>
                    
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row uniform">
                        <span>Short Description</span>
                        <div class="12u$">
                            <input type="text" name="summary" id="demo-name" value="" placeholder="Enter short description" />
                        </div>

                        <div class="12u$">
                            <div class="select-wrapper">
                                <select name="display_position" id="demo-category">
                                    <option value="">- Choose Display Postion -</option>
                                    <option value="sport_light">Sport light</option>
                                    <option value="celebrity_news">Celebrity news</option>
                                    <option value="global_news">Global News</option>
                                    <option value="flash_news">Flash News</option>
                                </select>
                            </div>
                        </div>

                        <div class="12u$">
                            <div class="select-wrapper">
                                <select name="display_status" id="demo-category">
                                    <option value="1">- Choose Post Status -</option>
                                    <option value="visible">Show</option>
                                    <option value="hidden">Hide</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row uniform mt-3">                        
                        <span>Post Description</span>
                        <div class="12u$">
                            <textarea name="content" id="content" placeholder="Enter description" rows="6"></textarea>
                        </div>

                        <div class="12u$">
                            <ul class="actions">
                                <li><button type="submit" class="special"> Submit </button></li>
                                <li><button type="reset"> Reset </button></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>
