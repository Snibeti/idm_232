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
            <h2>Recipe Name</h2>
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque voluptas, obcaecati vero animi molestiae iure et, nobis corporis ullam pariatur quas rem praesentium maxime. Sunt quis, omnis quia! Qui labore distinctio quasi sint vitae odit fuga dolor quaerat iusto optio!</p>
           <h4>You Will Need:</h4>
            <ul>
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, deleniti!</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut iste, soluta labore consectetur provident debitis quo quas est neque fugit.</li>
                <li>Lorem ipsum dolor sit amet.</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae, illum.</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam quos, molestias obcaecati.</li>
                <li>Lorem ipsum dolor.</li>
                <li>Lorem ipsum dolor sit amet, consectetur.</li>
                <li>Lorem.</li>
                <li>Lorem ipsum dolor sit amet.</li>
            </ul>
            <h4>Prep:</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto, consequuntur fugit id consectetur eum veniam nulla voluptatum nisi? </p><p>Fuga ducimus rem cupiditate vel quia, porro quam autem, quis, eos repudiandae, dignissimos provident? Labore minus dolore tenetur autem, atque sapiente magni.</p>
        </div>
        
        <div class="left_cont">
        <img src="img/burger.png" alt="placeholder">
        </div>
        
        <div class="left_cont">
        <img src="img/noodle.png" alt="placeholder">
        </div>
        
        <div class="right_cont">
        <h4>Directions:</h4>
        
        <ul>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam sint voluptas vel eos, totam necessitatibus quas enim corporis quasi velit magnam in ipsam a inventore quia adipisci, qui esse cumque minima blanditiis mollitia ducimus beatae. Similique, autem, accusantium explicabo dolorem dolore, praesentium cupiditate voluptatem eaque rem nemo dignissimos, fugiat dicta.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum sapiente, assumenda nisi placeat minus aliquam quia consequuntur, cupiditate maiores! Impedit.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis at qui, molestias hic reiciendis aliquam maiores nihil, facere accusantium ipsam unde optio deserunt commodi. Eveniet sequi sunt reiciendis corrupti temporibus assumenda repudiandae numquam impedit optio.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum dolorem, dicta voluptatibus, voluptates quos officiis.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias nulla doloribus, facilis! Tempora maiores earum aperiam voluptates, dignissimos reiciendis molestias odio nemo dolore, eligendi iusto sit rem reprehenderit porro. Officiis.</li>
        </ul>
        <h4>Tags:</h4>
        </div>
    </div>
</div>
    
</body>
</html>


<?php mysqli_close($connection); ?>