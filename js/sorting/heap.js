function Heap_Sort() {
    c_delay = 0;

    heap_sort();

    //enable();


}

function swap(i, j) {
    div_update(bars[i], random_array[i], "red"); //Color update
    div_update(bars[j], random_array[j], "red"); //Color update

    var temp = random_array[i];
    random_array[i] = random_array[j];
    random_array[j] = temp;

    div_update(bars[i], random_array[i], "red"); //Height update
    div_update(bars[j], random_array[j], "red"); //Height update

    div_update(bars[i], random_array[i], "blue"); //Color update
    div_update(bars[j], random_array[j], "blue"); //Color update
}

function max_heapify(n, i) {
    var largest = i;
    var l = 2 * i + 1;
    var r = 2 * i + 2;

    if (l < n && random_array[l] > random_array[largest]) {
        if (largest != i) {
            div_update(bars[largest], random_array[largest], "blue"); //Color update
        }

        largest = l;

        div_update(bars[largest], random_array[largest], "red"); //Color update
    }

    if (r < n && random_array[r] > random_array[largest]) {
        if (largest != i) {
            div_update(bars[largest], random_array[largest], "blue"); //Color update
        }

        largest = r;

        div_update(bars[largest], random_array[largest], "red"); //Color update
    }

    if (largest != i) {
        swap(i, largest);

        max_heapify(n, largest);
    }
}

function heap_sort() {
    for (var i = Math.floor(array_size / 2) - 1; i >= 0; i--) {
        max_heapify(array_size, i);
    }

    for (var i = array_size - 1; i > 0; i--) {
        swap(0, i);
        div_update(bars[i], random_array[i], "orange"); //Color update
        div_update(bars[i], random_array[i], "yellow"); //Color update

        max_heapify(i, 0);

        div_update(bars[i], random_array[i], "blue"); //Color update
        div_update(bars[i], random_array[i], "orange"); //Color update
    }
    div_updates(bars[i], random_array[i], "orange"); //Color update
}