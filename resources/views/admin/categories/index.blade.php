<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.partials.head')
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    @include('admin.partials.menu')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_settings-panel.html -->
      @include('admin.partials.theme-settings')
      <!-- partial -->
      <!-- partial:../../partials/_sidebar.html -->
      @include('admin.partials.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Categories</h4>
                  @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                  @endif
                  <a href="{{ route('categories.create') }}" class="btn btn-add-category mb-3" style="background: linear-gradient(135deg, #66f1e0 0%, #3fabde 100%); color: #000; border: none;">Add Category</a>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Created At</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($categories as $category)
                          @php $loopIndex = $loop->iteration; @endphp
                          <tr>
                            <td>{{ $loopIndex }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at->format('Y-m-d') }}</td>
                            <td>
                              <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-edit-custom">Edit</a>
                              <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-delete-custom" onclick="return confirm('Are you sure?')">Delete</button>
                              </form>
                            </td>
                          </tr>
                        @empty
                          <tr>
                            <td colspan="4" class="text-center">No categories found.</td>
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
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        @include('admin.partials.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
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
  <!-- End custom js for this page-->
</body>

</html>
