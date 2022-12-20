<?php
session_start();
if (!isset($_SESSION["user_name"])) {
  header("refresh: 0; url=Patsignin.php");
  exit();
}
$title = 'Reminder';

require_once './includes/header.php';
require_once './includes/sidebar.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../Patient/css/reminderstyle.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
  <div class="reminderhm">
    <div class="reminderimg">
      <img src="../../Images/Reminder.svg" alt="">
    </div>
    <div class="wrapper">
      <p id="hmicon"><i class="fas fa-capsules"></i></p>
      <header>Medicine to take</header>
      <div class="inputField">
        <input type="text" placeholder="Add To Your Medicine List" />
        <button><i class="fas fa-plus"></i></button>
      </div>
      <ul class="todoList">

      </ul>
      <div class="cmntline">
        <span>You have <span class="pendingTasks"></span> Medicine To Take</span>
        <!-- <button>Clear All</button> -->
      </div>
    </div>
  </div>


  <script>
    // getting all required elements
    listArray = [""];
    const inputBox = document.querySelector(".inputField input");
    const addBtn = document.querySelector(".inputField button");
    const todoList = document.querySelector(".todoList");


    // onkeyup event
    inputBox.onkeyup = () => {
      let userEnteredValue = inputBox.value; //getting user entered value
      if (userEnteredValue.trim() != 0) { //if the user value isn't only spaces
        addBtn.classList.add("active"); //active the add button
      } else {
        addBtn.classList.remove("active"); //unactive the add button
      }
    }

    showTasks(); //calling showTask function

    addBtn.onclick = () => { //when user click on plus icon button
      let userEnteredValue = inputBox.value; //getting input field value
      let getLocalStorageData = localStorage.getItem("New Todo"); //getting localstorage
      if (getLocalStorageData == null) { //if localstorage has no data
        listArray = []; //create a blank array
      } else {
        listArray = JSON.parse(getLocalStorageData); //transforming json string into a js object
      }
      listArray.push(userEnteredValue); //pushing or adding new value in array
      localStorage.setItem("New Todo", JSON.stringify(listArray)); //transforming js object into a json string
      showTasks(); //calling showTask function
      addBtn.classList.remove("active"); //unactive the add button once the task added
    }

    function showTasks() {
      let getLocalStorageData = localStorage.getItem("New Todo");
      if (getLocalStorageData == null) {
        listArray = [];
      } else {
        listArray = JSON.parse(getLocalStorageData);
      }
      const pendingTasksNumb = document.querySelector(".pendingTasks");
      pendingTasksNumb.textContent = listArray.length; //passing the array length in pendingtask
      let newLiTag = "";
      listArray.forEach((element, index) => {
        newLiTag += `<li>${element}<span class="icon" onclick="deleteTask(${index})"><i class="fas fa-check"></i></span></li>`;
      });
      todoList.innerHTML = newLiTag; //adding new li tag inside ul tag
      inputBox.value = ""; //once task added leave the input field blank
    }

    // delete task function
    function deleteTask(index) {
      let getLocalStorageData = localStorage.getItem("New Todo");
      listArray = JSON.parse(getLocalStorageData);
      listArray.splice(index, 1); //delete or remove the li
      localStorage.setItem("New Todo", JSON.stringify(listArray));
      showTasks(); //call the showTasks function
    }
  </script>
</body>

</html>