function Merge_Sort() {
    c_delay = 0;

    merge_partition(0, array_size - 1);

    enable_buttons();
}

function merge_sort(start, mid, end) {
    var p = start,
        q = mid + 1;

    var Arr = [],
        k = 0;

    for (var i = start; i <= end; i++) {
        if (p > mid) {
            Arr[k++] = random_array[q++];
            div_update(bars[q - 1], random_array[q - 1], "red"); //Color update
        } else if (q > end) {
            Arr[k++] = random_array[p++];
            div_update(bars[p - 1], random_array[p - 1], "red"); //Color update
        } else if (random_array[p] < random_array[q]) {
            Arr[k++] = random_array[p++];
            div_update(bars[p - 1], random_array[p - 1], "red"); //Color update
        } else {
            Arr[k++] = random_array[q++];
            div_update(bars[q - 1], random_array[q - 1], "red"); //Color update
        }
    }

    for (var t = 0; t < k; t++) {
        random_array[start++] = Arr[t];
        div_updates(bars[start - 1], random_array[start - 1], "orange"); //Color update
    }
}

function merge_partition(start, end) {
    if (start < end) {
        var mid = Math.floor((start + end) / 2);
        div_update(bars[mid], random_array[mid], "yellow"); //Color update

        merge_partition(start, mid);
        merge_partition(mid + 1, end);

        merge_sort(start, mid, end);
    }
}