/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* global FALSE */
var i;
var k = 0;
var n = "";
var prezzi = [];
var attributi = [];
var qua = [];
var Ptot = [];
var b = 0;
var totale = 0;
var resto = 0;


function tastiera(num) {
    document.getElementById("display").innerHTML = "";
    n = n + num;
    document.getElementById("display").innerHTML = "" + n;

}

function varie() {
    if(n>0){
    prezzi[k] = n;
    attributi[k] = "varie";
    qua[k] = 1;
    document.getElementById("display").innerHTML = "";
    document.getElementById("display").innerHTML = "Varie: &euro; " + prezzi[k];
    k++;
    } else {
      document.getElementById("display").innerHTML = "";
      document.getElementById("display").innerHTML = "Comando non valido";
    }
    n = "";
    b = 0;
    
}

function automatico(prezzo, nome) {
    b = 0;
    var ind = 0;
    for (i = 0; i < attributi.length; i++) {
        var prova = nome.localeCompare(attributi[i]);
        if (prova === 0) {
            b = 1;
            ind = i;
        }
    }
    if (b !== 0) {
        qua[ind]++;
        document.getElementById("display").innerHTML = "";
        document.getElementById("display").innerHTML = "" + attributi[ind] + ": &euro; " + prezzo;
    } else {
        qua[k] = 1;
        prezzi[k] = prezzo;
        attributi[k] = nome;
        document.getElementById("display").innerHTML = "";
        document.getElementById("display").innerHTML = "" + attributi[k] + ": &euro; " + prezzo;
        k++;
    }
    b = 0;
    n = "";
}

function subtot() {
    if (k > 0) {
        totale = 0;
        for (i = 0; i < prezzi.length; i++) {
            Ptot[i] = prezzi[i] * qua[i];
            totale = totale + Ptot[i];
        }
        document.getElementById("display").innerHTML = "";
        document.getElementById("display").innerHTML = "Tot.: &euro; " + totale;
        b = 1;
    } else {
        document.getElementById("display").innerHTML = "";
        document.getElementById("display").innerHTML = "Comando non valido";
    }
    prezzi = [];
    attributi = [];
    qua = [];
    n = "";
    k = 0;
}

function tot() {
    if (b !== 0) {
        resto = 0;
        resto = n - totale;
        //resto = arrotondamento(resto,2);
        document.getElementById("display").innerHTML = "";
        document.getElementById("display").innerHTML = "Resto: &euro; " + resto;

    } else {
        if (k > 0) {
            totale = 0;
            for (i = 0; i < prezzi.length; i++) {
                Ptot[i] = prezzi[i] * qua[i];
                totale = totale + Ptot[i];
            }
            document.getElementById("display").innerHTML = "";
            document.getElementById("display").innerHTML = "Tot.: &euro; " + totale;
        } else {
            document.getElementById("display").innerHTML = "";
            document.getElementById("display").innerHTML = "Comando non valido";
        }

    }
    prezzi = [];
    attributi = [];
    qua = [];
    b = 0;
    n = "";
    k = 0;
    totale = 0;
    resto = 0;
}

function incasso() {
    
}

function annulla(){
    prezzi = [];
    attributi = [];
    qua = [];
    n = "";
    k = 0;
    document.getElementById("display").innerHTML = "";
    document.getElementById("display").innerHTML = "Ordine annullato";
}

function dell(){
    document.getElementById("display").innerHTML = "";
    n = "";
}

function cancella(){
    if(n==0){
        document.getElementById("display").innerHTML = "";
        document.getElementById("display").innerHTML = "Canc.";
        qua[k-1]="";
        prezzi[k-1] = 0;
	attributi[k-1] = "";
	k=k-1;
    } else {
      for(i=0;i<prezzi.length;i++){
          if(n === prezzi[i]){
              qua[i] --;
              if(qua[i] === 0){
              var ep = prezzi.splice(i,1);
              var ea = attributi.splice(i,1);
              var eq = qua.splice(i,1);
              document.getElementById("display").innerHTML = "";
              document.getElementById("display").innerHTML = "- : &euro; "+ep;
              }
          }
      }  
    }
    n="";
}

function arrotondamento(value)
{
    value = Math.pow(value*100);
    value = value/100;
    return value;
}

    