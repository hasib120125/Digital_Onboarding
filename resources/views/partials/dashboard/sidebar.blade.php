  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar" style="background-color: #5E007E;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu" data-widget="tree">
        <li class="{{{ Request::is('/')? 'active' : ''}}}">
          <a href="{{ url('/') }}">
            <i class="fa fa-columns"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="header" style="color: #fff;background: #2d004d;font-weight: bold;font-size: medium;">Pre Onboarding</li>
        <li><a href="{{route('cadidate-create')}}"><i class="fa fa-user"></i> <span>Add Candidate</span></a></li>
        <li><a href="{{route('candidate-list')}}"><i class="fa fa-user"></i> <span>Candidate List</span></a></li>
        <li><a href="{{route('about-robi')}}"><i class="fa fa-plus-square-o"></i> <span>About Robi</span></a></li>
        <li><a href="{{route('pre-doc-list')}}"><i class="fa fa-plus-square-o"></i> <span>PreJoining Docs Checklist</span></a></li>
        
        <li class="header" style="color: #fff;background: #2d004d;font-weight: bold;font-size: medium;">Onboarding</li>
        <li><a href="{{route('profile')}}"><i class="fa fa-user"></i> <span>Profile Setup</span></a></li>
        <li><a href="{{route('checklist')}}"><i class="fa fa-plus-square-o"></i> <span>Checklist Setup</span></a></li>
        <li><a href="{{route('guide-line-principle')}}"><i class="fa fa-plus-square-o"></i> <span>Guideline Principle</span></a></li>
        <li><a href="{{route('code-of-conduct')}}"><i class="fa fa-plus-square-o"></i> <span>Code of Conduct</span></a></li>
        <li><a href="{{route('robi-culture')}}"><i class="fa fa-plus-square-o"></i> <span>Our Culture</span></a></li>
        <li><a href="{{route('robi-facility')}}"><i class="fa fa-plus-square-o"></i> <span>Our Facilities</span></a></li>
        <li><a href="{{route('medical-benefit')}}"><i class="fa fa-plus-square-o"></i> <span>Medical Benefits</span></a></li>
        <li><a href="{{route('it-guideline')}}"><i class="fa fa-plus-square-o"></i> <span>IT Guideline</span></a></li>
        <li><a href="{{route('ceo-message')}}"><i class="fa fa-plus-square-o"></i> <span>CEO Message</span></a></li>
        <li><a href="{{route('org-structure')}}"><i class="fa fa-plus-square-o"></i> <span>Organization Structure</span></a></li>
        <li><a href="{{route('meet-leader')}}"><i class="fa fa-plus-square-o"></i> <span>Meet The Leaders</span></a></li>
        <li><a href="{{route('create-faq')}}"><i class="fa fa-plus-square-o"></i> <span>FAQ</span></a></li>
        {{-- <li><a href="{{route('create-division')}}"><i class="fa fa-plus-square-o"></i> <span>Divisions</span></a></li> --}}
        {{-- <li><a href="{{route('line-manager')}}"><i class="fa fa-plus-square-o"></i> <span>Line Manager Guideline</span></a></li> --}}
        <li class="treeview">
          <a href="#" style="text-decoration:none">
            <i class="fa fa-dashboard"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            {{-- <li class="active"><a href="{{route('checklist-report')}}"><i class="fa fa-circle-o"></i> Checklist</a></li> --}}
            <li class="active"><a href="{{route('reports.checklist-report')}}"><i class="fa fa-circle-o"></i> Checklist</a></li>
            {{-- <li><a href="{{route('division-department-report')}}"><i class="fa fa-circle-o"></i> Division & Department</a></li> --}}
          </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
