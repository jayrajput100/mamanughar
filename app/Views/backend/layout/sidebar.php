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
    <?php
          $uri = service('uri');
          $segment1 = $uri->getSegment(1);
          $segment2 = $uri->getSegment(2);
          $combine_segment =$segment1.'/'.$segment2;
          ?> 
    <ul class="list-unstyled menu-categories" id="accordionExample">
      <li class="menu <?php echo ($segment1 =="dashboard")?'active':'' ?>" >
        <a href="<?php echo base_url(); ?>/dashboard"  class="dropdown-toggle">
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
        <a href="#master" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle ">
          <div class="">
            <i class="flaticon-earth-globe"></i>
            <span>Master</span>
          </div>
          <div>
            <i class="flaticon-right-arrow"></i>
          </div>
        </a>
        <ul class="collapse submenu list-unstyled <?php echo ($segment1 =="country" || $segment1 =="state" || $segment1 =="city")?'collapse show':'' ?>" id="master" data-parent="#accordionExample">
          <li <?php echo ($combine_segment=="country/add")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/country/add"> Add Country </a>
          </li>
          <li <?php echo ($combine_segment=="country/list")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/country/list"> List Country </a>
          </li>
          <li <?php echo ($combine_segment=="state/add")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/state/add"> Add State </a>
          </li>
          <li <?php echo ($combine_segment=="state/list")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/state/list"> List State </a>
          </li>
          <li <?php echo ($combine_segment=="city/add")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/city/add"> Add City </a>
          </li>
          <li <?php echo ($combine_segment=="city/list")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/city/list"> List City </a>
          </li>
        </ul>
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
        <ul class="collapse submenu list-unstyled <?php echo ($segment1 =="category" || $segment1 =="subcategory" || $segment1 =="third_subcategory")?'collapse show':'' ?>" id="product" data-parent="#accordionExample">
          <li <?php echo ($combine_segment=="category/add")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/category/add"> Add Category </a>
          </li>
          <li <?php echo ($combine_segment=="category/list")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/category/list"> List Category </a>
          </li>
          <li <?php echo ($combine_segment=="subcategory/add")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/subcategory/add"> Add Subcategory </a>
          </li>
          <li <?php echo ($combine_segment=="subcategory/list")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/subcategory/list"> List Subcategory </a>
          </li>
          <li <?php echo ($combine_segment=="third_subcategory/add")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/third_subcategory/add"> Add Third Subcategory </a>
          </li>
          <li <?php echo ($combine_segment=="third_subcategory/list")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/third_subcategory/list"> List Third Subcategory </a>
          </li>
          <li <?php echo ($combine_segment=="admin/listproduct")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/admin/listproduct"> List Product </a>
          </li>
         
        </ul>
      </li>
      <li class="menu">
        <a href="#Supplier" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
          <div class="">
            <i class="flaticon-user-8"></i>
            <span>Supplier</span>
          </div>
          <div>
            <i class="flaticon-right-arrow"></i>
          </div>
        </a>
        <ul class="collapse submenu list-unstyled <?php echo ($segment1 =="supplier")?'collapse show':'' ?>" id="Supplier" data-parent="#accordionExample">
          <li <?php echo ($combine_segment=="supplier/add")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/supplier/add"> Add Supplier </a>
          </li>
          <li <?php echo ($combine_segment=="supplier/list")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/supplier/list"> List Supplier </a>
          </li>
        </ul>
      </li>
      <li class="menu">
        <a href="#Faq" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
          <div class="">
            <i class="fab fa-rocketchat"></i>
            <span>Faq</span>
          </div>
          <div>
            <i class="flaticon-right-arrow"></i>
          </div>
        </a>
        <ul class="collapse submenu list-unstyled <?php echo ($segment1 =="faq")?'collapse show':'' ?>" id="Faq" data-parent="#accordionExample">
          <li <?php echo ($combine_segment=="faq/add")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/faq/add"> Add Faq </a>
          </li>
          <li <?php echo ($combine_segment=="faq/list")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/faq/list"> List Faq </a>
          </li>
        </ul>
      </li>
      <li class="menu">
        <a href="#Test" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
          <div class="">
            <i class="flaticon-notes-2"></i>
            <span>Test</span>
          </div>
          <div>
            <i class="flaticon-right-arrow"></i>
          </div>
        </a>
        <ul class="collapse submenu list-unstyled <?php echo ($segment1 =="test")?'collapse show':'' ?>" id="Test" data-parent="#accordionExample">
          <li <?php echo ($combine_segment=="test/add")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/test/add"> Add Test </a>
          </li>
          <li <?php echo ($combine_segment=="test/list")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/test/list"> List Test </a>
          </li>
        </ul>
      </li>
      <li class="menu">
        <a href="#New" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
          <div class="">
            <i class="flaticon-notes-5"></i>
            <span>News Center</span>
          </div>
          <div>
            <i class="flaticon-right-arrow"></i>
          </div>
        </a>
        <ul class="collapse submenu list-unstyled <?php echo ($segment1 =="exhibition" || $segment1 =="institute" || $segment1 =="innovaction")?'collapse show':'' ?>" id="New" data-parent="#accordionExample" >
           <li <?php echo ($combine_segment=="exhibition/add")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/exhibition/add"> Add Exhibition </a>
          </li>
           <li <?php echo ($combine_segment=="exhibition/list")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/exhibition/list"> List Exhibition </a>
          </li>
          <li <?php echo ($combine_segment=="institute/add")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/institute/add"> Add Institute </a>
          </li>
          <li <?php echo ($combine_segment=="institute/list")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/institute/list"> List Institute </a>
          </li>
          <li <?php echo ($combine_segment=="innovaction/add")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/innovaction/add"> Add Innovaction </a>
          </li>
          <li <?php echo ($combine_segment=="innovaction/list")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/innovaction/list"> List Innovaction </a>
          </li>
        </ul>
      </li>
      <li class="menu">
        <a href="#Advertisment" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
          <div class="">
            <i class="fab fa-adversal"></i>
            <span>Advertisment</span>
          </div>
          <div>
            <i class="flaticon-right-arrow"></i>
          </div>
        </a>
        <ul class="collapse submenu list-unstyled <?php echo ($segment1 =="advertisment")?'collapse show':'' ?>" id="Advertisment" data-parent="#accordionExample">
          <li <?php echo ($combine_segment=="advertisment/add")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/advertisment/add"> Add Advertisment</a>
          </li>
          <li <?php echo ($combine_segment=="advertisment/list")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/advertisment/list"> List Advertisment</a>
          </li>
        </ul>
      </li>
      <li class="menu">
        <a href="#User" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
          <div class="">
            <i class="flaticon-user-11"></i>
            <span>User</span>
          </div>
          <div>
            <i class="flaticon-right-arrow"></i>
          </div>
        </a>
        <ul class="collapse submenu list-unstyled <?php echo ($segment1 =="user")?'collapse show':'' ?>" id="User" data-parent="#accordionExample">
          <li <?php echo ($combine_segment=="user/add")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/user/add"> Add User </a>
          </li>
          <li <?php echo ($combine_segment=="user/list")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/user/list"> List User </a>
          </li>
          <li <?php echo ($combine_segment=="user/live")?'class="active"':'' ?>>
            <a href="<?php echo base_url(); ?>/user/live"> Live User Entry</a>
          </li>
        </ul>
      </li>
      <li class="menu">
        <a href="#" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
          <div class="">
            <i class="flaticon-print"></i>
            <span>Report</span>
          </div>
        </a>
      </li>
      <li class="menu">
        <a href="<?php echo base_url(); ?>/admin/logout"  class="dropdown-toggle">
          <div class="">
            <i class="flaticon-log"></i>
            <span>Log Out</span>
          </div>
        </a>
      </li>
    </ul>
  </nav>
</div>
<!--  END SIDEBAR  -->