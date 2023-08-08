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

         <li class="nav-title text-black">MASTER DATA</li>
         <li class="nav-item">
             <a class="nav-link text-black" href="{{ route('regions.index') }}">
                 <svg class="nav-icon text-black">
                     <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-drop"></use>
                 </svg> REGION</a>
         </li>
         <li class="nav-item">
             <a class="nav-link text-black" href="{{ route('branch.index') }}">
                 <svg class="nav-icon text-black">
                     <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-drop"></use>
                 </svg> BRANCH</a>
         </li>
         <li class="nav-item">
             <a class="nav-link text-black" href="{{ route('vendorss.index') }}">
                 <svg class="nav-icon text-black">
                     <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-drop"></use>
                 </svg> VENDOR</a>
         </li>

         <li class="nav-title text-black">EMPLOYEES</li>
         {{-- <li class="nav-item">
             <a class="nav-link text-black" href="{{ route('employee.index') }}">
                 <svg class="nav-icon text-black">
                     <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-drop"></use>
                 </svg> Biodata</a>
         </li>
         <li class="nav-item">
             <a class="nav-link text-black" href="{{ route('employee.index') }}">
                 <svg class="nav-icon text-black">
                     <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-drop"></use>
                 </svg> Payrol</a>
         </li> --}}
         <li class="nav-group show" aria-expanded="true"><a class="nav-link nav-group-toggle" href="#">
                 <svg class="nav-icon">
                     <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-cursor"></use>
                 </svg> Biodata</a>
             <ul class="nav-group-items" style="height: auto;">
                 <li class="nav-item"><a class="nav-link" href="buttons/buttons.html"><span class="nav-icon"></span>
                         OB</a></li>
                 <li class="nav-item"><a class="nav-link" href="buttons/button-group.html"><span
                             class="nav-icon"></span> Security</a></li>

             </ul>
         </li>

         <li class="nav-group show" aria-expanded="true"><a class="nav-link nav-group-toggle" href="#">
                 <svg class="nav-icon">
                     <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-cursor"></use>
                 </svg> Payroll</a>
             <ul class="nav-group-items" style="height: auto;">
                 <li class="nav-item"><a class="nav-link" href="buttons/buttons.html"><span class="nav-icon"></span>
                         OB</a></li>
                 <li class="nav-item"><a class="nav-link" href="buttons/button-group.html"><span
                             class="nav-icon"></span> Security</a></li>

             </ul>
         </li>

         <li class="nav-title text-black">REPORT</li>
         <li class="nav-item">
             <a class="nav-link text-black" href="{{ route('users.index') }}">
                 <svg class="nav-icon text-black">
                     <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-drop"></use>
                 </svg> REPORT</a>
         </li>


     </ul>
 </div>
