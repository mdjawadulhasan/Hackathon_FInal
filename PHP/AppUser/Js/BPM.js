var counter2 = document.querySelector('#fnumber').value;
if (counter2 > 60) {
    document.querySelector('.counterbox').style.color = "#16a085";
} else {
    document.querySelector('.counterbox').style.color = "tomato";
}



addBtn = document.getElementsByClassName('btnadd')[0];
subtractBtn = document.getElementsByClassName('btnsubtract')[0];
setbtn = document.getElementsByClassName('btnset')[0];
number = document.getElementById('number');

var counter = document.querySelector('#fnumber').value;

document.querySelector('#fnumber').value = counter;

function check() {
    if (counter > 60) {
        document.querySelector('.counterbox').style.color = "#16a085";
    } else {
        document.querySelector('.counterbox').style.color = "tomato";
    }
}




addBtn.addEventListener("click", function() {

    if (counter < 300) {
        counter++;
    }
    check();
    number.innerHTML = counter;
    document.querySelector('#fnumber').value = counter;


});
subtractBtn.addEventListener("click", function() {

    if (counter != 0) {
        counter--;
    }
    check();
    number.innerHTML = counter;
    document.querySelector('#fnumber').value = counter;

});


$(document).ready(function() {
    $.ajax({
        url: "http://localhost/phawa/PHP/Patient/BPMgraph.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var player = [];
            var heartrcount = [];

            for (var i in data) {
                player.push(data[i].crnt_date);
                heartrcount.push(data[i].heartrcount);
            }


            var chartdata = {
                labels: player,
                datasets: [{
                    label: 'Heart Rate',
                    backgroundColor: '#f87373',
                    borderColor: '#fff',
                    hoverBackgroundColor: ' #ff0000',
                    hoverBorderColor: 'rgba(200, 200, 200, 1)',
                    data: heartrcount

                }]
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