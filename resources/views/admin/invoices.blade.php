<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="css/invoices.css"> --}}
    <title>Invoices</title>
</head>
<body>
    {{-- @include('admin/sidebar') --}}

    <div class="wrapper">
        <div class="content-wrapper">
            <div class="invoice-wrapper">
                <div class="invoice">
                    <div class="invoice-container">
                        <div class="invoice-head">
                            <div class="invoice-head-top">
                                <div class="invoice-head-top-left text-start">
                                    {{-- <img src="{{ asset('images/logo.jpg') }}" alt="Logo"> --}}
                                </div>
                                <div class="invoices-head-top-right text-end">
                                    <h3>Invoice</h3>
                                </div>
                            </div>

                            <div class="hr"></div>
                            <div class="invoice-head-middle">
                                <div class="invoice-head-middle-left text-start">
                                    <p><span class="text-bold">Date & Time:</span> {{ $date }}</p>
                                </div>
                                <div class="invoice-head-middle-right text-end">
                                    <p><span class="text-bold">Invoice No:</span> {{ $invoiceNumber }}</p>
                                </div>
                                <div class="hr"></div>
                                <div class="invoice-head-bottom">
                                    <div class="invoice-head-bottom-left">
                                        <ul>
                                            <li class="text-bold">Invoiced To:</li>
                                            <li>{{ $customer->name }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="overflow-view">
                                <div class="invoice-body">
                                    <table>
                                        <thead>
                                            <tr>
                                                <td class="text-bold">No</td>
                                                <td class="text-bold">Description</td>
                                                <td class="text-bold">Quantity</td>
                                                <td class="text-bold">Cost</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($subServices as $index => $service)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $service->subName }}</td>
                                                    <td>1</td>
                                                    <td class="text-end">RM {{ number_format($service->subCost, 2) }}</td> <!-- Use 'subCost' here -->
                                                </tr>
                                            @endforeach

                                            <!-- Display products -->
                                           @foreach ($products as $index => $product)
                                               <tr>
                                                    <td>{{ $index + count($subServices) + 1 }}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->quantity }}</td>
                                                    <td class="text-end">RM {{ number_format($product->price * $product->quantity, 2) }}</td>
                                               </tr>
                                           @endforeach
                                        </tbody>
                                    </table>

                                    <div class="invoice-body-bottom">
                                        <div class="invoice-body-info-item border-bottom">
                                            <div class="info-item-td text-end text-bold">Total Cost:</div>
                                            <div class="info-item-td text-end">RM {{ $totalCost }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="invoice-foot text-center">
                                <p><span class="text-bold">NOTE:</span> Generated By FOREVER18 Hair Salon</p>
                                {{-- <div class="invoice-btns">
                                    <button type="button" class="invoice-btn" onclick="window.print()">
                                        <span><i class="fa-solid fa-print"></i></span> Print
                                    </button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
