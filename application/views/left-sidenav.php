<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

$menus = $this->navigation_rights->navigation_array($this->session->balance_session['user_type']);
 


?>
<style type="text/css">
    /* The side navigation menu */
.left-sidenav {
    height: 100%; /* 100% Full-height */
    width: 0; /* 0 width - change this with JavaScript */
    position: fixed; /* Stay in place */
    z-index: 1; /* Stay on top */
    top: 0;
    left: 0;
    background-color: #FFF; /* Black*/
    overflow-x: hidden; /* Disable horizontal scroll */
    padding-top: 60px; /* Place content 60px from the top */
    transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
}

/* The navigation menu links */
.left-sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    font-size: large;
    transition: 0.3s
}

/* When you mouse over the navigation links, change their color */
.left-sidenav a:hover, .offcanvas a:focus{
    color: #000;
    background: #ccc;
}

/* Position and style the close button (top right corner) */
.left-sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
#main {
    transition: margin-left .5s;
    padding: 20px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}
</style>
<script type="text/javascript">
   $(document).ready(function() {	
    
    
      $('.nav-link').click(function(){
   $(this).attr('id','dropdown04')
    
 });
 
 
    $('body').on('click', function(e){
        
         if (e.target.id == "mySidenav") { 
          
        } else { 
         if( (parseInt( $('#mySidenav').css('width') ) > 0) && e.target.id != "dropdown04" ){
closeNav();

}
        }



});

});
$(".Rmask").click(function() {
  document.getElementById("mySidenav").style.width = "0px";
    document.body.style.backgroundColor = "white";
    $(".Rmask").fadeOut();
})

      // script for side nav :start
 
 function openNav() {
    document.getElementById("mySidenav").style.width = "300px";
    $(".Rmask").fadeIn();
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0px";
    document.body.style.backgroundColor = "white";
    $(".Rmask").fadeOut();
}
</script>
<div id="mySidenav" class="left-sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <ul class="nav flex-column padding_top_4percent">
    <?php 
            if( count($menus['menu']) > 0 )
            {
                foreach($menus['menu'] as $menu_category)
                {
            ?>        
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" style="color:black" data-toggle="collapse" data-target="#num<?php echo $menu_category['id']; ?>" aria-expanded="false" aria-controls="<?php echo $menu_category['menu_name']; ?>">
                              <?php 
                                    echo $menu_category['menu_name'];  
                                    if( array_key_exists($menu_category['id'], $menus['sub_menus']) && ( count($menus['sub_menus'][$menu_category['id']]) > 0 )  )
                                      { 
                                ?>
                                          <i class="fa fa-caret-down"></i>
                                <?php } ?> 
                        </a>
                            
                                <?php
                                    if(array_key_exists($menu_category['id'], $menus['sub_menus']) && ( count($menus['sub_menus'][$menu_category['id']]) > 0 ))
                                    {
                                ?>
                                        <div class="collapse mystyle" id="num<?php echo $menu_category['id']; ?>" aria-labelledby="" >    
                                <?php
                                         foreach($menus['sub_menus'][$menu_category['id']] as $sub_menus) 
                                         {
                                    ?>
                                            <a class="dropdown-item" target="_blank" href="<?php echo ( $sub_menus['submenu_pagename'] != '') ? base_url($sub_menus['submenu_pagename']) : 'javascript:void(0)'; ?>" title="<?php echo ucfirst($sub_menus['submenu_name']); ?>">
                                                <?php echo ucfirst($sub_menus['submenu_name']); ?> 
                                            </a>

                                    <?php } ?>
                                        </div>
                        <?php       }   ?>
						
						
						
                    </li>
      
      
            <?php        
                }
            }
                                
                                
                                
$i=1;
					foreach($get_menu as $mm){
						$get_sub_menu=$ci->header_model->sub_menu_rights_by_id($sub_menu_id,$mm['id']);
                                                
                                               
					?>
				 <li class="nav-item dropdown">
          <a href="#" class="nav-link" style="color:black" data-toggle="collapse" data-target="#num<?php echo $i; ?>" aria-expanded="false" aria-controls="<?php echo $mm['menu_name']; ?>"><?php echo $mm['menu_name'];  if($get_sub_menu){ ?><i class="fa fa-caret-down"><?php } ?></i></a>
          <div class="collapse mystyle" id="num<?php echo $i; ?>" aria-labelledby="" >
              <?php
						
						if($get_sub_menu){
                                                     foreach($get_sub_menu as $sm) {
						?>
          
               <a class="dropdown-item" target="_blank" href="<?php echo $sm['submenu_pagename']!=''?base_url($sm['submenu_pagename']):'javascript:void(0)'; ?>" title="<?php echo ucfirst($sm['submenu_name']); ?>"><?php echo ucfirst($sm['submenu_name']); ?></a>
               
                   <?php }?>
         </div>
          <?php }?>
						
						
						
				</li>
                                
				<?php $i++; }?>
				</ul>
</div>

<!-- Use any element to open the sidenav -->


<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->

