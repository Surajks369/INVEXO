@include('admin.partials.head')
<body>
  <div class="container-scroller">
    @include('admin.partials.menu')
    <div class="container-fluid page-body-wrapper">
      @include('admin.partials.theme-settings')
      @include('admin.partials.sidebar')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-4">Add Subscription</h4>
                  @if($errors->any())
                    <div class="alert alert-danger">
                      <ul class="mb-0">
                        @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif
                  <form action="{{ route('subscriptions.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                      <label>Price</label>
                      <input type="number" step="0.01" name="price" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                      <label>Duration</label>
                      <select name="duration" class="form-control" required>
                        <option value="WEEKLY">WEEKLY</option>
                        <option value="MONTHLY">MONTHLY</option>
                        <option value="YEARLY">YEARLY</option>
                      </select>
                    </div>
                    <div class="form-group mb-4">
                      <label>Status</label>
                      <select name="status" class="form-control" required>
                        <option value="Active">Active</option>
                        <option value="Expired">Expired</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-add-category" style="background: linear-gradient(135deg, #66f1e0 0%, #3fabde 100%); color: #000; border: none;">Save</button>
                    <a href="{{ route('subscriptions.index') }}" class="btn btn-light">Cancel</a>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        @include('admin.partials.footer')
      </div>
    </div>
  </div>
  <!-- base:js -->
  <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('js/template.js') }}"></script>
  <script src="{{ asset('js/settings.js') }}"></script>
  <script src="{{ asset('js/todolist.js') }}"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
</body>
