
<nav class="navbar-admin navbar-static-side" role="navigation">
    <div class="sidebar-collapse">

      <ul side-navigation="" class="nav metismenu" id="side-menu">
      <li class="nav-header" style="padding: 20px;">
        <div class="profile-element">
          <img height="60" width="100%" src="{{url('img/logo.svg')}}" alt="P3" title="P3">
        </div>
        <div class="logo-element">
          SS
        </div>
      </li>

      <li >
        <a href="{{url('home')}}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span> </a>
      </li>


      <li class="{{((isset($link) && ($link=='project'|| $link=='customer'|| $link=='assign_fte' || $link=='fixed_cost_management'))?'active':'')}}"  >
        <a href=""><i class="fa fa-file-pdf-o"></i> <span class="nav-label">Project</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse" ng-class="{in: m.reports}" aria-expanded="true">
           <li ><a  href="{{url('customer')}}">Customer Setup</a></li>
        
          <li  ><a href="{{url('project')}}">Project Setup</a></li>
          <li ><a  href="{{url('project_fte')}}">Assign project FTE</a></li>
          <li ><a  href="{{url('fixed_cost')}}">Fixed Cost management</a></li>
        </ul>
      </li>

      <li ng-class="{active: m.reports}" >
        <a href=""><i class="fa fa-file-pdf-o"></i> <span class="nav-label">Reports</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse" ng-class="{in: m.reports}" aria-expanded="true">
          <li  ><a href="#">Monthly PM report</a></li>
          <li ><a  href="#">Bench Employee</a></li>
          <li ><a  href="#">Department – Plan vs Forecast</a></li>
          <li ><a  href="#">Department - PFO Plan vs forecast</a></li>
          <li ><a  href="#">Project- Plan vs forecast</a></li>
          <li ><a  href="#">Project – PFO vs fore cast</a></li>
        </ul>
      </li>

      <li  class="{{((isset($link) && ($link=='currency'|| $link=='department'|| $link=='employee'))?'active':'')}}" >
        <a href=""><i class="fa fa-file-pdf-o"></i> <span class="nav-label">Finance</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse" ng-class="{in: m.reports}" aria-expanded="true">
          <li  class="{{((isset($link) && $link=='currency')?'active':'')}}"><a href="{{url('currency')}}">Conversion rate</a></li>
          <li class="{{((isset($link) && $link=='department')?'active':'')}}"><a  href="{{url('department')}}">Department setup</a></li>
          <li class="{{((isset($link) && $link=='currency')?'active':'')}}"><a  href="{{url('report_date')}}">Set report Date</a></li>
          <li class="{{((isset($link) && $link=='employee')?'active':'')}}"><a  href="{{url('employee')}}">Employee setup</a></li>
          <li  class="{{((isset($link) && $link=='employee-hierarchy')?'active':'')}}"><a href="{{url('employee-hierarchy')}}">Employee Hierarchy</a></li>
          
        </ul>
      </li>

      <li class="{{((isset($link) && ($link=='role'|| $link=='user'))?'active':'')}}" >
        <a href=""><i class="fa fa-file-pdf-o"></i> <span class="nav-label">Administration</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse" ng-class="{in: m.reports}" aria-expanded="true">
         		  <li  class="{{((isset($link) && $link=='user')?'active':'')}}">><a href="{{url('user')}}">Users</a></li>
                  <li  class="{{((isset($link) && $link=='role')?'active':'')}}"><a href="{{url('roles')}}">Role</a></li>
         </ul>
      </li>

    </ul>



    </div>
</nav>
