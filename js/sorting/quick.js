function Quick_Sort() {
    c_delay = 0;

    quick_sort(0, array_size - 1);

    //enable_buttons();
}

function quick_partition(start, end) {
    var i = start + 1;
    var pivot = random_array[start]; //make the first element as pivot element.
    div_update(bars[start], random_array[start], "yellow"); //Color update

    for (var j = start + 1; j <= end; j++) {
        //re-arrange the array by putting elements which are less than pivot on one side and which are greater that on other.
        if (random_array[j] < pivot) {
            div_update(bars[j], random_array[j], "yellow"); //Color update

            div_update(bars[i], random_array[i], "red"); //Color update
            div_update(bars[j], random_array[j], "red"); //Color update

            var temp = random_array[i];
            random_array[i] = random_array[j];
            random_array[j] = temp;

            div_update(bars[i], random_array[i], "red"); //Height update
            div_update(bars[j], random_array[j], "red"); //Height update

            div_update(bars[i], random_array[i], "blue"); //Height update
            div_update(bars[j], random_array[j], "blue"); //Height update

            i += 1;
        }
    }
    div_update(bars[start], random_array[start], "red"); //Color update
    div_update(bars[i - 1], random_array[i - 1], "red"); //Color update

    var temp = random_array[start]; //put the pivot element in its proper place.
    random_array[start] = random_array[i - 1];
    random_array[i - 1] = temp;

    div_update(bars[start], random_array[start], "red"); //Height update
    div_update(bars[i - 1], random_array[i - 1], "red"); //Height update

    for (var t = start; t <= i; t++) {
        div_updates(bars[t], random_array[t], "orange"); //Color update
    }

    return i - 1; //return the position of the pivot
}


function quick_sort(start, end) {
    if (start < end) {
        //stores the position of pivot element
        var piv_pos = quick_partition(start, end);
        quick_sort(start, piv_pos - 1); //sorts the left side of pivot.
        quick_sort(piv_pos + 1, end); //sorts the right side of pivot.
    }
}
