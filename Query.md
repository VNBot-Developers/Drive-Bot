# Query Guide Drive Bot
## Cách lấy Forder ID
1. Đầu tiên hãy chia sẽ forder của bạn
![Chia se forder](https://i.imgur.com/QKXARr6.png)
Note: Nhớ set quyền là  <b>có thể xem</b> cho forder của bạn để đảm bảo tính toàn vẹn dữ liệu
2. Sau đó sẽ có link chia sẽ như này
```
https://drive.google.com/drive/folders/0B9GvBjf6V7-MZTg4SUZJRWpTTFU?usp=sharing
```
Thì forder id trong trường hợp này là 0B9GvBjf6V7-MZTg4SUZJRWpTTFU
## Một số query phổ biến
- Tìm kiếm tất cả các file và forder trong không gian lưu trữ của account của bạn
```
""
```
Đơn giản chỉ cần để chuỗi rỗng
- Tìm kiếm tất cả file chỉ trong 1 forder
```
"('[Forder_ID]' in parents) and "
```
VD:
```
"('0B4FH8NB1ulOxfmR3TDljR2NPVlk1R2pVOFZ5b044S2J1SHFDUnNtbmpTUnpqNVk1MEJValU' in parents)"
```
- Tìm kiếm theo ngày
 ```
"modifiedTime > '2012-06-04T12:00:00' and "
```
Bạn hoàn toàn có thể sử dụng các toán tử >, <, =, <=, >=, trong trường hợp này
</br>
- Tìm kiếm các file và forder trong 2 forder trở lên
```
" (('[Forder_ID]' in parents) or '[Forder_ID]' in parents) or (...) or ... and"
```
Dấu ... là dấu cần điền nhá :v
<br>
VD:
```
"(('0B4FH8NB1ulOxfmR3TDljR2NPVlk1R2pVOFZ5b044S2J1SHFDUnNtbmpTUnpqNVk1MEJValU' in parents) or ('0B9GvBjf6V7-MZTg4SUZJRWpTTFU' in parents)) and "

