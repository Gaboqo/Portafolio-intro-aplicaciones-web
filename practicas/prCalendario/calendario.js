meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "setiembre", "octubre", "noviembre", "diciembre"];
laSemana = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
diaSemana = ["lun", "mar", "mie", "jue", "vie", "sab", "dom"];

window.onload = function() {

    hoy = new Date();
    diaSemHoy = hoy.getDay();
    diaHoy = hoy.getDate();
    mesHoy = hoy.getMonth();
    annoHoy = hoy.getFullYear();

    tit = document.getElementById("titulos");
    ant = document.getElementById("anterior");
    pos = document.getElementById("posterior");

    f0 = document.getElementById("fila0");

    pie = document.getElementById("fechaActual");
    pie.innerHTML += laSemana[diaSemHoy] + ", " + diaHoy + " de " + meses[mesHoy] + " de " + annoHoy;

    document.buscar.buscaAnno.value = annoHoy;

    mesCal = mesHoy;
    annoCal = annoHoy;

    cabecera();
    primeraLinea();
    escribirDias();

}

function cabecera() {

    tit.innerHTML = meses[mesCal] + " de " + annoCal;
    mesAnt = mesCal - 1;
    mesPos = mesCal + 1;
    if (mesAnt < 0) {
        mesAnt = 11;
    }
    if (mesPos > 11) {
        mesPos = 0;
    }
    ant.innerHTML = "<i class='fas fa-chevron-left'></i>" + " " + meses[mesAnt];
    pos.innerHTML = meses[mesPos] + " " + "<i class='fas fa-chevron-right'></i>";

}

function primeraLinea() {

    for (i = 0; i < 7; i++) {
        celda0 = f0.getElementsByTagName("th")[i];
        celda0.innerHTML = diaSemana[i];
    }

}

function escribirDias() {

    primerMes = new Date(annoCal, mesCal, "1");
    primerSemana = primerMes.getDay();
    primerSemana--;
    if (primerSemana == -1) {
        primerSemana = 6;
    }
    diaPrimerMes = primerMes.getDate();
    primerCelda = diaPrimerMes - primerSemana;
    empezar = primerMes.setDate(primerCelda);
    diaMes = new Date();
    diaMes.setTime(empezar);

    for (i = 1; i < 7; i++) {
        fila = document.getElementById("fila" + i);
        for (j = 0; j < 7; j++) {
            miDia = diaMes.getDate();
            miMes = diaMes.getMonth();
            miAnno = diaMes.getFullYear();
            celda = fila.getElementsByTagName("td")[j];
            celda.innerHTML = miDia;

            celda.style.backgroundColor = "#0aacff";
            celda.style.color = "#492736";

            if (j == 6) {
                celda.style.color = "#c71a1a";
            }

            if (miMes != mesCal) {
                celda.style.color = "#fffcea";
            }

            if (miMes == mesHoy && miDia == diaHoy && miAnno == annoHoy) {
                celda.style.backgroundColor = "#ff8100";
                celda.innerHTML = "<b>" + miDia + "</b>"
            }

            miDia = miDia + 1;
            diaMes.setDate(miDia);
        }
    }

}

function mesAntes() {

    nuevoMes = new Date();
    primerMes--;
    nuevoMes.setTime(primerMes);
    mesCal = nuevoMes.getMonth();
    annoCal = nuevoMes.getFullYear();
    cabecera();
    escribirDias();

}

function mesDespues() {

    nuevoMes = new Date();
    tiempoUnix = primerMes.getTime();
    tiempoUnix = tiempoUnix + (45 * 24 * 60 * 60 * 1000);
    nuevoMes.setTime(tiempoUnix);
    mesCal = nuevoMes.getMonth();
    annoCal = nuevoMes.getFullYear();
    cabecera();
    escribirDias();

}

function actualizar() {

    mesCal = hoy.getMonth();
    annoCal = hoy.getFullYear();
    cabecera();
    escribirDias();

}

function miFecha() {

    miAnno = document.buscar.buscaAnno.value;
    listaMeses = document.buscar.buscaMes;
    opciones = listaMeses.options;
    num = listaMeses.selectedIndex;
    miMes = opciones[num].value;

    if (isNaN(miAnno) || miAnno < 1) {
        alert("El año no es válido:\n debe ser un número mayor que 0");
    }
    else {
        mife = new Date();
        mife.setMonth(miMes);
        mife.setFullYear(miAnno);
        mesCal = mife.getMonth();
        annoCal = mife.getFullYear();
        cabecera();
        escribirDias();
    }

}