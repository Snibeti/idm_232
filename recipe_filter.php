<?php require_once "includes/db.php";


    $table = "recipes_main";
    $query = "SELECT * FROM $table";
    $result = mysqli_query($connection, $query);

if (!$result) {
        
        die("Database query failed");
}

?>
<?php function char_limit($full_desc, $length)
{
  if(strlen($full_desc)<=$length)
  {
    echo $full_desc;
  }
  else
  {
    $part_desc=substr($full_desc,0,$length) . '...';
    echo $part_desc;
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Snap Pea</title>
	<?php include "includes/_head_info.php"; ?>
</head>

<body>
<div id="grid-container">
    <div id="top">
        <div id="snap_pea">
                <object data="img/snap_pea.svg" type="image/svg+xml">
            </object>
        
        </div>
    
        <?php include "includes/_header.php"; ?>
    </div>
    
    <h2>Recipes</h2>
          
          <form action="recipe_filter.php" id="filter_options" method="POST">
               <p>
                <input class="radio_inp" type="radio" name="filter" value ="1"/>Easy
                <input class="radio_inp" type="radio" name="filter" value ="2"/>Intermediate
                <input class="radio_inp" type="radio" name="filter" value ="3"/>Advanced
                <input  class="submit_difficulty" type="submit" name="formSubmit" value="Filter" />
               </p>
            </form>
           <div id="wrapper">
            
    
    <?php
        
            if(isset($_POST['filter'])){   
        
            $difficulty = $_POST['filter'];
                   
            $table = "recipes_main";
            $query = "SELECT * FROM $table WHERE $difficulty = difficulty_level";
            $result = mysqli_query($connection, $query);
                
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="item">
          <a href="recipe_page.php?id=<?php echo $row['recipe_id'];?>">
           <div class="item_img">
                <img src="assets/images/<?php echo $row['img_folder']; ?>/<?php echo $row['recipe_thumb']; ?>.jpg">
            </div>
            <div class="item_txt">
                <h3><a href="recipe_page.php?id=<?php echo $row['recipe_id'];?>"><?php echo $row['recipe_title']; ?></a></h3>
            <p><?php char_limit($row['recipe_desc'], 100); ?></p>
            </div>
            </a>
        </div>
	    <?php
                
            }
            mysqli_free_result($result);
            }
        ?>
         
    </div>                      
                    
               

<?php mysqli_close($connection); ?>