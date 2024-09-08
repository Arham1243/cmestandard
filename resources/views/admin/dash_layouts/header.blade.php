<section class="dashboard-section">
<header>
      <div class="container-fluid">
        <div class="header-links">
          
         

          <div class="dropdown show user-link">
            <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user-circle" aria-hidden="true"></i>
              <div class="user-info">
                <h4>{{Auth::guard('admin')->user()->name}}</h4>
              </div>
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
             
              <a class="dropdown-item" href="{{route('admin.logout')}}">Logout</a>
            </div>
          </div>
  <div class="header-main__menu">
                        <a href="javascript:viod(0)" onclick="openSideBar()"><i class="fa fa-bars"></i></a>
                    </div>
        </div>
      </div>
       <div class="modal fade alert-modal" id="crawl-success-alert-modal-1" tabindex="-1" role="dialog"
        aria-labelledby="alert-modal-1-modalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="primary-heading color-dark text-center">
                        <figure class="mc-b-2"><img src="{{asset('admin/images/checkmark-icon.svg')}}" alt="checkmark-icon"></figure>
                        <h4 class="crawl-success-msg"></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </header>
    
    <div id="preloader" style="display:none;">  
    <div class="loading">
        <span>Loading...</span>
    </div>
</div>