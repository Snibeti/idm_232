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
	<!-- META -->
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/png" href="/favicon.png"/>
	<!-- whatever the width of device, content matches it -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSS -->
	<link rel="stylesheet" href="normalize.css">
	<script src="jquery-3.3.1.min.js"></script>
	<link rel=icon href=img/favi.png>
	<link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    
	<!-- PAGE CONTENT -->
    <h2>Recipes</h2>
            <form id="filter">
               <p>
                <input type="radio" name="filter[]" value ="Easy"/>Easy
                <input type="radio" name="filter[]" value ="Intermediate"/>Intermediate
                <input type="radio" name="filter[]" value ="Advanced"/>Advanced
                <input  class="submit_difficulty" type="submit" name="formSubmit" value="Filter" />
               </p>
            </form>
	<div id="wrapper">
       <?php
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
        ?>
	 
    </div>
	<!-- JAVASCRIPT-->
	<script src="main.js"></script>
</body>

</html>


<?php mysqli_close($connection); ?>