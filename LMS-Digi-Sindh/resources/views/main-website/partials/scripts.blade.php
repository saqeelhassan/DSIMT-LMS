<a href="#" class="scroll-top btn-hover">
    <i class="lni lni-chevron-up"></i>
</a>

<script>
    var modalObject = document.getElementById("mymodal");
    var closeBtn = document.getElementsByClassName("close")[0];
    if (closeBtn) {
        closeBtn.addEventListener("click", function () {
            modalObject.style.display = "none";
        });
    }
    if (modalObject) {
        window.addEventListener("click", function (event) {
            if (event.target === modalObject) {
                modalObject.style.display = "none";
            }
        });
    }
</script>

<script src="{{ asset('dsimt/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('dsimt/js/count-up.min.js') }}"></script>
<script src="{{ asset('dsimt/js/wow.min.js') }}"></script>
<script src="{{ asset('dsimt/js/tiny-slider.js') }}"></script>
<script src="{{ asset('dsimt/js/glightbox.min.js') }}"></script>
<script src="{{ asset('dsimt/js/main.js') }}"></script>
<script type="text/javascript">
    if (typeof tns !== 'undefined') {
        if (document.querySelector('.hero-slider')) {
            tns({
                container: '.hero-slider',
                items: 1,
                slideBy: 'page',
                autoplay: false,
                mouseDrag: true,
                gutter: 0,
                nav: true,
                controls: false,
                controlsText: ['<i class="lni lni-arrow-left"></i>', '<i class="lni lni-arrow-right"></i>'],
            });
        }
        if (document.querySelector('.testimonial-slider')) {
            tns({
                container: '.testimonial-slider',
                items: 3,
                slideBy: 'page',
                autoplay: false,
                mouseDrag: true,
                gutter: 0,
                nav: true,
                controls: false,
                controlsText: ['<i class="lni lni-arrow-left"></i>', '<i class="lni lni-arrow-right"></i>'],
                responsive: { 0: { items: 1 }, 540: { items: 1 }, 768: { items: 2 }, 992: { items: 2 }, 1170: { items: 3 } }
            });
        }
        if (document.querySelector('.client-logo-carousel')) {
            tns({
                container: '.client-logo-carousel',
                slideBy: 'page',
                autoplay: true,
                autoplayButtonOutput: false,
                mouseDrag: true,
                gutter: 15,
                nav: false,
                controls: false,
                responsive: { 0: { items: 1 }, 540: { items: 3 }, 768: { items: 4 }, 992: { items: 4 }, 1170: { items: 6 } }
            });
        }
    }
</script>
