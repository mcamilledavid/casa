<html>
<body>

    <div class="container-fluid" id="main">
        
        <h2>Listings</h2>
        <table border="2">
            <tr>
                <th>Title</th>
                <th>Created</th>
                <th>Street</th>
                <th>City</th>
                <th>State</th>
                <th>Rent</th>
                <th>Deposit</th>
                <th>Description</th>
                <th>Distance from campus</th>
            </tr>
 
        <?php foreach ($results as $query) { ?>
            <tbody>
                <tr>
                    <td>
                        <?php if (isset($query->title)) { ?>
                            <a href="<?php echo htmlspecialchars($query->title, ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlspecialchars($query->title, ENT_QUOTES, 'UTF-8'); ?></a>
                         <?php } ?>
                    </td> 
                    <td><?php if (isset($query->date_created)) echo htmlspecialchars($query->date_created, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($query->street)) echo htmlspecialchars($query->street, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($query->city)) echo htmlspecialchars($query->city, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($query->state)) echo htmlspecialchars($query->state, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($query->rent)) echo htmlspecialchars($query->rent, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($query->deposit)) echo htmlspecialchars($query->deposit, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($query->description)) echo htmlspecialchars($query->description, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($query->dist_from_campus)) echo htmlspecialchars($query->dist_from_campus, ENT_QUOTES, 'UTF-8'); ?></td>
                </tr>
            <?php } ?> 
        </tbody>  
    </table>
   </div>
</body>
</html>
            