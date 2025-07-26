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
                  <h4 class="card-title mb-4">Edit Crypto Idea</h4>
                  @if($errors->any())
                    <div class="alert alert-danger">
                      <ul class="mb-0">
                        @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif
                  <form action="{{ route('crypto-ideas.update', $idea->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control" value="{{ old('name', $idea->name) }}" required>
                    </div>
                    <div class="form-group mb-3">
                      <label>Current Price</label>
                      <input type="number" step="0.00000001" name="current_price" class="form-control" value="{{ old('current_price', $idea->current_price) }}" required>
                    </div>
                    <div class="form-group mb-3">
                      <label>Risk Level</label>
                      <select name="risk_level" class="form-control" required>
                        <option value="low" {{ old('risk_level', $idea->risk_level) == 'low' ? 'selected' : '' }}>Low</option>
                        <option value="moderate" {{ old('risk_level', $idea->risk_level) == 'moderate' ? 'selected' : '' }}>Moderate</option>
                        <option value="high" {{ old('risk_level', $idea->risk_level) == 'high' ? 'selected' : '' }}>High</option>
                        <option value="extreme" {{ old('risk_level', $idea->risk_level) == 'extreme' ? 'selected' : '' }}>Extreme</option>
                      </select>
                    </div>
                    <div class="form-group mb-4">
                      <label>Description</label>
                      <textarea name="description" class="form-control" rows="3">{{ old('description', $idea->description) }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-add-category" style="background: linear-gradient(135deg, #66f1e0 0%, #3fabde 100%); color: #000; border: none;">Update</button>
                    <a href="{{ route('crypto-ideas.index') }}" class="btn btn-light">Cancel</a>
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
