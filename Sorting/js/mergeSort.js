function randomIntFromInterval(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}

function createRandomArray(totalLength) {
    var array = []
    for (let i = 0; i < totalLength; i++) {
        array.push(randomIntFromInterval(5, 1000))
    }
    return array
}

console.log(createRandomArray(5))