<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <title>
                </title>
            </meta>
        </meta>
    </head>
    <body>
        <h2>
            Lịch hẹn
        </h2>
        <table border="0" cellpadding="10">
            <tbody>
                <tr>
                    <td colspan="2">
                        <b>
                            Thông tin khách hàng
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>
                        Họ và tên
                    </td>
                    <td>
                        <b>
                            {{$dataSendMail['fullname']}}
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>
                        Số điện thoại
                    </td>
                    <td>
                    	<b>
                        	{{$dataSendMail['phone']}}
                        </b>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <b>
                            Thông tin lịch đặt
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>
                        Khung giờ bắt đầu
                    </td>
                    <td>
                    	<b>
                        	{{$dataSendMail['start_at']}}
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>
                        Nhân viên đã chọn
                    </td>
                    <td>
                    	<b>
	                        @foreach ($dataSendMail['staff'] as $staff)
								{{$staff->name}} <br>
	                        @endforeach
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>
                        Dịch vụ đã chọn
                    </td>
                    <td>
                    	<b>
	                        @foreach ($dataSendMail['service'] as $service)
								{{$service->name}} <br>
	                        @endforeach
                        </b>
                    </td>
                </tr>
                <tr>
                    <td>
                        Ghi chú
                    </td>
                    <td>
                    	<b>
                        	{{$dataSendMail['note']}}
                        </b>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
