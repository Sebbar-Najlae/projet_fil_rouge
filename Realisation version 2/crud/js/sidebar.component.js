class SideBar extends React.Component {
    constructor(props) {
        super(props)
    }

    render() {

        return (
            <aside className="main-sidebar sidebar-light-primary elevation-4">
           
            {/* Sidebar */}
            <div className="sidebar">
              {/* Sidebar user (optional) */}
              <div className="user-panel mt-3 pb-3 mb-3 d-flex">
                <div className="image">
                  <img src="dist/img/R.png" className="img-circle elevation-2" alt="User Image" />
                </div>
                <div className="info">
                  <a href="#" className="d-block"> 
                  {/* <?php echo $userLoggedIn->getFirstName(); ?>  */}
                  Remyurda
                   </a>
                </div>
              </div>
              {/* Sidebar Menu */}
              <nav className="mt-2">
                <ul className="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  {/* Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library */}
                  <li className="nav-item">
                    <a href="dashboard.html" className="nav-link">
                      <i className="nav-icon fas fa-tachometer-alt" />
                      <p>Dashboard</p>
                    </a>
                  </li>
               
        {/* Mes Emails */}
        <li className="nav-item">
          <a href="mesEmails.html" className="nav-link active">
            <i className="nav-icon fas fa-database" />
            <p> Mes E-mails</p>
          </a>
        </li> 
        {/* notification */}
        <li className="nav-item">
          <a href="notification.html" className="nav-link">
            <i className="nav-icon far fa-bell" />
            <p>
              Notifications
              <span className="badge badge-info right">10</span>
            </p>
          </a>
        </li>

        <li className="nav-item">
          <a href="indexMail.php" className="nav-link">
            <i className="nav-icon far fa-envelope-open" />
          
            <p>
              Envoyer
              <span className="badge badge-info right">1</span>
            </p>
          </a>
        </li>
        <li className="nav-item">
          <a href="../../index.html" className="nav-link">
            <i className="nav-icon far fa-user-circle" />
          
            <p>
              Se Déconnecter
            </p>
          </a>
        </li>

                </ul>
              </nav>
              {/* /.sidebar-menu */}
            </div>
            {/* /.sidebar */}
          </aside>
          

        )
    }
}