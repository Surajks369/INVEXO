// Enhanced News Section JavaScript

document.addEventListener('DOMContentLoaded', function() {
    // Initialize news section functionality
    initializeNewsSection();
    
    // Add smooth scroll animations
    addScrollAnimations();
    
    // Handle external links
    handleExternalLinks();
});

function initializeNewsSection() {
    const newsCards = document.querySelectorAll('.news-block-one');
    
    newsCards.forEach((card, index) => {
        // Add hover effects
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
        
        // Add loading animation on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                    entry.target.style.animationDelay = `${index * 0.2}s`;
                }
            });
        }, { threshold: 0.1 });
        
        observer.observe(card);
    });
}

function addScrollAnimations() {
    // Smooth scroll animation for news cards
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observe news cards
    const newsItems = document.querySelectorAll('.news-block-one');
    newsItems.forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(30px)';
        item.style.transition = `all 0.6s ease ${index * 0.1}s`;
        observer.observe(item);
    });
    
    // Observe section title
    const sectionTitle = document.querySelector('.news-section .sec-title');
    if (sectionTitle) {
        sectionTitle.style.opacity = '0';
        sectionTitle.style.transform = 'translateY(30px)';
        sectionTitle.style.transition = 'all 0.6s ease';
        observer.observe(sectionTitle);
    }
}

function handleExternalLinks() {
    // Add confirmation for external links
    const externalLinks = document.querySelectorAll('.news-section a[target="_blank"]');
    
    externalLinks.forEach(link => {
        // Add external link indicator
        link.setAttribute('rel', 'noopener noreferrer');
        
        // Add click tracking (optional - for analytics)
        link.addEventListener('click', function(e) {
            const linkText = this.textContent.trim();
            const linkUrl = this.href;
            
            // Optional: Send analytics event
            if (typeof gtag !== 'undefined') {
                gtag('event', 'external_link_click', {
                    'link_text': linkText,
                    'link_url': linkUrl,
                    'section': 'news'
                });
            }
            
            // Add a small delay for analytics
            setTimeout(() => {
                console.log(`External link clicked: ${linkText} -> ${linkUrl}`);
            }, 100);
        });
        
        // Add hover effect for external links
        link.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        link.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
}

// Function to dynamically update news content (for future API integration)
function updateNewsContent(newsData) {
    const newsContainer = document.querySelector('.news-section .row');
    
    if (!newsContainer || !newsData) return;
    
    // Clear existing content
    newsContainer.innerHTML = '';
    
    newsData.forEach((article, index) => {
        const newsCard = createNewsCard(article, index);
        newsContainer.appendChild(newsCard);
    });
    
    // Reinitialize animations
    initializeNewsSection();
}

function createNewsCard(article, index) {
    const delay = index * 300;
    
    const cardHTML = `
        <div class="col-lg-4 col-md-6 col-sm-12 news-block">
            <div class="news-block-one wow fadeInUp animated" data-wow-delay="${delay}ms" data-wow-duration="1500ms">
                <div class="inner-box">
                    <div class="news-image">
                        <img src="${article.image || '/assets/images/news/default.jpg'}" alt="${article.title}">
                        <div class="news-category">${article.category}</div>
                    </div>
                    <div class="news-content">
                        <span class="post-date">${article.date}</span>
                        <h3><a href="${article.url}" target="_blank">${article.title}</a></h3>
                        <p>${article.description}</p>
                        <div class="news-meta">
                            <div class="source">
                                <i class="fas fa-newspaper"></i>
                                <span>${article.source}</span>
                            </div>
                            <div class="read-time">
                                <i class="fas fa-clock"></i>
                                <span>${article.readTime} min read</span>
                            </div>
                        </div>
                        <div class="link">
                            <a href="${article.url}" target="_blank" rel="noopener noreferrer">
                                Read More <i class="fas fa-external-link-alt"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    const cardElement = document.createElement('div');
    cardElement.innerHTML = cardHTML;
    return cardElement.firstElementChild;
}

// Function to fetch latest news (placeholder for API integration)
async function fetchLatestNews() {
    try {
        // This is a placeholder - replace with actual API call
        const response = await fetch('/api/latest-news');
        const newsData = await response.json();
        
        if (newsData && newsData.length > 0) {
            updateNewsContent(newsData);
        }
    } catch (error) {
        console.log('News API not available, using static content');
    }
}

// Auto-refresh news every 30 minutes (optional)
function startNewsAutoRefresh() {
    setInterval(() => {
        fetchLatestNews();
    }, 30 * 60 * 1000); // 30 minutes
}

// Performance optimization: Debounce scroll events
let scrollTimeout;
window.addEventListener('scroll', function() {
    clearTimeout(scrollTimeout);
    scrollTimeout = setTimeout(function() {
        // Handle scroll-based animations
        const newsCards = document.querySelectorAll('.news-block-one .inner-box');
        newsCards.forEach(card => {
            const rect = card.getBoundingClientRect();
            const isVisible = rect.top < window.innerHeight && rect.bottom > 0;
            
            if (isVisible) {
                card.classList.add('in-view');
            }
        });
    }, 100);
});

// Keyboard navigation support
document.addEventListener('keydown', function(e) {
    if (e.key === 'Enter' || e.key === ' ') {
        const focusedElement = document.activeElement;
        if (focusedElement && focusedElement.classList.contains('news-link')) {
            e.preventDefault();
            focusedElement.click();
        }
    }
});

// Add ARIA labels for accessibility
function enhanceAccessibility() {
    const newsCards = document.querySelectorAll('.news-block-one');
    newsCards.forEach((card, index) => {
        const title = card.querySelector('h3 a');
        const readMoreLink = card.querySelector('.link a');
        
        if (title) {
            title.setAttribute('aria-label', `Read full article: ${title.textContent}`);
        }
        
        if (readMoreLink) {
            readMoreLink.setAttribute('aria-label', `Read more about ${title ? title.textContent : 'this article'} on external website`);
            readMoreLink.classList.add('news-link');
        }
        
        card.setAttribute('aria-label', `News article ${index + 1}`);
    });
}

// Initialize accessibility enhancements
document.addEventListener('DOMContentLoaded', function() {
    enhanceAccessibility();
});

// Error handling for images
document.addEventListener('DOMContentLoaded', function() {
    const newsImages = document.querySelectorAll('.news-image img');
    newsImages.forEach(img => {
        img.addEventListener('error', function() {
            // Replace with placeholder if image fails to load
            this.src = '/assets/images/news/placeholder.jpg';
            this.alt = 'News placeholder image';
        });
    });
});

// Export functions for potential external use
window.NewsSection = {
    updateContent: updateNewsContent,
    fetchLatest: fetchLatestNews,
    startAutoRefresh: startNewsAutoRefresh
};
