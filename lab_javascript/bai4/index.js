function checklogin() {
    var username = document.getElementById('u').value;
    var password = document.getElementById('p').value;

    if (username.trim() === "") {
        alert("Please enter your username.");
        return false;
    }

    if (password.trim() === "") {
        alert("Please enter your password.");
        return false;
    }

    if (username === "admin" && password === "123456") {
       
        window.location.href = "xulylogin.html";
        return false;  
    } else {
        alert("Invalid login. Please try again.");
        return false;  
    }
}
