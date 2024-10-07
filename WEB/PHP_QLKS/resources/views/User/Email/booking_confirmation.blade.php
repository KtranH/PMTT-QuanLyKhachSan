<!DOCTYPE html>
<html>

<head>
    <title>Confirmation Email</title>
</head>

<body>
    <h2>Xin chào {{ $userName }},</h2>
    <p>Đây là thông tin đặt phòng của quý khách.</p>
    <p>Ngày Check in: {{ $checkInDate }}</p>
    <p>Ngày Check out: {{ $checkOutDate }}</p>
    <p>Vui lòng chờ chúng tôi xác nhận tình trạng đặt phòng thành công.</p>
    <p>Cảm ơn quý khách đã tin tưởng chúng tôi!</p>
</body>

</html>