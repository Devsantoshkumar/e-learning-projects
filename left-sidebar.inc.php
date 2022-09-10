
        <aside class="LeftSidebar">
        <span class="SidebarCategory">Project Category</span>
        <ul>
            <?php 

            if(isset($_GET['menuId'])){
                $menuId = validate_data($conn,$_GET['menuId']);
                if(isset($_GET['cateId'])){
                    $cateId = validate_data($conn,$_GET['cateId']);
                    $select = select($conn,"categories","","","","","category_menu","'$menuId'","","");
                    if(mysqli_num_rows($select)>0){
                        while($rows = mysqli_fetch_assoc($select)){
                            if($rows['category_slug'] == $cateId){
                                $bgClass = "background-color: #001E6C !important; color: white;";
                            }else{
                                $bgClass = "";
                            }
                            echo '<li><a href="'.$rows['category_menu'].'/'.$rows['category_slug'].'" style="'.$bgClass.'">'.$rows['category_name'].'</a></li>';
                        }
                    }else{
                           echo "<li><a href='javascript:void(0)'>Category not found</a></li>";
                    }
                }else{
                    $select = select($conn,"categories","","","","","category_menu","'$menuId'","","");
                    if(mysqli_num_rows($select)>0){
                        while($rows = mysqli_fetch_assoc($select)){
                            echo '<li><a href="'.$rows['category_menu'].'/'.$rows['category_slug'].'">'.$rows['category_name'].'</a></li>';
                        }
                    }else{
                           echo "<li><a href='javascript:void(0)'>Category not found</a></li>";
                    }
                }
            }else{
                $select = select($conn,"categories","","","","","","","","");
                if(mysqli_num_rows($select)>0){
                    while($rows = mysqli_fetch_assoc($select)){
                        echo '<li><a href="'.$rows['category_menu'].'/'.$rows['category_slug'].'">'.$rows['category_name'].'</a></li>';
                    }
                }else{
                       echo "<li><a href='javascript:void(0)'>Category not found</a></li>";
                }
            }
            ?>
        </ul>
    </aside>
