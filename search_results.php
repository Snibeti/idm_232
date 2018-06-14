
<?php require_once "includes/db.php";


//    $table = "recipes_main";
//    $query = "SELECT * FROM $table";
//    $result = mysqli_query($connection, $table);
    
?>
<!DOCTYPE html>
<html>     
<head>
    <title>Snap Pea | Search Results</title>
    <?php include "includes/_head_info.php"; ?>
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
    
    <div class="result">
    <h3>Results Found:</h3>
    </div>
     
     <div class="search_results">
      
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
        
    </div>
</body>
</html>

<?php mysqli_close($connection); ?>