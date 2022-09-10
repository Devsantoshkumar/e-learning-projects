<?php 
 require_once("header.inc.php");
?>

<div class="wrapper">
    <div class="MainContent">

   <?php require_once("left-sidebar.inc.php"); ?>

    

        <?php 
            if(isset($_GET['s'])){
              $searchTerm = validate_data($conn,$_GET['s']);
        
        ?>
        <section class="ContentSection">
            <h1 class="TopicHeading">Search term: <?php echo $searchTerm; ?></h1>
            <article class="content">
            <?php 
               if(!empty($searchTerm)){
                  displayProject($conn,$searchTerm);
               }else{
                  header("location:$baseUrl/");
                  die();
               }
            ?>
            </article>
        </section>
    <?php } ?>

    </div>


    <?php require_once("right-sidebar.inc.php"); ?>

    
    <?php require_once("footer.inc.php"); ?>