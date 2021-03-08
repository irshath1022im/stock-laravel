<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report1</title>
</head>
<body>




            <div>
                <div>
                    <h4>Item Name</h4>
                </div>

                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Item ID</th>
                                <th>Received</th>
                                <th>Issued</th>
                                <th>Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">{{ $item->item_id}}</td>
                                <td>{{ $item->totalReceived}}</td>
                                <td>{{ $item->totalIssued}}</td>
                                <td>{{ $item->Balance}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>


</body>
</html>


