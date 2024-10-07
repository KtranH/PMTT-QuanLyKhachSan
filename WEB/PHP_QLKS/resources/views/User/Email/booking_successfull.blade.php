<!DOCTYPE html>
<html>

<head>
    <title>Confirmation Email</title>
</head>

<body>
    <h2>Xin chào {{ $userName }},</h2>
    <p>Quý khách đã đặt phòng thành công với thông tin sau: .</p>
    <p>Ngày Check in: {{ $checkInDate }}</p>
    <p>Ngày Check out: {{ $checkOutDate }}</p>
    <p>Cảm ơn quý khách đã tin tưởng chúng tôi!</p>
</body>

</html>