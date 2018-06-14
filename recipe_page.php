<?php require_once "includes/db.php";

//  Calling main recipe database

    $table = "recipes_main";
    $query = "SELECT * FROM $table WHERE recipe_id =". $_GET["id"];
    $result = mysqli_query($connection, $query);

if (!$result) {
        
        die("Database query failed");
}

    while($row = mysqli_fetch_assoc($result)) {
        
        $recipe_title = $row['recipe_title'];
        $recipe_desc = $row['recipe_desc'];
        $img_folder = $row['img_folder'];
        $recipe_thumb = $row['recipe_thumb'];
        $ing_img = $row['ingredients_img'];
        
    }
    mysqli_free_result($result);

//  Calling ingredient database

    $table = "recipes_ingredients";
    $query = "SELECT * FROM $table WHERE recipe_id =". $_GET["id"];


    $result = mysqli_query($connection, $query);
    $my_array = [];

    while($row = mysqli_fetch_assoc($result)) {
        
        $ing_text = $row['ingredient_text'];
        array_push($my_array, $ing_text);
    }
    mysqli_free_result($result);
    
//  Calling recipe steps database

    $table = "recipe_steps";
    $query = "SELECT * FROM $table WHERE recipe_id =". $_GET["id"];


    $result = mysqli_query($connection, $query);
    $text_array = [];
    $title_array = [];
    $img_array = [];

    while($row = mysqli_fetch_assoc($result)) {
        
        $recipe_step = $row['step_text'];
        $step_title = $row['step_title'];
        $step_img = $row['step_img'];
        array_push($text_array, $recipe_step);
        array_push($title_array, $step_title);
    }
    mysqli_free_result($result);
    

?>
    
<!DOCTYPE html>
<html>
<head>
    <title>Snap Pea | Recipe</title>
    <?php include "includes/_head_info.php"; ?>
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
      
       <div class="top_section">
        <div class="right_cont">
           
            <h2><?php echo $recipe_title; ?></h2>
            
           <p><?php echo $recipe_desc; ?></p>
           
           <h4>You Will Need:</h4>
        
           
            <ul>
               <?php foreach($my_array as $item) {
                 echo "<li> $item </li>";
                 } ?>
            </ul>
            
        </div>
        
        
        
        <div class="left_cont">
        <img id="main_dish" src="assets/images/<?php echo $img_folder; ?>/<?php echo $recipe_thumb; ?>.jpg">
        <img src="assets/images/<?php echo $img_folder; ?>/<?php echo $ing_img; ?>.png">
        </div>
        
        
        <div class="left_cont">
            <?php foreach($img_array as $item) {
                echo "<img 'src=assets/images/".$img_folder."/".$item.".jpg'>";
//                  echo "<img 'src=assets/images/steps/" . $item . ".jpg'>";
            } ?>
        </div>
        
    </div>
    
    
<div id="directions">
    <h4>Directions:</h4>
        <ul>
        <?php foreach($text_array as $item) {
            echo "<li> $item </li></br>";
            } ?>
            
        </ul>
       </div>
</div>
    </div>
    
</body>
</html>


<?php mysqli_close($connection); ?>