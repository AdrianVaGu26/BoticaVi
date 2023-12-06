
document.addEventListener("DOMContentLoaded", function () {
    const metodosPagoItems = document.querySelectorAll(".metodos-pago li");

    metodosPagoItems.forEach((item) => {
        item.addEventListener("mouseover", function () {
            const tooltipText = item.getAttribute("data-tooltip");
            showTooltip(item, tooltipText);
        });

        item.addEventListener("mouseout", function () {
            hideTooltip();
        });
    });

    function showTooltip(item, text) {
        const tooltip = document.createElement("div");
        tooltip.className = "tooltip";
        tooltip.textContent = text;
        document.body.appendChild(tooltip);

        const rect = item.getBoundingClientRect();
        const top = rect.top + window.scrollY - tooltip.offsetHeight - 5;
        const left = rect.left + window.scrollX + rect.width / 2 - tooltip.offsetWidth / 2;

        tooltip.style.top = `${top}px`;
        tooltip.style.left = `${left}px`;
    }

    function hideTooltip() {
        const tooltips = document.querySelectorAll(".tooltip");
        tooltips.forEach((tooltip) => {
            tooltip.parentNode.removeChild(tooltip);
        });
    }
});
