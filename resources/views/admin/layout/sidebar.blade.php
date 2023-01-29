   <aside class="main-sidebar sidebar-dark-primary elevation-4">
       <!-- Sidebar -->
       <div class="sidebar">
           <!-- Sidebar user panel (optional) -->
           <div class="pb-3 mt-3 mb-3 user-panel d-flex">
               <div class="image">
                   {{-- <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                       alt="User Image"> --}}
               </div>
               <div class="info">
                   <a href="#" class="d-block">{{ auth()->user()->name ?? 'userName' }}</a>
               </div>
           </div>


           <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                   data-accordion="false">
                   <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                   <li class="nav-item menu-open">
                       <a href="/admin/dashboard" class="nav-link active">
                           <i class="nav-icon fas fa-tachometer-alt"></i>
                           <p>
                               Dashboard
                               <i class="right fas fa-angle-left"></i>
                           </p>
                       </a>

                   </li>
                   <li class="nav-item">
                       <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-copy"></i>
                           <p>
                               About Us
                               <i class="fas fa-angle-left right"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ route('aboutus.index') }}" class="nav-link">
                                   <p>About</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{ route('about-info.index') }}" class="nav-link">
                                   <p>About-info</p>
                               </a>
                           </li>
                       </ul>
                   </li>
                   <li class="nav-item">
                       <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-tree"></i>
                           <p>
                               Blogs
                               <i class="fas fa-angle-left right"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ route('blog-types.index') }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p>Blog Types</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{ route('blogs.index') }}" class="nav-link">
                                   <i class="far fa-circle nav-icon"></i>
                                   <p>Blogs</p>
                               </a>
                           </li>


                       </ul>
                   </li>
                   {{--




                   <li class="nav-item">
                       <a href="{{ route('faqs.index') }}" class="nav-link">
                           <i class="nav-icon fas fa-th"></i>
                           <p>
                               FAQs
                           </p>
                       </a>
                   </li> --}}
                   <li class="nav-item">
                       <a href="{{ route('pages.index') }}" class="nav-link">
                           <i class="nav-icon fas fa-th"></i>
                           <p>
                               Pages
                           </p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{ route('services.index') }}" class="nav-link">
                           <i class="nav-icon fas fa-copy"></i>
                           <p>
                               Services
                               {{-- <i class="fas fa-angle-left right"></i> --}}
                           </p>
                       </a>
                       {{-- <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ route('service-types.index') }}" class="nav-link">
                                   <p>|->Service Types</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{ route('services.index') }}" class="nav-link">
                                   <p>|->Services</p>
                               </a>
                           </li>
                       </ul> --}}
                   </li>
                   <li class="nav-item">
                       <a href="{{ route('banner.index') }}" class="nav-link">
                           <i class="nav-icon fas fa-th"></i>
                           <p>
                               Banners
                           </p>
                       </a>
                   </li>

                   <li class="nav-item">
                       <a href="{{ route('project-type.index') }}" class="nav-link">
                           <i class="nav-icon fas fa-th"></i>
                           <p>
                               Project Type
                           </p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{ route('project.index') }}" class="nav-link">
                           <i class="nav-icon fas fa-th"></i>
                           <p>
                               Projects
                           </p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{ route('testimonials.index') }}" class="nav-link">
                           <i class="nav-icon fas fa-th"></i>
                           <p>
                               Testimonials
                           </p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{ route('teams.index') }}" class="nav-link">
                           <i class="nav-icon fas fa-th"></i>
                           <p>
                               Teams
                           </p>
                       </a>
                   </li>
                   {{--
                       <li class="nav-item">
                       <a href="{{ route('clients.index') }}" class="nav-link">
                           <i class="nav-icon fas fa-th"></i>
                           <p>
                               Clients
                           </p>
                       </a>
                   </li>



                   <li class="nav-item">
                       <a href="{{ route('designForm') }}" class="nav-link">
                           <i class="nav-icon fas fa-th"></i>
                           <p>
                               Design Query Forms
                           </p>
                       </a>
                   </li>


                  --}}
                   <li class="nav-item">
                       <a href="{{ route('partners.index') }}" class="nav-link">
                           <i class="nav-icon fas fa-th"></i>
                           <p>
                               Partners
                           </p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{ route('stacks.index') }}" class="nav-link">
                           <i class="nav-icon fas fa-th"></i>
                           <p>
                               Stacks
                           </p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{ route('serviceQuery') }}" class="nav-link">
                           <i class="nav-icon fas fa-th"></i>
                           <p>
                               Quote Query Forms
                           </p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{ route('contactForm') }}" class="nav-link">
                           <i class="nav-icon fas fa-th"></i>
                           <p>
                               Contact Forms
                           </p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{ route('users') }}" class="nav-link">
                           <i class="nav-icon fas fa-th"></i>
                           <p>
                               Users
                           </p>
                       </a>
                   </li>
                   <li class="nav-header">Settings</li>

                   <li class="nav-item">
                       <form action="{{ route('logout') }}" method="POST">
                           @csrf
                           <button type="submit" class="btn btn-sm d-flex my-auto text-white">
                               <i class="nav-icon far fa-image"></i>
                               <p>
                                   Logout
                               </p>
                           </button>
                       </form>
                   </li>


               </ul>
           </nav>
           <!-- /.sidebar-menu -->
       </div>
       <!-- /.sidebar -->
   </aside>
