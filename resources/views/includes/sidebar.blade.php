
<nav class="navbar-admin navbar-static-side" role="navigation">
    <div class="sidebar-collapse">

      <ul side-navigation="" class="nav metismenu" id="side-menu">
      <li class="nav-header" style="padding: 20px;">
        <div class="profile-element">
          <img height="60" width="100%" src="{{url('img/logo.svg')}}" alt="P3" title="P3">
        </div>
        <div class="logo-element">
          P3
        </div>
      </li>

      <li >
        <a href="{{url('home')}}"><i class="fa fa-dashboard"></i> <span class="nav-label">Dashboard</span> </a>
      </li>

      <li class=""  >
        <a href=""><i class="fa fa-file-pdf-o"></i> <span class="nav-label">PM Inputs</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse" ng-class="{in: m.reports}" aria-expanded="true">
        
        
          <li  ><a href="{{url('employee')}}">Monthly FTE input (Assign Project FTE)</a></li>
                    <li ><a  href="{{url('multi-project_fte')}}">Assign Bulk Project FTE</a></li>
          
          <li ><a  href="{{url('fixed_cost')}}">Cost Inputs - Forecast</a></li>
          <li ><a  href="{{url('fixed_cost_other')}}">Cost Inputs - Actuals</a></li>
                    
        </ul>
      </li>


      <li class=""  >
        <a href=""><i class="fa fa-file-pdf-o"></i> <span class="nav-label">Finance inputs</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse" ng-class="{in: m.reports}" aria-expanded="true">
        
          
          <li  class="{{((isset($link) && $link=='monthly_expenses')?'active':'')}}"><a href="{{url('expenses')}}">Monthly Expense</a></li>
          <li class="{{((isset($link) && $link=='currency')?'active':'')}}"><a  href="{{url('report_date')}}">Set report date</a></li>
          <li ><a  href="{{url('fte_cost')}}">FTE Cost inputs</a></li>
          <li ><a  href="{{url('fte_cost_other')}}">FTE Cost inputs</a></li>
                              
        </ul>
      </li>
      
      
      <li class=""  >
        <a href=""><i class="fa fa-file-pdf-o"></i> <span class="nav-label">Admin</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse" ng-class="{in: m.reports}" aria-expanded="true">
    
          
         
          
          <li  class="{{((isset($link) && $link=='currency')?'active':'')}}"><a href="{{url('currency')}}">Conversion Rate</a></li>
          <li class="{{((isset($link) && $link=='department')?'active':'')}}"><a  href="{{url('department')}}">Department Setup</a></li>
                    <li class="{{((isset($link) && $link=='designation')?'active':'')}}"><a  href="{{url('designation')}}">Designation  Setup</a></li>
                    <li class="{{((isset($link) && $link=='employee')?'active':'')}}"><a  href="{{url('employee')}}">Employee Setup</a></li>
                    <li ><a  href="{{url('project')}}">Project Setup</a></li>
                    <li class="{{((isset($link) && $link=='user')?'active':'')}}"><a href="{{url('user')}}">Users</a></li>
                    <li class="{{((isset($link) && $link=='role')?'active':'')}}"><a href="{{url('roles')}}">Role</a></li>
                    
        </ul>
      </li>
      
      
      <li class=""  >
        <a href=""><i class="fa fa-file-pdf-o"></i> <span class="nav-label">TBD</span><span class="fa arrow"></span></a>
        <ul class="nav nav-second-level collapse" ng-class="{in: m.reports}" aria-expanded="true">

          <li class="{{((isset($link) && $link=='employee-hierarchy')?'active':'')}}"><a href="{{url('employee-hierarchy')}}"  >Employee hierarchy</a></li>
                    
        </ul>
      </li>
      
    

  

    
      
      
      

    </ul>



    </div>
</nav>
