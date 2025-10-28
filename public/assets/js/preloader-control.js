// Execute immediately before DOM content loads
// Execute before DOM loads to check navigation type
// Immediately hide preloader if coming from internal page
if (document.referrer.includes(window.location.host)) {
    const preloader = document.querySelector('.loader-wrap');
    if (preloader) {
        preloader.style.display = 'none';
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const preloader = document.querySelector('.loader-wrap');
    if (!preloader) return;

    const isHomePage = window.location.pathname === '/' || window.location.pathname === '/index.php';
    const isRefresh = performance.navigation.type === performance.navigation.TYPE_RELOAD;
    const isInternalNavigation = document.referrer.includes(window.location.host);

    // Function to handle preloader
    function hidePreloader() {
        preloader.style.display = 'none';
        document.body.style.overflow = '';
    }

    function showPreloader() {
        preloader.style.display = 'block';
        document.body.style.overflow = 'hidden';
    }

    // Case 1: Direct site open or reload of home page
    if (isHomePage && (isRefresh || !isInternalNavigation)) {
        showPreloader();
        window.addEventListener('load', function() {
            setTimeout(hidePreloader, 2000);
        });
    } else {
        // Case 2: Coming from inner pages
        hidePreloader();
    }

    // Prevent preloader when clicking menu items
    document.addEventListener('click', function(e) {
        const link = e.target.closest('a');
        if (link) {
            sessionStorage.setItem('clickNavigation', 'true');
            hidePreloader();
        }
    });

    // Handle browser back/forward
    window.addEventListener('popstate', function() {
        hidePreloader();
    });
});
});
});