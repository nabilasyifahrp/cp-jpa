<script src="assets/js/theme-plugin.js"></script>
<script src="assets/js/theme-script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 900,
        once: true
    });
</script>
<script>
    window.addEventListener("load", function() {
        const loader = document.getElementById("ht-preloader");
        loader.style.opacity = "0";
        loader.style.pointerEvents = "none";
        setTimeout(() => {
            loader.style.display = "none";
        }, 500);
    });
</script>
