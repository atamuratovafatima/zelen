let myChart = document.getElementById('myChart').getContext('2d');
Chart.defaults.font.size = 16;
Chart.defaults.color = '#fff';
Chart.defaults.fontFamily = 'Arial';
let massPopChart = new Chart(myChart, {
    type:'bar',
    data: {
        labels: ['H&M', 'Hermes'],
        datasets: [
            {
            label: 'do',
            data:[100, 90], 
            backgroundColor:[
                '#6b8fb3'
            ],
            borderWidth:1,
            borderColor:'#777',
            hoverBorderWidth:1,
            hoverBorderColor:'#cce5ff',
            },
            {
            label: 'posle',
            data:[120, 10], 
            backgroundColor:[
                '#A9D2FF'
            ],
            borderWidth:1,
            borderColor:'#777',
            hoverBorderWidth:1,
            hoverBorderColor:'#cce5ff',
            }
        ]
    },
    options:{
        scales: {
            beginAtZero: true
        },
        legend:{
            display:false,
            labels:{
                font:{
                    size:40,
                    family:'Arial',
                },
                color:'#fff',
            }
        },
        responsive:true,
        plugins: {
            legend: {
                position: 'bottom',
                // bottom:-20
            },
            title: {
                display: true,
                text: 'Companies under sanction of EU/USA'
            }
        }
    }
});
