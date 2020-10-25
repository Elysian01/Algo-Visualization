var input_arr_size = document.getElementById('arr_size'),
    array_size = input_arr_size.value;
var input_arr_gen = document.getElementById("arr_generate");
var input_arr_speed = document.getElementById("arr_speed");
var main_cont = document.getElementById("array_container");
main_cont.style = "flex-direction:row";

// Declaring variables
var random_array = [];
var bars = [];
var margin_size;

//Array Generation and Updation
input_arr_gen.addEventListener("click", generate_array);
input_arr_size.addEventListener("input", update_array_size);

function generate_array() {
    main_cont.innerHTML = "";

    for (var i = 0; i < array_size; i++) {
        random_array[i] = Math.floor(Math.random() * 0.5 * (input_arr_size.max - input_arr_size.min)) + 10;
        bars[i] = document.createElement("div");
        main_cont.appendChild(bars[i]);
        margin_size = 0.1;
        bars[i].style = " margin:1% " + margin_size + "%; background-color:black; width:" + (100 / array_size - (5 * margin_size)) + "%; height:" + (random_array[i]) + "%;";
    }
}

function update_array_size() {
    array_size = input_arr_size.value;
    generate_array();
}

window.onload = update_array_size();

input_arr_size.oninput = function() {
    array_size = input_arr_size.value;
    generate_array();
}


function algoSelected() {
    algorithm = document.getElementById("algo").value;
}
  
function sort() {
  
    if (algorithm == "bubble") {
        disabled();
        Bubble_Sort();
        // enable_buttons();

    } else if (algorithm == "selection") {
        disabled();
        Selection_Sort()
    } else if (algorithm == "insertion") {
        disabled();
        Insertion_Sort();
    } else if (algorithm == "merge") {
        disabled();
        Merge_Sort();
    } else if (algorithm == "quick") {
        disabled();
        Quick_Sort();
    } else if (algorithm == "heap") {
        disabled();
        Heap_Sort();
    } else {
        alert("CHOOSE AN ALGORITHM FIRST")
    }
}

function disabled() {

    sort.disabled = true;
    input_arr_gen.disabled = true;
    input_arr_size.disabled = true;
    input_arr_speed.disabled = true;
}

function enable_buttons() {

 
        sort.disabled = false;
        input_arr_gen.disabled = false;
        input_arr_size.disabled = false;
        input_arr_speed.disabled = false;
    
  

}