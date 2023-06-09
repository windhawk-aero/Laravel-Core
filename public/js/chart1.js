const ctx = document.getElementById('lineChart');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Ocak', 'Şubat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Ağustos', 'Eylul', 'Ekim', 'Kasım', 'Aralık'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3, 4, 6, 12, 8, 5, 9],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});