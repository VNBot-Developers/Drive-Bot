# Drive-Bot
Drive-Bot sẽ giúp bạn tìm kiếm tài liệu dựa trên không gian lưu trữ khổng lồ trên google drive trên nền tản Messenger Facebook.
![img](https://i.imgur.com/OylNJWm.png)
## Requirement
- Apache2 hoặc nginx
- Php 5.6 trở lên
- Có cài composer (Có cũng được không có cũng được nhưng tác giả khuyên thế :) )
- VPS hoặc Hosting
## Install
### Với Máy chủ ảo (VPS):
1. Chuyển đến thư mục html
```
cd /var/www/html
```
2. Clone source code về máy
```
git clone https://github.com/VNBot-Developers/Drive-Bot && cd Drive-Bot
```
3. Download Source còn thiếu bằng composer
```
composer install
```
Ngay lập tức hệ thống sẽ Download source về (công việc này sẽ hoàn thành trong vòng 2-3p dựa trên tốc độ mạng của bạn)
</br>
4. Tiến hành cấu hình trong file config.php
<br>
Bạn chỉ cần thay đổi giá trị chuổi trong biến $q theo đúng mục đích của bạn.
<br>
<b>Note </b>: Bạn cần tìm hiểu cách viết query cho truy vấn của bạn tại [đây](Query.md)
</br>
5. 1 Bước nữa bạn cần setup một số thứ trên Chatfuel để BOT đi vào hoạt động. Xem set up ChatFuel tại [đây](ChatFuel.md)
</br> 
6. Truy cập url trỏ đến drive.php của bạn sau đó cài đặt đăng nhập vào tài khoản của bạn bằng click vào "click"
![](https://i.imgur.com/ZLGnER3.png)
7. Accept quền truy cập
8. Sau bước 7 hệ thống sẽ cấp cho bạn 1 token. Copy token này và dán vào input rồi nhấn send.
9. Tận hưởng.
![](https://i.imgur.com/sAgzsCC.png)
### Với hosting
1. Download source code đầy đủ tại [đây](https://drive.google.com/open?id=1tMz6D1U_u_wrXx_xJHw_okzLBVsHMGqE)
2. Up lên hosting bằng ftp client
3. Làm tương tự từ bước 4 trở về sau như hướng dân với VPS
## About Me
Facebook: [Trần Đức Ý](https://www.facebook.com/Tranducy1999)
</br>
Email: ducyk41cntt@gmail.com 