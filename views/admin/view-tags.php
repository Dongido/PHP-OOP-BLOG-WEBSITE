<!-- Content -->
<section>
    <header class="main">
        <h1>All Tags</h1>
        <span><a type="button" href="/admin/tag/create" class="special">Add New</a></span>
    </header>

    <div class="row 200%">
        <div class="12u$(medium)">
            <div class="table-wrapper">
                <table class="alt">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Description</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($tags as $tag){   
                            ?>
                                <tr>
                                    <td><?php echo $tag['title']; ?></td>
                                    <td><?php echo $tag['slug']; ?></td>
                                    <td><?php echo $tag['tag_desc']; ?></td>
                                    <td><?php echo $tag['created_at']; ?></td>
                                </tr>
                                
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>