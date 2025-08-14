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
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-4">Users</h4>
                  @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                  @endif
                  <a href="{{ route('users.create') }}" class="btn btn-add-category mb-3" style="background: linear-gradient(135deg, #66f1e0 0%, #3fabde 100%); color: #000; border: none;">Add User</a>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Subscription Type</th>
                          <th>Join Date</th>
                          <th>Renewal Date</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($users as $user)
                          @php $loopIndex = $loop->iteration; @endphp
                          <tr>
                            <td>{{ $loopIndex }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->subscription_type }}</td>
                            <td>{{ $user->join_date }}</td>
                            <td>{{ $user->renewal_date }}</td>
                            <td>{{ $user->status ? 'Active' : 'Inactive' }}</td>
                            <td>
                              <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-edit-custom">Edit</a>
                              <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-delete-custom" onclick="return confirm('Delete this user?')">Delete</button>
                              </form>
                            </td>
                          </tr>
                        @empty
                          <tr>
                            <td colspan="8" class="text-center">No users found.</td>
                          </tr>
                        @endforelse
                      </tbody>
                    </table>
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
