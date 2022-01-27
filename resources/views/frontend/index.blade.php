<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Home - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    {{Html::style('css/styles.css')}}
    {{Html::style('css/owl.carousel.min.css')}}
    {{Html::style('css/colorbox.css')}}
    {{Html::style('css/owl.theme.default.min.css')}}
    {{Html::style('css/docs.theme.min.css')}}
</head>

<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#!">Start Bootstrap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Page header with logo and tagline-->
    <header class="py-5 bg-light border-bottom mb-4">
        <div class="container">
            <div class="text-center my-5">
                <h1 class="fw-bolder">Welcome to Product Computer!</h1>
                <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
            </div>
        </div>
    </header>
    <!-- Page content-->
    <div class="container">
        <div class="container">
            <div class="owl-carousel owl-theme">
                {!! Html::image("/img/Images/1.jpg", "1.jpg", array('width'=>'120')) !!}
                {!! Html::image("/img/Images/2.jpg", "2.jpg", array('width'=>'120')) !!}
                {!! Html::image("/img/Images/3.jpg", "3.jpg", array('width'=>'120')) !!}
                {!! Html::image("/img/Images/4.jpg", "4.jpg", array('width'=>'120')) !!}
                {!! Html::image("/img/Images/5.jpeg", "5.jpeg", array('width'=>'120')) !!}
                {!! Html::image("/img/Images/6.jpg", "6.jpg", array('width'=>'120')) !!}
                {!! Html::image("/img/Images/7.jpg", "7.jpg", array('width'=>'120')) !!}
            </div>
        </div>
        <div class="card-body">
            @if (count($products) > 0)
            <table class="table table-striped task-table">
                <thead>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                </thead>

                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>
                            <div>{!! $product->name !!}</div>
                        </td>
                        <td>
                            <div>{!! $product->description !!}</div>
                        </td>
                        <td>
                            <div>{!! $product->price !!}</div>
                        </td>
                        <td>
                            <div>{!! Html::image("/img/products/".$product->photo, $product->name, array('width'=>'120')) !!}</div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <script>
                $(".delete").click(function() {
                    var form = $(this).closest('form');
                    $('<div></div>').appendTo('body')
                        .html('<div><h6> Are you sure ?</h6></div>')
                        .dialog({
                            modal: true,
                            title: 'Delete message',
                            zIndex: 10000,
                            autoOpen: true,
                            width: 'auto',
                            resizable: false,
                            buttons: {
                                Yes: function() {
                                    $(this).dialog('close');
                                    form.submit();
                                },
                                No: function() {

                                    $(this).dialog("close");
                                    return false;
                                }
                            },
                            close: function(event, ui) {
                                $(this).remove();
                            }
                        });
                    return false;
                });
            </script>
            @endif
        </div>
    </div>



    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    {{Html::script('js/scripts.js')}}
    {{Html::script('js/owl.carousel.min.js')}}
    {{Html::script('js/jquery.colorbox.js')}}

    <script>
        const owlCarosel = $(".images");
        let html = ``;
        for (let i = 1; i <= 8; i++) {
            html += `
        <a
          class="group1"
          href="img/Sushi ${i}.png"
          title="Me and my grandfather on the Ohoopee."
        >
        <img src="img/Sushi ${i}.png" alt="Sushi ${i}.png" />
        </a>
        `;
        }
        owlCarosel.after(html);

        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                items: 5,
                loop: true,
                margin: 10,
            });

            $(".group1").colorbox({
                rel: "group1",
                transition: "none",
                width: "75%",
                height: "75%",
            });
        });
    </script>
</body>

</html>