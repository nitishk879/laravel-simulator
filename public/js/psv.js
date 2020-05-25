counter_psv = 0;

function updatearrayspsv() {
    what = true;
    counter_psv++;
    Cycleoff = Number($('input[name=cycleOff]').val());
    copd = Number($('input[name=copd]').val());
    cst = Number($('input[name=cst]').val());
    rva = Number($('input[name=rva]').val());
    Pmus = Number($('input[name=pmus]').val());
    rrbpm = Number($('input[name=rrBpm]').val());
    Ps = Number($('input[name=ps]').val());
    trigger = $('select[name=trigger]').children("option:selected"). val();
    // trigger = $('input[name=trigger]').val();
    senstivity = Number($('input[name=senstivity]').val());
    Peep = Number($('input[name=peep]').val());


    Ttot_psv = 60 / rrbpm;
    Ftot_psv = Ttot_psv / 60;
    J_psv = Ftot_psv;


    time_value_psv = [];
    time_value_psv.push(0);
    for (i = 1; i < 61; i++) {
        time_value_psv.push(time_value_psv[i - 1] + J_psv);
    }
    console.log(time_value_psv)


// Value of N
    N_variable_psv = [];
    M_value_psv = 1.25;
    N_value_psv = M_value_psv * rrbpm;


    for (i = 0; i < 61; i++) {
        if (N_value_psv > 15) {
            N_variable_psv.push(N_value_psv);
        } else {
            N_variable_psv.push(15);
        }
    }


//P values
    P_variable_psv = [];
    for (i = 0; i < 61; i++) {
        p_value_psv = (-Pmus * (Math.sin(((Math.PI) ** 2) / 90 * time_value_psv[i] * N_variable_psv[i])));
        P_variable_psv.push(p_value_psv);
    }

//I120 value taking constant bcoz of iteration
    I_120 = 1.4;

//Q_value
    q_value_psv = (-(I_120 + 2));


//R values
    R_variable_psv = [];
    R_variable_psv.push('insuff');
    for (i = 1; i < 61; i++) {
        if (P_variable_psv[i] > P_variable_psv[i - 1]) {
            R_variable_psv.push("salita")
        } else {
            if (P_variable_psv[i] > q_value_psv) {
                R_variable_psv.push("insuff")
            } else {
                R_variable_psv.push("suff")
            }
        }
    }

//S variable
    S_variable_psv = [];
    S_variable_psv.push(" ")
    for (i = 1; i < 61; i++) {
        if (R_variable_psv[i] === "insuff") {
            S_variable_psv.push(" ");
        } else if (R_variable_psv[i] === "salita") {
            S_variable_psv.push(" ");
        } else if (R_variable_psv[i] === "suff") {
            if (R_variable_psv[i - 1] === "suff") {
                S_variable_psv.push(" ");
            } else {
                S_variable_psv.push(time_value_psv[i]);
            }
        } else {
            S_variable_psv.push(" ");
        }
    }

//T value
    T_psv = [];
    for (i = 0; i < S_variable_psv.length; i++) {
        if (typeof (S_variable_psv[i]) === "number") {
            T_psv.push(S_variable_psv[i]);
        }
    }
    t_value_psv = Math.min(...(T_psv));


//U variable
    U_variable_psv = [];
    for (i = 0; i < 61; i++) {
        u = (-(Pmus * Math.sin(((Math.PI) ** 2) / 90 * (time_value_psv[i] + t_value_psv) * N_variable_psv[i])));
        if (u < 0) {
            U_variable_psv.push(u);
        } else {
            U_variable_psv.push(0);
        }
    }

//Y values
    Y_variable_psv = [];
    Y_variable_psv.push(U_variable_psv[0]);
    for (i = 1; i < 61; i++) {
        if (Y_variable_psv[i - 1] == 0) {
            Y_variable_psv.push(0);
        } else {
            Y_variable_psv.push(U_variable_psv[i]);
        }
    }

//V variable
    V_variable_psv = [];
    for (i = 0; i < 61; i++) {
        if (time_value_psv[i] > ((J_psv * 60) - t_value_psv)) {
            V_variable_psv.push(1);
        } else {
            V_variable_psv.push(0);
        }

    }

// w variable
    W_variable_psv = [];
    W_variable_psv.push(0);
    for (i = 1; i < 61; i++) {
        W_variable_psv.push(W_variable_psv[i - 1] + (J_psv * V_variable_psv[i]))
    }

//X variable
    X_variable_psv = [];
    for (i = 0; i < 61; i++) {
        x_psv = (-(Pmus * (Math.sin((Math.PI ** 2) / 90 * W_variable_psv[i] * N_variable_psv[i]))));
        X_variable_psv.push(x_psv);
    }


//Z variable
    Z_variable_psv = [];
    for (i = 0; i < 61; i++) {
        Z_variable_psv.push(X_variable_psv[i] + Y_variable_psv[i]);
    }

//AE value
    AE_variable_psv = [];
    AE_variable_psv.push(Peep - 2);
    AE_variable_psv.push(Peep + Ps / 2);
    AE_variable_psv.push(Peep + Ps);

    AA_variable_psv = [];
    AA_variable_psv.push(0);
    AC_variable_psv = [];
    AC_variable_psv.push(0);
    AD_variable_psv = [];
    AD_variable_psv.push(" ");
    E_variable_psv = [];
    E_variable_psv.push(rva)


    for (i = 1; i < 3; i++) {
        E_variable_psv.push(rva);
        aa = (AE_variable_psv[i] - Z_variable_psv[i] - Peep - (AC_variable_psv[i - 1] * 1000 / cst)) / (E_variable_psv[i] + (Ftot_psv * 1000 / cst));
        if (V_variable_psv[i] == 0) {
            AA_variable_psv.push(aa);
        } else if (aa < 0) {
            AA_variable_psv.push(aa);
        } else {
            AA_variable_psv.push(0);
        }


        ac = AC_variable_psv[i - 1] + (AA_variable_psv[i] * Ftot_psv);
        AC_variable_psv.push(ac);

        if (V_variable_psv[i] == 1) {
            AD_variable_psv.push(" ");
        } else if (AA_variable_psv[i] < 0) {
            AD_variable_psv.push(" ");
        } else if (AA_variable_psv[i] > AA_variable_psv[i - 1]) {
            AD_variable_psv.push("salita");
        } else {
            AD_variable_psv.push(" ");
        }

    }
    ab_value = Math.max(...AA_variable_psv) * (Cycleoff / 100);
//console.log(ab_value_psv)


    E_variable_psv.push(rva);
    AE_variable_psv.push(AE_variable_psv.slice(-1)[0]);

//console.log(AE_variable)
    for (i = 3; i < 61; i++) {
        if (AA_variable_psv[i - 1] > ab_value) {
            AE_variable_psv.push(Peep + Ps);
            E_variable_psv.push(rva);
        } else {
            AE_variable_psv.push(Peep);
            E_variable_psv.push(rva + 5) //5 is constant c49 in excel
        }

        aa = (AE_variable_psv[i] - Z_variable_psv[i] - Peep - (AC_variable_psv[i - 1] * 1000 / cst)) / (E_variable_psv[i] + (Ftot_psv * 1000 / cst));
        //console.log(aa+"aaaaa")
        if (V_variable_psv[i] == 0) {
            AA_variable_psv.push(aa);
        } else if (aa < 0) {
            AA_variable_psv.push(aa);
        } else {
            AA_variable_psv.push(0);
        }
        //console.log(AA_variable)
        ab_value = Math.max(...AA_variable_psv) * (Cycleoff / 100);
        //console.log(ab_value)

        ac = AC_variable_psv[i - 1] + (AA_variable_psv[i] * Ftot_psv);
        AC_variable_psv.push(ac);


        if (V_variable_psv[i] == 1) {
            AD_variable_psv.push(" ");
        } else if (AA_variable_psv[i] < 0) {
            AD_variable_psv.push(" ");
        } else if (AA_variable_psv[i] > AA_variable_psv[i - 1]) {
            AD_variable_psv.push("salita");
        } else {
            AD_variable_psv.push(" ");
        }

    }


    max_value_psv = Math.max(...AC_variable_psv);
    max_index_psv = AC_variable_psv.indexOf(max_value_psv);
    last_value_psv = AC_variable_psv.slice(-1)[0];
    AC_variable_new_psv = [];

    for (i = 0; i <= max_index_psv; i++) {
        AC_variable_new_psv.push(AC_variable_psv[i] + last_value_psv);
    }

    for (i = (max_index_psv + 1); i < AC_variable_psv.length; i++) {
        AC_variable_new_psv.push(AC_variable_psv[i]);
    }

    AC_variable_psv = AC_variable_new_psv;


    AF_variable_psv = [];
    for (i = 0; i < 61; i++) {
        af = Peep + (AC_variable_psv[i] * 1000 / cst) + Z_variable_psv[i];
        AF_variable_psv.push(af)
    }


    AH_variable_psv = [];
    AH_variable_psv.push(0);
    for (i = 1; i < 61; i++) {
        if (V_variable_psv[i] == 0) {
            AH_variable_psv.push(AE_variable_psv[i]);
        } else if (AA_variable_psv[i] < 0) {
            AH_variable_psv.push(AE_variable_psv[i]);
        } else {
            AH_variable_psv.push(AF_variable_psv[i]);
        }
    }
    AH_variable_psv[0] = AH_variable_psv.slice(-1)[0];


    if (counter_psv == 1) {
        vol_psv = AC_variable_psv;
        flow_psv = AA_variable_psv;
        pressure_psv = AH_variable_psv;
        time_psv = time_value_psv;
        flow_1 = AA_variable_psv;
        time_1 = time_value_psv;


        for (i = 0; i < 3; i++) {
            vol_psv = vol_psv.concat(vol_psv);
            flow_psv = flow_psv.concat(flow_psv);
            pressure_psv = pressure_psv.concat(pressure_psv);
            time_psv = time_psv.concat(time_psv);
        }
    }


    time_values_skip = [];
    time_values_skip.push(0);
    for (i = 1; i < 84; i++) {
        time_values_skip.push(time_values_skip[i - 1] + J_psv);
    }


    time_value_1_psv = [];
    time_value_1_psv = time_value_psv;
    AA_variable_1_psv = [];
    AA_variable_1_psv = AA_variable_psv;
    AH_variable_1_psv = [];
    AH_variable_1_psv = AH_variable_psv;
    AC_variable_1_psv = [];
    AC_variable_1_psv = AC_variable_psv;


    flow_skip = [];
    min_index = AA_variable_psv.indexOf(Math.min(...AA_variable_psv));
    for (i = 16; i < AA_variable_psv.length; i++) {
        if (AA_variable_psv[i] != 0) {
            flow_skip.push(AA_variable_psv[i]);
        } else {
            break;
        }
    }


    reverse = flow_skip.length - 1;
    flow_skip_1 = [];
    for (i = 0; i < flow_skip.length; i++) {
        flow_skip_1.push(flow_skip[reverse - i])
    }


    flow_skip_2 = [];
    flow_skip_2 = flow_skip_2.concat(AA_variable_psv);
    flow_skip_2 = flow_skip_2.concat(flow_skip_1);


    flow_skip_3 = [];
    for (i = 64; i <= 83; i++) {
        x_v = flow_skip_1[2] + (time_values_skip[i] - time_values_skip[63]) / ((time_values_skip[83] - time_values_skip[63]) / (flow_skip_2[61] - flow_skip_2[63]))

        flow_skip_3.push(x_v)
    }


    flow_skip_4 = [];
    for (i = 0; i < 64; i++) {
        flow_skip_4.push(flow_skip_2[i]);

    }

    flow_skip_4 = flow_skip_4.concat(flow_skip_3);


    vol_skip_1 = [];
    for (i = 61; i < 84; i++) {
        vol_v = AC_variable_psv.slice(-1)[0] + (time_values_skip[i] - time_values_skip[60]) / ((time_values_skip[83] - time_values_skip[60]) / (-AC_variable_psv[60] + 0.02354));
        vol_skip_1.push(vol_v);
    }

    vol_skip_2 = [];
    vol_skip_2 = vol_skip_2.concat(AC_variable_psv);
    vol_skip_2 = vol_skip_2.concat(vol_skip_1);


    Z_skip = [];
    for (i = 0; i < Z_variable_psv.length; i++) {
        Z_skip.push(Z_variable_psv[i] + Peep);
    }

    Z_skip_1 = [];

    Z_skip_1 = Z_skip_1.concat(AH_variable_psv);
    for (i = 0; i < 2; i++) {
        Z_skip_1.push(Z_skip_1.slice(-1)[0]);
    }


    Z_skip_2 = [];
    for (i = 54; i <= 60; i++) {
        Z_skip_2.push(AH_variable_psv[i]);
    }


    Z_length = Z_skip_2.length - 1;
    for (i = 0; i < Z_skip_2.length; i++) {
        Z_skip_1.push(Z_skip_2[Z_length - i])
    }


    for (i = Z_skip_1.length; i < 84; i++) {
        Z_skip_1.push(Peep)
    }

    if (Ps < 15) {
        VTi = (558 - 50 * (15 - Ps) - (10 * (Cycleoff - 25)));
    } else {
        VTi = (558 - 20 * (15 - Ps) - (10 * (Cycleoff - 25)));
    }
    if (copd == 1) {
        if (VTi > 420) {

            time_value_psv = time_values_skip;
            AA_variable_psv = flow_skip_4;
            AC_variable_psv = vol_skip_2;
            AH_variable_psv = Z_skip_1;
        }
        if (trigger == 'female' && senstivity == -1) {

            VTi = (558 - 50 * (15 - Ps) - (10 * (Cycleoff - 25))) - 150;
            document.getElementById("VTi").value = VTi;
            time_value_psv = time_value_1_psv;
            AA_variable_psv = AA_variable_1_psv;
            AC_variable_psv = AC_variable_1_psv;
            AH_variable_psv = AH_variable_1_psv;

        } else {

            time_value_psv = time_value_psv;
            AA_variable_psv = AA_variable_psv;
            AC_variable_psv = AC_variable_psv;
            AH_variable_psv = AH_variable_psv;
        }


    }
}


function vol() {
    document.getElementById("VTi").value = VTi;
}
var options = {
    responsive: true,
    maintainAspectRatio: false,
    title: {
        text: 'PSV patient Condition'
    },
    scales: {
        xAxes: [{ticks: {autoSkip: true, maxTicksLimit: 6}, display: false}],
        yAxes: [{ticks: {min: 0, max: 0.8}}]
    },


    legend: {
        display: false
    },
    elements: {
        point: {
            radius: 0
        }
    }
};
var options1 = {
    responsive: true,
    maintainAspectRatio: false,
    title: {
        display: false,
        text: 'World population per region (in millions)'
    },
    scales: {
        xAxes: [{ticks: {autoSkip: true, maxTicksLimit: 6}, display: false}],
        yAxes: [{ticks: {min: -1, max: 2}}]
    },


    legend: {
        display: false
    },
    elements: {
        point: {
            radius: 0
        }
    }
};
var options2 = {
    responsive: true,
    maintainAspectRatio: false,
    title: {
        display: false,
        text: 'World population per region (in millions)'
    },
    scales: {
        xAxes: [{ticks: {autoSkip: true, maxTicksLimit: 6}, display: false}],
        yAxes: [{ticks: {min: 0, max: 20}}]
    },


    legend: {
        display: false
    },
    elements: {
        point: {
            radius: 0
        }
    }
}
updatearrayspsv()
chart1 = new Chart(document.getElementById("line-chart"), {
    type: 'line',
    data: {
        labels: time_psv,
        datasets: [{
            label: '',
            data: vol_psv,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: "#1ABB9C",
            fill: false,
            pointRadius: 0, borderWidth: 1.5
        }
        ]
    },
    options: options,

});

chart2 = new Chart(document.getElementById("line-chart1"), {
    type: 'line',
    data: {
        labels: time_psv,
        datasets: [{
            label: '',
            data: flow_psv,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: "#1ABB9C",
            fill: false,
            pointRadius: 0, borderWidth: 1.5
        }]
    },
    options: options1,

});

chart3 = new Chart(document.getElementById("line-chart2"), {
    type: 'line',
    data: {
        labels: time_psv,
        datasets: [{
            label: '',
            data: pressure_psv,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: "#1ABB9C",
            fill: false,
            pointRadius: 0, borderWidth: 1.5
        }
        ]
    },
    options: options2,

});


function pause() {
    what = !what;
}


window.onload = function () {
    var updateInterval = 50;
    if (copd === 0) {
        var dataLength = time_psv.length;
    }
    if (copd === 1) {
        var dataLength = time_values_skip.length;
    } // number of dataPoints visible at any point
    var j_psv = 0;
    var j1_psv = 0;

    var updateChart = function () {

        if (what) {


            if (j_psv === time_value_psv.length) {
                j_psv = 0;
            }


            chart1.data.labels.push(time_value_psv[j_psv]);
            //t = time_1.indexOf(ftv[0]);
            //console.log(time_1[j]);
            chart1.data.labels.shift();

            chart1.data.datasets[0].data.push(AC_variable_psv[j_psv]);

            //console.log(s_v[j])
            //console.log(s_v);
            chart1.data.datasets[0].data.shift();
            // console.log(j);
            // console.log(ftv);
            //console.log(s_v);
            chart1.update();
            chart1.render();


            chart2.data.labels.push(time_value_psv[j_psv]);
            //t = time_1.indexOf(final_time_values[0]);

            //console.log(t)
            chart2.data.labels.shift();
            chart2.data.datasets[0].data.push(AA_variable_psv[j_psv]);
            // console.log(new_f1[t])
            chart2.data.datasets[0].data.shift();
            chart2.update();
            chart2.render();


            chart3.data.labels.push(time_value_psv[j_psv]);
            //t = time_1.indexOf(final_time_values2[0]);
            //console.log(t)
            chart3.data.labels.shift();
            chart3.data.datasets[0].data.push(AH_variable_psv[j_psv]);
            chart3.data.datasets[0].data.shift();

            chart3.update();
            chart3.render();
            j_psv++;

        }
    };

    updateChart();
    setInterval(function () {
        updateChart()
    }, updateInterval);

};
