//Accessing classes, ids, containers

var input_arr_size = document.getElementById('arr_size'),
    array_size = input_arr_size.value;
var input_arr_gen = document.getElementById("arr_generate");
var input_arr_speed = document.getElementById("arr_speed");

var button_algos = document.querySelectorAll(".algos button");
var main_cont = document.getElementById("array_container");
main_cont.style = "flex-direction:row";

//Declaring variables
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
        bars[i].style = " margin:1% " + margin_size + "%; background-color:black; width:" + (100 / array_size - (5 * margin_size)) + "%; height:" + (random_array[i]) + "%; ";
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

//Run the correct Algo out of the collection of algos

for (var i = 0; i < button_algos.length; i++) {
    button_algos[i].addEventListener("click", run_algo);
}

function disable_buttons() {
    for (var i = 0; i < button_algos.length; i++) {
        button_algos[i].classList = [];
        button_algos[i].classList.add("button_locked");
        button_algos[i].disabled = true;
        input_arr_size.disabled = true;
        input_arr_gen.disbaled = true;
        input_arr_speed.disabled = true;
    }
}

function run_algo() {
    disable_buttons();

    this.classList.add("button_selected");
    switch (this.innerHTML) {
        case "Bubble":
            Bubble_Sort();
            break;
        case "Selection":
            Selection_Sort();
            break;
        case "Insertion":
            Insertion_Sort();
            break;
        case "Merge":
            Merge_Sort();
            break;
        case "Quick":
            Quick_Sort();
            break;
        case "Heap":
            Heap_Sort();
            break;

    }
}