counter = 0;
counter_r = 0;

function updateArrayVcv() {
    what = true;
    counter++;
    Cycleoff = $('input[name=cycleOff]').val();
    flow = Number($('input[name=flow]').val());
    // console.log(inspTime)
    inspPause = Number($('input[name=inspPause]').val());
    vlume = Number($('input[name=vlume]').val());
    rrBpm = Number($('input[name=rrBpm]').val());
    cst = Number($('input[name=cst]').val());
    rva = Number($('input[name=rva]').val());
    peep = Number($('input[name=peep]').val());
    //exTime=Number($('input[name=exTime]').val())
    pmus = Number($('input[name=pmus]').val());
    expPause = Number($('input[name=expPause]').val());
    // console.log(inspPause)
    flow_rpm = Number($('input[name=rpm]').val());


    inspTime = (vlume * 60) / (flow * 1000);
    exTime = (60 / flow_rpm) - inspTime;
    //console.log(exTime);

    Time_init_val = 0;
    //inspTime=5;
    // console.log(exTime);
    // console.log(pmus)
    // console.log(rrBpm)
    // console.log(cst)
    // console.log(rva)
    c84 = 5;
    // console.log(vlume)
    // console.log(peep)
    // console.log(Te);
    Insp_Hold = false;
    Exp_Hold = false;
    time_constant_1 = 0.1 * (inspTime / 3);
    time_values_1 = [];
    i = 0;
    t = 0;
    while (i <= 30) {
        time_values_1.push(Math.round(t * 100) / 100);
        t = t + time_constant_1;
        i = i + 1;
    }
    //console.log(time_values_1);
    t_constant = [];
    for (i = 0; i < 3; i++) {
        t_constant.push(time_values_1.slice(-1)[0]);
    }
    // console.log(t_constant)
    time_constant_2 = 0.1 * (exTime / 3);
    time_values_2 = [];
    time_values_2.push(Math.round((time_constant_2 + time_values_1.slice(-1)[0]) * 100) / 100);
    i = 1;
    // t2=time_values_1[-1]
    while (i <= 29) {
        time_values_2.push(Math.round((time_constant_2 + time_values_2[i - 1]) * 100) / 100);
        // t=t+time_constant_2
        i += 1;
    }
    // console.log(time_values_2)
    final_time_values = time_values_1.concat(t_constant);
    final_time_values = final_time_values.concat(time_values_2);
    //console.log(final_time_values)

    v_variable = [];
    for (j = 0; j < final_time_values.length; j++) {
        v = -(pmus * Math.sin(((Math.PI) ** 2) / 90 * final_time_values[j] * rrBpm * 1.25));
        v_variable.push(v);
    }
    // console.log(rrBpm)

    // X (for claculation of Y)
    w = (vlume / (cst * 3.5)) + 2.42;
    x_variable = [];
    for (j = 0; j < 63; j++) {
        if (v_variable[j + 1] > v_variable[j]) {
            x_variable.push("Salita");
        } else if (v_variable[j + 1] > (-w)) {
            x_variable.push("insuff");
        } else {
            x_variable.push("suff");
        }
    }
    // console.log(-w)
    // console.log(x_variable)

    //  Y (calculation of X39)
    y_variable = [" "];
    for (i = 1; i < 63; i++) {
        if (x_variable[i] === "insuff") {
            y_variable.push(" ");
        } else if (x_variable[i] === "Salita") {
            y_variable.push(" ");
        } else if (x_variable[i] === "suff") {
            if (x_variable[i - 1] === "suff") {
                y_variable.push(" ");
            } else {
                y_variable.push(final_time_values[i]);
            }
        } else {
            y_variable.push(" ");
        }
    }
    // console.log(y_variable)
    // console.log(y_variable.length)

    // X39 (imp value)
    x39_values = [];
    for (i = 0; i < 30; i++) {
        if (y_variable[i] === +y_variable[i] && y_variable[i] !== (y_variable[i] | 0)) {
            x39_values.push(y_variable[i]);
        } else {
            x39_values.push(0);
        }
    }
    // console.log(x39_values)
    x39_min_1 = [];
    x39_min_2 = [];
    for (k = 0; k < x39_values.length; k++) {
        i = x39_values[k];
        if (i === 0) {
            x39_min_1.push(i);
        } else {
            x39_min_2.push(i);
        }
    }
    if (x39_min_2.length === 0) {
        x39 = 0;
    } else {
        x39 = Math.round(Math.min(x39_min_2) * 1000) / 1000;
    }
    // console.log(x39)
    // x39=Math.min(x39_values)


    // AC (for calculaton of AD)
    ac1 = [];
    for (i = 0; i < 34; i++) {
        ac1.push("");
    }
    ac2 = [];
    for (i = 34; i < 64; i++) {
        if (final_time_values[i] > (inspTime + exTime - x39)) {
            ac2.push(1);
        } else {
            ac2.push(0);
        }
    }
    ac_variable = ac1.concat(ac2);
    // console.log(ac_variable.length)

    //ac_variable
    // AD
    ad = 0;
    ad_list = [];
    for (i = 34; i < 64; i++) {
        ad_list.push(ad);
        ad = ad + time_constant_2 * ac_variable[i];
    }
    ad_variable = ac1.concat(ad_list);
    // console.log(ad_variable.length)
    //ad_variable

    // AE
    ae_list = [];
    for (i = 34; i < 64; i++) {
        ae = -(pmus * (Math.sin(((Math.PI) ** 2) / 90 * ad_variable[i] * rrBpm * 1.25)));
        ae_list.push(ae);
    }
    ae2 = [];
    for (i = 0; i < 34; i++) {
        ae2.push(0);
    }
    ae_variable = ae2.concat(ae_list);
    // console.log(ae_variable.length)


    // AA (for calculation of AF)
    aa_variable = [];
    for (i = 0; i < final_time_values.length; i++) {
        aa = -(pmus * (Math.sin(((Math.PI) ** 2) / 90 * (final_time_values[i] + x39) * rrBpm * 1.25)));
        if (aa < 0) {
            aa_variable.push(aa);
        } else {
            aa_variable.push(0);
        }
    }
    // console.log(aa_variable.length)

    //AF
    af_variable = [aa_variable[0]];
    for (i = 1; i < 64; i++) {
        if (af_variable[i - 1] === 0) {
            af_variable.push(0);
        } else {
            af_variable.push(aa_variable[i]);
        }
    }
    // console.log(af_variable.length)

    //  AG
    ag_variable = [];
    for (i = 0; i < 64; i++) {
        ag_variable.push(af_variable[i] + ae_variable[i]);
    }
    // console.log(ag_variable)
    // console.log(ag_variable.length)
    //ag_variable

    o_variable = [0];
    o = vlume / (inspTime * 1000);
    for (i = 0; i < 30; i++) {
        o_variable.push(o);
    }
    for (i = 0; i < 3; i++) {
        o_variable.push(0);
    }
    // console.log(o_variable)
    // console.log(o_variable.length)

    Q_variable_1 = [0];
    //q_50=194.4
    for (i = 1; i < 31; i++) {
        x = Q_variable_1[i - 1] + (o_variable[i] * 0.1 * (inspTime / 3) * 1000);
        Q_variable_1.push(x);
    }
    // console.log(Q_variable_1)
    // console.log(Q_variable_1.length)
    Q_add = [];
    for (i = 0; i < 3; i++) {
        Q_add.push(Q_variable_1.slice(-1)[0]);
    }
    Q_variable = Q_variable_1.concat(Q_add);
    // console.log(Q_variable)
    // console.log(Q_variable.length)

    // c84=5   //#######(variable from excel,taking as 5 (in excel also 5)
    o_variable.push((-(ag_variable[33] + Q_variable[33] / cst)) / ((c84 + rva) + (100 * exTime / 3) / cst));
    // console.log(o_variable)
    // console.log(o_variable.length)
    //##### For Q84 (this value is calculated differently )
    q_spec = Q_variable[33] + (o_variable[34] * (0.1 * exTime / 3) * 1000);
    if (q_spec < 0) {
        Q_variable.push(0);
    } else {
        Q_variable.push(q_spec);
    }
    // console.log(Q_variable.length)
    //##### S variable  for calculation of R
    S_variable = [];


    for (i = 0; i < 31; i++) {
        s = peep + (Q_variable[i] / cst) + ag_variable[i];
        S_variable.push(s);
    }
    for (j = 0; j < 3; j++) {
        S_variable.push(S_variable.slice(-1)[0]);
    }
    // console.log(S_variable.length)
    // console.log(S_variable)

    //#### R variable
    R_variable = [];
    for (i = 0; i < 1; i++) {
        if (ag_variable[i] === 0) {
            R_variable.push(peep);
        } else {
            R_variable.push(peep - 2);
        }
    }
    for (i = 1; i < 31; i++) {
        x = peep + o_variable[i] * rva + (Q_variable[i] / cst) + ag_variable[i];
        R_variable.push(x);
    }
    // console.log(R_variable)
    // console.log(R_variable.length)
    //## R variable continue
    S81 = S_variable[31] + 0.1 * (R_variable[30] - S_variable[31]);   //#####S81 acc. to excel
    pressure_slide = inspPause * 10;
    if (pressure_slide > 10) {
        pressure_slide = 10;
    }
    for (i = 0; i < pressure_slide; i++) {
        if (inspPause > 0) {
            R_variable.push(S81);
        } else {
            R_variable.push(peep);
        }
    }

    p_length = R_variable.length;
    for (i = p_length; i < 64; i++) {

        //R_variable.push(R_variable.slice(-1)[0]);
        R_variable.push(peep);
    }

    // console.log(R_variable)
    // console.log(R_variable.length)
    for (i = 34; i < 63; i++) {
        x = (R_variable[i] - ag_variable[i] - peep - (Q_variable[i - 1] / cst)) / ((rva + peep) + (100 * exTime / 3) / cst);
        if (final_time_values[i] > (inspTime + exTime - x39)) {
            ac = 1;
        } else {
            ac = 0;
        }
        if (x > 0) {
            if (ac === 1) {
                o_variable.push(0);
            } else {
                o_variable.push(x);
            }
        } else {
            o_variable.push(x);
        }

        y = Q_variable[i] + (o_variable[i] * (0.1 * exTime / 3) * 1000);
        if (y < 0) {
            Q_variable.push(0);
        } else {
            Q_variable.push(y);
        }
    }
    // console.log(o_variable)
    // console.log(o_variable.length)

    // console.log(Q_variable)
    // console.log(Q_variable.length)
    //##### s varibale continue (bcoz Require Q varible )(calculation of Pressure)
    for (i = 34; i < 64; i++) {
        x = peep + Q_variable[i] / cst + ag_variable[i];
        S_variable.push(x);
    }
    // console.log(S_variable)
    // console.log(S_variable.length)
    volume = Q_variable;
    flow = o_variable;
    volume = [];
    for (i = 0; i < Q_variable.length; i++) {
        if (Q_variable[i] < 0) {
            volume.push(0);
        } else {
            volume.push(Q_variable[i] / 1000);
        }
    }
    //#### AH_variable (for plotting pressure)
    AH_variable_1 = [0];
    for (i = 1; i < 33; i++) {
        AH_variable_1.push(R_variable[i]);
    }

    if (final_time_values[i] > (inspTime + exTime - x39)) {
        ac = 1;
    } else {
        ac = 0;
    }
    for (i = 32; i < 63; i++) {
        if (ac === 0) {
            AH_variable_1.push(R_variable[i]);
        } else {
            if (o_variable[i] === 0) {
                AH_variable_1.push(S_variable[i]);
            } else {
                AH_variable_1.push(R_variable[i]);
            }
        }
    }
    // console.log(AH_variable_1.length)
    AH_variable_1[0] = AH_variable_1.slice(-1)[0];
    // console.log(AH_variable_1)
    labels = [];
    for (ind = 0; ind < Math.max(...final_time_values); ind = ind + 0.5) {
        labels.push(ind);
    }
    volume1 = volume;
    volume1.splice(31, 3);
    ftv = final_time_values;
    ftv.splice(31, 3);
    // for(i=0;i<ftv.length;i++){
    // 	ftv[i]=ftv[i]/100000;
    // }
    //console.log(volume)
    //new data

    Ratio = (inspTime / (exTime + inspTime));
    Insp_ratio = Math.round(Ratio * 100) / 100;
    //console.log(Insp_ratio)
    Exp_ratio = Math.round((1 - Ratio) * 100) / 100;
    //console.log(Exp_ratio,Insp_ratio)
    //console.log(Te,Ti)
    Insp_len = Math.round(time_values_1.length * Insp_ratio);
    //console.log(Insp_len)
    Exp_len = Math.round(((time_values_2.length) + (t_constant.length)) * Exp_ratio);
    //console.log(Exp_len)
    if (exTime <= 3 * inspTime) {
        Insp_len = Math.round(Insp_len * 0.8);
        Exp_len = Math.round(Exp_len * 1.5)
    }


    l1_count = Math.round(time_values_1.length / Insp_len);
    l2_count = Math.round((time_values_2.length + t_constant.length) / Exp_len);

    if (exTime <= 3 * inspTime) {
        l1_count = Math.round(l1_count * 1.8);
        l2_count = Math.round(l2_count * 1.5);
    }


    time_1 = [];
    time_1.push(final_time_values[0]);
    volume_1 = [];
    volume_1.push(volume[0]);

    //console.log(final_time_values)
    c1_1 = 1;
    //c1=1;
    while (c1_1 <= 30) {
        time_1.push(final_time_values[c1_1]);
        volume_1.push(volume[c1_1]);
        c1_1 += l1_count;
        //c1=c1+1;
    }
    //console.log(c1)
    //console.log(volume_1)
    v_max_1 = Math.max(...volume)
    time_1.push(final_time_values[33]);
    volume_1.push(volume[33]);

    for (i = 34; i < 61; i++) {
        time_1.push(final_time_values[i]);
        volume_1.push(volume[i]);
        i = i + l2_count;
    }


    //console.log(volume_1)
    flow_1 = [];
    flow_1.push(o_variable[0]);
    //console.log(o_variable[0])
    pressure_1 = [];
    pressure_1.push(AH_variable_1[0]);
    m = 1;
    while (m <= 30) {
        flow_1.push(o_variable[m]);
        pressure_1.push(AH_variable_1[m]);
        m = m + l1_count;

    }
    flow_1.push(o_variable[33]);
    pressure_1.push(AH_variable_1[33]);


    for (i = 34; i < 61; i++) {
        flow_1.push(o_variable[i]);
        pressure_1.push(AH_variable_1[i]);
        i = i + l2_count;

    }
    //console.log(time_1)
    i_t = Number(inspPause) * 10;
    if (i_t > 10) {
        i_t = 10;
    }
    //volume slide
    s_v = Array();
    v_max = Math.max(...volume_1);
    //console.log(v_max);

    for (i = 0; i < volume_1.length; i++) {
        if (volume_1[i] === v_max) {
            vsi = i;
        }
    }
    //console.log(vsi);
    repeat_v = vsi;
    for (i = 0; i < vsi; i++) {
        s_v.push(volume_1[i]);
    }
    // console.log("SV: "+s_v);
    for (i = 0; i < i_t + 1; i++) {
        s_v.push(v_max);
    }
    //console.log(s_v);
    while (s_v.length < volume_1.length) {
        s_v.push(volume_1[repeat_v]);
        repeat_v += 1;
    }
    // console.log(s_v);
    //flow_slide
    s_f = [];
    zero_index = [];
    for (i = 0; i < flow_1.length; i++) {
        if (flow_1[i] === 0) {
            zero_index.push(i);
        }
    }
    flow_zero = zero_index[1];

    flow_zero_to = flow_zero + i_t;
    // console.log(flow_zero, flow_zero_to);
    for (i = 0; i < flow_zero; i++) {
        s_f.push(flow_1[i]);
    }
    // console.log("s_f"+s_f);
    // console.log("flow_1"+flow_1);
    zero_repeat = flow_zero;
    while (flow_zero < flow_zero_to) {
        s_f.push(flow_1[zero_repeat]);
        flow_zero += 1;
    }
    while (s_f.length < flow_1.length) {
        s_f.push(flow_1[zero_repeat]);
        //console.log(zero_repeat);
        zero_repeat += 1;
        //itreation using zero_repeat bcoz value of flow_zero changes
    }
    // console.log(s_f);
    s_p = [];
    if (i_t > 0) {

        for (i = 0; i < 6; i++) {
            s_p.push(pressure_1[i]);
        }

        for (i = 0; i < (i_t); i++) {
            s_p.push(s_p.slice(-1)[0]);
        }
        // console.log(s_p)
        while (s_p.length < pressure_1.length) {
            s_p.push(pressure_1.slice(-1)[0]);
        }
    } else {
        s_p = pressure_1
    }

    if (expPause > 0) {
        for (i = 0; i < (4 * expPause); i++) {
            s_v.push(s_v.slice(-1)[0]);
            s_f.push(s_f.slice(-1)[0]);
            s_p.push(s_p.slice(-1)[0]);
            time_1.push(time_constant_2 + time_1.slice(-1)[0]);
        }
    }

    if (counter === 1) {
        flowtime = time_1;
        pressuretime = time_1;
        ftv = time_1;
        volume1 = volume_1;
        o_variable = flow_1;
        AH_variable_1 = pressure_1;
        final_time_values = time_1;
        final_time_values2 = time_1;
        //console.log(o_variable);
        /*v=[];
        v.push(volume1.slice(-1)[0]);
        maxvalue=Math.max(...volume1)
        indexmax=volume1.indexOf(maxvalue)
        console.log(indexmax)
        for (i=1;i<indexmax;i++){
            if(volume1[i]>v[0]){
                v.push(volume1[i]);
            }

        }
        for (i=indexmax;i<volume1.length;i++){
            v.push(volume1[i])
        }
        console.log(v)
*/


        n_ftv = ftv;
        v = volume1;
        final1 = final_time_values;
        final2 = final_time_values2;
        o = o_variable;
        ah = AH_variable_1;
        for (i = 0; i < 6; i++) {
            ftv = ftv.concat(n_ftv);
            volume1 = volume1.concat(v);
            final_time_values = final_time_values.concat(final1);
            final_time_values2 = final_time_values2.concat(final2);
            o_variable = o_variable.concat(o);
            AH_variable_1 = AH_variable_1.concat(ah);

        }
    }


// console.log(o_variable);

    l = s_v.length;
    r_v = s_v[l - 1];
    for (i = 0; i < l; i++) {
        if (s_v[i] > r_v) {
            r_i = i;
            break;
        }
    }
    r_i = r_i - 1;
    i_i = r_i;
    n_v = Array();

    for (i = 0; i < l; i++) {
        n_v[i] = s_v[i_i];
        i_i = i_i + 1;
        if (i_i === l) {
            break;
        }
    }

    s_v = n_v;


    time_1_sv = [];
    for (i = 0; i < s_v.length; i++) {
        time_1_sv.push(time_1[i]);
    }
}

updateArrayVcv();
var options = {
    responsive:true,
    maintainAspectRatio: false,
    title: {
        text: 'Patient Condition'
    },
    scales: {
        xAxes: [{ticks: {autoSkip: true, maxTicksLimit: 6}, display: false}],
        yAxes: [{ticks: {min: 0, max: 1}}]
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
    responsive:true,
    maintainAspectRatio: false,
    title: {
        display: false,
        text: 'Patient Condition'
    },
    scales: {
        xAxes: [{ticks: {autoSkip: true, maxTicksLimit: 6}, display: false}],
        yAxes: [{ticks: {min: -1.5, max: 1.5}}]
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
    responsive:true,
    maintainAspectRatio: false,
    title: {
        display: false,
        text: 'Patient Condition'
    },
    scales: {
        xAxes: [{ticks: {autoSkip: true, maxTicksLimit: 6}, display: false}],
        yAxes: [{ticks: {min: 0, max: 45}, stepSize: 5, reverse: true}]
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
chart1 = new Chart(document.getElementById("line-chart"), {
    type: 'line',
    data: {
        labels: ftv,
        datasets: [{
            label: '',
            data: volume1,
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
            pointRadius: 0, borderWidth: 1
        }
        ]
    },
    options:options,

});
chart2 = new Chart(document.getElementById("line-chart1"), {
    type: 'line',
    data: {
        labels: final_time_values,
        datasets: [{
            label: '',
            data: o_variable,
            borderColor: "#1ABB9C",
            fill: false,
            pointRadius: 0, borderWidth: 1
        }
        ]
    },
    options:options1,

});
chart3 = new Chart(document.getElementById("line-chart2"), {
    type: 'line',
    data: {
        labels: final_time_values2,
        datasets: [{
            label: '',
            data: AH_variable_1,
            borderColor: "#1ABB9C",
            fill: false,
            pointRadius: 0, borderWidth: 1
        }
        ]
    },
    options:options2,
});

function pause() {
    what = !what;
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
            /// STOP BUTTON....................................................
            if (j === time_1_sv.length) {
                j = 0;
            }
            if (j === time_1.length) {
                j = 0;
            }
            if (j1s === s_v.length) {
                j1s = 0;
            }


            chart1.data.labels.push(time_1_sv[j]);
            t = time_1.indexOf(ftv[0]);
            //console.log(time_1[j]);
            chart1.data.labels.shift();

            chart1.data.datasets[0].data.push(s_v[j1s]);

            // console.log(s_v[j]);
            //console.log(s_v);
            chart1.data.datasets[0].data.shift();
            // console.log(j);
            // console.log(ftv);
            //console.log(s_v);
            chart1.update();
            chart1.render();

            chart2.data.labels.push(time_1[j]);
            t = time_1.indexOf(final_time_values[0]);

            //console.log(t)
            chart2.data.labels.shift();
            chart2.data.datasets[0].data.push(s_f[j]);
            // console.log(new_f1[t])
            chart2.data.datasets[0].data.shift();

            chart2.update();
            chart2.render();

            chart3.data.labels.push(time_1[j]);
            t = time_1.indexOf(final_time_values2[0]);
            //console.log(t)
            chart3.data.labels.shift();
            chart3.data.datasets[0].data.push(s_p[j]);
            chart3.data.datasets[0].data.shift();

            chart3.update();
            chart3.render();
            j++;
            j1s++;
        }
    };

    updateChart();
    setInterval(function () {
        updateChart()
    }, updateInterval);

};
