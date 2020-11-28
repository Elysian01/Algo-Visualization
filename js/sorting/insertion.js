function Insertion_Sort() {
    c_delay = 0;

    for (var j = 0; j < array_size; j++) {
        div_update(bars[j], random_array[j], "yellow"); //Color update

        var key = random_array[j];
        var i = j - 1;
        while (i >= 0 && random_array[i] > key) {
            div_update(bars[i], random_array[i], "red"); //Color update
            div_update(bars[i + 1], random_array[i + 1], "red"); //Color update

            random_array[i + 1] = random_array[i];

            div_update(bars[i], random_array[i], "red"); //Height update
            div_update(bars[i + 1], random_array[i + 1], "red"); //Height update

            div_update(bars[i], random_array[i], "#000080"); //Color update
            if (i == (j - 1)) {
                div_update(bars[i + 1], random_array[i + 1], "yellow"); //Color update
            } else {
                div_update(bars[i + 1], random_array[i + 1], "#000080"); //Color update
            }
            i -= 1;
        }
        random_array[i + 1] = key;

        for (var t = 0; t < j; t++) {
            div_update(bars[t], random_array[t], "orange"); //Color update
        }
    }
    div_updates(bars[j - 1], random_array[j - 1], "orange"); //Color update

    //enable_buttons();
}