
<ul class="menu-inner py-1">

  <!-- Dashboards -->
  <li class="menu-item open">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
      <i class="menu-icon tf-icons bx bx-home-circle"></i>
      <div data-i18n="Dashboards">Dashboards</div>
      <div class="badge bg-danger rounded-pill ms-auto"></div>
    </a>
    <ul class="menu-sub">
      <li class="menu-item {{ isset($home) ? ' active': ''}}">
        <a
          href="/home"
          class="menu-link">
          <div data-i18n="CRM">Home</div>
        </a>
      </li>
      <li class="menu-item {{ isset($employees) ? ' active': ''}}">
        <a
          href="/services/create"
          class="menu-link">
          <div data-i18n="CRM">Services</div>
        </a>
      </li>
      <li class="menu-item {{ isset($catalog) ? ' active': ''}}">
        <a href="/services/list" class="menu-link">
          <div data-i18n="Analytics">Jobs</div>
        </a>
      </li>     
     
    </ul>
  </li>

  <!-- Forms & Tables -->
  <!-- Forms -->

</ul>

