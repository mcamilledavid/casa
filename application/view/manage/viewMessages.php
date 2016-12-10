<html>
<body>

    <div class="container-fluid" id="main">
        
        <h2>Messages</h2>
        <table border="2">
 
        <?php foreach ($query as $query) { ?>
            <tbody>
                <tr>
                    
                    <td><?php if (isset($query->message)) echo htmlspecialchars($query->message, ENT_QUOTES, 'UTF-8'); ?></td>
                    
                </tr>
            <?php } ?> 
        </tbody>  
    </table>
   </div>
</body>
</html>
            