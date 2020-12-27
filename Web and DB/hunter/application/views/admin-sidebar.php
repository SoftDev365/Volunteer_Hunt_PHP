  
 <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">---PERSONAL</li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url(A);?>" aria-expanded="false">--- <span class="hide-menu">Dashboard</span></a></li>
                        </li>
                        <li><a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">--- <span class="hide-menu">Category</span></a>
                           <ul aria-expanded="false" class="collapse">
                                <li> <a href="<?php echo base_url(A.'/add-category');?>">Add Category</a> </li>
                                <li> <a href="<?php echo base_url(A.'/all-category');?>">Category List</a> </li>
                            </ul>
                        </li>

                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url(A.'/hunter-list');?>" aria-expanded="false">--- <span class="hide-menu">Hunters</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url(A.'/user-list');?>" aria-expanded="false">--- <span class="hide-menu">Volunteer</span></a></li>

                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url(A.'/event-list');?>" aria-expanded="false">--- <span class="hide-menu">Events</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url(A.'/research-list');?>" aria-expanded="false">--- <span class="hide-menu">Researches</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url(A.'/logout');?>" aria-expanded="false"><i class="fa fa-signout text-danger"></i><span class="hide-menu">Log Out</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
       