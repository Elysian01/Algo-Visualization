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
		pre {
			overflow: auto;
		}
	</style>
</head>

<body>
	<?php

	display_header();

	?>

	<?php

	if (isset($_GET['id'])) {
		$idno = $_GET['id'];
		$sql = "SELECT * FROM algo where algo_id= '$idno' ";
		$result = mysqli_query($con, $sql);
		while ($row = mysqli_fetch_assoc($result)) {
			$image = $row['image'];
			echo '<br><div class="header-container "><div><button class="btn-start invisible tutorial-btn" >Add Bookmark !</button></div>	<div><h1 class="algorithm-text">' . $row["name"] . '';


			if ($row["grp_id"] == 3) {
				echo ' Search <img style="margin-bottom:-5px" src="https://img.icons8.com/doodle/40/000000/search--v1.png" /></h1></div>';
			} elseif ($row["grp_id"] == 2) {
				echo ' Sorting  <img style="margin-bottom:-5px"  src="https://img.icons8.com/office/30/000000/numerical-sorting-21.png"/></h1></div>';
			} else {
				echo '</h1></div>';
			}
	?>

			<?php

			if (isset($_SESSION['user_id'])) {
				$users_id = $_SESSION['user_id'];
				$sql = "SELECT * FROM bookmark where users_id='$users_id'   ";
				$result = mysqli_query($con, $sql);

				if (mysqli_num_rows($result) > 0) {
					$rows = mysqli_fetch_assoc($result);
					$value = $rows['algo_id'];
					$array_of_bookmarks = unserialize($value);
					if (isset($_GET['id'])) {
						$idno = $_GET['id'];
						$bookmark_is_present =	array_search($idno, $array_of_bookmarks);

						if ($bookmark_is_present === false) {
			?>
							<div> <button id="addbookmark" onclick=addbookmark(<?php echo  $idno; ?>,<?php echo $_SESSION['user_id']; ?>) class="btn-start tutorial-btn">Add Bookmark !</button></div>

						<?php } else { ?>

							<div> <button id="deletebookmark" onclick=deletebookmark(<?php echo  $idno; ?>,<?php echo $_SESSION['user_id']; ?>) class="btn-start tutorial-btn" style="background-color:#ff4d00">Remove Bookmark !</button></div>

				<?php
						}
					}
				}else{?>
												<div> <button id="addbookmark" onclick=addbookmark(<?php echo  $idno; ?>,<?php echo $_SESSION['user_id']; ?>) class="btn-start tutorial-btn">Add Bookmark !</button></div>
			<?php	}
			} else {
				?>
				<div> <a href="./invalid_access.php"> <button class="btn-start tutorial-btn">Add Bookmark !</button></a></div>



			<?php
			}
			echo '</div><br>
<h2 class="text-center text-responsive" style="padding:5px;">' . $row["definition"] . '</h2>

			<br><br>
	<div class="tutorial-card">
		<div class="card-header" style="background-color:black;color:#33ffff">
			<b><img style="margin-bottom:-6px;margin-right:4px" src="https://img.icons8.com/material/24/33ffff/dot-logo.png" />Explaination </b> 
		</div>
	<div class="card-body">
		
		<p class="card-text">' ?>


			<?php echo '	' . $row["explaination"] . '
		</p>
	
	</div>
			</div><br> <img src=' . "../images/preview/$image" . '  class="lineargif" height=350>
			<br>
			<br>
			<div class="tab">'; ?>

			<button class="tablinks" onclick="openCity(event, 'Python3')">Python3</button>
			<button class="tablinks" onclick="openCity(event, 'C++')">C++</button>
			<button class="tablinks" onclick="openCity(event, 'JAVA')">JAVA</button>
			</div>

	<?php echo '
<div id="Python3" class="tabcontent ">
	<pre class="prettyprint">' . $row["python"] . '
	</pre>
</div>

<div id="C++" class="tabcontent">
	<pre class="prettyprint" style="padding:0px">
<code>
	' . $row["cpp"] . '  
</code>
	</pre>
</div>
		
<div id="JAVA" class="tabcontent">
	<pre class="prettyprint">
' . $row["java"] . ' 
</pre>
	<br>
</div>
 ';
		}
	}
	?>
	<!-- //button -->
<?php 
if (isset($_GET['id']) && isset($_SESSION['user_id'])) {
    $idno=$_GET['id'];
		$users_id=	$_SESSION['user_id'];
		$sql = "SELECT * FROM algo where algo_id='$idno'   ";
    $result = mysqli_query($con, $sql);
    $rows = mysqli_fetch_assoc($result);
    $name = $rows['name'];

    $sql = "SELECT * FROM course where user_id='$users_id'   ";
    $result = mysqli_query($con, $sql);
    // echo mysqli_num_rows($result);
    if (mysqli_num_rows($result) > 0) {
        $rows = mysqli_fetch_assoc($result);
        $value = $rows['course_completion'];
        $array_of_courses = unserialize($value);
        if ($array_of_courses[$name]==1) {
            ?>
<div> <button id="deletecoursecompletion" onclick=deletecoursecompletion(<?php echo  $idno; ?>,<?php echo $_SESSION['user_id']; ?>) class="btn-start tutorial-btn" style="background-color:#ff4d00">Course Completed !</button></div>

<?php
        } else {
            ?><div> <button id="addcoursecompletion" onclick=addcoursecompletion(<?php echo  $idno; ?>,<?php echo $_SESSION['user_id']; ?>) class="btn-start tutorial-btn">Course Complete !</button></div><?php
        } ?>
							
<?php
    } else {
        ?><div> <button id="addcoursecompletion" onclick=addcoursecompletion(<?php echo  $idno; ?>,<?php echo $_SESSION['user_id']; ?>) class="btn-start tutorial-btn">Course Complete !</button></div><?php
    }
}else{
	?>
		<div> <a href="./invalid_access.php"> <button class="btn-start tutorial-btn">Course Completed !</button></a></div>
	<?php
}
?>

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

		function addbookmark(data, user_id) {


			var request = new XMLHttpRequest();
			request.open("GET", "http://localhost/Algo-Visualization/templates/add_bookmark.php?bm=" + data + "&id=" + user_id, true);
			request.send();
			request.onreadystatechange = function() {
				console.log(request.responseText);
			}
			var addbookmark = document.getElementById('addbookmark');
			addbookmark.style.backgroundColor = "#ff4d00";
			addbookmark.innerText = "Remove Bookmark !";
			addbookmark.onclick = function() {
				deletebookmark(data, user_id);
			};
			addbookmark.id = "deletebookmark";
		}

		function deletebookmark(data, user_id) {


			var request = new XMLHttpRequest();
			request.open("GET", "http://localhost/Algo-Visualization/templates/delete_bookmark.php?bm=" + data + "&id=" + user_id, true);
			request.send();
			request.onreadystatechange = function() {
				console.log(request.responseText);
			}
			var deletebookmark = document.getElementById('deletebookmark');
			deletebookmark.style.backgroundColor = "#ffc60b";
			deletebookmark.innerText = "Add Bookmark !";
			deletebookmark.onclick = function() {
				addbookmark(data, user_id);
			};
			deletebookmark.id = "addbookmark";
		}
		function addcoursecompletion(data,user_id){
			var request = new XMLHttpRequest();
			request.open("GET", "http://localhost/Algo-Visualization/templates/add_course.php?bm=" + data + "&id=" + user_id, true);
			request.send();
			request.onreadystatechange = function() {
			
				console.log(request.responseText);
			}
			var addcoursecompletion = document.getElementById('addcoursecompletion');
			addcoursecompletion.style.backgroundColor = "#ff4d00";
			addcoursecompletion.innerText = "Course Completed !";
			addcoursecompletion.onclick = function() {
				deletecoursecompletion(data, user_id);
			};
			addcoursecompletion.id = "deletecoursecompletion";
		}
		function deletecoursecompletion(data,user_id){
			var request = new XMLHttpRequest();
			request.open("GET", "http://localhost/Algo-Visualization/templates/delete_course.php?bm=" + data + "&id=" + user_id, true);
			request.send();
			request.onreadystatechange = function() {
				console.log(request.responseText);
			}
			var deletecoursecompletion = document.getElementById('deletecoursecompletion');
			deletecoursecompletion.style.backgroundColor = "#ffc60b";
			deletecoursecompletion.innerText = "Course Complete !";
			deletecoursecompletion.onclick = function() {
				addcoursecompletion(data, user_id);
			};
			deletecoursecompletion.id = "addcoursecompletion";
		}
	</script>
</body>

</html>

















































<!-- <br>
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

 Tab content -->
<!-- <div id="Python3" class="tabcontent ">
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
	<br> -->