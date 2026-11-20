<!DOCTYPE html>
<html>
<head>
    <title>Insert User Data</title>
</head>
<body>

<h2>Insert User</h2>

<form id="userForm">
    <label>Nama:</label><br>
    <input type="text" id="nama" required><br><br>

    <label>No Phone:</label><br>
    <input type="text" id="ic" required><br><br>

    <label>NDP:</label><br>
    <input type="text" id="memberid" required><br><br>

    <button type="submit">Submit</button>
</form>

<p id="result"></p>

<script>
document.getElementById("userForm").addEventListener("submit", function(e){
    e.preventDefault();

    let formData = new FormData();
    formData.append("nama", document.getElementById("nama").value);
    formData.append("ic", document.getElementById("ic").value);
    formData.append("memberid", document.getElementById("memberid").value);

 //   fetch("https://www.abc.com/api-insert-user.php",
    fetch("https://www.elite2b.com/kelasapi/3_insert_api.php", 
    {
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById("result").innerHTML = data.message;

        if(data.status === "success"){
            document.getElementById("userForm").reset();
        }
    })
    .catch(err => {
        document.getElementById("result").innerHTML = "Error: " + err;
    });
});
</script>

</body>
</html>
