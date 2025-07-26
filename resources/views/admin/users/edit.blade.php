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
                  <h4 class="card-title mb-4">Edit User</h4>
                  @if($errors->any())
                    <div class="alert alert-danger">
                      <ul class="mb-0">
                        @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif
                  <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                      <label>Name</label>
                      <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                    </div>
                    <div class="form-group mb-3">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                    </div>
                    <div class="form-group mb-3">
                      <label>Password (leave blank to keep current)</label>
                      <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                      <label>Confirm Password</label>
                      <input type="password" name="password_confirmation" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                      <label>Subscription Type</label>
                      <select name="subscription_type" class="form-control" required>
                        <option value="Premium" {{ old('subscription_type', $user->subscription_type) == 'Premium' ? 'selected' : '' }}>Premium</option>
                        <option value="Basic" {{ old('subscription_type', $user->subscription_type) == 'Basic' ? 'selected' : '' }}>Basic</option>
                      </select>
                    </div>
                    <div class="form-group mb-3">
                      <label>Join Date</label>
                      <input type="date" name="join_date" class="form-control" value="{{ old('join_date', $user->join_date) }}" required>
                    </div>
                    <div class="form-group mb-3">
                      <label>Renewal Date</label>
                      <input type="date" name="renewal_date" class="form-control" value="{{ old('renewal_date', $user->renewal_date) }}" required>
                    </div>
                    <div class="form-group mb-4">
                      <label>Status</label>
                      <select name="status" class="form-control" required>
                        <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Inactive</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-add-category" style="background: linear-gradient(135deg, #66f1e0 0%, #3fabde 100%); color: #000; border: none;">Update</button>
                    <a href="{{ route('users.index') }}" class="btn btn-light">Cancel</a>
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
