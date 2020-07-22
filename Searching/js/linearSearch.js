const resetBtn = document.getElementById("reset");
const searchBtn = document.getElementById("search");
const result = document.querySelector(".result");

var arr = [];

const delay = 750;

function randomIntFromInterval(min, max) {
    return Math.floor(Math.random() * (max - min + 1) + min);
}

function resetArray() {
    arr = [];
    // console.log("Array reset called !");
    blocks = document.querySelectorAll(".card");
    indexs = document.querySelectorAll(".index");
    for (let i = 0; i < blocks.length; i++) {
        let num = randomIntFromInterval(5, 100);
        document.getElementById(i).innerText = num;
        arr.push(num);
        blocks[i].style.backgroundColor = "#003b46";
        indexs[i].style.backgroundColor = "#5bc8ac";
        indexs[i].style.color = "#003b46";
    }
    result.style.display = "none";
    document.getElementById("searchKey").value = "";
}

async function linearSearch() {
    let found = false;
    const searchKey = document.getElementById("searchKey").value;

    if (searchKey === "") {
        alert("Please Enter number you have to find");
    } else {
        blocks = document.querySelectorAll(".card");
        indexs = document.querySelectorAll(".index");
        for (let i = 0; i < arr.length; i++) {
            blocks[i].style.backgroundColor = "#5bc8ac";
            indexs[i].style.backgroundColor = "#003b46";
            indexs[i].style.color = "#5bc8ac";

            await new Promise((resolve) =>
                setTimeout(() => {
                    resolve();
                }, delay)
            );

            if (arr[i] == searchKey) {
                result.style.display = "block";
                result.innerHTML = `Number found at index : ${i}`;
                console.log(
                    `${searchKey} Number found at  index ${i} in array `
                );
                found = true;
                break;
            }

            blocks[i].style.backgroundColor = "#003b46";
            indexs[i].style.backgroundColor = "#5bc8ac";
            indexs[i].style.color = "#003b46";
        }
        if (!found) {
            result.style.display = "block";
            result.innerHTML = "Number not found ";
        }
        searchKey.value = "";
    }
}

window.onload = () => {
    result.style.display = "none";
    resetArray();
};