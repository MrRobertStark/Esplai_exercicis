<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "fundacioesplai_prova0";
    $conn = new mysqli($server,$username,$password,$database);

    //Imatges predeterminades segons categoria del producte
    $img_categories = array(
        "https://imgcp.aacdn.jp/img-a/1720/auto/global-aaj-front/article/2016/02/56b9a4f563c99_56b9a4c99915d_1461357925.jpg",//Beverages
        'https://th.bing.com/th/id/OIP.KE4GTMVNr7S4sQ92EplZeQHaE8?pid=Api&rs=1',//Condiments
        'https://s3.amazonaws.com/gmi-digital-library/8331c5b2-c170-4fc2-8ad6-8cf49737d50a.jpg',//COnfections
        'https://www.midwestfarmreport.com/wp-content/uploads/2020/04/Cheese-image-scaled.jpg',//Dairy Products
        'https://www.tasteofhome.com/wp-content/uploads/2018/03/shutterstock_578723482.jpg',//Grains/Cereals
        'https://imgix.bustle.com/uploads/shutterstock/2019/10/2/c4e16774-a924-44af-9546-c9059cf24f61-shutterstock-1255329469.jpg?w=970&h=546&fit=crop&crop=faces&auto=format&q=70',//Meat/Pultry
        'https://www.simplyrecipes.com/wp-content/uploads/2018/06/june-produce-horiz-a2-1800.jpg',//Produce
        'https://th.bing.com/th/id/OIP.URZH3ow_SgyIZq4TcY2OCgHaE7?pid=Api&rs=1',//Seafood
        'https://www.londonlibrary.co.uk/images/CHARLOTTE/NEW_WEBSITE_IMAGES/adoptbanner.jpg',//Books
        'https://bodyhealthmag.com/wp-content/uploads/2015/09/vegetables.jpg',//Vegetables
        'https://d3ieicw58ybon5.cloudfront.net/full/shop/product/dff4d6b0a71d47e7847e0624e88d07d4.jpg',//Toys
        'https://www.rspcansw.org.au/wp-content/uploads/2017/08/33_boxes_care-for-animals_pocket-pets.jpg',//Pets
        'https://4.bp.blogspot.com/-Fc7Xs2dBKIQ/T27dwQgsi6I/AAAAAAAAI98/6bVwH9iLA5U/s1600/Border+Collie6.jpg'//Doggies
    );
?>