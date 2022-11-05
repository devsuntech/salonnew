@extends('email.layout.email')
@section('content')
<center style="width: 100%; background: #F1F1F1; text-align: left;">
    <div style="display:none;font-size:1px;line-height:1px;max-height:0px;max-width:0px;opacity:0;overflow:hidden;mso-hide:all;font-family: sans-serif;"> </div>
    <div style="max-width: 680px; margin: auto;" class="email-container">
        <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 680px;" class="email-container">
            <tr>
                <td bgcolor="#f9c1b6" align="center" valign="top" style="text-align: center; background-position: center center !important; background-size: cover !important;">
                    <div>
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" align="center" width="100%" style="max-width:500px; margin: auto;">
                            <tr>
                                <td height="20" style="font-size:20px; line-height:20px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="center" valign="middle">
                                    <table>
                                        <tr>
                                            <td valign="top" style="text-align: center; padding:20px;">
                                                <img src="{{ $message->embed(public_path()."/emailimage/confirmation.png") }}" class="img-fluid hurray" />
                                                <h1 style="margin: 0; font-family: 'Montserrat', sans-serif; font-size: 30px; line-height: 36px; color: #ffffff; font-weight: bold;">You received a booking on Saloon n me!!</h1>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td valign="top" style="text-align: center; padding: 10px 20px 15px 20px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #fff;">
                                                <p style="margin: 0;">
                                                    <a href="#"></a>{{$name ?? ''}} has booked a session at your store,check out the details below.</p>
                                            </td>
                                        </tr>

                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td height="20" style="font-size:20px; line-height:20px;">&nbsp;</td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>




            <tr>
                <td bgcolor="#ffffff">
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" class="message">
                        <tr>
                            <td style="padding: 40px 40px 20px 40px; text-align: center;">
                                <h1 style="margin: 0; font-family: 'Montserrat', sans-serif; font-size: 20px; line-height: 26px; color: #333333; font-weight: bold;">Sessions booked by {{$name ?? ''}}</h1>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 0px 40px 20px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555; font-weight:bold;">
                                {{-- <p style="margin: 0;">Deep Tissue Massage with oil head massage - 2h - ₹550</p> --}}
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 0px 40px 20px 40px; font-family: sans-serif; font-size: 15px; line-height: 20px; color: #555555;font-weight:normal;">
                                <p style="margin: 0;">You can check the other details
                                    <a href="#">here</a> </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <!-- INTRO : END -->


            <tr>
                <td bgcolor="#ffffff">
                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"> <br>
                        <tr>
                            <td align="center"> <img src="{{  $message->embed(public_path()."/emailimage/SalonNme-01.png.png")}}" style="display: block; border: 0px;" class="logo" /> </td>
                        </tr>

                        <tr>
                            <td style="padding: 0px 40px 10px 40px; font-family: sans-serif; font-size: 12px; line-height: 18px; color: #666666; text-align: center; font-weight:normal;">
                                <p style="margin: 0;">If these emails get annoying, please feel free to
                                    <a href="#">unsubscribe.</a></p>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding: 0px 40px 40px 40px; font-family: sans-serif; font-size: 12px; line-height: 18px; color: #666666; text-align: center; font-weight:normal;">
                                <p style="margin: 0;">Copyright &copy; 2022-2023 <b>Saloon n me</b>, All Rights Reserved.</p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</center>
@endsection