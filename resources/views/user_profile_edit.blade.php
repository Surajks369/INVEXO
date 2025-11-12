@include('partials.innerheader')

<link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">

<section class="contact-section pt_60 pb_60">
    <div class="auto-container">
        <div class="sec-title text-center pb_30">
            <h2>Edit Your Profile</h2>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="edit-profile-box">
                <form action="{{ route('user.profile.update') }}" method="POST" enctype="multipart/form-data" id="profile-edit-form">
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
                        <label>Change Password (optional)</label>
                        <input type="password" name="password" class="form-control" placeholder="New password">
                    </div>

                    <div class="form-group mb-3">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm new password">
                    </div>

                    <div class="form-group mb-3 avatar-input">
                        <label>Avatar (JPG, PNG - max 2MB)</label>
                        <div class="d-flex align-items-center">
                            <div class="avatar-preview me-3">
                                @if($user->avatar)
                                    <img id="avatarPreview" src="{{ asset('storage/'.$user->avatar) }}" alt="avatar" class="profile-avatar">
                                @else
                                    <div id="avatarPreview" class="profile-avatar placeholder">{{ strtoupper(substr($user->name,0,1)) }}</div>
                                @endif
                            </div>
                            <div class="flex-grow-1">
                                <input type="file" name="avatar" id="avatarInput" class="form-control mb-2">
                                <div class="form-text">Choose a square image for best results. You can remove the current avatar below.</div>
                                <div class="form-check mt-2">
                                    <input class="form-check-input" type="checkbox" name="remove_avatar" id="removeAvatar" value="1">
                                    <label class="form-check-label" for="removeAvatar">Remove current avatar</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="btn-box mt_20 d-flex">
                        <button type="submit" class="theme-btn btn-one me-2">Save Changes</button>
                        <a href="{{ route('user.profile') }}" class="theme-btn btn-one me-2">Cancel</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    (function(){
        const input = document.getElementById('avatarInput');
        const preview = document.getElementById('avatarPreview');
        const removeCheckbox = document.getElementById('removeAvatar');

        if(!input) return;

        input.addEventListener('change', function(e){
            const file = this.files && this.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = function(ev){
                // If preview is placeholder div, replace with img
                if (preview.tagName.toLowerCase() !== 'img') {
                    const img = document.createElement('img');
                    img.id = 'avatarPreview';
                    img.className = 'profile-avatar';
                    preview.replaceWith(img);
                }
                document.getElementById('avatarPreview').src = ev.target.result;
                // Uncheck remove if checked
                if (removeCheckbox) removeCheckbox.checked = false;
            }
            reader.readAsDataURL(file);
        });
    })();
</script>

@include('partials.innerfooter')
