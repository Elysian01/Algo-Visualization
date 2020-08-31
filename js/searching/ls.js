
var ANIMATION_SPEED_SECONDS = 1;
function randomNumber(min, max) {
  return Math.floor(Math.random() * (max - min + 1) + min);
}
var array = [];
// function update_array(){
//   sizeofarray=slider.value;
  
//   generate_array();

// }

window.onload=update_array();
slider.oninput = function() {
  sizeofarray=slider.value;
  resetArray(sizeofarray);
}
var speed=document.getElementById("speed")


speed.oninput=function(){
if(speed.value==1){
  ANIMATION_SPEED_SECONDS = 9;
}
else if (speed.value==2){
  ANIMATION_SPEED_SECONDS = 8;
}
else if (speed.value==3){
  ANIMATION_SPEED_SECONDS = 7;
}
else if (speed.value==4){
  ANIMATION_SPEED_SECONDS = 6;
}
else if (speed.value==5){
  ANIMATION_SPEED_SECONDS = 5;
}
else if (speed.value==6){
  ANIMATION_SPEED_SECONDS = 4;
}
else if (speed.value==7){
  ANIMATION_SPEED_SECONDS = 3;
}
else if (speed.value==8){
  ANIMATION_SPEED_SECONDS = 2;
}
else if (speed.value==9){
  ANIMATION_SPEED_SECONDS = 1;
}
else if (speed.value==10){
  ANIMATION_SPEED_SECONDS = 0;
}else{
  ANIMATION_SPEED_SECONDS = 1;
}
}

function resetArray(sizeofarray=30) {
  document.getElementById("message").innerHTML = `<h1></h1>`;
  array.splice(0,array.length)

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
// } console.log(array)
function update_array(){
  sizeofarray=slider.value;
  resetArray(sizeofarray);

}




function linearSearch() {
  const target = document.getElementById('searchKey').value;
  if(target==""){ return;}
  document.getElementById("message").innerHTML = `<h1></h1>`;
  console.log(array)
  const prevArray = document.getElementsByClassName("l-array");  

  // console.log(spanner)
  for (let idx = 0; idx < prevArray.length; idx++) {
    prevArray[idx].style.backgroundColor = "#1b1b1b";
    prevArray[idx].classList.remove("growFind");
    prevArray[idx].classList.remove("highlight");
    // console.log(prevArray[idx])
}
  var msg = "";
  document.getElementById("searchKey").disabled = true;
  document.getElementById("search").disabled = true;
  document.getElementById("reset").disabled = true;
  document.getElementById("slider").disabled = true;
  document.getElementById("speed").disabled = true;
  
  const animations = linearSearchanimate(array, target);
  console.log(animations);
  let count = 0;
  
    const spanner=document.getElementsByTagName("span");
 
  for (let i = 0; i < animations.length; i++) {
    const [id, element, found] = animations[i];
    const arrayBar = document.getElementsByClassName("l-array");
 
    const arrayBox = arrayBar[id];
    count++;   if (found) {
      msg = `${element} found at index ${id}`;
      setTimeout(() => {
        arrayBox.style.backgroundColor = "rgb(91, 200, 172)";
        arrayBox.style.color= "black ";
        spanner[i+4].style.backgroundColor = "#003b46";
        spanner[i+4].style.color= "white ";
        
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
        spanner[i+4].style.backgroundColor = "rgb(91, 200, 172)";


      }, i * ANIMATION_SPEED_SECONDS * 1000);
    }
  }
  setTimeout(() => {
    document.getElementById("message").innerHTML = `<h1>${msg}</h1>`;
    document.getElementById("searchKey").disabled = false;
    document.getElementById("search").disabled = false;
    document.getElementById("reset").disabled = false;
    document.getElementById("slider").disabled = false;
    document.getElementById("speed").disabled = false;
  }, (count * ANIMATION_SPEED_SECONDS * 1000));

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
