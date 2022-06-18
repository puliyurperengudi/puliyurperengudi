<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <style>
        *{
            box-sizing: border-box;
        }
        .box-container{
            width: 100%;
            padding: 10px;
            background: #ffffc9;
            color: #045404;
        }
        .box-card{
            padding: 30px 20px 30px 20px;
            background: url('{{ asset('invoice-asset/tl.png') }}') no-repeat top left, url('{{ asset('invoice-asset/tr.png') }}') no-repeat top right, url('{{ asset('invoice-asset/bl.png') }}') no-repeat bottom left, url('{{ asset('invoice-asset/br.png') }}') no-repeat bottom right;
            background-size: 100px;

        }
        table {

        }

        .text-right{
            text-align: right;
        }
        .text-center{
            text-align: center;
        }
        .top-intro {
            font-size: 12px;
        }
        .top-title {
            font-size: 26px;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 10px;
        }
        .top-description{
            font-size: 18px;
            font-weight: bold;
        }
        .top-tag{

        }.ta{
             display: inline-block;
             font-weight: bold;
             border: 1px solid #045404;
             padding: 8px;
             border-radius: 10px;
             margin-top: 15px;
         }
        .ib span{
            border-bottom: 1px solid #045404;
            min-width: 150px;
            text-align: center;
            display: inline-block;
        }
        td{
            padding-top: 5px;
            padding-bottom: 5px;
        }
    </style>

</head>
<body>
<!-- partial:index.partial.html -->
<div class="box-container" style="background: #ffffc9;">
    <div class="box-card">
        <div class="top-bar">
            <div class="top-intro text-center">ஶ்ரீ முச்சிலியம்ம்ன் துணை</div>
            <div class="top-title text-center">புலியுர் பெருங்குடி குல அறக்கட்டளை <br/> திருப்பணிக்குழு</div>
            <div class="top-description text-center">மேலப்பாளையம் / புலியுர், கருர் மாவட்டம்.</div>
            <div class="top-tag text-center"><div class="ta">திருப்பணி நன்கொடை ரசீது</div></div>
        </div>
        <div class="pdf-body">
            <table style="width:100%; table-layout: fixed ">
                <tbody>
                <tr>
                    <td class="ib" style="width: 50%;">நெ: <span>{{ $donation->receipt_no }}</span></td>
                    <td class="text-right ib" style="width: 50%;">தேதி: <span>{{ optional($donation->created_at)->format(DATE_FORMAT) }}</span></td>
                </tr>
                <tr>
                    <td class="ib" style="width: 50%;">ID No:  <span>{{ optional($donation->templeUser)->userId() }}</span></td>
                    <td class="text-right ib" style="width: 50%;">Cell No: <span>{{ (strlen($donation->templeUser->mobile_number) == 10) ? '+91 ' . ($donation->templeUser->mobile_number) : $donation->templeUser->mobile_number }}</span></td>
                </tr>
                </tbody>
            </table>
            <table style="width:100%; table-layout: fixed">
                <tbody>
                <tr>
                    <td style="width: 210px;" >
                        திருமதி / திரு:
                    </td>
                    <td style="width: 100%;" > <span style="border-bottom: 1px solid #045404;width: 100%; display: inline-block;">{{ $donation->templeUser->name }}</span></td>
                </tr>
                <tr>
                    <td>
                        ஊர்:
                    </td>
                    <td style="width: 100%;" > <span style="border-bottom: 1px solid #045404;width: 100%; display: inline-block;">{{ $donation->templeUser->getAddress() }}</span></td>
                </tr>
                <tr>
                    <td style="width: 210px;" >
                        அவர்களிடமிருந்து ரூபாய்:
                    </td>
                    <td style="width: 100%;" > <span style="border-bottom: 1px solid #045404; width: 100%; display: inline-block;">{{ getIndianCurrency($donation->last_paid_amount) }}</span></td>
                </tr>
                <tr>
                    <td colspan="2">
                        மட்டும் நன்கொடையாக பெற்றுக்கொண்டோம். <span></span>
                    </td>
                </tr>
                </tbody>
            </table>
            <table style="width:100%;">
                <tbody>
                <tr>
                    <td style="width: 50%; font-size: 24px; font-weight: bold; vertical-align: middle;  ">ரூ: <span>{{ $donation->last_paid_amount }}</span>/-</td>
                    <td style="width: 50%; vertical-align: middle;" class="text-center">இப்படிக்கு <br> <span style="padding-top: 5px;padding-bottom: 5px; display: inline-block">Digital invoice<br> no sign required</span><br>
                        <strong>திருப்பணிக்குழு</strong>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- partial -->

</body>
</html>
