var array = [];
let algorithm = "";
var speed = document.getElementById("speed")
var ANIMATION_SPEED_SECONDS = 1;
var algoheading = document.getElementById("heading");
function algoSelected() {
  algorithm = document.getElementById("algo").value;
  changeHeading(algorithm);
}
function changeHeading(algorithm) {
  if (algorithm == "linear") {
    algoheading.innerHTML = "Linear Search [O(n)]"
  } else if (algorithm == "jump") {
    algoheading.innerHTML = "Jump Search [O(n)]";
    sortResetArray();
  } else if (algorithm == "binary") {
    algoheading.innerHTML = "Binary Search [O(logn)]";
    sortResetArray();
  } else if (algorithm == "exponent") {
    algoheading.innerHTML = "Exponential Search [O(logn)]";
    sortResetArray();
  } else {
    algoheading.innerHTML = "Let's start searching ? ";
  }
}
function randomNumber(min, max) {
  return Math.floor(Math.random() * (max - min + 1) + min);
}


window.onload = update_array();
slider.oninput = function () {
  sizeofarray = slider.value;
  if (algorithm == "linear") {
    resetArray(sizeofarray);
  }
  else if (algorithm == "") {
    resetArray(sizeofarray);
  } else if(algorithm=="jump") {
    sortResetArray(sizeofarray)
  }else{
    sortResetArray(sizeofarray)
  }
}
function search() {
  if (algorithm == "linear") {
    linearSearch();
  } else if (algorithm == "binary") {
    binarySearch()
  } else if (algorithm == "jump") {
    jumpSearch();
  }else if (algorithm == "exponent") {
    console.log("e")
    exponentSearch();
  }
  else{
    console.log("c")
    alert("CHOOSE AN ALGORITHM FIRST")
  }
}

speed.oninput = function () {
  if (speed.value == 1) {
    ANIMATION_SPEED_SECONDS = 9;
  }
  else if (speed.value == 2) {
    ANIMATION_SPEED_SECONDS = 8;
  }
  else if (speed.value == 3) {
    ANIMATION_SPEED_SECONDS = 7;
  }
  else if (speed.value == 4) {
    ANIMATION_SPEED_SECONDS = 6;
  }
  else if (speed.value == 5) {
    ANIMATION_SPEED_SECONDS = 5;
  }
  else if (speed.value == 6) {
    ANIMATION_SPEED_SECONDS = 4;
  }
  else if (speed.value == 7) {
    ANIMATION_SPEED_SECONDS = 3;
  }
  else if (speed.value == 8) {
    ANIMATION_SPEED_SECONDS = 2;
  }
  else if (speed.value == 9) {
    ANIMATION_SPEED_SECONDS = 1;
  }
  else if (speed.value == 10) {
    ANIMATION_SPEED_SECONDS = 0;
  } else {
    ANIMATION_SPEED_SECONDS = 1;
  }
}

function resetArray(sizeofarray = 30) {
  document.getElementById("message").innerHTML = `<h1></h1>`;
  array.splice(0, array.length)

  // array = [];
  for (let i = 0; i < sizeofarray; i++) {
    array.push(randomNumber(1, 100));
  }
  var html = "";
  array.forEach(function (element, index) {
    html += `<div class="l-array">
  ${element}
  <br>
  <span>${index}</span>
  </div>`
  })

  document.getElementById("x").innerHTML = `${html}`;
  console.log(array)
}
function staticarray(){
  document.getElementById("message").innerHTML = `<h1></h1>`;
  array=[2,4,6,8,10,12,14,16,18,20];
  var html = "";
  array.forEach(function (element, index) {
    html += `<div class="l-array">
  ${element}
  <br>
  <span>${index}</span>
  </div>`
  })

  document.getElementById("x").innerHTML = `${html}`;
  console.log(array)
}
function sortResetArray(sizeofarray = 30) {
  document.getElementById("message").innerHTML = `<h1></h1>`;
  array.splice(0, array.length)

  // array = [];
  for (let i = 0; i < sizeofarray; i++) {
    array.push(randomNumber(1, 100));
  }
  for (let i = 0; i < array.length; i++) {
    for (let j = i + 1; j < array.length; j++) {
      if (array[i] > array[j]) {
        temp = array[j];
        array[j] = array[i];
        array[i] = temp;
      }
    }
  }
  var html = "";
  array.forEach(function (element, index) {
    html += `<div class="l-array">
  ${element}
  <br>
  <span>${index}</span>
  </div>`
  })

  document.getElementById("x").innerHTML = `${html}`;
  console.log(array)
}
// } console.log(array)
function update_array() {
  sizeofarray = slider.value;
  if (algorithm == "linear") {
    resetArray(sizeofarray);
  }
  else if (algorithm == "") {
    resetArray(sizeofarray);
  } else {
    sortResetArray(sizeofarray)
  }

}
function disabled() {
  document.getElementById("searchKey").disabled = true;
  document.getElementById("search").disabled = true;
  document.getElementById("reset").disabled = true;
  document.getElementById("slider").disabled = true;
  document.getElementById("speed").disabled = true;
}
function enable() {
  document.getElementById("searchKey").disabled = false;
  document.getElementById("search").disabled = false;
  document.getElementById("reset").disabled = false;
  document.getElementById("slider").disabled = false;
  document.getElementById("speed").disabled = false;
}

function linearSearch() {
  const target = document.getElementById('searchKey').value;
  if (target == "") { return; }
  document.getElementById("message").innerHTML = `<h1></h1>`;
  console.log(array)
  const prevArray = document.getElementsByClassName("l-array");

  for (let idx = 0; idx < prevArray.length; idx++) {
    prevArray[idx].style.backgroundColor = "#1b1b1b";
    prevArray[idx].classList.remove("growFind");
    prevArray[idx].classList.remove("highlight");
    // console.log(prevArray[idx])
  }
  var msg = "";
  disabled();

  const animations = linearSearchanimate(array, target);
  // binarySearchanimate(array, target)
  console.log(animations);
  let count = 0;

  const spanner = document.getElementsByTagName("span");

  for (let i = 0; i < animations.length; i++) {
    const [id, element, found] = animations[i];
    const arrayBar = document.getElementsByClassName("l-array");

    const arrayBox = arrayBar[id];
    count++; if (found) {
      msg = `${element} found at index ${id}`;
      setTimeout(() => {
        arrayBox.style.backgroundColor = "rgb(91, 200, 172)";
        arrayBox.style.color = "black ";
        spanner[i + 4].style.backgroundColor = "#003b46";
        spanner[i + 4].style.color = "white ";

        arrayBox.classList.add("growFind");
        arrayBox.classList.add("highlight");
      }, i * ANIMATION_SPEED_SECONDS * 1000);
      break;
    } else {
      msg = `${target} not found`;
      setTimeout(() => {
        arrayBox.style.backgroundColor = "#003b46";
        arrayBox.style.color = "white";
        arrayBox.classList.add("growFind");
        spanner[i + 4].style.backgroundColor = "rgb(91, 200, 172)";


      }, i * ANIMATION_SPEED_SECONDS * 1000);
    }
  }
  setTimeout(() => {
    document.getElementById("message").innerHTML = `<h1>${msg}</h1>`;
    enable();
  }, (count * 1 * 1000));

}

function exponentSearch(){
  animate=[];
  const target = document.getElementById('searchKey').value;
  if (target == "") { return; }
  document.getElementById("message").innerHTML = `<h1></h1>`;
  console.log(array)
  const prevArray = document.getElementsByClassName("l-array");

  for (let idx = 0; idx < prevArray.length; idx++) {
    prevArray[idx].style.backgroundColor = "#1b1b1b";
    prevArray[idx].classList.remove("growFind");
    prevArray[idx].classList.remove("highlight");
    // console.log(prevArray[idx])
  }
  var msg = "";
  disabled();

  const animations = exponentSearchanimate(array, target);
  console.log(animations)
  let count = 0;

  const spanner = document.getElementsByTagName("span");
  for (let i = 0; i < animations.length; i++) {
    const [found, low, high, midPoint] = animations[i]
    // console.log("s"+found,low,high,midPoint)
    if(low!=undefined && high!==undefined && midPoint!==undefined){
    const arrayBar = document.getElementsByClassName("l-array");
    console.log(arrayBar)
    const arrayBarss = document.getElementsByClassName("l-array");
    // console.log(low, high)
    const arrayelement = arrayBar[midPoint];
    console.log("S"+arrayelement)
    count++;
    if (found && arrayelement!=undefined) {
  
      msg = `${target} found at index ${midPoint}`;
      setTimeout(() => {
        // arrayBox.style.backgroundColor = "rgb(91, 200, 172)";
        // arrayBox.style.color= "black ";
        // spanner[i+4].style.backgroundColor = "#003b46";
        // spanner[i+4].style.color= "white ";

        removehighlight(arrayBarss);
        highlight(low, high, arrayBarss);

        var delayInMilliseconds = 1000; //1 second

        setTimeout(function () {
          //your code to be executed after 1 second

          removehighlight(arrayBarss);

          arrayelement.classList.add("growFind")

          arrayelement.classList.add("highlight")
          arrayelement.style.backgroundColor = "rgb(91, 200, 172)";
          document.getElementById("message").innerHTML = `<h1>${msg}</h1>`;

        }, delayInMilliseconds);


        // arrayBox.classList.add("growFind");
        // arrayBox.classList.add("highlight");
      }, (i) * ANIMATION_SPEED_SECONDS * 1000);

    } else if (found == 0 && low == 0 && high == 0 && midPoint == 0) {
      setTimeout(() => {
        msg = "NOT FOUND !"
        document.getElementById("message").innerHTML = `<h1>${msg}</h1>`;

        removehighlight(arrayBarss);
      }, i * ANIMATION_SPEED_SECONDS * 1000);
    } else {
      console.log(low, high); setTimeout(() => {
      
        removehighlight(arrayBarss);
        highlight(low, high, arrayBarss);
    
      
      }, i * ANIMATION_SPEED_SECONDS * 1000);
   
    }}else{
if(low==true){

  var array_Barss = document.getElementsByClassName("l-array");


  setTimeout(() => {
    msg = `${target} found at index ${found}`;
    document.getElementById("message").innerHTML = `<h1>${msg}</h1>`;
  array_Barss[found].style.backgroundColor = "rgb(91, 200, 172)";
  array_Barss[found].style.transition = "100ms all";
}, i * ANIMATION_SPEED_SECONDS * 1000);

return;
}else{

  var array_Barss = document.getElementsByClassName("l-array");
  for (let idx = 0; idx < array_Barss.length; idx++) {
  array_Barss[idx].style.backgroundColor = "#1b1b1b";
  array_Barss[idx].classList.remove("growFind");
  array_Barss[idx].classList.remove("highlight");
    // console.log(prevArray[idx])
  }
  setTimeout(() => {
  array_Barss[found].style.backgroundColor = "#4e89ae";
  array_Barss[found].style.transition = "100ms all";
}, i * ANIMATION_SPEED_SECONDS * 1000);
 }  
  

  } enable();
}}


function exponentSearchanimate(array,target){
  const n = array.length;
  if (array[0] == target) {
 
    animate.push([0,true])
    return animate; }
  let i=1;
  while(i<n && array[i]<=target){
    i=i*2;
    if (i < n && array[i] < target) { 
    animate.push([i]);
  }

    if(array[i]==target){
      console.log("")

       animate.push([i,true])
      return animate;
    }

  }  
  
  return binarySearchanimate(array,target, i / 2, Math.min(i, n) );
}




//bs
function highlight(low, high, arrayBarss) {
  if(low!=undefined && high!==undefined && arrayBarss!=undefined ){
  for (i = low; i <= high; i++) {
// 003b46
console.log("howww "+arrayBarss[i])
if(arrayBarss[i]!=undefined){
    arrayBarss[i].style.backgroundColor = "#4e89ae";
    arrayBarss[i].style.transition = "100ms all";
    // spanner[i + 4].style.backgroundColor = "rgb(91, 200, 172)";
    // spanner[i+4].style.transition="100ms all";
  }}}
}
function removehighlight(arrayBarss) {
  console.log("removeded");
  for (i = 0; i < arrayBarss.length; i++) {
    arrayBarss[i].style.backgroundColor = "#1b1b1b";
    document.getElementsByClassName("l-array")[i].style.transition = "100ms all";
    // arrayBarss[i].style.transition = "100ms all";
  }
}
function binarySearch() {
  animate = [];
  const arrayBarss = document.getElementsByClassName("l-array");
  const target = document.getElementById('searchKey').value;
  if (target == "") { return; }
  document.getElementById("message").innerHTML = `<h1></h1>`;
  console.log(array)
  const prevArray = document.getElementsByClassName("l-array");

  for (let idx = 0; idx < prevArray.length; idx++) {
    prevArray[idx].style.backgroundColor = "#1b1b1b";
    prevArray[idx].classList.remove("growFind");
    prevArray[idx].classList.remove("highlight");
    // console.log(prevArray[idx])
  }
  var msg = "";
  disabled();

  // const animations = linearSearchanimate(array, target);
  const bsanimations = binarySearchanimate(array, target)
  console.log(bsanimations);
  let count = 0;

  const spanner = document.getElementsByTagName("span");
  for (let i = 0; i < bsanimations.length; i++) {
    const [found, low, high, midPoint] = bsanimations[i]
    const arrayBar = document.getElementsByClassName("l-array");
    console.log(low, high)
    const arrayelement = arrayBar[midPoint];
    console.log("S"+arrayelement)
    count++;
    if (found) {
      msg = `${target} found at index ${midPoint}`;
      setTimeout(() => {
        // arrayBox.style.backgroundColor = "rgb(91, 200, 172)";
        // arrayBox.style.color= "black ";
        // spanner[i+4].style.backgroundColor = "#003b46";
        // spanner[i+4].style.color= "white ";

        removehighlight(arrayBarss);
        highlight(low, high, arrayBarss);

        var delayInMilliseconds = 1000; //1 second

        setTimeout(function () {
          //your code to be executed after 1 second

          removehighlight(arrayBarss);

          arrayelement.classList.add("growFind")

          arrayelement.classList.add("highlight")
          arrayelement.style.backgroundColor = "rgb(91, 200, 172)";
          document.getElementById("message").innerHTML = `<h1>${msg}</h1>`;

        }, delayInMilliseconds);


        // arrayBox.classList.add("growFind");
        // arrayBox.classList.add("highlight");
      }, (i) * ANIMATION_SPEED_SECONDS * 1000);

    } else if (found == 0 && low == 0 && high == 0 && midPoint == 0) {
      setTimeout(() => {
        msg = "NOT FOUND !"
        document.getElementById("message").innerHTML = `<h1>${msg}</h1>`;

        removehighlight(arrayBarss);
      }, i * ANIMATION_SPEED_SECONDS * 1000);
    } else {
      console.log(low, high); setTimeout(() => {

        removehighlight(arrayBarss);
        highlight(low, high, arrayBarss);

      }, i * ANIMATION_SPEED_SECONDS * 1000);

    }

  } enable();
}
function jumpSearch(){
  let count=0;
  animate = [];
  const arrayBars = document.getElementsByClassName("l-array");
  
  const spanner = document.getElementsByTagName("span");
  const target = document.getElementById('searchKey').value;
  if (target == "") { return; }
  document.getElementById("message").innerHTML = `<h1></h1>`;
  console.log(array)
  const prevArray = document.getElementsByClassName("l-array");

  for (let idx = 0; idx < prevArray.length; idx++) {
    prevArray[idx].style.backgroundColor = "#1b1b1b";
    prevArray[idx].classList.remove("growFind");
    prevArray[idx].classList.remove("highlight");
    // console.log(prevArray[idx])
  }
  var msg = "";
  disabled();

  // const animations = linearSearchanimate(array, target);
  const jsanimations = jumpSearchanimate(array,target)
  for (let i = 0; i < jsanimations.length; i++) {
    const [start, end,  status] = jsanimations[i]
    if(status===null){
      setTimeout(() => {
        removehighlight(arrayBars);

      highlight(start, end, arrayBars);


}, i * ANIMATION_SPEED_SECONDS * 1000);
    }
    if(status==false){
      setTimeout(() => {
        console.log("nf")
        removehighlight(arrayBars);
        arrayBars[start].style.backgroundColor = "rgb(78, 137, 174)";
}, i * ANIMATION_SPEED_SECONDS * 1000);}
if(status==true){
  setTimeout(() => {
msg=`Element found at ${start}`;
document.getElementById("message").innerHTML = `<h1>${msg}</h1>`;
    removehighlight(arrayBars);

    arrayBars[start].style.backgroundColor = "rgb(91, 200, 172)";
    arrayBars[start].classList.add("growFind");
    arrayBars[start].classList.add("highlight");
}, i * ANIMATION_SPEED_SECONDS * 1000);
}
if(start===0 && end===0 && status==0){
  setTimeout(() => {
    removehighlight(arrayBars);
  msg=`No element found`;
document.getElementById("message").innerHTML = `<h1>${msg}</h1>`;
}, i * ANIMATION_SPEED_SECONDS * 1000);
}
   count++ }

  // console.log(jsanimations) 
  setTimeout(() => {
    document.getElementById("message").innerHTML = `<h1>${msg}</h1>`;
    enable();
  }, (count * 1 * 1000));
}
function jumpSearchanimate(arr, target){
  console.log(animate)
	let len = arr.length
	let step = Math.floor(Math.sqrt(len));
	let blockStart = 0, currentStep = step;
  animate.push([blockStart,Math.min(currentStep, len) - 1 ,null])
	while (arr[Math.min(currentStep, len) - 1] < target) {
    // 18<20 
		blockStart = currentStep;
		currentStep += step;
		if (blockStart >= len){
    animate.push([0,0,0]);
    console.log(animate);
    return animate;}
    else{
      animate.push([blockStart,Math.min(currentStep, len) - 1 ,null])

    }
		// return animate;
	}

	while (arr[blockStart] < target)
	{
animate.push([blockStart,array[blockStart],false])
		blockStart++;
		if (blockStart == Math.min(currentStep, len)){
      animate.push([0,0,0])
			return animate;}
	}

  if (arr[blockStart] == target){
  animate.push([blockStart,array[blockStart],true])
  console.log(animate)
		return animate}
  else{
  animate.push([0,0,0])}

  console.log(animate);
		return animate;
  // return animate;
}

function linearSearchanimate(array, target) {
  let animate = [];
  // console.log(array)
  for (let i = 0; i < array.length; i++) {
    if (target == array[i]) {
      animate.push([i, array[i], true])
    } else {
      animate.push([i, array[i], false])
    }


  }
  return animate;

}
function binarySearchanimate(array, target, low = 0, high = array.length - 1) {

  if (low > high) {
    animate.push([0, 0, 0, 0])
    return animate;
  }
  const midPoint = Math.floor((low + high) / 2)

  if (target < array[midPoint]) {
    animate.push([false, low, high, midPoint])
    binarySearchanimate(array, target, low, midPoint - 1)
  } else if (target > array[midPoint]) {
    animate.push([false, low, high, midPoint])

    binarySearchanimate(array, target, midPoint + 1, high)
  } else {
    animate.push([true, low, high, midPoint])

  }
  return animate;

}
