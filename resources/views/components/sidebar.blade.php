 <div class="sidebar sidebar-dark bg-white sidebar-fixed" id="sidebar">
     <div class="c-sidebar-brand d-md-down-none">
         <div>
             <h4 class="text-center my-3 text-black">{{ config('app.name') }}</h4>
         </div>
     </div>
     <ul class="sidebar-nav bg-warning" data-coreui="navigation" data-simplebar="">
         <li class="nav-item">
             <a class="nav-link text-black" href="{{ route('home') }}">
                 <i class="nav-icon text-black fas fa-home">
                 </i> Dashboard
             </a>
         </li>
         @role('ADMIN-HCM')
             <li class="nav-title text-black">Admin</li>

             <li class="nav-item">
                 <a class="nav-link text-black" href="{{ route('users.index') }}">
                     <i class="nav-icon text-black fas fa-users">
                     </i> Admin HCGA</a>
             </li>
         @endrole

         <li class="nav-title text-black">Master Data</li>
         <li class="nav-item">
             <a class="nav-link text-black" href="{{ route('regions.index') }}">
                 <i class="nav-icon text-black fas fa-folder">
                 </i> Region</a>
         </li>
         <li class="nav-item">
             <a class="nav-link text-black" href="{{ route('branch.index') }}">
                 <i class="fas fa-file nav-icon text-black">
                 </i> Branch</a>
         </li>
         <li class="nav-item">
             <a class="nav-link text-black" href="{{ route('penyedia.index') }}">
                 <i class="nav-icon text-black fas fa-file">
                     <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-drop"></use>
                 </i> Vendor</a>
         </li>

         <li class="nav-title text-black">Employee</li>
         <li class="nav-group" aria-expanded="true"><a class="nav-link nav-group-toggle text-black" href="#">
                 <i class="nav-icon fas fa-address-book text-black">
                 </i> Biodata</a>
             <ul class="nav-group-items" style="height: auto;">
                 <li class="nav-item">
                     <a class="nav-link text-black" href="{{ route('bio.ob') }}"><span class="nav-icon"></span>
                         Office Boy</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link text-black" href="{{ route('bio.security') }}"><span class="nav-icon"></span>
                         Security</a>
                 </li>

             </ul>
         </li>

         <li class="nav-group" aria-expanded="true"><a class="nav-link nav-group-toggle text-black" href="#">
                 <i class="nav-icon fas fa-hand-holding-usd text-black"></i>

                 </i> Payroll</a>
             <ul class="nav-group-items" style="height: auto;">
                 <li class="nav-item">
                     <a class="nav-link text-black" href="{{ route('payroll.ob') }}"><span class="nav-icon"></span>
                         Office Boy</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link text-black" href="{{ route('payroll.security') }}"><span
                             class="nav-icon"></span>
                         Security</a>
                 </li>

             </ul>
         </li>

         <li class="nav-title text-black">Report</li>
         <li class="nav-item">
             <a class="nav-link text-black" href="{{ route('users.index') }}">
                 <i class="nav-icon text-black fas fa-print">
                 </i> Report</a>
         </li>

         <hr>
         <li class="nav-item">
             <a class="nav-link text-black" href="{{ route('logout') }}"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                 <i class="nav-icon text-black
                 fas fa-sign-in-alt">
                 </i> Logout</a>
         </li>


     </ul>
 </div>
