<!DOCTYPE html>
<html>
<head>
<meta charset = "utf-8">
  <title>NBA隊伍/球員查詢系統</title>

<style>
.container {
  position: relative;
  margin: 0 auto;
  width: 100%;
  max-width: 1000px;
}

.container1 {
  position: relative;
  width: 100%;
  max-width: 400px;
  float:left;
}
.container2 {
  position: relative;
  width: 100%;
  max-width: 400px;
  float:right;
}

.container img {
  width: 100%;
  height: auto;
  border-radius: 20px;
}

.container .btn1 {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: white;
  color: black;
  font-size: 24px;
  padding: 12px 26px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
}

.container .btn2 {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: gold;
  color: black;
  font-size: 24px;
  padding: 12px 26px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
}

.container .btn1:hover {
  background-color: black;
  color: white;
}

.container .btn2:hover {
  background-color: black;
  color: gold;
}

</style>
</head>
<body>
<h3 align="center">Choose your system</h3>
<p style="font-size:30%" align="right">If there is a bug or error in the system please contact youxin1231.cs07@nctu.edu.tw !</p>

<div class="container">
  <div class="container1">
    <img src="Team.jpg" alt="Team" style="width:100%">
    <button class="btn1" onclick="location.href='Team.php'">Team</button>
  </div>
  <div class="container2">
    <img src="Kobe.jpg" alt="Kobe" style="width:100%">
    <button class="btn2" onclick="location.href='Player.php'">Player</button>
  </div>
</div>

</body>
</html>