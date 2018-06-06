
<?php require_once "includes/db.php";


    $table = "recipes_main";
    $query = "SELECT * FROM $table";
    $result = mysqli_query($connection, $query);

if (!$result) {
        
        die("Database query failed");
}
    
?>
<!DOCTYPE html>
<html>     
<head>
    <title>Snap Pea | Search Results</title>
    <meta charset="utf-8">
	<link rel="shortcut icon" type="image/png" href="/favicon.png"/>
	<!-- whatever the width of device, content matches it -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSS -->
	<link rel="stylesheet" href="normalize.css">
	<link rel=icon href=img/favi.png>
	<link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
   <div id="top">
        <div id="snap_pea">
                <object data="img/snap_pea.svg" type="image/svg+xml">
                <img src="img/rose.png" alt="rose">
            </object>
        
        </div>
        <?php include "includes/_header.php"; ?>
    </div>
    
    <h3>Results Found:</h3>
      
          <?php
              if (isset($_POST['submit_search'])){
                
                $searchq = mysqli_real_escape_string($connection, $_POST['user_input']);
                $sql = "SELECT * FROM recipes_main WHERE recipe_title LIKE '%$searchq%' OR recipe_desc LIKE '%$searchq%'";
                $result = mysqli_query($connection, $sql);
                $query_result = mysqli_num_rows($result);
                
                if ($query_result > 0) {
                    
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        
                        <div class="search_item">
                            <h4><a href="recipe_page.php?id=<?php echo $row['recipe_id'];?>"><?php echo $row['recipe_title']; ?></a></h4>
                            <p><?php echo $row['recipe_desc']; ?></p>
                        </div>
                       
    
                   <?php }
                    
                    
                }else { ?>
                    
                    <div class="search_none">
                    <p>There are no results matching your search.</p>
                    </div>
                    
               <?php }
                
                
            } 
        ?>
</body>
</html>

<?php mysqli_close($connection); ?>