<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Report - Uniforms</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anaheim">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    {{-- @dump($items) --}}
    @foreach ($categories as $item)

    <section class="container" style="padding: 0px;width: 750;height: 100vh;">



        <div class="container" style="border: 16px solid rgb(22,5,125);height: 98vh;margin-top: 0px;margin-left: 0px;">
        <h1 class="text-center text-uppercase" style="font-size: 43px;font-family: Aclonica, sans-serif;padding: 9px;background: #e4dcdc;margin-bottom: 24px;height: 10vh;">{{ $item->category}}</h1>
        <img class="img-rounded" src="{{asset('images/hoodies.jpg') }}" style="width: 650px;height: 50vh;margin: 0px;margin-bottom: 35px;border-style: none;border-color: rgb(227,3,3);margin-left: 14px;">
            <div>
                <div class="table-responsive" style="padding: 0;margin-bottom: 30px;border-style: solid;border-color: rgb(234,108,108);font-family: Anaheim, sans-serif;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="background: #dc6767;border: 3 none rgb(51,51,51) ;">ITEM ID</th>
                                <th style="background: #da6262;">ITEM NAME</th>
                                <th style="background: #da6262;">RECEIVED</th>
                                <th style="background: #da6262;">ISSUED</th>
                                <th style="background: #da6262;">BALANCE</th>
                            </tr>
                        </thead>
                        <tbody>
                     @foreach ($item->item as $category)
                            <tr>
                                <td>{{ $category->id}}</td>
                                <td>{{ $category->name}}</td>
                                <td>{{ $category->receivedQty}}</td>
                                <td>{{ $category->issuedQty}}</td>
                               <td>{{ $category->balance}}</td>
                            </tr>
                         @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


</section>

@endforeach


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>
