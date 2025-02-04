import './bootstrap';
import '@tabler/core/src/js/tabler.js';
import './bootstrap-navbar.js';
import './theme.js';
import './genre.js'
import './top-games.js'

document.addEventListener('DOMContentLoaded', () => {
    const hiddenBadges = JSON.parse(localStorage.getItem('hiddenBadges')) || [];

    document.querySelectorAll('.log-item').forEach((item) => {
        const logId = item.dataset.logId;

        if (hiddenBadges.includes(logId)) {
            const badge = item.querySelector('.badge-visible');
            if (badge) {
                badge.classList.remove('badge-visible');
                badge.classList.add('badge-hidden');
            }
        }

        item.addEventListener('mouseover', () => {
            hideBadge(item);
        });
    });
});

function hideBadge(element) {
    const logId = element.dataset.logId;
    const badge = element.querySelector('.badge-visible');
    if (badge) {
        badge.classList.remove('badge-visible');
        badge.classList.add('badge-hidden');

        let hiddenBadges = JSON.parse(localStorage.getItem('hiddenBadges')) || [];
        if (!hiddenBadges.includes(logId)) {
            hiddenBadges.push(logId);
            localStorage.setItem('hiddenBadges', JSON.stringify(hiddenBadges));
        }
    }
}

//Gráfico
document.addEventListener("DOMContentLoaded", function () {
    // Obter os dados do gráfico do HTML
    const usersDataElement = document.getElementById('monthly-users-data');
    const salesDataElement = document.getElementById('monthly-sales-data');
    const monthsDataElement = document.getElementById('months-data');

    if (!usersDataElement || !salesDataElement || !monthsDataElement) {
        console.error("⚠️ Os dados do gráfico não foram encontrados no HTML.");
        return;
    }

    // Converter os dados para JSON
    const monthlyUsersGraph = JSON.parse(usersDataElement.value);
    const monthlySalesGraph = JSON.parse(salesDataElement.value);
    const months = JSON.parse(monthsDataElement.value);

    console.log("📊 Dados do Gráfico:", { monthlyUsersGraph, monthlySalesGraph, months });

    // Criar o gráfico ApexCharts
    const chartElement = document.getElementById('chart-completion-tasks-10');
    if (chartElement) {
        const chart = new ApexCharts(chartElement, {
            chart: {
                type: "area",
                fontFamily: 'inherit',
                height: 240,
                parentHeightOffset: 0,
                toolbar: { show: false },
                animations: { enabled: false },
            },
            dataLabels: { enabled: false },
            fill: { opacity: .16, type: 'solid' },
            stroke: { width: 2, lineCap: "round", curve: "smooth" },
            series: [
                { name: "Users", data: monthlyUsersGraph },
                { name: "Sales", data: monthlySalesGraph }
            ],
            tooltip: { theme: 'dark' },
            grid: { padding: { top: -20, right: 0, left: -4, bottom: -4 }, strokeDashArray: 4 },
            xaxis: {
                categories: months,
                labels: { padding: 0 },
                tooltip: { enabled: false },
                axisBorder: { show: false },
            },
            yaxis: { labels: { padding: 4 } },
            colors: ["#007bff", "#dc3545"], // Azul e vermelho
            legend: { show: true },
        });

        chart.render();
    } else {
        console.error("⚠️ Elemento #chart-completion-tasks-10 não encontrado.");
    }
});
//Fim Do Gráfico
