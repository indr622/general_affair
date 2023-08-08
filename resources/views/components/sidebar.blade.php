 <div class="sidebar sidebar-dark bg-white sidebar-fixed" id="sidebar">
     <div class="c-sidebar-brand d-md-down-none">
         <div>
             <h4 class="text-center my-3 text-black">{{ config('app.name') }}</h4>
         </div>
     </div>
     <ul class="sidebar-nav bg-warning" data-coreui="navigation" data-simplebar="">
         <li class="nav-item">
             <a class="nav-link text-black" href="{{ route('home') }}">
                 <svg class="nav-icon text-black">
                     <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
                 </svg> Dashboard
             </a>
         </li>
         @role('ADMIN-HCM')
             <li class="nav-title text-black">ADMIN</li>

             <li class="nav-item">
                 <a class="nav-link text-black" href="{{ route('users.index') }}">
                     <svg class="nav-icon text-black">
                         <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-drop"></use>
                     </svg> Admin HCGA</a>
             </li>
         @endrole

         <li class="nav-title text-black">EMPLOYEES</li>
         <li class="nav-group" aria-expanded="false">
             <a class="nav-link nav-group-toggle text-black" href="#">
                 <svg class="nav-icon text-black">
                     <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                 </svg> Master Data</a>
             <ul class="nav-group-items" style="height: 0px;">
                 <li class="nav-item">
                     <a class="nav-link text-black" href="base/accordion.html">
                         <span class="nav-icon text-black"></span>
                         Office Boy</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link text-black" href="base/breadcrumb.html"><span
                             class="nav-icon text-black"></span>
                         Security</a>
                 </li>

             </ul>
         </li>

     </ul>
 </div>
