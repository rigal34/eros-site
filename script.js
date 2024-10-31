document.addEventListener("DOMContentLoaded", function() {
    const images = document.querySelectorAll("div#mesphotos img");
    images.forEach(img => {
        // Si le CSS ne semble pas appliqué (par exemple, pas de border-radius détecté)
        if (window.getComputedStyle(img).borderRadius !== "10px") {
            img.style.borderRadius = "10px";
            img.style.objectFit = "cover";
            img.style.transition = "transform 0.3s ease, box-shadow 0.3s ease";
            img.addEventListener("mouseover", () => {
                img.style.transform = "scale(1.1)";
                img.style.boxShadow = "0 4px 8px rgba(0, 0, 0, 0.3)";
            });
            img.addEventListener("mouseout", () => {
                img.style.transform = "scale(1)";
                img.style.boxShadow = "none";
            });
        }
    });
});
