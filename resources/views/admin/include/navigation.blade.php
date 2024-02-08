<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('home') }}" class="app-brand-link">
        @if(Auth::user()->user_type == 2)
            @php 
                $company = \App\Models\Company::find(Auth::user()->company_id);
            @endphp
            <span class="app-brand-text demo menu-text fw-bold">{{ strlen($company->company_name) > 10 ?substr($company->company_name, 0, 10)."...":$company->company_name }}</span>
        @else
            <span class="app-brand-text demo menu-text fw-bold">ACME CRM</span>
        @endif
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{ isActiveRoute(['home'])}}">
            <a href="{{ route('home') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>
        
        @if(Auth::user()->user_type == 1 )
        <li class="menu-item {{ isActiveRoute(['admin_company'])}}">
            <a href="{{ route('admin_company') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-building"></i> Company with User
            </a>
        </li>
        
        @endif
        @if(Auth::user()->user_type == 2)
        <li class="menu-item {{ isActiveRoute(['user.viewuser'])}}">
            <a href="{{ route('user.viewuser') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Users">Users</div>
            </a>
        </li>
        @endif
        @if(Auth::user()->user_type ==2 )
        <li class="menu-item {{ isActiveRoute(['pipeline'])}}">
            <a href="{{ route('pipeline') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-app-window"></i>
                <div data-i18n="Pipeline category">Pipeline category </div>
            </a>
        </li>
        <li class="menu-item  {{ isActiveRoute(['lead.index'])}}">
            <a href="{{ route('lead.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-lifebuoy"></i>
                <div data-i18n="Lead">Lead</div>
            </a>
        </li>
        <li class="menu-item {{ isActiveRoute(['lead.pipeline'])}}">
            <a href="{{ route('lead.pipeline') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-app-window"></i>
                <div data-i18n="Pipeline"> Pipeline</div>
            </a>
        </li>
        <!--<li class="menu-item {{ isActiveRoute(['activity.index'])}}">-->
        <!--    <a href="{{ route('activity.index') }}" class="menu-link">-->
        <!--        <i class="menu-icon tf-icons ti ti-components"></i>-->
        <!--        <div data-i18n="Activity">Activity</div>-->
        <!--    </a>-->
        <!--</li>-->
         <li class="menu-item {{ isActiveRoute(['subscription.index'])}}">
              <a href="{{route('subscription.index')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-components"></i>
                <div data-i18n="Subscription">Subscription</div>
              </a>
            </li>
        @endif
          @if(Auth::user()->user_type == 1 )
       
         <li class="menu-item {{ isActiveRoute(['subscription.list'])}}">
              <a href="{{route('subscription.list')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-components"></i>
                <div data-i18n="Subscription">Subscription</div>
              </a>
            </li>
        @endif
        <li class="menu-item">
    <a href="{{ route('logout') }}" class="menu-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="menu-icon tf-icons ti ti-components"></i>
        <div data-i18n="Logout">Logout</div>
    </a>
</li>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
    </ul>

</aside>
