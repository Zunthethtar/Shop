<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <div class="container-fluid">

        @include('header')
        @include('nav')
        @yield('content')
        
        @include('footer')
    

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- Your other HTML code -->

<!-- ... -->
<script>
    document.getElementById('cartButton').addEventListener('click', function() {
        window.location.href = "{{ route('cart') }}";
    });

    $(document).ready(function () {
        $(".add-to-cart-btn").click(function (e) {
            e.preventDefault();
            var productId = $(this).data('product-id');
            
            $.ajax({
                url: '{{ url('admin/add-to-cart') }}/' + productId,
                method: 'GET',
                success: function (response) {
                    // Display success message
                    alert('Product added to cart: ' + response.productName);
                    
                    // Update the cart badge value
                    $('#cart-badge').text(response.cartCount);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
<!-- ... -->

    

</body>

</html>
