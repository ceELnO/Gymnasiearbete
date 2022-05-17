<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Header </title>

    <!-- Bootsrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- External files -->
    <link href = "../css/main.css" type = "text/css" rel = "stylesheet">
    <link href = "../css/products.css" type = "text/css" rel = "stylesheet">
</head>
<body>
    <!-- ---------------- Header ---------------- -->
    <header class = "header_1">
        
        <!-- Purely Visual indent to make the code easier to read -->
            <!-- Logo, can also be used to come back to index.html by clicking -->
            <a href = "../html/index.html">
                <img id="logo_1" src="../images/kompjuter2.png" alt="logo">
            </a>

            <!-- Search bar -->
            <div class = "search_container">
                <form>
                    <input id = "search_bar" name = "searchBar" type = "text" placeholder = "Search...">
                    <button id = "search_button" type = "submit"> Search </button>
                </form>
            </div>

            <!-- Logg in-->
            <a href="../html/inlogning.html"><img id="acc_icon" src="../images/user_icon.svg"></a>

            <!-- Cart -->
            <img id="cart_icon" src="../images/cart_icon.svg">

            <!-- Hamburgermeny-->
            <label for = "toggle" id = "navMeny" > &#9776; </label>
            <input type = "checkbox" id = "toggle">
        <!-- End purely visual indent -->

        <!-- css ":checked" does not work if it selects objects outside of it's div, the solution
        is to put the intenden selected div inside the same div which causes this mess-->
        <div class = "header_2">
            <nav class = "navigation">
                
                <!-- Items -->
                <ul>
                    <li>
                        <a href = "../php/products.php"> All Items </a>
                    </li>
                    <li>
                        <a href = "../php/products_cat1.php"> Computer Parts </a>
                    </li>
                    <li>
                        <a href = "../php/products_cat2.php"> Computer Accessories  </a>
                    </li>
                </ul>
                <!-- Items stop -->

            </nav>
        </div>
    </header>
    <!-- ---------------- Header ends here ---------------- -->

    <!-- ---------------- Main Content  ---------------- -->
    <?php
        // connect to the sql server
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gy2";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // take the relevant information from the database
        $sql = "SELECT id, category, image, title, price FROM products";
        $result = $conn->query($sql);
        $num = 0;
    ?>

    <main class = "product_container">

    <!-- display each entry -->
    <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "
                    <a href=product.php?viewproduct=",urlencode($row["id"]),">
                        <div class = 'product_div'>
                            <img class = 'product_images' src = '../images/$row[image]'>
                            <br>
                            <p>
                                $row[title]
                                <br> <br>
                                $row[price]
                            </p>
                        </div>
                    </a>
                ";
            }
        }
        else {
            echo "error";
        }
        $conn->close();
    ?>

    </main>

    <!-- ---------------- Footer starts here ---------------- -->
    <div class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3">
                    <div class="logobox">
                        <a href="#">
                            <img src=../images/kompjuter2.png alt="merch" class="bildbox">
                        </a>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="list">
                        <h1>Information</h1>
                        <ul>
                            <a href="../footerhtml/terms.html">
                                <li> Terms of serves</li>
                            </a>
                            <li> Delivery condistions</li>
                            <li> warranty condistions</li>
                            <li> Reklamation</li>
                            <li> Personal information</li>

                        </ul>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="list">
                        <h1>Om Web Phase</h1>
                        <ul>
                            <a href="checkout.html">
                                <li> Stores</li>
                            </a>
                            <li> About Webphase</li>
                            <li> Environmental policy</li>
                            <li> Events</li>
                            <li> Giftcard</li>

                        </ul>
                    </div>

                </div>

                <div class="col-sm-3">

                    <a href="../html/kontakta.html"><button class="buttonkontakt" type="button"> Kontakta
                            oss</button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- ---------------- Footer starts here ---------------- -->

</body>
</html>