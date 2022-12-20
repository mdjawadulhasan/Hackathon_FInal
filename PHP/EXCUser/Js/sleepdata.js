var counter2 = document.querySelector('#fnumber').value;
if (counter2 > 5) {
    document.querySelector('.counterbox').style.color = "#16a085";
    // document.querySelector("img").src = "../../Images/Slee2.svg";
    // document.querySelector("img").style.height = "300px";
    // document.querySelector("img").style.width = "300px";
} else {
    document.querySelector('.counterbox').style.color = "tomato";
    // document.querySelector("img").src = "../../Images/Sleep.svg";
}



addBtn = document.getElementsByClassName('btnadd')[0];
subtractBtn = document.getElementsByClassName('btnsubtract')[0];
setbtn = document.getElementsByClassName('btnset')[0];
number = document.getElementById('number');

var counter = document.querySelector('#fnumber').value;

document.querySelector('#fnumber').value = counter;

function check() {
    if (counter > 5) {
        document.querySelector('.counterbox').style.color = "#16a085";
        // document.querySelector("img").src = "../../Images/Slee2.svg";
        // document.querySelector("img").style.height = "500px";
        // document.querySelector("img").style.width = "500px";
    } else {
        document.querySelector('.counterbox').style.color = "tomato";
        // document.querySelector("img").src = "../../Images/Sleep.svg";
    }
}




addBtn.addEventListener("click", function() {

    if (counter < 24) {
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
        url: "http://localhost/phawa/PHP/Patient/graphdata.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var player = [];
            var hrcounter = [];

            for (var i in data) {
                player.push(data[i].crnt_date);
                hrcounter.push(data[i].hrcounter);
            }

            // for (var i in data) {
            //     if (hrcounter[i] < 5) {
            //         backgroundColor: rgb(255, 51, 51);
            //     }

            // }

            var chartdata = {
                labels: player,
                datasets: [{
                    label: 'Sleep Hours',
                    backgroundColor: 'rgb(157, 237, 249)',
                    borderColor: '#fff',
                    hoverBackgroundColor: 'rgb(0, 0, 102)',
                    hoverBorderColor: 'rgba(200, 200, 200, 1)',
                    data: hrcounter

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