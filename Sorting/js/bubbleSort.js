// Good reference :- https://codepen.io/EthanEFung/pen/XWraPpz
// https://codesandbox.io/s/zen-minsky-bwyr9?from-embed

const container = document.querySelector(".data-container")

function generateBlocks(num = 10) {
    if (num && typeof num !== "number") {
        alert("First argument must be a type of number")
        return
    }
    for (let i = 0; i < num; i++) {
        const value = Math.floor(Math.random() * 100 + 5)

        const block = document.createElement("div")
        block.classList.add("block")
        block.style.height = `${value * 3}px`
        block.style.transform = `translateX(${i * 30}px)`

        const blockLabel = document.createElement("label");
        blockLabel.classList.add("block__id")
        blockLabel.innerHTML = value;

        block.appendChild(blockLabel)
        container.appendChild(block)
    }
}

function swap(el1, el2) {
    return new Promise(resolve => {
        const style1 = window.getComputedStyle(el1)
        const style2 = window.getComputedStyle(el2)

        const transform1 = style1.getPropertyValue("transform")
        const transform2 = style2.getPropertyValue("transform")

        el1.style.transform = transform2;
        el2.style.transform = transform1;

        window.requestAnimationFrame(function() {
            setTimeout(() => {
                container.insertBefore(el2, el1);
                resolve()
            }, 250)
        })
    })
}

async function bubbleSort(delay = 100) {
    if (delay && typeof delay !== "number") {
        alert("First argument must be a type of number")
        return
    }
    let blocks = document.querySelectorAll(".block");
    for (let i = 0; i < blocks.length - 1; i += 1) {
        for (let j = 0; j < blocks.length - i - 1; j += 1) {
            blocks[j].style.backgroundColor = "#FF4949";
            blocks[j + 1].style.backgroundColor = "#FF4949";

            await new Promise(resolve =>
                setTimeout(() => {
                    resolve();
                }, delay)
            );

            const value1 = Number(blocks[j].childNodes[0].innerHTML)
            const value2 = Number(blocks[j + 1].childNodes[0].innerHTML)

            if (value1 > value2) {
                await swap(blocks[j], blocks[j + 1]);
                blocks = document.querySelectorAll(".block");
            }

            blocks[j].style.backgroundColor = "#58B7FF";
            blocks[j + 1].style.backgroundColor = "#58B7FF";
        }
        blocks[blocks.length - i - 1].style.backgroundColor = "#13CE66";
    }
}
generateBlocks();
bubbleSort();