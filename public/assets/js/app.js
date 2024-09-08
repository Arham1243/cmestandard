



document.addEventListener('DOMContentLoaded', function() {
    // Select all accordion headers
    const accordions = document.querySelectorAll('.accordian');

    // Initialize all accordions as closed
    accordions.forEach(acc => {
        const content = acc.querySelector('.accordian-content');
        const icon = acc.querySelector('.faq-icon i');
        
        acc.classList.remove('active');
        content.style.gridTemplateRows = '0fr'; // Hide content
        icon.classList.remove('bx-minus');
        icon.classList.add('bx-plus');
    });

    // Add click event to toggle accordions
    accordions.forEach(acc => {
        const header = acc.querySelector('.accordian-header');
        const content = acc.querySelector('.accordian-content');
        const icon = header.querySelector('.faq-icon i');

        header.addEventListener('click', function() {
            // Check if this accordion is active
            if (acc.classList.contains('active')) {
                // Close this accordion
                acc.classList.remove('active');
                content.style.gridTemplateRows = '0fr';
                icon.classList.remove('bx-minus');
                icon.classList.add('bx-plus');
            } else {
                // Open this accordion and close others
                accordions.forEach(a => {
                    if (a !== acc) {
                        a.classList.remove('active');
                        a.querySelector('.accordian-content').style.gridTemplateRows = '0fr';
                        a.querySelector('.faq-icon i').classList.remove('bx-minus');
                        a.querySelector('.faq-icon i').classList.add('bx-plus');
                    }
                });

                acc.classList.add('active');
                content.style.gridTemplateRows = '1fr';
                icon.classList.remove('bx-plus');
                icon.classList.add('bx-minus');
            }
        });
    });
});

 

$('.drs-slider').slick({
    dots: false,
    arrows: false,
    infinite: true,
    speed: 300,
    reverse: false,
    slidesToShow: 5,
    slidesToScroll: 2,
    autoplay: true,
    autoplaySpeed: 2000, 
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});
$('.drs-slider--reverse').slick({
    dots: false,
    arrows: false,
    infinite: true,
    rtl: true,
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 2,
    autoplay: true,
    autoplaySpeed: 2000, 
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});


$('.review-box__slider').slick({
    dots: false,
    arrows: false,
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
    ]
});

document.addEventListener("DOMContentLoaded", function() {
    const navItems = document.querySelectorAll(".header-nav ul li a");
    const currentPage = window.location.pathname;

    const activePage = localStorage.getItem("activePage");

    function setActiveClass(page) {
        navItems.forEach(item => {
            if (item.getAttribute("href") === page) {
                item.parentElement.classList.add("active");
            } else {
                item.parentElement.classList.remove("active");
            }
        });
    }

    if (activePage) {
        setActiveClass(activePage);
    } else {
        setActiveClass(currentPage);
    }

    navItems.forEach(item => {
        item.addEventListener("click", function(event) {
            if (!item.closest(".header-nav")) return;

            navItems.forEach(nav => nav.parentElement.classList.remove("active"));
            this.parentElement.classList.add("active");

            localStorage.setItem("activePage", this.getAttribute("href"));
        });
    });
});


// passwordshow
function showHide() {
    var passwordInput = document.getElementById('passwordInput');
    var toggleIcon = document.getElementById('toggleIcon');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text'; // Show password
        toggleIcon.classList.remove('bxs-show'); // Remove show icon class
        toggleIcon.classList.add('bxs-hide'); // Add hide icon class
    } else {
        passwordInput.type = 'password'; // Hide password
        toggleIcon.classList.remove('bxs-hide'); // Remove hide icon class
        toggleIcon.classList.add('bxs-show'); // Add show icon class
    }
}


document.addEventListener('DOMContentLoaded', function() {
    const headers = document.querySelectorAll('.accordian2-header');

    headers.forEach(header => {
        header.addEventListener('click', function() {
            const parentBox = this.closest('.why-cme__boxs');
            const parentAccordion = this.closest('.accordian2');
            
            if (!parentBox || !parentAccordion) {
                console.error('Parent elements not found');
                return;
            }
            
            const content = parentAccordion.querySelector('.accordian2-content');
            
            if (!content) {
                console.error('Accordion content not found');
                return;
            }

            if (parentAccordion.classList.contains('active')) {
                // Collapse the current accordion
                content.style.maxHeight = null;
                parentAccordion.classList.remove('active');
                parentBox.classList.remove('active');
            } else {
                // Collapse all other accordions
                document.querySelectorAll('.why-cme__boxs').forEach(box => {
                    const openAccordion = box.querySelector('.accordian2');
                    const openContent = box.querySelector('.accordian2-content');
                    if (openAccordion && openContent && openAccordion !== parentAccordion) {
                        openContent.style.maxHeight = null;
                        openAccordion.classList.remove('active');
                        box.classList.remove('active');
                    }
                });

                // Expand the clicked accordion
                content.style.maxHeight = content.scrollHeight + 'px';
                parentAccordion.classList.add('active');
                parentBox.classList.add('active');
            }
        });
    });
});



