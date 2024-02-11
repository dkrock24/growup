
<ul class="menu-inner py-1">

  <!-- Dashboards -->
  <li class="menu-item @if ($activeMenu == 'Home' || $activeMenu == 'Employees' || $activeMenu == 'Catalog' ) open @endif">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
      <i class="menu-icon tf-icons bx bx-home-circle"></i>
      <div data-i18n="Dashboards">Dashboards</div>
      <div class="badge bg-danger rounded-pill ms-auto"></div>
    </a>
    <ul class="menu-sub">
      <li class="menu-item {{ $activeMenu == 'Home' ? ' active': ''}}">
        <a
          href="/home"
          class="menu-link">
          <div data-i18n="CRM">Home</div>
        </a>
      </li>
      <li class="menu-item {{ $activeMenu == 'Employees' ? ' active': ''}}">
        <a
          href="/employees"
          class="menu-link">
          <div data-i18n="CRM">Employees</div>
        </a>
      </li>
      <li class="menu-item {{ $activeMenu == 'Catalog' ? ' active': ''}}">
        <a href="/catalog" class="menu-link">
          <div data-i18n="Analytics">Catalog</div>
        </a>
      </li>     

    </ul>
  </li>

  <!-- Forms & Tables -->
  <!-- Forms -->
  <li class="menu-item @if ($activeMenu == 'Customers' || $activeMenu == 'Jobs details') open @endif ">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
      <i class="menu-icon tf-icons bx bx-user"></i>
      <div data-i18n="Form Elements">Customers</div>
    </a>
    <ul class="menu-sub">
      <li class="menu-item {{ $activeMenu == 'Customers' ? ' active': ''}}">
        <a href="/customers" class="menu-link">
          <div data-i18n="Analytics">Customers</div>
        </a>
      </li>
      <li class="menu-item {{ $activeMenu == 'Jobs details' ? ' active': ''}}">
        <a href="/jobs" class="menu-link">
          <div data-i18n="Input groups">Jobs details</div>
        </a>
      </li>
    </ul>
  </li>

</ul>

