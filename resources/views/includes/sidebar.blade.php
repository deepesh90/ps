
<nav class="navbar-admin navbar-static-side" role="navigation">
    <div class="sidebar-collapse">

      <ul side-navigation="" class="nav metismenu" id="side-menu">
      <li class="nav-header" style="padding: 20px;">
        <div class="profile-element">
          <img height="60" width="100%" src="img/logo.svg" alt="P3" title="P3">
        </div>
        <div class="logo-element">
          SS
        </div>
      </li>

      <li class="active">
        <a href="dashboard.html"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span> </a>
      </li>


      <li ng-class="{active: m.reports}" >
        <a href=""><i class="fa fa-file-pdf-o"></i> <span class="nav-label">Project</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse" ng-class="{in: m.reports}" aria-expanded="true">
          <li  ><a href="project_setup.html">Project Setup</a></li>
          <li ><a  href="Customer_entry.html">Customer Setup</a></li>
          <li ><a  href="project_manage _fte.html">Assign project FTE</a></li>
          <li ><a  href="project_forecast.html">Fixed Cost management</a></li>
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

      <li ng-class="{active: m.reports}" >
        <a href=""><i class="fa fa-file-pdf-o"></i> <span class="nav-label">Finance</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse" ng-class="{in: m.reports}" aria-expanded="true">
          <li  ><a href="#">Conversion rate</a></li>
          <li ><a  href="#">Department setup</a></li>
          <li ><a  href="#">Set report Date</a></li>
          <li ><a  href="#">Employee setup</a></li>
        </ul>
      </li>

      <li ng-class="{active: m.reports}" >
        <a href=""><i class="fa fa-file-pdf-o"></i> <span class="nav-label">Administration</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse" ng-class="{in: m.reports}" aria-expanded="true">
         		  <li  ><a href="#">Users</a></li>
                  <li  ><a href="{{url('user-type')}}">User Type</a></li>
         </ul>
      </li>

    </ul>



    </div>
</nav>
