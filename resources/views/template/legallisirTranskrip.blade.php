
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Legalisir Ijazah</title>
    <style>
        html { margin: 0px}
        .berkas{
            height: 100%;
            width: 100%
            page-break-inside: avoid;
        }


        .box1{
            position: absolute;
            bottom: 20px;
            right: 350px;
            font-size: 9pt;
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            font-weight: bold;
            width: 240px;
            padding: 0px;
            border: 3px solid black;
            margin: 0;
        }

        .esign{
            width: 50px;
            top: 50%;
            left: 50%;
        }

        .box2{
            position: absolute;
            bottom: 20px;
            left: 20px;
            font-size: 9pt;
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            font-weight: bold;
            padding: 10px;
            border: 3px solid black;
            margin: 0;
        }

        .box2 img{
            width: 30px;
            top: 50%;
            left: 50%;
        }
    </style>
</head>
<body>
    <div class="page"> 
            <img src="{{ public_path('assets/berkas//'.$legal->upload_berkas) }}" class="berkas">
        {{-- <h1>BISMILLAH</h1> --}}
        <div class="box1">
            <span> MENGESAHKAN <br></span>
            <span> TELAH DIPERIKSA KEBENARANNYA <br></span>
            <span> DAN SESUAI DENGAN ASLINYA <br></span>
            {{-- <span> CILACAP, {{ $date }} <br></span> --}}
            <span> DIREKTUR POLITEKNIK NEGERI CILACAP <br><br></span>
            <span> WAKIL DIREKTUR 1 <br></span>

        
        <img src="{{ public_path('img/'.Auth::user()->admin->ttd) }}" class="esign">
            <br>
            {{-- <p>{{ $wd1 }}</p> --}}
            {{-- <p> NIP/NPAK {{$nip_npak}}</p> --}}
            <span> {{ Auth::user()->name }} <br></span>
            <span> NIP/NPAK {{ Auth::user()->admin->nip_npak }}<br></span>
        </div>
            @php
            $url =  url('/legalisir//'.$legal->legal_id);
            @endphp

        <div class="box2">
            @php
            echo DNS2D::getBarcodeHTML($url, 'QRCODE',5,5);
            @endphp
            <span> CEK KEASLIAN</span>
        </div>
    </div>
</body>
</html>