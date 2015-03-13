$(document).ready(function() {
aus={}
R = ScaleRaphael("paper", 455, 540);
        var attr = {
            "fill": "#00a48c",
            "stroke": "#fff",
            "stroke-width": 2,
            "stroke-linejoin": "round"
        };
aus.moncloa_aravaca=R.path("M128.098,373.469l3.625,2.25l6.406,0.344l5.375-3.562l10-7.844l4.625-0.375 l5-0.344l4.656-1.094l2.844-2.125l7.5-3.219l13.219-3.562l3.219-3.938l7.5-2.156l0.719-8.188l-2.844-6.094 c0,0-2.5-12.839-2.5-14.625c0-0.893,0.527-2.688,1.062-4.25s1.062-2.906,1.062-2.906l11.438-3.219l-1.062-3.219l-2.875-5 L211.723,290l0.719-6.438l-4.312-6.406l0.062-0.094l-3.625-2.781l-12.844-3.938l-9.281-2.844l-5-0.719l-7.5-0.344l-3.594-2.5 l-7.5-7.875l-0.719,5.719l-1.062,3.562l-3.219,3.219h-3.219l-1.781-2.125l-0.344-2.156l-24.656,0.375l-18.906,4.281l-40.812-18.469 c-0.208,1.033-0.469,2.127-0.625,2.75c-0.423,1.692,0.026,3.741-0.375,5.344c-0.401,1.603-1.735,2.379-2.125,3.938 c-0.438,1.75,0,4.255,0,6.062c0,1.02,3.608,2.539,4.281,2.875c1.465,0.732,3.966,0.344,5.719,0.344c2.004,0,2.833-0.344,4.625-0.344 l10,2.844l13.938,3.938l8.219,6.062l5.344,11.062l1.812,14.312l7.844-3.219l7.156,0.344l6.062,2.156l-0.375,22.5l-8.562,3.906 l-4.625,7.875l0.688,10.344L128.098,373.469z").attr(attr);
aus.latina=R.path("M129.973,434.875l0.094-0.219l11.062-10l-0.344-8.938l8.562-5.375 l1.438-2.844l-3.219-6.438l0.375-1.406l5.688,1.406l7.875-2.5l5.719-8.562l2.125,0.719l11.781-14.281l7.5-6.438l6.812-1.781 l-0.625-14.844l-0.469,0.562l-13.219,3.562l-7.5,3.219l-2.844,2.125l-4.656,1.094l-5,0.344l-4.625,0.375l-10,7.844l-5.375,3.562 l-6.406-0.344l-3.625-2.25l0.031,0.094l-2.5,0.375L124.004,380l-3.938,3.219l-6.438-0.375l-5.344-0.344l-6.062,0.344l-7.156,0.719 h-6.062l-5.719-3.906l-5.344-2.5L59.723,375l23.906,49.656l3.219-3.594l6.781,5.719l6.438,0.375l7.156,6.781l3.219,0.719 l4.281-0.719l2.5-2.875l1.406-0.719L129.973,434.875z").attr(attr);
aus.carabanchel=R.path("M189.442,433.438l1.062-15.375l5.344-12.844l8.219-9.656l8.562-4.625 l-3.188-0.719l-5-3.938l-5-3.938l-6.438-2.5l0.719-4.281l-2.875-3.906l-0.125-0.469L187.629,372l-7.5,6.438l-11.781,14.281 L166.223,392l-5.719,8.562l-7.875,2.5l-5.688-1.406l-0.375,1.406l3.219,6.438l-1.438,2.844l-8.562,5.375l0.344,8.938l-11.062,10 l-0.094,0.219l10.094,4.062l5.375,1.062c0,0,4.621,0.014,6.406-0.344S189.442,433.438,189.442,433.438z").attr(attr);
aus.villaverde=R.path("M236.16,443.469l-8.656-5.125h-18.938l-17.156-3.812l-9.281,44.188 l12.875,13.562l1.438,1.781v2.875c0,0,21.415,5.344,22.844,5.344s7.152-1.42,8.937-1.062c1.786,0.357,5.719-2.156,5.719-2.156 l2.5-4.281l2.125-0.719c0,0,2.51,1.085,3.938,2.156c1.43,1.071,3.938,1.438,3.938,1.438l2.844-0.375l2.844-2.844l1.438-1.781 l2.875-0.375l3.594,0.344l-6.094-19.969l-5.375-1.812v-6.406l-7.5-9.656l0.375-4.281L236.16,443.469z").attr(attr);
aus.usera=R.path("M230.379,411.062l-0.375-0.125l-15-20l-0.594,0.125l-8.344,4.5l-8.219,9.656 l-5.344,12.844l-1.062,15.375l-0.031,0.094l17.156,3.812h18.938l8.656,5.125l-0.094-0.125l2.156-9.281l-5.719-8.219L230.379,411.062z").attr(attr);
aus.arganzuela=R.path("M232.41,370.781l-4.906,2l-13.562,0.719l-12.156-5l0.719-8.219l-6.438-1.062 h-0.031l0.406,10l-3.719,0.969l0.125,0.469l2.875,3.906l-0.719,4.281l6.438,2.5l5,3.938l5,3.938l3.188,0.719l-0.219,0.125 l0.594-0.125l15,20l0.375,0.125l-0.031-0.125l9.656-3.594l3.219-8.188l6.406-2.5l2.5-3.219l-0.344-1.781l-2.844-4.312l-6.812-7.125 L232.41,370.781z").attr(attr);
aus.centro=R.path("M233.816,343.594l-12.687-6.438l-12.844-3.594l-5,0.719l2.5,5.375 l-0.719,8.188l-7.5,2.156l-2.75,3.375l0.219,4.844h0.031l6.438,1.062l-0.719,8.219l12.156,5l13.562-0.719l4.906-2l-3.469-3v-8.562 l3.188-9.281L233.816,343.594z").attr(attr);
aus.chamberi=R.path("M213.786,307.875l0.219,0.688l-11.438,3.219c0,0-0.527,1.344-1.062,2.906 s-1.062,3.357-1.062,4.25c0,1.786,2.5,14.625,2.5,14.625l0.344,0.719l5-0.719l12.844,3.594l12.687,6.438l1.625-3.25l1.781-6.406 l-1.781-4.656l-0.719-16.844L213.786,307.875z").attr(attr);
aus.tetuan=R.path("M214.786,307.875l20.937,4.562v-0.281l8.219-38.594l-0.219-0.625 l-0.156,0.625l-2.844-3.219l-4.656,0.719l-6.781-1.406l-5.343,2.5l-6.438,1.062l-4.281,4.625l-1.031-0.781l-0.062,0.094l4.312,6.406 L215.723,290l-4.656,10.344l2.875,5L214.786,307.875z").attr(attr);
aus.retiro=R.path("M252.004,390.75l0.125-0.031l17.156-26.781l1.781-7.875l-6.438-2.844 l-30-1.781l-3.562,1.781l-0.469,0.156l-1.656,4.844v8.562l13.188,11.438l6.812,7.125l2.844,4.312L252.004,390.75z").attr(attr);
aus.salamanca=R.path("M236.223,324.062l0.219,5.219l1.781,4.656l-1.781,6.406l-4.312,8.594 l-1.531,4.438l0.469-0.156l3.562-1.781l30,1.781l6.438,2.844l-0.312,1.438h0.312l0.375-7.156l-1.812-11.062l3.219-10l-1.344-10.969 l-20.781,9.531L236.223,324.062z").attr(attr);
aus.chamartin=R.path("M238.223,324.062l14.5,3.781l20.781-9.531l-0.062-0.469l-2.156-10.688v-15 l-5-8.938L262.348,265l1.781-7.781l-14.625,2.062l-3.781,13.656l0.219,0.625l-8.219,38.594L238.223,324.062z").attr(attr);
aus.villa_de_vallecas=R.path("M390.41,460.75l-14.125-5.188l-17.5-12.5l-6.438-0.719l-15.344-11.406 l0.719-8.219l1.781-3.562l-3.562-1.094l-0.375-4.625l-23.562-8.938l-4.656,12.5l-33.219,7.156l-4.281,6.781l-7.5,8.562 l-11.781,3.562l-12.219-0.344l5.094,6.781l-0.375,4.281l7.5,9.656v6.406l5.375,1.812l6.094,19.969l0.312,0.031 c0,0,3.572-1.094,5-1.094c1.43,0,2.871-0.335,4.656-1.406c1.786-1.071,4.281-2.5,4.281-2.5l16.438,18.188l8.219,4.656l4.625,0.719 l3.938,1.438l5,3.562l6.781,5.719c0,0,4.277,2.13,7,2.219c2.258,0.074,3.5,0.094,3.5,0.094l9.188-0.219l11.531-2.188l0.312-2.156 l-3.844-2.938l0.25-5.031l6.344-9.938l19.562-22.812l15.125-16.281L390.41,460.75z").attr(attr);
aus.puente_de_vallecas=R.path("M311.285,403.594l-0.281-0.438l-14.656-5.375l-10.344-5.344l-6.062-9.656 l-4.312-4.281l-3.906-1.781l-8.188-1.219l-10.406,16.219l-0.125,0.031l0.125,0.688l-2.5,3.219l-6.406,2.5l-3.219,8.188l-9.656,3.594 l2.156,13.906l5.719,8.219l-2.156,9.281l0.281,0.375l12.219,0.344l11.781-3.562l7.5-8.562l4.281-6.781L306.348,416l4.656-12.5 L311.285,403.594z").attr(attr);
aus.moratalaz=R.path("M305.223,399.656l13.562-32.5l-6.062-2.5h-19.656l-9.281-1.094l-2.5-1.406 l-0.719-3.219l-7.438-2.719l-0.062,1.281h-0.312l-1.469,6.438l-6.75,10.562l8.188,1.219l3.906,1.781l4.312,4.281l6.062,9.656 l10.344,5.344L305.223,399.656z").attr(attr);
aus.ciudad_lineal=R.path("M319.129,366.906l-17.562-35.844l0.719-1.781l1.781-1.438l-0.719-2.125 l-7.125-6.438l-13.219-22.844l-8.219-7.875l-1.781-18.219l1.438-5.344l5-3.938c0,0-11.134-3.116-13.875-4.062l-0.062,0.156 l-0.375,0.062L263.348,265l3.938,18.219l5,8.938v15l2.156,10.688l1.406,11.438l-3.219,10l1.812,11.062l-0.312,5.875l7.438,2.719 l0.719,3.219l2.5,1.406l9.281,1.094h19.656L319.129,366.906z").attr(attr);
aus.barajas=R.path("M354.066,235.438l-0.219,2.5l1.438,2.844l2.156,3.562v2.156l-3.594,4.281 l-12.844,5.375l-3.562,4.625l-1.812,6.062l-10.344,5.719l-2.5,3.219l1.438,3.938l-0.719,3.938l-3.219-1.094l1.438,3.219 l8.562,14.656l11.062,6.406l4.281,1.812l0.375,5.688l39.281,3.594l28.562,3.906l14.251,3.938l0.812-0.344l3.656-2.25l-3.875-7.344 l0.344-3.375l4.656,0.469l4.094,1.094l-2.094-6.688l-0.219-4.469l2.719-5.312l2.531-3.906v-2.438l-6.5-2.969l-3.844-3.938 l-0.5-3.938l-0.219-11.562l-1.656-4.312l-3.22-3.625l-1.875-2.531l-0.156-7.969l-5.812-2.75l-4.875-2.719l-2.094-1.219l-2.938-2.188 l3.781-10.125l-0.125-4.562l-12.094-3.219l-6.75,0.812l-5.969,0.719l-9.594,2.969l-7.438,4.188l-6.312,3.531l-6.438-0.125 L354.066,235.438z").attr(attr);
aus.vicalvaro=R.path("M368.504,360.188L356.441,380l-22.875-11.438l-0.344-6.062l-11.625,4.594 l0.188,0.062l-13.562,32.5l6.781,2.5l0.281,0.438l23.281,8.844l0.375,4.625l3.562,1.094l-1.781,3.562l-0.719,8.219l15.344,11.406 l6.438,0.719l17.5,12.5l14.125,5.188l1.531-9.719l4.469-16l9.656-24.094l1.969-3.594L424.941,410l4.688,0.5l5.156-1.344l3.125-4.125 c0,0,1.865-4.5,2-4.812c0.134-0.312,1.469-6.969,1.469-6.969l0.594-9.219l-1.219-4.469l-3.062-5.156l-4.75-5.625l-4.469-3.281 l-4.626-3l-2.688-1.844l-1.875,4.781l-2.312,3.312l-3.406,3.844l-2.75,2.688l-2.062,1.062l-7.562-0.812l-2.656-1.344 c0,0-2.508-1.33-2.688-1.375c-0.178-0.045-4.469-1.281-4.469-1.281s-4.995,0-5.219,0c-0.223,0-4.906,0.312-4.906,0.312 s-2.361,1.281-3.031,1.281c-0.669,0-3.664,0.089-3.844,0c-0.178-0.089-2.312-1.469-2.312-1.469l-2.344-4.688L368.504,360.188z").attr(attr);
aus.san_blas_canillejas=R.path("M292.535,312.875l3.688,6.406l7.125,6.438l0.719,2.125l-1.781,1.438 l-0.719,1.781l17.562,35.844l0.469,0.188l11.625-4.594l0.344,6.062L354.441,380l12.062-19.812l-0.062-0.375l-3.25-3.531l-2.25-2.125 c0,0-1.214-2.505-1.125-2.906c0.09-0.401,1.031-2.594,1.031-2.594l2.906-2.219c0,0,2.76-1.88,2.938-1.969 c0.18-0.089,4.25-3.812,4.25-3.812l2.781-3.375l2.219-0.75l2.688,0.062c0,0,2.938,1.08,3.25,1.125s3.742,0.281,4.188,0.281 c0.447,0,5.5-0.188,5.5-0.188l11.562-6.781L411.16,330l7.656-1.375l5.532-1.562l0.75-0.281l-14.251-3.938l-28.562-3.906 l-39.281-3.594L292.535,312.875z").attr(attr);
aus.hortaleza=R.path("M293.535,311.875l50.469,2.469l-0.375-5.688l-4.281-1.812l-11.062-6.406 l-8.562-14.656l-1.438-3.219l3.219,1.094l0.719-3.938l-1.438-3.938l2.5-3.219l10.344-5.719l1.812-6.062l3.562-4.625l12.844-5.375 l3.594-4.281v-2.156l-2.156-3.562l-1.438-2.844l0.219-2.5l-0.875-0.125l-14.031-13.781l-19.938,2.031l-13.406-1.281l-12.5-5.938 l-4.406-4.219l0.656,8.312L284.723,229l-3.594,5.719l-8.188,5l-2.875,5l-3.5,11.281c2.741,0.947,13.875,4.062,13.875,4.062l-5,3.938 l-1.438,5.344l1.781,18.219l8.219,7.875L293.535,311.875z").attr(attr);
aus.fuencarral_el_pardo=R.path("M68.129,248.469l40.812,18.469l18.906-4.281l24.656-0.375l0.344,2.156 l1.781,2.125h3.219l3.219-3.219l1.062-3.562l0.719-5.719l7.5,7.875l3.594,2.5l7.5,0.344l5,0.719l9.281,2.844l12.844,3.938 l4.656,3.562l4.281-4.625l6.438-1.062l5.343-2.5l6.781,1.406l4.656-0.719l2.844,3.219l3.938-14.281l15-2.125l3.562-11.438l2.875-5 l8.188-5l3.594-5.719l2.844-8.562l-0.656-8.312l-5.812-5.625l-2.656-6.938l-4.281-4.531l-8.344-2.406l8.219-9.719l-0.5-3.031 l-3.156-6.969l-4.438-10.469l-7.438-28.906L247.066,119l-7.844-8.688l15.531-3.281l12.5-6.188l11.375-5.688l5.281-0.75l4.688,1.625 c0,0,3.656,4.808,3.781,5.312c0.127,0.505,7.062,16.281,7.062,16.281l16.438,5.812l10.094,0.5l9.094-2.906l20.188-14.406 l1.906-9.344l-1.531-3.156l-4.406-4.406l-3.906-3.906l-6.062-2.531l-0.625-12.625l-2.656-5.438l-2.281-1.875l-3.031-2.281 l-2.156-1.406V48.562l-1-5.688l-2.531-5.938l-4.156-5.812l-6.938-3.531l-4.062-0.75l-4.031-4.188l-3.906-2.875l-3.906-1.031 l-4.812,0.906l-4.531,4.406l-3.312,7.188l-2.5,17.312l-1.781,3.406l-1.906,2.281L277.223,56l-6.312,3.406l-6.812,4.312L258.16,69 c0,0-2.527,3.927-2.906,4.938s-2.156,5.438-2.156,5.438s-0.996,4.648-1.375,5.406s-2.656,5.562-2.656,5.562l-5.188,5.688 l-2.875,2.281l-6.469,5.156l-19.812-0.25l-9.219-4.156l-8.188-0.5l-6.469-7.188l-12.25-7.719l-14.5-7.062l-15.781-6.562 l-4.812,1.625l-7.938,0.625l-12.25-0.375l-1.156-0.875l2.656-7.688l-5.312-3.938l-4.406-3.531l-4.531,0.25l0.75,3.781l5.812,10 l-5.438,4.531l-8.969,1.906l-16.156,0.125l-9.219,3.906l-1.531-1.625l-7.688-0.156l-15.031,6.062l-8.969-7.062l-3.406-1.5 l-1.781,1.562c0.385,2.307-4.807,0.578-6.812,1.781c-1.531,0.919-2.451,2.451-3.562,3.562c-1.367,1.367-3.954,2.896-5.344,3.938 c-1.414,1.06-0.604,4.083-0.375,5c0.505,2.021-0.416,3.79-0.719,5c-0.338,1.354-2.35,2.306-2.844,4.281 c-0.368,1.473-2.907,3.282-3.562,3.938c-0.858,0.858,0.719,4.623,0.719,5.688c0,1.552,0.298,4.163,0.688,5.719 c0.332,1.328,3.2,2.303,3.594,2.5c0.361,0.181-1.006,3.363-0.719,3.938c0.35,0.7,4.477,0.889,5.344,1.062 c1.514,0.303,4.152,0.948,5.375,1.438c0.15,0.06,1.062,4.942,1.062,5.344c0,2.356,0.878,4.201,1.438,6.438 c0.491,1.964,1.587,3.174,2.5,5c0.805,1.61,0.971,4.32,1.406,6.062c0.577,2.307,0.97,4.034,1.812,5.719 c0.88,1.76,1.316,2.797,1.781,4.656c0.501,2.005,1.229,4.024,2.5,5.719c1.328,1.77,2.3,4.379,3.562,6.062 c0.972,1.296,1.154,4.464,1.781,5.719c0.844,1.688,1.87,4.052,2.875,6.062c0.891,1.782,1.024,4.871,1.406,6.781 c0.312,1.561,0.001,3.619-0.344,5c0.472,2.359-2.875,3.551-2.875,5.719c0,1.611,4.285,1.781,5.375,1.781c2.276,0,3.44,2.095,5,2.875 c1.993,0.997,2.97,0.813,4.281,2.125c0.908,0.908,2.377,1.658,3.219,2.5c1.571,1.571,0.001,3.153-0.375,4.656 c-0.509,2.035,0.807,4.457,1.438,5.719c0.792,1.583,2.16,3.265,2.5,4.625c0.499,1.995,0.628,3.637,1.062,5.375 c0.499,1.994,0,4.693,0,6.781c0,1.45-1.522,3.794-2.125,5c-0.88,1.761-0.791,4.051-1.438,5.344 C68.319,247.057,68.274,247.752,68.129,248.469z").attr(attr);

    var current = null;
    for (var state in aus) {
        aus[state].color = Raphael.getColor();
        (function (st, state) {
            st[0].style.cursor = "pointer";
            st[0].onmouseover = function () {
                current && aus[current].animate({fill: "#00a48c", stroke: "#fff"}, 500);
                st.animate({fill: st.color, stroke: "#ccc"}, 500);
                st.toFront();
                R.safari();
                //document.getElementById(state).style.display = "block";
                current = state;
                //console.log(state)
                
            };
            st[0].onclick = function () {
                //$('#nombre-distrito').empty().append(distritos[state]);
                $("#distritoSelect").val(state);
                $("#distritoSelect").trigger('change');
                st.animate({fill: st.color, stroke: "#cac"}, 500);
            };
            st[0].onmouseout = function () {
                st.animate({fill: "#00a48c", stroke: "#fff"}, 500);
                st.toFront();
                R.safari();
            };
            if (state == "nsw") {
                st[0].onmouseover();
            }
        })(aus[state], state);
    }
distritos={
    fuencarral_el_pardo: 'Fuencarral-El Pardo',
    hortaleza: 'Hortaleza',
    barajas: 'Barajas',
    moncloa_aravaca: 'Moncloa-Aravaca',
    centro: 'Centro',
    latina: 'Latina',
    arganzuela: 'Arganzuela',
    retiro: 'Retiro',
    salamanca: 'Salamanca',
    tetuan: 'Tetuán',
    chamartin: 'Chamartín',
    chamberi: 'Chamberí',
    carabanchel: 'Carabanchel',
    usera: 'Usera',
    puente_de_vallecas: 'Puente de Vallecas',
    moratalaz: 'Moratalaz',
    ciudad_lineal: 'Ciudad Lineal',
    villaverde: 'Villaverde',
    villa_de_vallecas: 'Villa de Vallecas',
    vicalvaro: 'Vicálvaro',
    san_blas_canillejas: 'San Blas-Canillejas',
}
descripcion_distritos ={
    fuencarral_el_pardo: '<p>Distrito constituido por 8 barrios: El Pardo, Fuentelareina, Peñagrande, Pilar, La Paz, Valverde, Mirasierra y El Goloso. </p>\
<p>Población: 232 mil habitantes. Edad promedio: 42,28 años. Tasa de desempleo: 10,36% (MM 13,91%)</p>\
<p>Los principales problemas identificados por sus habitantes son la mala consevación del parque de viviendas, el exceso de contaminación ambiental, la falta de infraestructuras culturales y deportivas y la existencia de colectivos en riesgo de exclusión social.</p>',
    hortaleza: '<p>Distrito constituido por los 6 barrios: Palomas, Piovera, Canillas, Pinar del Rey, Apóstol Santiago y Valdefuentes.</p>\
<p>Población de 172 mil habitantes. Edad promedio: 41,76 años. Tasa de desempleo: 11,39% (MM 13,91%)</p>\
<p>Los principales problemas identificados son: falta de dotación de servicios públicos esenciales en los barrios de Valdebabas y Sanchinarro, proyectos de centro sociales aprobados y no ejecutados y el desconocimeinto del patrimonio público de Hortaleza.</p>\
',
    barajas: '',

    moncloa_aravaca: '<p>Distrito constituidos por 7 barrios: Casa de Campo, Argüelles, Ciudad Universitaria, Valdezarza, Valdemarín, El Plantío y Aravaca.</p>\
<p>Población: 116 mil habitantes. Edad promedio: 43,83 años. Tasa de desempleo: 9,40% (MM 13,91%). </p>\
<p>Los principales problemas identificados por sus habitantes son: la creciente desigualdad social, la carencia de participación de los vecinos y vecinas en las Juntas de Distrito, la mala ejecución del Plan de Gestión Integral para La Casa de Campo, y la situación actual de las instalaciones del CIEMAT.</p>',

    centro: '<p>Distrito constituido por 6 barrios: Palacio, Embajadores, Cortes, Justicia, Universidad y Sol.</p>\
<p>Población: 134 mil habitantes. Edad promedio: 43,60 años. Tasa de desempleo: 12,57%  (MM 13,91%)</p>\
<p>Los principales problemas que se identifican son: la mercantilización del espacio público que, unida a la desaparición del pequeño comercio, da como resultado un "distrito temático" de compras, la concentración de tráfico con altos niveles de contaminación y el creciente número de personas sin hogar que hay en el distrito. </p>',
    latina: '<p>Distrito constituido por 7 barrios: Los Carmenes, Puerta del Ángel, Lucero, Aluche, Campamento, Cuatro Vientos, Las Aguilas.</p>\
<p>Población: 237 mil habitantes. Edad promedio: 45,72 años. Tasa de desempleo: 15,65% (MM 13,91%) </p>\
<p>Los principales problemas identificados por sus habitantes son el deterioro de los espacios públicos y las infraestructuras,la mala calidad del servicio de recogida de basuras y la baja actividad económica del distrito</p>',
    
    arganzuela: '<p>Distrito Constituido por siete barrios: Imperial, Acacias, Chopera, Legazpi, Delicias, Palos de Moguer y Atocha.</p>\
<p>Población: 151 mil personas. Edad promedio: 43,55 años.  Tasa de desempleo: 11,67%.</p>\
<p>Los problemas que se identifican son: la especulación urbanística, la contaminación acústica y atmósferica, inseguridad vial en determinados accesos, y la carencia de servicios públicos y espacios de participación ciudadana.</p>',
    retiro: ' Los principales problemas identificados por sus habitantes son la falta de vivienda pública, la falta de actuación en materia de eficiencia energética y contaminación, y carencia manifiesta de servicios sociales que es palpable en el hecho de que solo existe una guarderia pública para casi 10.000 niños de entre 0 y 3 años.',
    salamanca: '<p>Distrito constituido por 6 barrios: Recoletos, Goya, Fuente del Berro, Guindalera, Lista y Castellana.</p>\
<p>Población: 143 mil habitantes. Edad promedio: 46,18 años. Tasa de desempleo: 8,73% (MM 13,91%)</p>\
<p>Uno de los principales poblemas identificado por sus habitantes es el número de personas mayores de 65 años que viven solas. Es un barrio con población muy sobre-envejecida con rentas bajas, dependientes y en riesgo de pobreza. Se identifican también falta de zonas verdes y falta de equipamientos para jovenes en el distrito.</p>',

    tetuan: '<p>Distrito constituido por 6 barrios: Bellas Vistas, Cuatro Caminos, Castillejos, Almenara, Valdeacederas y Berruguete.</p>\
<p>Población: 152 mil habitantes. Edad promedio: 44,05 Tasa de desempleo 13,59% (MM 13,91%) </p>\
<p>Los principales problemas identficados por sus habitantes son: la disminución de la red de pequeños comercios, el alto número de deshaucios y las altas cifras de exclusión social, así como la falta de participación ciudadana en los asuntos del distrito.</p>',

    chamartin: '<p>Distrito constituido por 6 barrios: El Viso, Prosperidad, Ciudad Jardín, Hispanoamerica, Nueva España y Castilla.</p>\
<p>Población: 142 mil habitantes. Edad promedio: 44,99 años. Tasa de desempleo: 8,50% (MM 13,91%)</p>\
<p>Los problemas identificados por sus habitantes son el desarrollo durante los últimos años de unas infraestructuras que no se adecuan a las necesidades de los vecinos/vecinas, el deterioro del mercado de Prosperidad, la falta de residencias o centros de día para los mayores y la ausencia de lugares que cubran las necesidades de participación ciudadana. </p>',
    
    chamberi: '<p>Distrito constituido por 6 barrios: Gaztambide, Arapiles, Trafalgar, Almagro, Rios Rosas y Vallehermoso,  </p>\
<p>Población : 138 mil habitantes. Edad promedio: 46,41 años. Porcentaje de  desempleo: 9,11% (MM 13,91%) </p>\
<p>Los principales problemas identificados por sus habitantes son la falta de zonas verdes, la fragmentación y corte del distrito por autovías urbanas, y la escasez de equipamientos deportivos, colegios públicos y espacios para la cultura y socialización de jovenes y mayores.</p>',

    carabanchel: '<p>Distrito constituido por 7 barrios: Comillas, Opañel, San Isidro, Vista Alegre, Puerta Bonita, Buenavista y Abrantes.</p>\
<p>Población:  243 mil habitantes. Edad promedio: 43,03 años. Tasa de desempleo: 17,90% (MM 13,91%)</p>\
<p>Los principales problemas identificados por sus habitantes son un elevado porcentaje de paro, superior a la media madrileña, junto a la falta y deterioro de los servicios públicos y los problemas de movilidad dentro del distrito.</p>',

    usera: 'Distrito constituido por 7 barrios: Orcasitas, Orcasur, San Fermín, Almendrales, Moscardó, Zofio y Pradalongo.<br/>\
<p>Población: 134 mil habitantes. Edad promedio: 41,93 años. Tasa de desempleo: 19,05% (MM 13,91%)</p>\
<p>Los principales problemas identificados por sus habitantes son: la precariedad creciente del transporte público, el incumplimiento del actual Plan de Inversión para el distrito y de la la Agenda 21 Usera, la nefasta y desaprovechada inversión de la Caja Mágica y la finalización de Madrid Rio.</p>',
    puente_de_vallecas: '',

    moratalaz: '<p>Distrito constituido por 6 barrios: Pavones, Horcajo, Marroquina, Media Legua, Fontarrón y Vinateros.</p>\
<p>Población: 96 mil habitantes. Edad promedio: 46,07 años. Tasa de desempleo: 14,87% (MM 13,91%) </p>\
<p>Los principales problemas identificados por sus vecinos y vecinas son el envejecimiento de la población y de los edificios, la falta de correpondencia entre las necesidades de los usuarios y las rutas de los transportes públicos y la necesidad de espacios de reunión y participación ciudadana.</p>',

    ciudad_lineal: '<p>Distrito constituido por 9 barrios: Ventas, Pueblo Nuevo, Quintana, Concepción, San Pascual, San Juan Bautista, Colina, Atalaya y Costillares</p>\
<p>Población: 214 mil habitantes. Edad promedio: 45,17 años. Tasa de desempleo: 13,86% (MM 13,91%)</p>\
<p>Los principales problemas identificados por sus habitantes son: un elevado indice de desempleo, la perdida de pequeño comercio y cierre de los mercados municipales en favor de las Grandes Superficies, asi como la falta de espacios verdes.</p>',
    villaverde: '<p>Distrito constituido por 5 barrios: San Andrés, San Cristobal, Butarque, Los Rosales y Los Ángeles.<br/>\
Población: 124 mil habitantes. Edad promedio: 41,42 años. Tasa de desempleo: 20,41% (MM 13,91%) <br/>\
El principal problema del distrito es que tiene una de las más altas tasas de desempleo de la ciudad de Madrid, lo que genera una situación de grave desigualdad social y un elevado número de población en riesgo de exclusión.</p>',

    villa_de_vallecas: 'Distrito constituidos por 2 barrios: Casco histórico de Vallecas y Santa Eugenia.<br/>\
Población: 99 mil habitantes. Edad promedio: 37,68 años. Tasa de desempleo: 17,30% (MM 13,91%)<br/>\
Los principales problemas identificados por sus habitantes son: la contaminación producida por el parque tecnológico de Valdemingomez, la carencia de infraestructuras por el incumplimiento del "Plan Especial de Inversiones y Actuaciones" y la venta de 1.800 viviendas de la EMV a fondos buitres.\
',

    vicalvaro: 'Distrito constituido por tres barrios: Vicálvaro, Valdebernardo y Valderrivas.<br/>\
Población: 69 mil habitantes. Tasa de desempleo: 16,25% (MM 13,91) <br/>\
Los principales problemas identificados por los habitantes son el acceso a la vivienda, la alta tasa de desempleo y la falta de espacios donde juntarse y organizarse para desarrollar iniciativas vecinales.',

    san_blas_canillejas: '<p>Distrito constituido por 8 barrios: Simancas, Hellín, Amposta, Arcos, Rosas, Rejas, Canillejas y Salvador.</p>\
<p>Población: 153 mil habitantes. Edad promedio: 42,17 años. Tasa de desempleo: 15,40% (MM 13,91%)</p>\
<p>Los principales problemas identificados por sus habitantes son el desempleo y la perdida del pequeño comercio, la externalización y la baja calidad de los servicios sociales, así como la desasistencia a las personas mayores.</p>',
}

});