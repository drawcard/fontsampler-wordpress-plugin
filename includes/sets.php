<h1>Fontsamplers</h1>

<?php if (empty($sets)) : ?>
    <em>No sets created yet.</em>
    <p>This is where your created font samplers will be listed once you've added some below.</p>
    <p>To begin with you need to have some webfont files in your media gallery. You can use the below font upload
        interface just as well.</p>

<?php else: ?>
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Files</th>
            <th>Settings</th>
            <th>Shortcode</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
    <?php foreach ($sets as $set): ?>
        <tr>
            <th><?php echo $set['id']; ?></th>
            <th><?php echo $set['name']; ?></th>
            <th></th>
            <th></th>
            <th>[fontsampler id=<?php echo $set['id']; ?>]</th>
            <th>
                <form method="post" action="?page=fontsampler&amp;subpage=edit&amp;id=<?php echo $set['id']; ?>" style="display: inline-block;">
                    <?php submit_button('Edit set'); ?>
                </form>
                </th>
            <th>
                <form method="post" action="?page=fontsampler" style="display: inline-block;">
                    <input type="hidden" name="action" value="deleteSet">
                    <input type="hidden" name="id" value="<?php echo $set['id']; ?>">
                    <?php submit_button('Delete set'); ?>
                </form>
            </th>
        </tr>

    <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>


<a href="?page=fontsampler&subpage=create">Create a new font sampler</a>