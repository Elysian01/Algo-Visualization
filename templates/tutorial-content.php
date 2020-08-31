<?php

include('../functions/display_functions.php');

include('../config/db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Algo Visualization</title>
	<script src="https://kit.fontawesome.com/a658a7b479.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js"></script>
	<link rel="icon" href="../images/logo.png">


	<!-- <link rel="stylesheet" href="../css/homepage.css"> -->
	<link rel="stylesheet" href="../css/tutorial-content.css">
	<style>
		@media (max-width: 968px) {
			/* ul {
				display: inline-block;
			} */
		}
	</style>
	<style>

	</style>
</head>

<body>
	<?php display_header(); ?>
	<br>
	<h1 class="text-center">Linear Search<img style="margin-bottom:-5px" src="https://img.icons8.com/doodle/40/000000/search--v1.png" /> </h1>
	<br>
	<h2 class="text-center text-responsive">In computer science, a linear search or sequential search is a method for finding an element within a list. It sequentially checks each element of the list until a match is found or the whole list has been searched.</h2>
	<br><br>
	<div class="tutorial-card">
		<div class="card-header" style="background-color:black;color:#33ffff">
			<b><img style="margin-bottom:-6px;margin-right:4px" src="https://img.icons8.com/material/24/33ffff/dot-logo.png" />Explaination </b> </div>
		<div class="card-body">

			<p class="card-text"> A simple approach is to do linear search, i.e<br>
				<ol style="padding-left:17px">
					<li> Start from the leftmost element of arr[] and one by one compare x with each element of arr[]</li>
					<li> If x matches with an element, return the index.</li>
					<li> If x doesn’t match with any of elements, return -1..</li>
			</p>
			</ol>
		</div>
	</div> <img src="../images/searching/ls.gif" class="lineargif">
	<br>
	<br>
	<div class="tab">

		<button class="tablinks" onclick="openCity(event, 'Python3')">Python3</button>
		<button class="tablinks" onclick="openCity(event, 'C++')">C++</button>
		<button class="tablinks" onclick="openCity(event, 'JAVA')">JAVA</button>
	</div>

	<!-- Tab content -->
	<div id="Python3" class="tabcontent ">
		<pre class="prettyprint">
def search(arr, n, x): 

  for i in range (0, n): 
    if (arr[i] == x): 
      return i; 
	return -1; 

# Driver Code 
arr = [ 2, 3, 4, 10, 40 ]; 
x = 10; 
n = len(arr); 
result = search(arr, n, x) 
if(result == -1): 
	print("Element is not present in array") 
else: 
  print("Element is present at index", result); 

</pre>


	</div>

	<div id="C++" class="tabcontent">


		<pre class="prettyprint" style="padding:10px">
       <code>
#include <iostream> 
using namespace std; 

int search(int arr[], int n, int x) 
{ 
	int i; 
	for (i = 0; i < n; i++) 
		if (arr[i] == x) 
			return i; 
	return -1; 
} 

int main(void) 
{ 
	int arr[] = { 2, 3, 4, 10, 40 }; 
	int x = 10; 
	int n = sizeof(arr) / sizeof(arr[0]); 
	int result = search(arr, n, x); 
if (result == -1) {
    cout<<"Element is not present in array";
}	
else{
    cout<<"Element is present at index "+result;
} 
return 0; 
} 

       </code></pre>
	</div>

	<div id="JAVA" class="tabcontent">
		<pre class="prettyprint">
class GFG 
{ 
public static int search(int arr[], int x) 
{ 
  int n = arr.length; 
    for(int i = 0; i < n; i++) 
	{ 
		if(arr[i] == x) 
			return i; 
	} 
	return -1; 
} 

public static void main(String args[]) 
{ 
	int arr[] = { 2, 3, 4, 10, 40 }; 
	int x = 10; 
	int result = search(arr, x); 
if(result == -1) 
	 System.out.print("Element not found"); 
else
	 System.out.print("Element is at " + result); 
} 
} 


</pre>
		<br>
	</div>
	<br>
	<script type="text/javascript">
		function openCity(evt, cityName) {
			// Declare all variables
			var i, tabcontent, tablinks;

			// Get all elements with class="tabcontent" and hide them
			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}

			// Get all elements with class="tablinks" and remove the class "active"
			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}

			// Show the current tab, and add an "active" class to the button that opened the tab
			document.getElementById(cityName).style.display = "block";
			evt.currentTarget.className += " active";
		}
	</script>
</body>

</html>