// var counter2 = document.querySelector('#fnumber').value;
// if (counter2 > 5) {
//     document.querySelector('.counterbox').style.color = "#16a085";
// } else {
//     document.querySelector('.counterbox').style.color = "tomato";
// }



addBtn = document.getElementsByClassName('btnadd')[0];
subtractBtn = document.getElementsByClassName('btnsubtract')[0];
setbtn = document.getElementsByClassName('btnset')[0];
number = document.getElementById('number');

var counter = document.querySelector('#fnumber').value;

document.querySelector('#fnumber').value = counter;

function check() {
    // if (counter > 60) {
    //     document.querySelector('.counterbox').style.color = "#16a085";
    // } else {
    //     document.querySelector('.counterbox').style.color = "tomato";
    // }
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
        url: "http://localhost/phawa/PHP/Patient/weightgraph.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var user = [];
            var whtcounter = [];

            for (var i in data) {
                user.push(data[i].crnt_date);
                whtcounter.push(data[i].whtcounter);
            }


            var chartdata = {
                labels: user,
                datasets: [{
                    label: 'Body Weight',
                    backgroundColor: '#f8c592',
                    borderColor: '#fff',
                    hoverBackgroundColor: 'rgb(240, 128, 15)',
                    hoverBorderColor: 'rgb(240, 128, 15)',
                    data: whtcounter
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