<section>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Photo</th>
                <th>Title</th>
                <th>Category</th>
                <th>Tag</th>
                <th>Status</th>
                <th>Display Position</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($posts as $post){   
                ?>
                    <tr>
                        <td class="thumbnail"><?php echo "<img src=/".$post['photo']."/>" ?></td>
                        <td><?php echo $post['title']; ?></td>
                        <td><?php echo $post['category']; ?></td>
                        <td><?php echo $post['tag']; ?></td>
                        <td><?php echo $post['display_status']; ?></td>
                        <td><?php echo $post['display_position']; ?></td>
                        <td><?php echo $post['created_at']; ?></td>
                    </tr>
                    
            <?php } ?>
        </tbody>
    </table>
</section>