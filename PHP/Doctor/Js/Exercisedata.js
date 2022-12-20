$(document).ready(function() {
    $.ajax({
        url: "http://localhost/phawa/PHP/Doctor/excgraph.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var user = [];
            var inruncounter = [];
            var outruncounter = [];
            var cyclingcounter = [];

            for (var i in data) {
                user.push(data[i].crnt_date);
                inruncounter.push(data[i].inruncounter);
                outruncounter.push(data[i].outruncounter);
                cyclingcounter.push(data[i].cyclingcounter);

            }


            var chartdata = {
                labels: user,
                datasets: [{
                        label: 'Indoor(Km)',
                        backgroundColor: '#ff0053',
                        borderColor: '#fff',
                        data: inruncounter
                    },
                    {
                        label: 'Outdoor(Km)',
                        backgroundColor: '#59f3a6',
                        borderColor: '#fff',
                        data: outruncounter
                    },
                    {
                        label: 'cycling(Km)',
                        backgroundColor: '#9dedf9',
                        borderColor: '#fff',
                        data: cyclingcounter
                    }





                ]
            };



            var ctx = $("#mycanvas");

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata,
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }

            });
        },
        error: function(data) {
            console.log(data);
        }
    });
});