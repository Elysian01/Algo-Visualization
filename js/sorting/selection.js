function Selection_Sort() {
    c_delay = 0;

    for (var i = 0; i < array_size - 1; i++) {
        div_update(bars[i], random_array[i], "red"); //Color update

        index_min = i;

        for (var j = i + 1; j < array_size; j++) {
            div_update(bars[j], random_array[j], "#FFFF33"); //Color update

            if (random_array[j] < random_array[index_min]) {
                if (index_min != i) {
                    div_update(bars[index_min], random_array[index_min], "#000080"); //Color update
                }
                index_min = j;
                div_update(bars[index_min], random_array[index_min], "red"); //Color update
            } else {
                div_update(bars[j], random_array[j], "#000080"); //Color update
            }
        }

        if (index_min != i) {
            var temp = random_array[index_min];
            random_array[index_min] = random_array[i];
            random_array[i] = temp;

            div_update(bars[index_min], random_array[index_min], "red"); //Height update
            div_update(bars[i], random_array[i], "red"); //Height update
            div_update(bars[index_min], random_array[index_min], "#000080"); //Color update
        }
        div_update(bars[i], random_array[i], "orange"); //Color update
    }
    div_updates(bars[i], random_array[i], "orange"); //Color update

    //enable_buttons();
}