<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="../../assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    @yield("style")
    <link href="../../public/assets" rel="stylesheet" />
    <link href="../../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="../../assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="../../assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="../../assets/css/pace.min.css" rel="stylesheet" />
    <script src="../../assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="../../assets/css/app.css" rel="stylesheet">
    <link href="../../assets/css/icons.css" rel="stylesheet">

    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="../../assets/css/dark-theme.css" />
    <link rel="stylesheet" href="../../assets/css/semi-dark.css" />
    <link rel="stylesheet" href="../../assets/css/header-colors.css" />
    <title>Tips</title>
</head>


<body>
<div class="card" style="width: 40rem;margin-left: auto;margin-right: auto;">
    <div class="card-body">
        <h5 class="card-title text-center">Withdraw</h5>
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('tips.withdrawTips')}}">
                    @csrf
                <div class="input-group mb-3"> <span class="input-group-text">$</span>
                    <input type="text" class="form-control" name="tips_count">
                </div>
                <div class="center">
                    <button type="submit" class="btn btn-primary" id="reset-btn" value="Send"></i>Withdraw</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>





