<div class="container">
    <form action="<?php echo URL; ?>home/search" method="POST">
        <input type="text" name="search">
        <input type="submit" value="Search">
    </form>
    <form action="<?php echo URL; ?>home/search" method="POST">
            <input type="checkbox" name="pets">Pets
            <input type="checkbox" name="smoking">Smoking
            <input type="checkbox" name="furnished">Furnished
            <input type="checkbox" name="parking">Parking
            <input type="checkbox" name="laundry">Laundry
            <input type="submit" value="Apply"></p>
    </form>
    <table>
        <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Title</td>
                <td>Price</td>
                <td>Bedrooms</td>
                <td>Baths</td>
                <td>Zip Code</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($query as $query) { ?>
                <tr>
                    <td>
                        <?php if (isset($query->title)) { ?>
                            <a href="<?php echo htmlspecialchars($query->title, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($query->title, ENT_QUOTES, 'UTF-8'); ?></a>
                        <?php } ?>
                    </td>                    
                    <td><?php if (isset($query->price)) echo htmlspecialchars($query->price, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($query->beds)) echo htmlspecialchars($query->beds, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($query->baths)) echo htmlspecialchars($query->baths, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($query->zipcode)) echo htmlspecialchars($query->zipcode, ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>