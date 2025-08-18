import Chart from "chart.js/auto";

document.addEventListener("DOMContentLoaded", function () {
    const canvas = document.getElementById("salesChart");
    if (!canvas) return;

    const months = JSON.parse(canvas.dataset.months || "[]");
    const revenues = JSON.parse(canvas.dataset.revenues || "[]");

    new Chart(canvas, {
        type: "bar",
        data: {
            labels: months,
            datasets: [
                {
                    label: "Doanh thu",
                    data: revenues,
                    backgroundColor: "rgba(75, 192, 192, 0.5)",
                    borderColor: "rgba(75, 192, 192, 1)",
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: { beginAtZero: true },
            },
        },
    });
});
