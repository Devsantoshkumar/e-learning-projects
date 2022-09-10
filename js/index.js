// navigation
let togglerBtn = document.querySelector(".ToggleNav");
let togglerNav = document.querySelector('.NavItems');


togglerBtn.addEventListener("click",function(){
    togglerNav.classList.toggle("OpenNav");
})

window.onclick = function(event){
    if(!event.target.matches('.ToggleNav') && !event.target.matches('.img') && !event.target.matches('.NavItems') && !event.target.matches('.CloseNave')){
        togglerNav.classList.remove("OpenNav");
     }

     if(!event.target.matches('.ToggleSide') && !event.target.matches('.sidebars') && !event.target.matches('.sideclose') && !event.target.matches('.SidebarCategory')){
        LeftSidebar.classList.remove("sidebarShow");
        image1.classList.remove("sidebars");
        image2.classList.remove("sideclose");
     }
}

// sidebar 
let ToggleSide = document.querySelector(".ToggleSide");
let LeftSidebar = document.querySelector(".LeftSidebar");
let image1 = document.querySelector(".image1");
let image2 = document.querySelector(".image2");

ToggleSide.addEventListener("click",function(){
    LeftSidebar.classList.toggle("sidebarShow");
    image1.classList.toggle("sidebars");
    image2.classList.toggle("sideclose");
})

