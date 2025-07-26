<!-- resources/views/admin/partials/theme-settings.blade.php -->
<div class="theme-setting-wrapper">
    <div id="settings-trigger" style="background: linear-gradient(135deg, #66f1e0 0%, #3fabde 100%); border-radius: 50%; width: 40px; height: 40px; display: flex; align-items: center; justify-content: center; box-shadow: 0 2px 8px rgba(63,171,222,0.2); cursor: pointer;">
        <i class="typcn typcn-cog-outline" style="color: #000; font-size: 22px;"></i>
    </div>
    <div id="theme-settings" class="settings-panel">
        <i class="settings-close typcn typcn-delete-outline"></i>
        <p class="settings-heading">SIDEBAR SKINS</p>
        <div class="sidebar-bg-options" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>
            Light
        </div>
        <div class="sidebar-bg-options selected" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>
            Dark
        </div>
        <p class="settings-heading mt-2">HEADER SKINS</p>
        <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles primary"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default border"></div>
        </div>
    </div>
</div>
