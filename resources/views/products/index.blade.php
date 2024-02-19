<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 20px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            max-width: 1200px;
        }

        .filter {
            flex: 1;
            margin-right: 20px;
        }

        .product-list {
            flex: 2;
        }

        h2, h3 {
            margin-top: 0;
        }

        form {
            background-color: #f2f2f2;
            padding: 15px;
            border-radius: 5px;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .product {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
            background-color: #fff;
        }

        .product img {
            width: 100%;
            border-radius: 5px;
        }

        .product h3 {
            margin-top: 10px;
            margin-bottom: 5px;
        }

        .product p {
            margin: 5px 0;
        }

        .product button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 12px;
            cursor: pointer;
        }

        .product button:hover {
            background-color: #0056b3;
        }

        .original-price {
            color: #999;
            text-decoration: line-through;
            margin-right: 10px;
        }

        .discount {
            color: #e74c3c;
        }

        #categoryList {
            padding-bottom: 16px;
        }
        #brandList {
            padding-bottom: 16px;
        }
        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }

            .row {
                width: 100%;
                margin-right: 0;
            }

            .filter {
                width: 100%;
                margin-right: 0;
            }

            .product-list {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="filter">
                <h2>Filters</h2>
                <form id="filterForm">
                    <h3>Categories</h3>
                    <div id="categoryList"></div>

                    <h3>Brands</h3>
                    <div id="brandList"></div>

                    <button type="submit">Apply Filters</button>
                </form>
            </div>
            <div class="product-list" id="productList"></div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $.get('/api/categories', function (data) {
                var categoriesHtml = '';
                data.forEach(function (category) {
                    categoriesHtml += '<input type="checkbox" name="categories[]" value="' + category.id + '"> ' + category.category_name + '<br>';
                });
                $('#categoryList').html(categoriesHtml);
            });

            $.get('/api/brands', function (data) {
                var brandsHtml = '';
                data.forEach(function (brand) {
                    brandsHtml += '<input type="checkbox" name="brands[]" value="' + brand.id + '"> ' + brand.brand_name + '<br>';
                });
                $('#brandList').html(brandsHtml);
            });

            $('#filterForm').submit(function (event) {
                event.preventDefault();
                var formData = $(this).serialize();
                $.get('/api/products', formData, function (data) {
                    var productsHtml = '';
                    data.forEach(function (product) {
                        productsHtml += '<div class="product">';
                        productsHtml += '<img src="' + product.product_image + '" alt="' + product.product_name + '">';
                        productsHtml += '<h3>' + product.product_name + '</h3>';
                        productsHtml += '<p class="product-price">';
                        if (product.product_has_discount) {
                            var discountPercentage = ((product.product_original_price - product.product_discount_price) / product.product_original_price) * 100;
                            productsHtml += '<span class="original-price">₹' + product.product_original_price + '</span>';
                            productsHtml += '<span class="discount">Now ₹' + product.product_discount_price + '</span>';
                            productsHtml += ' (' + discountPercentage.toFixed(2) + '% off)';
                        } else {
                            productsHtml += '₹' + product.product_original_price;
                        }
                        productsHtml += '</p>';
                        productsHtml += '<button>Add to Cart</button>';
                        productsHtml += '</div>';
                    });
                    $('#productList').html(productsHtml);
                });
            });
        });
    </script>
</body>
</html>
