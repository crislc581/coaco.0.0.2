
<nav class="navbar navbar-expand-lg  <?=$_backgroundH?> fixed-top mi-navbar-top"  id="mainNav">


      <!-- bottom responsive -->
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- barras de navegacion horizontal y vertical -->
      <div class="collapse navbar-collapse" id="navbarResponsive">

      <!-- barra de navegacion vertical -->
        <ul class="navbar-nav navbar-sidenav <?=$_backgroundV?>" id="exampleAccordion" style="top: -56px !important; z-index: 1040 !important;">
           

           <li class="nav-item mb-3" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link text-center"  style="padding:0  !important">
              <i class=" fa-fw">
                 <img src="<?=VAPP.'imagenes/s pertenencia/escudo.png'?>" id="id-img-escudo-colegio" alt="" ><br>
              </i>
              
               <span class="nav-link-text" >
                San MAteo</span>
            </a>
          </li>

          <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="?view=inicioindex">
              <i class="fa fa-fw fa-home"></i>
              <span class="nav-link-text">
                Inicio</span>
            </a>
          </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
            <a class="nav-link" href="?view=superinicio&pagin=registraralumno">
              <i class="fa fa-fw fa-user"></i>
              <span class="nav-link-text">Matricular Alumno</span>
            </a>
          </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
            <a class="nav-link" href="?view=superinicio&pagin=Cruddirectivas">
              <i class="fa fa-fw fa-address-card-o"></i>
              <span class="nav-link-text">
                Directivas	</span>
            </a>
          </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
            <a class="nav-link" href="?view=superinicio&pagin=crudReportesCadaPeriodo">
              <i class="fa fa-fw fa-calendar-minus-o"></i>
              <span class="nav-link-text">
                Reporte de periodo  </span>
            </a>
          </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
            <a class="nav-link" href="?view=superinicio&pagin=inicio_observador">
              <i class="fa fa-fw fa-list"></i>
              <span class="nav-link-text">
                Observador Alumno	</span>
            </a>
          </li>

          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#asistencia" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-check-circle-o"></i>
              <span class="nav-link-text">
               Asistencia</span>
            </a>
            <ul class="sidenav-second-level collapse" id="asistencia">
              <li>
               <a class="" href="?view=superinicio&pagin=tomarasistencia">
              <i class="fa fa-fw fa-plus"></i>
                Nueva asistencia
            </a>
              </li>
              <li>
                <a href="?view=superinicio&pagin=visualizarasistencia"><i class="fa fa-eye"></i>  Visualizar asistencia</a>
              </li>
              <!--<li>
                <a href="#">Detalles</a>
              </li>-->

            </ul>
          </li>



          <!--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
            <a class="nav-link" href="#">
              <i class="fa fa-fw fa-table"></i>
              <span class="nav-link-text">
                Certificación</span>
              </a>
            </li>-->

        <!--   <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
	            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
	              <i class="fa fa-fw fa-wrench"></i>
	              <span class="nav-link-text">
	                Components</span>
	            </a>
	            <ul class="sidenav-second-level collapse" id="collapseComponents">
	              <li>
	                <a href="static-nav.html">Static Navigation</a>
	              </li>
	              <li>
	                <a href="#">Custom Card Examples</a>
	              </li>
	            </ul>
          </li> -->

          <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-file"></i>
              <span class="nav-link-text">
                Example Pages</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseExamplePages">
              <li>
                <a href="login.html">Iniciar Sesión</a>
              </li>
              <li>
                <a href="register.html">registrar Usuario</a>
              </li>
              <li>
                <a href="forgot-password.html">Forgot Password Page</a>
              </li>
              <li>
                <a href="blank.html">Blank Page</a>
              </li>
            </ul>
          </li> -->
          <!--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
            <a class="nav-link" href="#">
              <i class="fa fa-fw fa-users"></i>
              <span class="nav-link-text">
                Registrar Personal</span>
            </a>
          </li>-->
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-cog"></i>
              <span class="nav-link-text">
               Configuración</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseMulti">
              <li>
                <a href="?view=superinicio&pagin=subirarchivosplanos">Subir archivos de csv</a>
              </li>
              <!--<li>
                <a href="#">Movimientos de la aplicación</a>
              </li>
              <li>
                <a href="#">Sistema</a>
              </li>
              <li>
                <a href="#">Administración</a>
              </li>-->

            </ul>
          </li>

          <!--<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
            <a class="nav-link" href="#">
              <i class="fa fa-fw fa-link"></i>
              <span class="nav-link-text">
                Link</span>
            </a>
          </li>-->
        </ul>
  
      

        
        <ul class="navbar-nav sidenav-toggler" style="margin-top: calc(100vh - 112px) !important;">
          <li class="nav-item " data-placement="right" data-toggle="tooltip" data-placement="right">
            <a class="nav-link" href="?view=cerrarsesion">
              <i class="fa fa-fw fa-sign-out"></i>
              <span class="nav-link-text">
                  Cerrar sesión</span>
            </a>
          </li>

      

        </ul>

        <!-- Flecha para angostar la barra de nvegacion vertical -->
        <ul class="navbar-nav sidenav-toggler"  style="box-shadow: 1px 1px 10px rgba(0,0,0,.3)">
          <li class="nav-item">
            <a class="nav-link text-center" id="sidenavToggler">
              <i class="fa fa-fw fa-angle-left"></i>
            </a>
          </li>
        </ul>



        <!-- barra de navegacion horizontal -->
        <ul class="navbar-nav mr-auto" style="margin-left: 50% ;" id="name-proyecto-coaco">
          <!--<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mr-lg-2" href="#" id="messagesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-fw fa-envelope"></i>
              <span class="d-lg-none">Messages
                <span class="badge badge-pill badge-primary">12 New</span>
              </span>
              <span class="new-indicator text-primary d-none d-lg-block">
                <i class="fa fa-fw fa-circle"></i>
                <span class="number">12</span>
              </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="messagesDropdown">
              <h6 class="dropdown-header">New Messages:</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <strong>David Miller</strong>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <strong>Jane Smith</strong>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <strong>John Doe</strong>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item small" href="#">
                View all messages
              </a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle mr-lg-2" href="#" id="alertsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-fw fa-bell"></i>
              <span class="d-lg-none">Alerts
                <span class="badge badge-pill badge-warning">6 New</span>
              </span>
              <span class="new-indicator text-warning d-none d-lg-block">
                <i class="fa fa-fw fa-circle"></i>
                <span class="number">6</span>
              </span>
            </a>
            <div class="dropdown-menu" aria-labelledby="alertsDropdown">
              <h6 class="dropdown-header">New Alerts:</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <span class="text-success">
                  <strong>
                    <i class="fa fa-long-arrow-up"></i>
                    Status Update</strong>
                </span>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <span class="text-danger">
                  <strong>
                    <i class="fa fa-long-arrow-down"></i>
                    Status Update</strong>
                </span>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <span class="text-success">
                  <strong>
                    <i class="fa fa-long-arrow-up"></i>
                    Status Update</strong>
                </span>
                <span class="small float-right text-muted">11:21 AM</span>
                <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item small" href="#">
                View all alerts
              </a>
            </div>
          </li>
          <li class="nav-item">
            <form class="form-inline my-2 my-lg-0 mr-lg-2">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="button">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
            </form>
          </li>-->
          <li class="nav-item text-center">
            <a class="nav-link"  style="padding: 0 !important; cursor: auto;">
              <img src="<?=VAPP.'imagenes/s pertenencia/logo pantalla horizontal.png'?>" alt="" width="105px">
              <span class="ml-4" style=" color:rgba(255,255,255,.5); letter-spacing: 6px; ">Zero Papel</span>
            </a>

          </li>
        </ul>

      </div>
    </nav>
