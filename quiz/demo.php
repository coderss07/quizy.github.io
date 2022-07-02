<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/quiz.css">
</head>

<body>
    <div id="test" class="d-flex-d align-items-stretch">
        <nav id="sidebar">
            <div class="img bg-wrap text-center py-4">
                <div class="user-logo">
                    <h3 id="subject" style="color: white;"></h3>
                </div>
            </div>
            <ul id="side-obj" class="list-unstyled components mb-5"></ul>

        </nav>
        <div class="custom-menu">
            <button type="button" id="sidebarCollapse" class="btn btn-primary"></button>
        </div>
        <div class="side-box" id="time-box">
            <span class="text">Remaining Time</span>
            <span id="time">00 : 00 : 00</span>
        </div>
        <div class="side-box" id="finish-box">
            <span class="text"><button onclick="finishTest()" id="finish">Finish</button></span>
        </div>
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <div id="obj" class="wrappers"></div>
            <div class="d-flex flex-column align-items-center">
                <div class="h3 font-weight-bold text-white">Go Dark</div> <label class="switch"> <input type="checkbox">
                    <span class="slider round"></span> </label>
            </div>
        </div>
    </div>

    <div class="start-show" id="start">
        <div class="content">
            <div class="modal-text">
                <p>
                    <ul>
                        <li>Test will be in Fullscreen mode only.</li>
                        <li>You are not allowed to exit Fullscreen mode.</li>
                        <li>You are given only 4 attempts to take test again.</li>
                        <li>If you open Developer tools then test will be submitted automatically.</li>
                    </ul>
                </p>
                <p>Are you sure you want to start test?</p>
            </div>
            <div class="modal-btn">
            <form method="get">
                <button type="button" name="start_yes" value="start_yes" class="btn" id="yes">Yes</button>
                <button type="button" class="btn" id="no" data-dismiss="modal">No</button>
            </form>
            </div>
        </div>
    </div>

    <div class="start-show start-go" id="warning">
        <div class="content">
            <div class="modal-text">
                <h2>Warning!</h2>
                <p id="msg"></p>
                <p>Are you sure you want to Finish Test?</p>
            </div>
            <div class="modal-btn">
                <button type="button" class="btn" id="yes-exit">Yes</button>
                <button type="button" class="btn" id="no-exit" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>

    <div class="start-show start-go" id="message">
        <div class="content">
            <div class="modal-text">
                <p id="last-msg"></p>
            </div>
            <div class="modal-btn">
                <button type="button" class="btn" id="ok-exit">Ok</button>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/javascript/demo.js"></script>
    
</body>

</html>

