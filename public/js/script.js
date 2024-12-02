// // SLIDER AWAL START

// let index = 0;
// const carousel = document.getElementById("carousel");
// const slides = carousel.children.length;
// const intervalTime = 6000; // Waktu perpindahan antar slide dalam milidetik (3000 ms = 3 detik)

// // Fungsi untuk berpindah ke slide berikutnya
// function showNextSlide() {
//     index = index < slides - 1 ? index + 1 : 0;
//     carousel.style.transform = `translateX(-${index * 100}%)`;
// }

// // Fungsi untuk berpindah ke slide sebelumnya
// function showPrevSlide() {
//     index = index > 0 ? index - 1 : slides - 1;
//     carousel.style.transform = `translateX(-${index * 100}%)`;
// }

// // Event listener untuk tombol prev dan next
// document.getElementById("prev").addEventListener("click", () => {
//     clearInterval(autoSlide); // Hentikan autoplay saat tombol diklik
//     showPrevSlide();
//     autoSlide = setInterval(showNextSlide, intervalTime); // Mulai ulang autoplay setelah interaksi
// });

// document.getElementById("next").addEventListener("click", () => {
//     clearInterval(autoSlide);
//     showNextSlide();
//     autoSlide = setInterval(showNextSlide, intervalTime);
// });

// // Otomatis beralih slide setiap intervalTime
// let autoSlide = setInterval(showNextSlide, intervalTime);

// // SLIDER AWAL END

// SLIDER TESTI START
document.addEventListener("DOMContentLoaded", function () {
    const slider = document.getElementById("slider-testi");
    if (!slider) {
        console.error("Slider element not found");
        return;
    }

    const prevButtons = [
        document.getElementById("slider-prev-testi"),
        document.getElementById("slider-prev-desktop-testi"),
    ];
    const nextButtons = [
        document.getElementById("slider-next-testi"),
        document.getElementById("slider-next-desktop-testi"),
    ];

    // Update lebar slide secara dinamis berdasarkan ukuran layar
    const getSlideWidth = () => {
        const slide = slider.children[0];
        if (!slide) return 0;
        // Ambil gap antar slide
        const gap = parseFloat(getComputedStyle(slider).gap) || 0;

        // Menyesuaikan ukuran untuk setiap ukuran layar
        const slideWidth = slide.clientWidth + gap;
        return slideWidth;
    };

    // Fungsi untuk menggulir slider
    const scrollSlider = (direction) => {
        const slideWidth = getSlideWidth();
        slider.scrollBy({
            left: direction * slideWidth,
            behavior: "smooth",
        });
    };

    // Menambahkan event listener pada tombol prev dan next
    prevButtons.forEach(
        (btn) => btn && btn.addEventListener("click", () => scrollSlider(-1))
    );
    nextButtons.forEach(
        (btn) => btn && btn.addEventListener("click", () => scrollSlider(1))
    );

    // Update ketika ukuran layar berubah
    window.addEventListener("resize", () => {
        // Update posisi slider setelah resize jika diperlukan
        scrollSlider(0); // optional: reset scroll
    });
});

// SLIDER TESTI END

// DISTRIBUSI START
document.addEventListener("DOMContentLoaded", () => {
    const container = document.getElementById("geseroverflow");

    // Gandakan konten untuk menciptakan efek loop
    container.innerHTML += container.innerHTML;

    let scrollPosition = 0; // Posisi scroll saat ini
    const scrollSpeed = 0.2; // Kecepatan scroll (lebih besar = lebih cepat)
    const totalWidth = container.scrollWidth / 2; // Total lebar kontainer setelah penggandaan

    const scrollAnimation = () => {
        scrollPosition += scrollSpeed;

        // Jika posisi scroll sudah melewati total lebar kontainer, reset ke posisi awal tanpa transisi
        if (scrollPosition >= totalWidth) {
            scrollPosition = 0;
            container.style.transition = "none"; // Nonaktifkan transisi saat reset
            container.style.transform = `translateX(0px)`; // Kembali ke posisi awal
            // Setelah sedikit delay, aktifkan kembali transisi
            setTimeout(() => {
                container.style.transition = "transform 0.1s linear"; // Aktifkan kembali transisi
            }, 50); // Delay singkat untuk menghindari flicker
        } else {
            container.style.transition = "transform 0.1s linear"; // Pastikan transisi aktif
            container.style.transform = `translateX(${-scrollPosition}px)`;
        }

        requestAnimationFrame(scrollAnimation);
    };

    scrollAnimation(); // Memulai animasi
});

// DISTRIBUSI END

// MODAL SCRIPT FOR DETAIL PAGE START
document.addEventListener("DOMContentLoaded", function () {
    const track = document.getElementById("carousel-track");
    const prevBtnModal = document.getElementById("prevBtnModal");
    const nextBtnModal = document.getElementById("nextBtnModal");
    const images = track.children;
    const modal = document.getElementById("imageModal");
    const modalImage = document.getElementById("modalImage");
    const closeModal = document.getElementById("closeModal");

    let imageWidth = getImageWidth();
    let currentIndex = 0;

    function getImageWidth() {
        if (window.matchMedia("(max-width: 640px)").matches) {
            return 225; // Width for screens 0-640px
        } else if (
            window.matchMedia("(min-width: 641px) and (max-width: 768px)")
                .matches
        ) {
            return 250; // Width for screens 641-768px
        } else if (
            window.matchMedia("(min-width: 769px) and (max-width: 1023px)")
                .matches
        ) {
            return 250; // Width for screens 641-768px
        } else if (
            window.matchMedia("(min-width: 1024px) and (max-width: 1280px)")
                .matches
        ) {
            return 300; // Width for screens 769-1280px
        }
        return 450; // Default to 450px for larger screens
    }

    function updateSliderPosition() {
        track.style.transform = `translateX(-${currentIndex * imageWidth}px)`;
    }

    window.addEventListener("resize", function () {
        imageWidth = getImageWidth();
        updateSliderPosition();
    });

    if (prevBtnModal) {
        prevBtnModal.addEventListener("click", function () {
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            updateSliderPosition();
        });
    }

    if (nextBtnModal) {
        nextBtnModal.addEventListener("click", function () {
            currentIndex = (currentIndex + 1) % images.length;
            updateSliderPosition();
        });
    }

    Array.from(images).forEach((image) => {
        image.addEventListener("click", function () {
            modalImage.src = image.src;
            modal.classList.remove("hidden");
        });
    });

    modal.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.classList.add("hidden");
        }
    });
});

// MODAL SCRIPT FOR DETAIL PAGE END

//SIDEBAR DASHBOARD START
const sidebar = document.getElementById("sidebar");
const overlay = document.getElementById("overlaysidebar");

function toggleSidebar() {
    sidebar.classList.toggle("-translate-x-full");
    overlay.classList.toggle("hidden");
}

function toggleSubMenu(menuId) {
    const menu = document.getElementById(menuId);
    const icon = document.getElementById(`${menuId}-icon`);
    menu.classList.toggle("hidden");
    icon.classList.toggle("rotate-90");
}

//SIDEBAR DASHBOARD END
