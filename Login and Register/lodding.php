<!DOCTYPE html>
<!-- divinectorweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
 <link rel="shortcut icon" type="icon" href="#">
    <link rel="stylesheet" href="./css/lodding.css">
    
    <title>Lodding Page</title>

<style>
* {
	margin: 0;
	padding: 0;
	overflow: hidden;
}
body {
	background:rgb(227, 219, 219);
}

.img{
	display: flex;
	flex-direction:column;
	align-items: center;
	
}
.loading-area {
	display: grid;
	place-items: center;
	height: 100vh;
}
.loader div {
	height: 60px;
	width: 60px;
	border-radius: 50%;
	transform: scale(0);
	animation: animate 1.5s ease-in-out infinite;
	display: inline-block;
	margin: 10px;
	background-color: orange;
	/* filter: drop-shadow(0 0 5px #fff) drop-shadow(0 0 23px #fff); */
}
.loader div:nth-child(0) {
	animation-delay: 0s;
}
.loader div:nth-child(1) {
	animation-delay: 0.2s;
}
.loader div:nth-child(2) {
	animation-delay: 0.4s;
}
.loader div:nth-child(3) {
	animation-delay: 0.6s;
}
.loader div:nth-child(4) {
	animation-delay: 0.8s;
}
.loader div:nth-child(5) {
	animation-delay: 1s;
}
.loader div:nth-child(6) {
	animation-delay: 1.2s;
}
.loader div:nth-child(7) {
	animation-delay: 1.4s;
}
@keyframes animate {
	0%, 100% {
		transform: scale(0.1);
	}
	40% {
		transform: scale(1);
	}
	50% {
		transform: scale(1);
	}
}



</style>

<!-- count down -->

<script>
    function redirectToHomePage() {
        var countdownElement = document.getElementById("countdown");
        var countdownValue = 5;

        function updateCountdown() {
            countdownElement.innerHTML = "Redirecting in " + countdownValue + " seconds...";
            countdownValue--;

            if (countdownValue < 0) {
                window.location.href = "home.php";
            } else {
                setTimeout(updateCountdown, 1000); // Update every 1000 milliseconds (1 second)
            }
        }

        updateCountdown();
    }

    window.onload = redirectToHomePage;
</script>


</head>
<body>

    <p id="countdown">Redirecting in 5 seconds...</p>
    <!-- <div class="img">
        <img src="logo.jpeg" alt="Logo">
    </div> -->
<div class="loading-area">
    <div class="loader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
    
</body>
</html>
