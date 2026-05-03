<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Send SMS Panel</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg,#4facfe,#00f2fe);
}

.container{
    width:400px;
    background:#fff;
    padding:30px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

.container h2{
    text-align:center;
    margin-bottom:25px;
    color:#333;
}

.input-box{
    margin-bottom:18px;
}

.input-box input,
.input-box textarea{
    width:100%;
    padding:12px;
    border:1px solid #ccc;
    border-radius:8px;
    font-size:15px;
    outline:none;
    transition:0.3s;
}

.input-box input:focus,
.input-box textarea:focus{
    border-color:#4facfe;
    box-shadow:0 0 8px rgba(79,172,254,0.4);
}

textarea{
    resize:none;
    height:120px;
}

button{
    width:100%;
    padding:12px;
    border:none;
    background:linear-gradient(135deg,#4facfe,#00c6ff);
    color:#fff;
    font-size:16px;
    border-radius:8px;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    transform:scale(1.03);
    box-shadow:0 5px 15px rgba(0,0,0,0.2);
}
</style>

</head>
<body>

<div class="container">
    <h2>📩 SMS Sending Panel</h2>

    <form action="send_process.php" method="POST">

        <div class="input-box">
            <input type="text" name="number" placeholder="Mobile Number (91...)" required>
        </div>

        <div class="input-box">
            <textarea name="message" placeholder="Enter Message..." required></textarea>
        </div>

        <button type="submit" name="send">Send SMS</button>

    </form>
</div>

</body>
</html>