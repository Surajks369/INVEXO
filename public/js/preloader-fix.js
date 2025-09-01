// Enhanced Preloader Fix
// This file ensures the preloader works correctly with multiple fallback mechanisms

console.log('Preloader fix script loaded');

// Vanilla JavaScript version (works without jQuery)
function closePreloaderVanilla() {
    console.log('Closing preloader with vanilla JS');
    
    const loaderWrap = document.querySelector('.loader-wrap');
    const preloader = document.querySelector('.preloader');
    const handlePreloader = document.querySelector('#handle-preloader');
    
    // Hide all preloader elements
    [loaderWrap, preloader, handlePreloader].forEach(element => {
        if (element) {
            element.style.opacity = '0';
            element.style.visibility = 'hidden';
            element.style.pointerEvents = 'none';
            setTimeout(() => {
                element.style.display = 'none';
            }, 500);
        }
    });
    
    // Ensure body scrolling is enabled
    document.body.style.overflow = 'auto';
    console.log('Preloader closed (vanilla JS)');
}

// jQuery version (if available)
function closePreloaderJQuery() {
    if (typeof jQuery !== 'undefined') {
        console.log('Closing preloader with jQuery');
        jQuery('.loader-wrap').fadeOut(500, function() {
            jQuery(this).remove();
        });
        console.log('Preloader closed (jQuery)');
    }
}

// Combined close function
function closePreloader() {
    closePreloaderVanilla();
    closePreloaderJQuery();
}

// Multiple initialization methods
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM ready - setting up preloader close');
    
    // Close after a short delay
    setTimeout(closePreloader, 1000);
    
    // Setup manual close button
    const closeBtn = document.querySelector('.preloader-close');
    if (closeBtn) {
        closeBtn.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Manual close button clicked');
            closePreloader();
        });
    }
});

// Window load event
window.addEventListener('load', function() {
    console.log('Window loaded - closing preloader');
    setTimeout(closePreloader, 500);
});

// jQuery ready (if available)
if (typeof jQuery !== 'undefined') {
    jQuery(document).ready(function($) {
        console.log('jQuery ready - setting up preloader');
        
        // Setup close button with jQuery
        $('.preloader-close').on('click', function(e) {
            e.preventDefault();
            console.log('jQuery close button clicked');
            closePreloader();
        });
        
        // Close after jQuery is ready
        setTimeout(closePreloader, 800);
    });
    
    // jQuery window load
    jQuery(window).on('load', function() {
        console.log('jQuery window loaded');
        setTimeout(closePreloader, 300);
    });
}

// Force close after 2 seconds (emergency fallback)
setTimeout(function() {
    console.log('Emergency fallback - force closing preloader');
    closePreloader();
}, 2000);

// Monitor for visibility changes
document.addEventListener('visibilitychange', function() {
    if (!document.hidden) {
        console.log('Page became visible - ensuring preloader is closed');
        setTimeout(closePreloader, 100);
    }
});
