<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="Dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"></span>
                        <span class="title">Name</span>
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="index.html">
                        <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="My membership.html">
                        <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                        <span class="title">My membership</span>
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="RenewMy  Membership.html">
                        <span class="icon"><ion-icon name="logo-usd"></ion-icon></span>
                        <span class="title">Renew</span>
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="Payment.html">
                        <span class="icon"><ion-icon name="swap-horizontal-outline"></ion-icon></span>
                        <span class="title">Payment</span>
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="changePassword.html">
                        <span class="icon"><ion-icon name="lock-open-outline"></ion-icon></span>
                        <span class="title">Change Password</span>
                    </a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                        <span class="title">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
        </div>
        <div class="cardBox">
            <div class="card">
                <div>
                    <div class="numbers">2850</div>
                    <div class="cardName">Payment</div>
                </div>
                <div class="iconBx">
                    <i class="fa-solid fa-money-bills"></i>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">2850</div>
                    <div class="cardName">Payment</div>
                </div>
                <div class="iconBx">
                    <i class="fa-solid fa-money-bill-transfer"></i>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">2850</div>
                    <div class="cardName">Payment</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="swap-horizontal-outline"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">2850</div>
                    <div class="cardName">Myaccount</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div>
            </div>
        </div>
        <div class="graphBox">
            <h2></h2>
            <div class="box">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
        
      
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="myChart.js"></script>
    <script>
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');
        toggle.onclick = function(){
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }

        let list = document.querySelectorAll('.navigation li');
        function activeLink(){
            list.forEach((item) =>
            item.classList.remove('hovered'));
            this.classList.add('hovered');
        }
        list.forEach((item) =>
        item.addEventListener('mouseover',activeLink));
    </script>
</body>
</html>