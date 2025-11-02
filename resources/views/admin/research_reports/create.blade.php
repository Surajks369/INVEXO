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
                  <h4 class="card-title mb-4">Add Research Report</h4>
                  @if($errors->any())
                    <div class="alert alert-danger">
                      <ul class="mb-0">
                        @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif
                  <form action="{{ route('research-reports.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                      <label>Category</label>
                      <select name="category" class="form-control" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $cat)
                          <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group mb-3">
                      <label>NSE Code</label>
                      <input type="text" name="nse_code" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                      <label>Recommendation</label>
                      <input type="text" name="recommendation" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                      <label>Current Price (₹)</label>
                      <input type="number" step="0.01" name="current_price" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                      <label>Target Price (₹)</label>
                      <input type="number" step="0.01" name="target_price" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                      <label>Potential (%)</label>
                      <input type="number" step="0.01" name="potential" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                      <label>Expected Holding Period</label>
                      <input type="text" name="expect_hold_period" class="form-control" required>
                    </div>
                    @include('admin.research_reports.partials.percentage_fields')
                    <div class="form-group mb-3">
                      <label>Company Logo</label>
                      <input type="file" name="company_logo" class="form-control" accept="image/jpeg,image/png,image/jpg" required>
                      <small class="form-text text-muted">Upload JPG, JPEG, or PNG image (max 2MB)</small>
                    </div>
                    <div class="form-group mb-4">
                      <label>Status</label>
                      <select name="status" class="form-control" required>
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-add-category" style="background: linear-gradient(135deg, #66f1e0 0%, #3fabde 100%); color: #000; border: none;">Save</button>
                    <a href="{{ route('research-reports.index') }}" class="btn btn-light">Cancel</a>
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
