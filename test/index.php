<!DOCTYPE html>

<html lang="en">
<head>


<meta charset="utf-8">


<title>MediaStream Recording</title>

<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="css/main.css">

</head>

<body>

  <div id="container">

    <video id="gum" autoplay muted playsinline></video>
    <video id="recorded" autoplay loop playsinline></video>

    <div>
      <button id="record">Start Recording</button>
      <button id="play" disabled>Play</button>
      <button id="download" disabled>Download</button>
    </div>


  </div>

  <script src="js/main.js"></script>

</body>
</html>