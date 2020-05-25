counter = 0;
counter_r = 0;

function updateArrayPcv() {
    what = true;
    counter_r++;
    Cycleoff = Number($('input[name=cycleOff]').val());
    flow = Number($('input[name=flow]').val());
    pmus = Number($('input[name=pmus]').val());
    rrBpm = Number($('input[name=rrBpm]').val());
    cst = Number($('input[name=cst]').val());
    rva = Number($('input[name=rva]').val());
    peep = Number($('input[name=peep]').val());
    inspPause = Number($('input[name=inspPause]').val());
    flow_rpm = Number($('input[name=rpm]').val());
    inspTime = Number($('input[name=inspTime]').val());
    DeltaP = Number($('input[name=deltaP]').val());

    vlume = (DeltaP - 15) * 40 + 714;

    Insp_Hold = false;
    Exp_Hold = false;
    h = 12;
    //inspTime=(vlume*60)/(flow*1000);
    expTime = (60 / flow_rpm) - inspTime;
    //console.log(expTime);
    K1 = (inspTime / 30);
    K2 = (expTime / 30);
    c84 = 5;


    T_i_v_pcv = 0;
    t_c_1_pcv = 0.1 * (inspTime / 3);
    t_v_1_pcv = [];
    t_pcv = 0;
    i = 0;
    while (i <= 30) {
        t_v_1_pcv.push(t_pcv);
        t_pcv = t_pcv + t_c_1_pcv;
        i = i + 1;
    }
    //console.log(t_v_1_pcv);
    t_c_pcv = [];
    for (i = 0; i < 3; i++) {
        t_c_pcv.push(t_v_1_pcv.slice(-1)[0]);
    }
    // console.log(t_constant_pcv);
    t_c_2_pcv = 0.1 * (expTime / 3);
    t_v_2_pcv = [];
    t_v_2_pcv.push(Math.round((t_c_2_pcv + t_v_1_pcv.slice(-1)[0]) * 100) / 100);
    i = 1;

    while (i <= 29) {
        t_v_2_pcv.push(t_c_2_pcv + t_v_2_pcv[i - 1]);
        i += 1
    }
    f_t_v_pcv = t_v_1_pcv.concat(t_c_pcv);
    f_t_v_pcv = f_t_v_pcv.concat(t_v_2_pcv);
    //console.log(f_t_v_pcv);

    const s_vars = (rrBpm * 1.25) > 15 ? rrBpm * 1.25 : 15;
    // console.log(s_vars);

    U_v_pcv = [];
    for (i = 0; i < f_t_v_pcv.length; i++) {
        u = -(pmus * Math.sin(((Math.PI) ** 2) / 90 * f_t_v_pcv[i] * s_vars));
        U_v_pcv.push(u);
    }
    //console.log(U_v_pcv);

    v_pcv = (vlume / (cst * 3.5)) + 2.5;
    w_v_pcv = [];
    for (j = 0; j < 63; j++) {
        if (U_v_pcv[j + 1] > U_v_pcv[j]) {
            w_v_pcv.push("Salita")
        } else if (U_v_pcv[j] > (-(v_pcv + 2))) {
            w_v_pcv.push("insuff")
        } else {
            w_v_pcv.push("suff")
        }
    }
    //console.log(w_v_pcv)

    x_v_pcv = [" "];
    for (i = 1; i < 63; i++) {
        if (w_v_pcv[i] === "insuff") {
            x_v_pcv.push(" ")
        } else if (w_v_pcv[i] === "Salita") {
            x_v_pcv.push(" ")
        } else if (w_v_pcv[i] === "suff") {
            if (w_v_pcv[i - 1] === "suff") {
                x_v_pcv.push(" ")
            } else {
                x_v_pcv.push(f_t_v_pcv[i])
            }
        } else {
            x_v_pcv.push(" ")
        }
    }
    //console.log(x_v_pcv)

    y_v_pcv = [];
    for (i = 0; i < 30; i++) {
        if (Number(x_v_pcv[i]) === x_v_pcv[i] && x_v_pcv[i] % 1 !== 0) {
            y_v_pcv.push(x_v_pcv[i]);
        } else {
            y_v_pcv.push(0);
        }
    }

    y_min_1_pcv = [];
    y_min_2_pcv = [];
    for (var iX = 0; iX < y_v_pcv.length; iX++) {
        i = y_v_pcv[iX];
        if (i === 0) {
            y_min_1_pcv.push(i);
        } else {
            y_min_2_pcv.push(i);
        }
    }
    const y = (y_min_2_pcv.length === 0) ? 0 : Math.min(y_min_2_pcv).toFixed(3);
    y_pcv = parseFloat(y);
    // console.log(y_pcv);

    // Ab Variable
    ab1_pcv = [];
    for (i = 0; i < 34; i++) {
        ab1_pcv.push("")
    }
    ab2_pcv = [];
    for (i = 34; i < 64; i++) {
        if (f_t_v_pcv[i] > (inspTime + expTime - y_pcv)) {
            ab2_pcv.push(1)
        } else {
            ab2_pcv.push(0)
        }
    }
    ab_v_pcv = ab1_pcv.concat(ab2_pcv);
    // console.log(ab_v_pcv.length);
    //console.log(ab_v_pcv);

    // AC variable
    ac_pcv = 0;
    ac_l_pcv = [];
    for (i = 34; i < 64; i++) {
        ac_l_pcv.push(ac_pcv);
        ac_pcv = ac_pcv + t_c_2_pcv * ab_v_pcv[i]
    }
    ac_v_pcv = [];//this is ac_variable list different from ac_1_pcv
    ac_v_pcv = ab1_pcv.concat(ac_l_pcv);
    // console.log(ac_v_pcv.length);
    //console.log(ac_v_pcv);

    // ad
    ad_l_pcv = [];
    for (i = 34; i < 64; i++) {
        ad = -(pmus * (Math.sin(((Math.PI) ** 2) / 90 * ac_v_pcv[i] * s_vars)));
        ad_l_pcv.push(ad)
    }
    ad2_pcv = [];
    for (i = 0; i < 34; i++) {
        ad2_pcv.push(0)
    }
    ad_v_pcv = ad2_pcv.concat(ad_l_pcv);
    //console.log(ad_v_pcv);

    // Z variable
    z_v_pcv = [];
    for (i = 0; i < f_t_v_pcv.length; i++) {
        let z = -(pmus * (Math.sin(((Math.PI) ** 2) / 90 * (f_t_v_pcv[i] + y_pcv) * s_vars)));
        if (z < 0) {
            z_v_pcv.push(z)
        } else {
            z_v_pcv.push(0)
        }
    }
    //console.log(y_pcv);
    //console.log(z_v_pcv);

    // AE Variable
    ae_v_pcv = [z_v_pcv[0]];
    for (i = 1; i < 64; i++) {
        if (ae_v_pcv[i - 1] === 0) {
            ae_v_pcv.push(0)
        } else {
            ae_v_pcv.push(z_v_pcv[i])
        }
    }
    //console.log(ae_v_pcv);

    af_v_pcv = [];
    for (i = 0; i < 64; i++) {
        af_v_pcv.push(ae_v_pcv[i] + ad_v_pcv[i])
    }
    // console.log(af_v_pcv.length);
    //console.log(af_v_pcv);

    // Q_variable
    Q_v_pcv = [];
    // Q_variable = af_variable[0] === 0 ? Q_variable.push(peep) : Q_variable.push(peep - 2);
    if (af_v_pcv === 0) {
        Q_v_pcv.push(peep);
    } else {
        Q_v_pcv.push(peep - 2);
    }
    Q_v_pcv.push((peep + h) / 2);
    Q_v_pcv.push(peep + h);
    for (i = 0; i < 27; i++) {
        Q_v_pcv.push(Q_v_pcv.slice(-1)[0]);
    }
    for (i = 29; i < 63; i++) {
        Q_v_pcv.push(peep);
    }
    //console.log(Q_variable);

    M_pcv = [0];
    N_pcv = [0];
    P_pcv = [0];
    for (i = 1; i < 31; i++) {
        x = (Q_v_pcv[i] - af_v_pcv[i] - peep - P_pcv[i - 1] / cst) / (rva + K1 * 1000 / cst);
        M_pcv.push(x);

        if (M_pcv[i] > 0) {
            N_pcv.push(M_pcv[i]);
        } else {
            N_pcv.push(0);
        }
        y1 = P_pcv[i - 1] + (N_pcv[i] * K1 * 1000);
        P_pcv.push(y1);
    }

    //console.log(M_pcv);
    //console.log(N_pcv);
    //console.log(P_pcv);

    for (i = 0; i < 3; i++) {
        M_pcv.push(" ");
        N_pcv.push(0);
        P_pcv.push(P_pcv.slice(-1)[0])////here
    }
    //console.log(N_pcv[33]);

    M_pcv.push((Q_v_pcv[34] - af_v_pcv[34] - peep - P_pcv[33] / cst) / ((rva + peep) + K2 * 1000 / cst));
    N_pcv.push(M_pcv.slice(-1)[0]);
    if ((P_pcv[33] + (N_pcv[34] * K2 * 1000)) < 0) {
        P_pcv.push(0);
    } else {
        P_pcv.push(P_pcv[33] + (N_pcv[34] * K2 * 1000))
    }

    for (var i = 35; i < 64; i++) {
        x = (Q_v_pcv[i] - af_v_pcv[i] - peep - P_pcv[i - 1] / cst) / ((rva + 5) + K2 * 1000 / cst);

        if (x > 0) {
            if (ab_v_pcv[i] === 1) {
                M_pcv.push(0);
            } else {
                M_pcv.push(x);
            }
        } else {
            M_pcv.push(x);
        }
        N_pcv.push(M_pcv.slice(-1)[0]);
        //const yKt = P[i - 1] + (N[i] * K2 * 1000); here
        y2 = P_pcv[i - 1] + (N_pcv[i] * K2 * 1000);
        if (y2 < 0) {
            P_pcv.push(0);
        } else {
            P_pcv.push(y2);
        }
    }
    vol_pcv = [];
    for (var ind = 0; ind < P_pcv.length; ind++) {
        i = P_pcv[ind];
        vol_pcv.push(i / 1000);
    }

    R_v_pcv = [];
    for (i = 0; i < 30; i++) {
        x = peep + P_pcv[i] / cst + af_v_pcv[i];
        R_v_pcv.push(x);
    }

    for (i = 0; i < 3; i++) {
        R_v_pcv.push(R_v_pcv.slice(-1)[0]);
    }
    for (let i = 33; i >= 64; i++) {
        x = peep + P_pcv[i] / cst + af_v_pcv[i];
        R_v_pcv.push(x);
    }

    //IE ratio

    Ratio_pcv = (inspTime / (inspTime + expTime));
    Insp_ratio_pcv = Math.round(Ratio_pcv * 100) / 100;
    //console.log(Insp_ratio)
    Exp_ratio_pcv = Math.round((1 - Ratio_pcv) * 100) / 100;
    //console.log(Exp_ratio)

    Insp_len_pcv = Math.round(f_t_v_pcv.length * Insp_ratio_pcv);
    Exp_len_pcv = Math.round(f_t_v_pcv.length * Exp_ratio_pcv);
    //console.log(Insp_len_pcv,Exp_len_pcv);

    l1_count_pcv = Math.round(t_v_1_pcv.length / Insp_len_pcv);
    l2_count = Math.round((t_v_2_pcv.length + t_c_pcv.length) / Exp_len_pcv);
    //console.log(l1_count,l2_count);

    time_1_pcv = [];
    time_1_pcv.push(f_t_v_pcv[0]);
    volume_1_pcv = [];
    volume_1_pcv.push(vol_pcv[0]);
    flow_1_pcv = [];
    flow_1_pcv.push(N_pcv[0]);
    pressure_1_pcv = [];
    pressure_1_pcv.push(Q_v_pcv[0]);
    l = 1;
    while (l <= 30) {
        time_1_pcv.push(f_t_v_pcv[l]);
        volume_1_pcv.push(vol_pcv[l]);
        flow_1_pcv.push(N_pcv[l]);
        pressure_1_pcv.push(Q_v_pcv[l]);
        l += l1_count_pcv;
    }
    time_1_pcv.push(f_t_v_pcv[33]);
    volume_1_pcv.push(vol_pcv[33]);
    flow_1_pcv.push(N_pcv[33]);
    pressure_1_pcv.push(Q_v_pcv[33]);

    for (i = 34; i < 64; i++) {
        time_1_pcv.push(f_t_v_pcv[i]);
        volume_1_pcv.push(vol_pcv[i]);
        flow_1_pcv.push(N_pcv[i]);
        pressure_1_pcv.push(Q_v_pcv[i]);
    }
    //console.log(time_1_pcv);
    //console.log(volume_1_pcv);
    //console.log(flow_1_pcv);
    //console.log(pressure_1_pcv);

    // Insp_Pause Calculations

    i_t = Number(inspPause) * 10;  //i_t is same in both taking input
    if (i_t > 10) {
        i_t = 10;
    }

    //volume slide
    s_v_pcv = [];
    v_max_pcv = Math.max(...volume_1_pcv);
    for (i = 0; i < volume_1_pcv.length; i++) {
        if (volume_1_pcv[i] === v_max_pcv) {
            vsi_pcv = i;
        }
    }
    //console.log(vsi_pcv);
    repeat_v_pcv = vsi_pcv;
    for (i = 0; i < vsi_pcv; i++) {
        s_v_pcv.push(volume_1_pcv[i]);
    }
    //console.log(s_v_pcv);
    for (i = 0; i < i_t; i++) {
        s_v_pcv.push(v_max_pcv);
    }

    while (s_v_pcv.length < volume_1_pcv.length) {
        s_v_pcv.push(volume_1_pcv[repeat_v_pcv]);
        repeat_v_pcv += 1;
    }
    // console.log(s_v);

    //flow slide
    s_f_pcv = [];
    s_f_pcv = [];
    zero_index_pcv = [];
    for (i = 0; i < flow_1_pcv.length; i++) {
        if (flow_1_pcv[i] === 0) {
            zero_index_pcv.push(i);
        }
    }
    flow_zero_pcv = zero_index_pcv[1];
    //console.log(flow_1_pcv)

    flow_zero_to_pcv = (flow_zero_pcv + i_t);
    // console.log(flow_zero, flow_zero_to);
    for (i = 0; i < flow_zero_pcv; i++) {
        s_f_pcv.push(flow_1_pcv[i]);
    }
    zero_repeat_pcv = flow_zero_pcv;

    while (flow_zero_pcv < flow_zero_to_pcv) {
        s_f_pcv.push(flow_1_pcv[zero_repeat_pcv]);
        flow_zero_pcv += 1;
    }
    while (s_f_pcv.length < flow_1_pcv.length) {
        s_f_pcv.push(flow_1_pcv[zero_repeat_pcv]);
        zero_repeat_pcv += 1;
    }

    //pressure slide
    s_p_pcv = [];
    p_max_index = [];
    p_max_value = Math.max(...pressure_1_pcv);
    for (i = 0; i < pressure_1_pcv.length; i++) {
        if (pressure_1_pcv[i] === p_max_value) {
            p_max_index.push(i);
        }
    }
    //console.log(p_max_index)
    if (rva <= 2) {
        slide_height = 0;
    }
    if (2 < rva < 8) {
        slide_height = 2;
    }
    if (8 <= rva <= 16) {
        slide_height = Math.round(rva / 4);
    } else {
        slide_height = 6;
    }
    //console.log(slide_height);

    p_slide_index = (p_max_index.slice(-1)[0] + 1);
    p_slide_value = (p_max_value - slide_height);
    i_p = 0;

    //console.log(p_slide_index)
    //console.log(p_slide_value)
    while (i_p < p_slide_index) {
        s_p_pcv.push(pressure_1_pcv[i_p]);
        i_p += 1;
    }


    p_slide_index_to = p_slide_index + i_t;
    while (p_slide_index <= p_slide_index_to) {
        s_p_pcv.push(p_slide_value);
        p_slide_index += 1;
    }
    remain_len = s_p_pcv.length;
    while (remain_len < pressure_1_pcv.length) {
        s_p_pcv.push(pressure_1_pcv[remain_len]);
        remain_len += 1;
    }
    //console.log(s_p_pcv);


    if (counter_r === 1) {
        flowtime_pcv = time_1_pcv;
        pressuretime_pcv = time_1_pcv;
        ftv_pcv = time_1_pcv;
        volume1_pcv = volume_1_pcv;
        o_variable_pcv = flow_1_pcv;
        AH_variable_1_pcv = pressure_1_pcv;
        final_time_values_pcv = time_1_pcv;
        final_time_values2_pcv = time_1_pcv;
        //console.log();
        n_ftv_pcv = ftv_pcv;
        v_pcv = volume1_pcv;
        final1_pcv = final_time_values_pcv;
        final2_pcv = final_time_values2_pcv;
        o_pcv = o_variable_pcv;
        ah_pcv = AH_variable_1_pcv;
        for (i = 0; i < 6; i++) {
            ftv_pcv = ftv_pcv.concat(n_ftv_pcv);
            volume1_pcv = volume1_pcv.concat(v_pcv);
            final_time_values_pcv = final_time_values_pcv.concat(final1_pcv);
            final_time_values2_pcv = final_time_values2_pcv.concat(final2_pcv);
            o_variable_pcv = o_variable_pcv.concat(o_pcv);
            AH_variable_1_pcv = AH_variable_1_pcv.concat(ah_pcv);

        }
    }
// console.log(o_variable);


    l_pcv = s_v_pcv.length;
    r_v_pcv = s_v_pcv[l_pcv - 1];
    for (i = 0; i < l_pcv; i++) {
        if (s_v_pcv[i] > r_v_pcv) {
            r_i_pcv = i;
            break;
        }
    }
    r_i_pcv = r_i_pcv - 1;
    i_i_pcv = r_i_pcv;
    n_ftv_pcv = Array();

    for (i = 0; i < l_pcv; i++) {
        n_ftv_pcv[i] = s_v_pcv[i_i_pcv];
        i_i_pcv = i_i_pcv + 1;
        if (i_i_pcv === l_pcv) {
            break;
        }
    }

    s_v_pcv = n_ftv_pcv;


    time_1_sv_pcv = [];
    for (i = 0; i < s_v_pcv.length; i++) {
        time_1_sv_pcv.push(time_1_pcv[i]);
    }

}

updateArrayPcv();
var options4 = {
    responsive: true,
    maintainAspectRatio: false,
    title: {
        text: 'PCV'
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
var options5 ={
    responsive: true,
    maintainAspectRatio: false,
    title: {
        display: false,
        text: 'PCV'
    },
    scales: {
        xAxes: [{ticks: {autoSkip: true, maxTicksLimit: 6}, display: false}],
        yAxes: [{ticks: {min: -2, max: 2.5}}]
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
var options6 ={
    responsive: true,
    maintainAspectRatio: false,
    title: {
        display: false,
        text: 'PCV'
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
};
chart4 = new Chart(document.getElementById("line-chart4"), {
    type: 'line',
    data: {
        labels: ftv_pcv,
        datasets: [{
            label: '',
            data: volume1_pcv,
            borderColor: "#1ABB9C",
            fill: false,
            pointRadius: 0, borderWidth: 1.5
        }
        ]
    },
    options: options4,

});
chart5 = new Chart(document.getElementById("line-chart5"), {
    type: 'line',
    data: {
        labels: final_time_values_pcv,
        datasets: [{
            label: '',
            data: o_variable_pcv,
            borderColor: "#1ABB9C",
            fill: false,
            pointRadius: 0, borderWidth: 1.5
        }
        ]
    },
    options: options5,

});
chart6 = new Chart(document.getElementById("line-chart6"), {
    type: 'line',
    data: {
        labels: final_time_values2_pcv,
        datasets: [{
            label: '',
            data: AH_variable_1_pcv,
            borderColor: "#1ABB9C",
            fill: false,
            pointRadius: 0, borderWidth: 1.5
        }
        ]
    },
    options: options6,

});

function pause() {
    if (what) {
        what = false;
    } else {
        what = true;
    }
}

window.onload = function () {
    var updateInterval = 80;
    var j = 0;
    var t1 = 0.89;
    var t2 = 1.02;
    var j1s = 0;
    var j_pcv = 0;
    var j1s_pcv = 0;
    var updateChart = function () {
        if (what) {
            if (j_pcv === time_1_sv_pcv.length) {
                j_pcv = 0;
            }
            if (j_pcv === time_1_pcv.length) {
                j_pcv = 0;
            }
            if (j1s_pcv === s_v_pcv.length) {
                j1s_pcv = 0;
            }


            chart4.data.labels.push(time_1_sv_pcv[j_pcv]);
            //t = time_1_pcv.indexOf(ftv_pcv[0]);
            //console.log(time_1[j]);
            chart4.data.labels.shift();

            chart4.data.datasets[0].data.push(s_v_pcv[j1s_pcv]);

            //console.log(s_v);
            chart4.data.datasets[0].data.shift();
            // console.log(j);
            // console.log(ftv);
            //console.log(s_v);
            chart4.update();
            chart4.render();

            chart5.data.labels.push(time_1_pcv[j_pcv]);
            //t = time_1_pcv.indexOf(final_time_values_pcv[0]);

            //console.log(t)
            chart5.data.labels.shift();
            chart5.data.datasets[0].data.push(s_f_pcv[j_pcv]);
            // console.log(new_f1[t])
            chart5.data.datasets[0].data.shift();

            chart5.update();
            chart5.render();

            chart6.data.labels.push(time_1_pcv[j_pcv]);
            //t = time_1_pcv.indexOf(final_time_values2_pcv[0]);
            //console.log(t)
            chart6.data.labels.shift();
            chart6.data.datasets[0].data.push(s_p_pcv[j_pcv]);
            chart6.data.datasets[0].data.shift();

            chart6.update();
            chart6.render();
            j_pcv++;
            j1s_pcv++;


        }
    };

    updateChart();
    setInterval(function () {
        updateChart()
    }, updateInterval);

};
