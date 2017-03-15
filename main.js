function getRequest() {
  // Request all the info for every user
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("content").innerHTML = this.responseText;
     stateShow("clear");
    }
    else {
      stateShow("loading");
    }
  };
  xhttp.open("GET", "crtl.database.php?submit=table", true);
  xhttp.send();
}
function updateData(id) {
  // Update data
  var firstname = document.getElementById('first_name' + id).value;
  var secondname = document.getElementById('last_name' + id).value;
  var usercity = document.getElementById('user_city' + id).value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     showResult(this.responseText);
     getRequest();
    }
    else {
      stateShow("loading");
    }
  };
  stateShow();
  var postParameters = "submit=update&first_name=" + firstname + "&last_name=" + secondname + "&user_city=" + usercity + "&user_id=" + id;
  // contains te post values
  xhttp.open("POST", "crtl.database.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(postParameters);
}
function insertData(firstname, secondname, usercity) {
  // Insert data into the database
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     showResult(this.responseText);
     getRequest();
    }
    else {
      stateShow("loading");
    }
  };

  var postParameters = "submit=create&first_name=" + firstname + "&last_name=" + secondname + "&user_city=" + usercity;
  // contains te post values
  xhttp.open("POST", "crtl.database.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(postParameters);
}
function deleteData(userID) {
  // This function delete a row
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     showResult(this.responseText);
     getRequest();
    }
    else {
      stateShow("loading");
    }
  };
  xhttp.open("GET", "crtl.database.php?submit=remove&user_id=" + userID + "", true);
  xhttp.send();
}
function showResult(message) {
  // We use this to display a message
  // document.getElementById('result').innerHTML = message;
  // Dont use that we have a loader!
}

function stateShow(status) {
  var stateDiv = document.getElementById('status');
  // This function change the div status
  // So that the user can see what is happening
  if (status == "loading") {
    stateDiv.className = "loader";
    status = "clear";
  }
  else if (status == "clear") {
    stateDiv.className = "checked";
    status = "loading";
  }
}
