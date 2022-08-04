
@extends('email.main')

@section('main')
                            <h5 style="font-size: 48px; font-weight: 400; margin: 0;">Pengajuan Legalisir</h5>
                            <br>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 10px 30px 10px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <p style="margin: 0;">{{ $isi['keterangan'] }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff"  style="padding: 0px 50px 10px 50px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;"><h5 style="text-align: center;">YANG MENGAJUKAN LEGALISIR : </h5>
                            <table width="80%" border="0" align="center" cellspacing="0" cellpadding="0"  style="padding: 0px 0px 10px 50px;">
                                <tr>
                                    <td style="text-align: right"><b>Nama</b>&emsp;</td>
                                    <td>{{ $isi['nama'] }}</td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td style="text-align: right"><b>NIM</b>&emsp;</td>
                                    <td>{{ $isi['nim'] }}</td>
                                </tr>
                                <tr></tr>
                                <tr>
                                    <td style="text-align: right"><b>Status</b>&emsp;</td>
                                    <td>{{ $isi['status'] }}</td>
                                </tr>
                            </table>
                            
                        </td>
                    </tr>
                    <tr >
                        <td bgcolor="#ffffff" align="left" style=" color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor="#ffffff" align="left">
                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" style="border-radius: 3px;" bgcolor="#007BFF">
                                                    <a href="https://silts.protic.web.id/login" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #007BFF; display: inline-block;">
                                                        Masuk SI-LTS</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- COPY -->
                    
@endsection