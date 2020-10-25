var speed = 1000;

input_arr_speed.addEventListener("input", vis_speed);

function vis_speed() {
    var arr_speed = input_arr_speed.value;
    switch (parseInt(arr_speed)) {
        case 1:
            speed = 1;
            break;
        case 2:
            speed = 10;
            break;
        case 3:
            speed = 100;
            break;
        case 4:
            speed = 1000;
            break;
        case 5:
            speed = 10000;
            break;
    }

    delay_time = 10000 / (Math.floor(array_size / 10) * speed); //Decrease numerator to increase speed.
}

var delay_time = 10000 / (Math.floor(array_size / 10) * speed); //Decrease numerator to increase speed.
var c_delay = 0; //This is updated ov every div change so that visualization is visible.

function div_update(main_cont, height, color) {
    window.setTimeout(function() {
        main_cont.style = " margin:0% " + margin_size + "%; width:" + (100 / array_size - (2 * margin_size)) + "%; height:" + height + "%; background-color:" + color + ";";
    }, c_delay += delay_time);
}
function div_updates(main_cont, height, color) {
    window.setTimeout(function() {
        main_cont.style = " margin:0% " + margin_size + "%; width:" + (100 / array_size - (2 * margin_size)) + "%; height:" + height + "%; background-color:" + color + ";";
        enable_buttons()
    }, c_delay += delay_time);
   
}
// function enable_buttons() {
//     window.setTimeout(function() {
//         for (var i = 0; i < button_algos.length; i++) {
//             button_algos[i].classList = [];
//             button_algos[i].classList.add("button_unselected");

//             button_algos[i].disabled = false;
//             input_arr_size.disabled = false;
//             input_arr_gen.disabled = false;
//             input_arr_speed.disabled = false;
//         }
//     }, c_delay += delay_time);
// }