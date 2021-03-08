<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Aclonica">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Anaheim">
    <link rel="stylesheet" href="assets/css/styles.css">
    <style>
        .page-break {
            page-break-after: always;
        }
        </style>
</head>

<body>

    <section>

        <div class="container" style="background: #ffffff;color: var(--light);height: 100vh;border: 24px solid var(--blue);margin: 0 auto;margin-top: 0px;margin-bottom: 0px;padding-right: 0px;">
            <div class="table-responsive" style="margin: 0PX;margin-top: 25px;padding: 25px;">
                <table class="table">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ITEM NAME</th>
                            <th>QUANTITY</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result as $item)
                        <tr>
                            <td>{{ $item->item_id}}</td>
                            <td>{{ $item->name}}</td>
                            <td>{{ $item->Balance}}</td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <div class="page-break"></div>

        @foreach ($result as $item)

        <section class="container" style="padding: 0px;width: 750;height: 100vh;">
            <div class="container" style="border: 16px solid rgb(22,5,125);height: 98vh;margin-top: 0px;margin-left: 0px;">
                <h1 class="text-center" style="font-size: 43px;font-family: Aclonica, sans-serif;padding: 9px;background: #e4dcdc;margin-bottom: 24px;height: 10vh;">{{ $item->name}}</h1><img class="img-rounded" src="https://media2.s-nbcnews.com/j/streams/2013/March/130326/1C6639340-google-logo.nbcnews-fp-1024-512.jpg" style="width: 650px;height: 50vh;margin: 0px;margin-bottom: 72px;border-style: none;border-color: rgb(227,3,3);margin-left: 14px;">
                <div>
                    <div class="table-responsive" style="padding: 0;margin-bottom: 44px;border-style: solid;border-color: rgb(234,108,108);font-family: Anaheim, sans-serif;">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="background: #dc6767;border: 3 none rgb(51,51,51) ;">ITEM ID</th>
                                    <th style="background: #da6262;">ITEM NAME</th>
                                    <th style="background: #da6262;">RECEIVED</th>
                                    <th style="background: #da6262;">ISSUED</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>{{ $item->item_id}}</td>
                                    <td>{{ $item->name}}</td>
                                    <td>{{ $item->totalReceived}}</td>
                                    <td>{{ $item->totalIssued}}</td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <div class="page-break"></div>
       @endforeach
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>

