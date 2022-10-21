<!-- Content -->
<section>
    <header class="main">
        <h1>All Categories</h1>
        <span><a type="button" href="/admin/category/create" class="special">Add New</a></span>
    </header>

    <div class="row 200%">
        <div class="12u$(medium)">
            <div class="table-wrapper">
                <table class="alt">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($categories as $cat){   
                            ?>
                                <tr>
                                    <td><?php echo $cat['title']; ?></td>
                                    <td><?php echo $cat['cat_desc']; ?></td>
                                    <td><?php echo $cat['created_at']; ?></td>
                                </tr>
                                
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>