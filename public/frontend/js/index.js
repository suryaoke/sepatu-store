const swiperAlumnus = new Swiper('.swiper', {
    effect: 'fade',
    fadeEffect: {
        crossFade: true
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        renderBullet: function (index, className) {
            // Mengambil gambar dari data yang relevan
            const imgSrc = document.querySelectorAll('.swiper-slide')[index].querySelector('img').src;
            return '<div class="relative group !flex !shrink-0 !w-16 !h-16 ![background:none] ' + className + ' transition-all duration-300">' 
                        + '<img src="' + imgSrc + '" class="w-full h-full object-cover !rounded-full !overflow-hidden" alt="photo">' 
                    + "</div>";
        },
        bulletActiveClass: 'swiper-pagination-bullet-active'
    },
});
