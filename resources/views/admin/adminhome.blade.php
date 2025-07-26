@include('admin.partials.head')
<body>
  <div class="container-scroller">
    @include('admin.partials.menu')
    <div class="container-fluid page-body-wrapper">
      @include('admin.partials.theme-settings')
      @include('admin.partials.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-4 mb-4">
              <div class="card text-white shadow" style="border-radius: 1rem; background: linear-gradient(135deg, #66f1e0 0%, #3fabde 100%);">
                <div class="card-body d-flex align-items-center justify-content-between">
                  <div class="text-center w-100">
                    <h5 class="card-title mb-1">Total Users</h5>
                    <h2 class="mb-0">{{ \App\Models\User::count() }}</h2>
                  </div>
                  <div>
                    <i class="typcn typcn-group" style="font-size: 2.5rem;"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card text-white shadow" style="border-radius: 1rem; background: linear-gradient(135deg, #66f1e0 0%, #3fabde 100%);">
                <div class="card-body d-flex align-items-center justify-content-between">
                  <div class="text-center w-100">
                    <h5 class="card-title mb-1">Premium Subscribers</h5>
                    <h2 class="mb-0">{{ \App\Models\User::where('subscription_type', 'Premium')->count() }}</h2>
                  </div>
                  <div>
                    <i class="typcn typcn-star" style="font-size: 2.5rem;"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card text-white shadow" style="border-radius: 1rem; background: linear-gradient(135deg, #66f1e0 0%, #3fabde 100%);">
                <div class="card-body d-flex align-items-center justify-content-between">
                  <div class="text-center w-100">
                    <h5 class="card-title mb-1">Basic Subscribers</h5>
                    <h2 class="mb-0">{{ \App\Models\User::where('subscription_type', 'Basic')->count() }}</h2>
                  </div>
                  <div>
                    <i class="typcn typcn-user" style="font-size: 2.5rem;"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 mb-4">
              <div class="card text-white shadow" style="border-radius: 1rem; background: linear-gradient(135deg, #66f1e0 0%, #3fabde 100%);">
                <div class="card-body d-flex align-items-center justify-content-between">
                  <div class="text-center w-100">
                    <h5 class="card-title mb-1">Research Reports</h5>
                    <h2 class="mb-0">{{ \App\Models\ResearchReport::count() }}</h2>
                  </div>
                  <div>
                    <i class="typcn typcn-document-text" style="font-size: 2.5rem;"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card text-white shadow" style="border-radius: 1rem; background: linear-gradient(135deg, #66f1e0 0%, #3fabde 100%);">
                <div class="card-body d-flex align-items-center justify-content-between">
                  <div class="text-center w-100">
                    <h5 class="card-title mb-1">Reports (Last 30 Days)</h5>
                    <h2 class="mb-0">{{ \App\Models\ResearchReport::where('created_at', '>=', \Carbon\Carbon::now()->subDays(30))->count() }}</h2>
                  </div>
                  <div>
                    <i class="typcn typcn-time" style="font-size: 2.5rem;"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 mb-4">
              <div class="card text-white shadow" style="border-radius: 1rem; background: linear-gradient(135deg, #66f1e0 0%, #3fabde 100%);">
                <div class="card-body d-flex align-items-center justify-content-between">
                  <div class="text-center w-100">
                    <h5 class="card-title mb-1">Reports (Last 7 Days)</h5>
                    <h2 class="mb-0">{{ \App\Models\ResearchReport::where('created_at', '>=', \Carbon\Carbon::now()->subDays(7))->count() }}</h2>
                  </div>
                  <div>
                    <i class="typcn typcn-calendar" style="font-size: 2.5rem;"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @include('admin.partials.footer')
      </div>
    </div>
  </div>
  <!-- Scripts required for toggler -->
  <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/template.js') }}"></script>
</body>