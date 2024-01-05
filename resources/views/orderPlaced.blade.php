<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Placed</title>

    <style>
        #mainBox {
            max-width: 600px;
            margin: auto;
        }

        #mainBox>img {
            width: 100%;
        }

        @media screen and (max-width: 480px) {
            #mainBox {
                margin: 20vh auto auto;
            }
        }
    </style>
</head>

<body>
    <div id="mainBox">
        <img src="/image/order-placed.gif" alt="order placed">
    </div>

    <script type="text/javascript">
        setTimeout(() => {
            window.location.href = "/transaksi"
        }, 4200);
    </script>
</body>

</html>
