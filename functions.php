<?php 

// display project data
  function displayProjects($conn,$postSlug="",$postCol="",$offset="",$limit=""){

    $select = select($conn,"posts","","","","rand()",$postCol,$postSlug,$offset,$limit);

    if(mysqli_num_rows($select)>0){
        while($rows = mysqli_fetch_assoc($select)){
            echo '<div class="ProjCard">
                    <img src="'."images/". $rows['post_image'].'" class="projThumbnail" alt="'.$rows['post_img_alt'].'" title="'.$rows['post_img_title'].'">
                    <a href="'.$rows['post_menu'].'/'.$rows['post_cate'].'/'.$rows['post_slug'].'" class="cardHeading">'.$rows['post_title'].'</a>
                    <div class="cardFooter">';
                    if(!empty($rows['post_yt_link'])){
                        $url1 = $rows['post_yt_link'];
                    }else{
                        $url1 = 'javascript:void(0)';
                    }
                    if(!empty($rows['post_fb_link'])){
                        $url2 = $rows['post_fb_link'];
                    }else{
                        $url2 = 'javascript:void(0)';
                    }
                     if($rows['post_type'] == 1){
                         $projCost = "Paid";
                     }else{
                         $projCost = "Free";
                     }
                  echo '<a href="'.$rows['post_menu'].'/'.$rows['post_cate'].'/'.$rows['post_slug'].'" class="actionBtn" title="Download Project"><i class="fa fa-download"></i></a>
                        <a href="'.$url1.'" target="_blank" class="actionBtn" title="Watch on YouTube"><i class="fa fa-youtube-play"></i></a>
                        <a href="'.$url2.'" target="_blank" class="actionBtn" title="Watch on Facebook"><i class="fa fa-facebook"></i></a>
                        <a href="javascript:void(0)" class="actionBtn">'.$projCost.'</a>
                    </div>
                </div>';
        }
    }else{
        echo '<h1 class="notFound">Data not found</h1>';
    }

}


// send email to users

function emailsend($fname="",$emailOtp="",$EmailId=""){
      $EmailSubject = "Email verification";
      $EmailBody = "<div class='card'>
                          <div class='card-header'><h2>Hello $fname welcome to Quietude studio !</h2></div>
                          <div class='card-body'>
                          <h3>Note your 6 digit OTP (one time password)<h3>
                          <h2>$emailOtp</h2>
                          </div>
                      </div>";
      $EmailHeaders = [
                      "MINE-Version: 1.0",
                      "Content-type: text/html; charset=utf-8",
                      "From: quietudestudio@gmail.com"
                      ]; 
      $EmailHeaders = implode("\r\n",$EmailHeaders);
      $SendMail = mail($EmailId, $EmailSubject, $EmailBody, $EmailHeaders);
      return $SendMail;
}


// search query string function

function displayProject($conn,$searchTerm=""){

    $PostQuery = "SELECT * FROM posts WHERE post_title LIKE '%{$searchTerm}%' OR post_desc LIKE '%{$searchTerm}%' OR post_meta_title LIKE '%{$searchTerm}%'";

    $PostQueryRun = mysqli_query($conn,$PostQuery) or die("Post query failed");
    if(mysqli_num_rows($PostQueryRun)>0){
        while($rows = mysqli_fetch_assoc($PostQueryRun)){
            echo '<div class="ProjCard">
                    <img src="'."images/". $rows['post_image'].'" class="projThumbnail" alt="'.$rows['post_img_alt'].'" title="'.$rows['post_img_title'].'">
                    <a href="projects-details.php?menuId='.$rows['post_menu'].'&cateId='.$rows['post_cate'].'&postId='.$rows['post_slug'].'" class="cardHeading">'.$rows['post_title'].'</a>
                    <div class="cardFooter">
                        <a href="projects-details.php?menuId='.$rows['post_menu'].'&cateId='.$rows['post_cate'].'&postId='.$rows['post_slug'].'" class="actionBtn"><i class="fa fa-download"></i></a>
                        <a href="'.$rows['post_yt_link'].'" target="_blank" class="actionBtn"><i class="fa fa-youtube-play"></i></a>
                        <a href="'.$rows['post_fb_link'].'" target="_blank" class="actionBtn"><i class="fa fa-facebook"></i></a>
                        <a href="javascript:void(0)" class="actionBtn"><i class="fa fa-money"></i></a>
                    </div>
                </div>';
        }
    }else{
        echo "<div class='searchterm'>Data not found</div>";
    }
}



?>
