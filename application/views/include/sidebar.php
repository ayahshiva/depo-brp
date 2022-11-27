    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?php echo site_url('dashboard'); ?>">
              <span data-feather="home" class="align-text-bottom"></span>
              Dashboard
            </a>
          </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <a class="nav-link" aria-current="page" href="#">
              <span data-feather="database" class="align-text-bottom"></span>
                Master Data
            </a>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#master-collapse" aria-expanded="true">
              <span data-feather="plus-circle" class="align-text-bottom"></span>
            </button>
          </a>
        </h6>
        <div class="collapse" id="master-collapse">
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('user'); ?>">
                <span data-feather="arrow-right" class="align-text-bottom"></span>
                User
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="arrow-right" class="align-text-bottom"></span>
                MLO
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="arrow-right" class="align-text-bottom"></span>
                EMKL
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="arrow-right" class="align-text-bottom"></span>
                Vessel
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="arrow-right" class="align-text-bottom"></span>
                Container
              </a>
            </li>
          </ul>
        </div>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <a class="nav-link" aria-current="page" href="#">
              <span data-feather="truck" class="align-text-bottom"></span>
                Container In
            </a>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#mvin-collapse" aria-expanded="true">
              <span data-feather="plus-circle" class="align-text-bottom"></span>
            </button>
          </a>
        </h6>
        <div class="collapse" id="mvin-collapse">
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="arrow-right" class="align-text-bottom"></span>
                List In
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="arrow-right" class="align-text-bottom"></span>
                Payment In
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="arrow-right" class="align-text-bottom"></span>
                Process In
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="arrow-right" class="align-text-bottom"></span>
                Berita Acara Penerimaan
              </a>
            </li>
          </ul>
        </div>
        
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <a class="nav-link" aria-current="page" href="#">
              <span data-feather="truck" class="align-text-bottom"></span>
                Container Out
            </a>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#mvot-collapse" aria-expanded="true">
              <span data-feather="plus-circle" class="align-text-bottom"></span>
            </button>
          </a>
        </h6>
        <div class="collapse" id="mvot-collapse">
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="arrow-right" class="align-text-bottom"></span>
                List Out
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="arrow-right" class="align-text-bottom"></span>
                Payment Out
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="arrow-right" class="align-text-bottom"></span>
                Process Out
              </a>
            </li>
          </ul>
        </div>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
          <a class="nav-link" aria-current="page" href="#">
              <span data-feather="file-text" class="align-text-bottom"></span>
                Reporting
            </a>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#report-collapse" aria-expanded="true">
              <span data-feather="plus-circle" class="align-text-bottom"></span>
            </button>
          </a>
        </h6>
        <div class="collapse" id="report-collapse">
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="arrow-right" class="align-text-bottom"></span>
                MV-IN
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="arrow-right" class="align-text-bottom"></span>
                MV-OT
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="arrow-right" class="align-text-bottom"></span>
                S-List
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="arrow-right" class="align-text-bottom"></span>
                MLO Invoicing
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>