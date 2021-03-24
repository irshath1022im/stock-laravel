<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>STORE REQUEST</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" media="screen" href="assets/css/styles.css">
    <link rel="stylesheet" media="print" href="{{ asset('css/print.css')}}" />
</head>

<body>
    {{-- @dump($data) --}}
    <section class="container" style="max-height: 100vh;">
        <div class="row d-xl-flex justify-content-xl-start" style="max-height: 40vh;margin-bottom: 8px;">
            <div class="col d-flex justify-content-end" style="height: auto;border: 0px none var(--cyan) ;">
                <img src="{{ asset('images/LogoStoreRequest.png') }}"></div>
        </div>
        <div class="row " style="max-height: 5vh;margin-bottom: 19px;border-width: 0px;border-style: none;">
            <div class="col" style="padding: 19px;">
                <h4 class="text-center">STORE REQUEST</h4>
            </div>
        </div>
        <div class="row" style="max-height: 80vh;margin-bottom: 74px;">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="print-header" style="border-width: 1px;border-style: solid;">
                            <tr class="print-header border border-primary ">
                                <th>NO</th>
                                <th>ITEM</th>
                                <th>SIZE</th>
                                <th>QTY</th>
                                <th>REMARK</th>
                            </tr>
                        </thead>
                        <tbody class="print-tableBody">
                            @foreach ($data[0]->requested_items as $key=>$requested_item)
                            <tr>
                                <td>{{ $key +1 }}</td>
                                <td>{{ $requested_item->item->name}}</td>
                                <td>...</td>
                                <td>{{ $requested_item->qty}}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row" style="max-height: 0px;margin-bottom: 85px;border-style: none;position: absolute;bottom: 35%;width: 95%;">
            <div class="col">
                <div class="table-responsive">
                    <table class="table print-requestReasonHeader">
                        <thead class="print-requestReasonHeader">
                            <tr>
                                <th>REQUEST FOR REASON</th>

                            </tr>
                            <tr>
                                <td>{{ $data[0]->remark}}</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="background: #f7e8d9;padding: 21px;">**</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row" style="max-height: 0px;margin-bottom: 185px;border-style: none;position: absolute;bottom: 20%;width: 95%;">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>REQUESTER :</span></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody style="border-width: 0px;border-style: none;">
                            <tr style="padding: 0px;border-width: 1px;border-style: none;">
                                <td style="background: #f7e8d9;padding: 20px;">NAME:: <span class="h6">{{ $data[0] ->staff->staff_name}}</td>
                                <td style="background: #f7e8d9;padding: 20px;">SIGNATURE:</td>
                                <td style="background: #f7e8d9;padding: 20px;">DATE: {{ $data[0]->requesting_date}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row" style="max-height: 0px;margin-bottom: 85px;border-style: none;position: absolute;bottom: 15%;width: 95%;">
            <div class="col">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STUD MANAGER</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="background: #f7e8d9;padding: 21px;">APPROVED</td>
                                <td style="background: #f7e8d9;padding: 21px;">REJECTED:</td>
                                <td style="background: #f7e8d9;padding: 21px;">SIGNATURE:</td>
                                <td style="background: #f7e8d9;padding: 21px;">DATE:</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div style="position: absolute;
        bottom: 0;
        right:10%;
        text-align:center;
        margin: 0 auto;
        ">
            <img src="{{ asset('images/footerLogo.png') }}"></div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>
