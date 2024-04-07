<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">
<div class="overlay"></div>
<div class="cs-overlay"></div>
<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">
  <div id="dismiss" class="d-lg-none"><i class="flaticon-cancel-12"></i></div>
  <nav id="sidebar">
    <ul class="navbar-nav theme-brand flex-row  d-none d-lg-flex">
      <li class="nav-item ">
        <a href="#" >
        <img src="<?php echo base_url(); ?>/theme/assets/img/logo1.png" class="img-fluid" alt="logo" width="140px" style="margin-left:46px">
        </a>
        
      </li>
    </ul>
    <ul class="list-unstyled menu-categories" id="accordionExample">
      <li class="menu">
        <a href="<?php echo base_url(); ?>/sl/dashboard"  class="dropdown-toggle">
          <div class="">
            <i class="flaticon-computer-6 ml-3"></i>
            <span>Dashboard</span>
          </div>
          <div>
            <span class="badge badge-pill badge-secondary mr-2"></span>
          </div>
        </a>
      </li>

      
      <li class="menu">
        <a href="#product" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
          <div class="">
            <i class="flaticon-drugs"></i>
            <span>Product</span>
          </div>
          <div>
            <i class="flaticon-right-arrow"></i>
          </div>
        </a>
        <ul class="collapse submenu list-unstyled" id="product" data-parent="#accordionExample">
          <li>
            <a href="<?php echo base_url(); ?>/product/add"> Add Product </a>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>/product/list"> List Product </a>
          </li>
        
         
        </ul>
      </li>
     <!--  <li class="menu">
        <a href="#aproduct" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
          <div class="">
            <i class="fab fa-product-hunt"></i>
            <span>Approved / Rejected Product</span>
          </div>
          <div>
            <i class="flaticon-right-arrow"></i>
          </div>
        </a>
        <ul class="collapse submenu list-unstyled" id="aproduct" data-parent="#accordionExample">
          <li >
            <a href="<?php echo base_url(); ?>/product/list"> Approved Product </a>
          </li>
          <li >
            <a href="<?php echo base_url(); ?>/product/list"> Rejected Product </a>
          </li>
        
         
        </ul>
      </li> -->

        
      <li class="menu">
        <a href="#New" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
          <div class="">
            <i class="fas fa-newspaper"></i>
            <span>News Center</span>
          </div>
          <div>
            <i class="flaticon-right-arrow"></i>
          </div>
        </a>
        <ul class="collapse submenu list-unstyled" id="New" data-parent="#accordionExample">
          
          <li>
            <a href="<?php echo base_url(); ?>/innovaction/add"> Add Innovation </a>
          </li>
           <li>
            <a href="<?php echo base_url(); ?>/innovaction/list"> List Innovation </a>
          </li>
        </ul>
      </li>
      
    <li class="menu">
        <a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
          <div class="">
            <i class="flaticon-user-8"></i>
            <span>Profile</span>
          </div>
          <div>
            <i class="flaticon-right-arrow"></i>
          </div>
        </a>
        <ul class="collapse submenu list-unstyled" id="profile" data-parent="#accordionExample">
          <li>
            <a href="<?php echo base_url(); ?>/sl/upload"> Update Logo </a>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>/sl/profile"> Update Profile </a>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>/sl/chgpass"> Change Password </a>
          </li>
          

        </ul>
      </li>
       <!--<li class="menu">
        <a href="#gallery" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
          <div class="">
            <i class="fa fa-image" aria-hidden="true"></i>
            <span>Gallery</span>
          </div>
          <div>
            <i class="flaticon-right-arrow"></i>
          </div>
        </a>
        <ul class="collapse submenu list-unstyled" id="gallery" data-parent="#accordionExample">
          
          <li>
            <a href="<?php echo base_url(); ?>/sl/gallery/add"> Add Gallery </a>
          </li>
          <li>
            <a href="<?php echo base_url(); ?>/sl/gallery/list"> List Gallery </a>
          </li>
          

        </ul>
      </li>-->
      <li class="menu ">
       <a href="<?php echo base_url(); ?>/sl/gallery/add"  class="dropdown-toggle">
          <div class="">
            <i class="fa fa-image" aria-hidden="true"></i>
            <span>Gallery</span>
          </div>
        
        </a>
        
      </li>
      <li class="menu ">
       <a href="<?php echo base_url(); ?>/sl/catalog/add"  class="dropdown-toggle">
          <div class="">
            <i class="fa fa-file" aria-hidden="true"></i>
            <span>Catalog</span>
          </div>
        
        </a>
        
      </li>
      


     
      <li class="menu">
        <a href="<?php echo base_url(); ?>/sl/logout"  class="dropdown-toggle">
          <div class="">
            <i class="mr-1 flaticon-power-button"></i>
            <span>Log Out</span>
          </div>
        </a>
      </li>
    </ul>
  </nav>
</div>
<!--  END SIDEBAR  -->