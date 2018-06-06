<?php require_once "includes/db.php";


    $table = "recipes_main";
    $query = "SELECT * FROM $table WHERE recipe_id =". $_GET["id"];
    $result = mysqli_query($connection, $query);

if (!$result) {
        
        die("Database query failed");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Snap Pea | Recipe</title>
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
   <div id="grid-container">
    <div id="top">
        <div id="snap_pea">
                <object data="img/snap_pea.svg" type="image/svg+xml">
                <img src="img/rose.png" alt="rose">
            </object>
        
        </div>
        
        <?php include "includes/_header.php"; ?>
        
    </div>
    <div id="main_container">
      
       
        <div class="right_cont">
          
         <?php
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
           
            <h2><?php echo $row['recipe_title']; ?></h2>
            
           <p><?php echo $row['recipe_desc']; ?></p>
           
           <?php
                
            }
            mysqli_free_result($result);
        ?>
           <h4>You Will Need:</h4>
           
           <?php require_once "includes/db.php";


                $table = "recipes_ingredients";
                $query = "SELECT * FROM $table WHERE recipe_id =". $_GET["id"];
                $result = mysqli_query($connection, $query);

                    if (!$result) {

                            die("Database query failed");
                    }

            ?>
           
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <ul>
                <li><?php echo $row['ingredient_text']; ?></li>
            </ul>
             <?php
                
            }
            mysqli_free_result($result);
        ?>
        </div>
        
        
        
        
        <div class="left_cont">
        <img src="assets/images/<?php echo $row['img_folder']; ?>/<?php echo $row['ingredients_img']; ?>.png">
        </div>
        
        
        <div class="left_cont">
        <img src="img/noodle.png" alt="placeholder">
        </div>
        
        <div class="right_cont">
        <h4>Directions:</h4>
        
        <?php require_once "includes/db.php";


                $table = "recipe_steps";
                $query = "SELECT * FROM $table WHERE recipe_id =". $_GET["id"];
                $result = mysqli_query($connection, $query);

                    if (!$result) {

                            die("Database query failed");
                    }

        ?>
            
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
        
            <h5><?php echo $row['step_title']; ?></h5>
        <ul>
            <li>
                <?php echo $row['step_text']; ?>
            </li>
        </ul>
        
        <?php
                
            }
            mysqli_free_result($result);
        ?>
        </div>
    </div>
</div>
    
</body>
</html>


<?php mysqli_close($connection); ?>