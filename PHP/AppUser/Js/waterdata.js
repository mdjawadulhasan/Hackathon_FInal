var counter2 = document.querySelector('#fnumber').value;
if (counter2 > 7) {
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
    if (counter > 7) {
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
        url: "http://localhost/phawa/PHP/Patient/watergrapgh.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var user = [];
            var watercounter = [];

            for (var i in data) {
                user.push(data[i].crnt_date);
                watercounter.push(data[i].watercounter);
            }


            var chartdata = {
                labels: user,
                datasets: [{
                    label: 'Water Glass',
                    backgroundColor: 'rgb(28, 164, 202)',
                    borderColor: '#fff',
                    hoverBackgroundColor: 'rgb(15, 91, 112)',
                    hoverBorderColor: 'rgb(240, 128, 15)',
                    data: watercounter
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