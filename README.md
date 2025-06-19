# Nhóm 09 Kỹ Thuật Phần Mềm 
## Tên đề tài: Hệ Thống Bán Gấu Bông Trực Tuyến (Teddy paradise)
## Thành viên:
 - Hà Văn Đô - MSSV: 23010406
 - Lê Thị Dương - MSSV: 23010351
 - Cung Đỗ Hải Phong - MSSV: 23010341
 - Đinh Đức Mạnh - MSSV: 23010029
 - Phạm Hồng Đức - MSSV: 23010341
## Tổng quan dự án
Trong thời đại công nghệ số hiện nay, việc mua sắm trực tuyến đã trở thành một xu hướng phổ biến và tiện lợi, đặc biệt là trong ngành hàng quà tặng và đồ chơi. Gấu bông – một sản phẩm được ưa chuộng bởi nhiều lứa tuổi, từ trẻ em đến người lớn – không chỉ là món quà ý nghĩa mà còn là vật phẩm trang trí, giúp kết nối cảm xúc giữa người tặng và người nhận. Tuy nhiên, vẫn còn nhiều cửa hàng kinh doanh gấu bông theo hình thức truyền thống, chưa khai thác tối đa tiềm năng từ nền tảng thương mại điện tử.

Với mục tiêu giúp việc kinh doanh gấu bông trở nên hiện đại, chuyên nghiệp và dễ tiếp cận hơn, nhóm chúng tôi xây dựng một hệ thống phần mềm bán gấu bông trực tuyến. Hệ thống này cho phép người dùng dễ dàng truy cập website, xem thông tin sản phẩm, chọn lựa mẫu gấu bông yêu thích, đặt hàng và thanh toán nhanh chóng. Bên cạnh đó, người quản trị có thể theo dõi đơn hàng, thêm mới sản phẩm, quản lý số lượng hàng tồn và tương tác với khách hàng một cách hiệu quả.

## Công nghệ dự kiến sử dụng:
- CSDL: MySql
- Languages: JavaScipt, SCSS, CSS,Less, Blade, PHP, JavaScript,HTML
## Chức Năng chính
- Xem danh sách các sản phẩm gấu bông
- Tìm kiếm và lọc sản phẩm theo loại, giá, kích thước
- Thêm sản phẩm vào giỏ hàng
- Thanh toán và tạo đơn hàng
- Đăng ký / Đăng nhập người dùng
- Quản lý sản phẩm (thêm, sửa, xóa) cho Admin
- Quản lý đơn hàng và người dùng
## Tiến độ thực hiện (dự kiến)
- Tuần 1–2: Phân tích yêu cầu, khảo sát, viết đặc tả
- Tuần 3–4: Thiết kế sơ bộ (Use case, ERD, giao diện mẫu)
- Tuần 5–7: Phát triển backend và frontend
- Tuần 8: Kiểm thử và hoàn thiện tài liệu báo cáo
## Hướng phát triển
-- Nhằm hoàn thiện và nâng cấp hệ thống trong tương lai, nhóm đề xuất một số hướng phát triển như sau:
 + Hoàn thiện tính năng và giao diện người dùng để phù hợp hơn với quy trình nghiệp vụ thực tế và thói quen mua sắm của người dùng hiện đại.
 + Tích hợp thanh toán trực tuyến: Áp dụng các phương thức thanh toán như ví điện tử (Momo, ZaloPay), thanh toán qua mã QR hoặc cổng VNPAY để nâng cao tính tiện lợi và chuyên nghiệp.
 + Cải thiện hệ thống quản trị và báo cáo: Bổ sung chức năng thống kê doanh thu, phân tích hành vi khách hàng, báo cáo bán hàng theo thời gian, sản phẩm hoặc khu vực.
 + Tự động hóa giao tiếp với khách hàng: Phát triển thêm tính năng gửi email/SMS tự động khi đơn hàng được xác nhận, vận chuyển hoặc có chương trình khuyến mãi.
 + Xây dựng hệ thống gợi ý sản phẩm: Dựa trên lịch sử mua hàng hoặc sản phẩm tương tự để cá nhân hóa trải nghiệm người dùng.
 + Nâng cấp chatbot hỗ trợ: Tích hợp để chatbot có khả năng hiểu ngữ cảnh và trả lời linh hoạt hơn.

## UML & lưu đồ dự án
- Biểu đồ Use Case tổng quan.
![image](https://github.com/user-attachments/assets/9af4cb93-043f-4500-854d-0cb053224be3)

- Quản lý giỏ hàng:
![image](https://github.com/user-attachments/assets/0d82bf67-6c01-4276-9454-d0d3816c3135)

- Quản lý sản phẩm
![image](https://github.com/user-attachments/assets/2536048b-3e71-4eef-aa33-e71ace399fbd)

- Chức năng đăng nhập và đăng kí
![image](https://github.com/user-attachments/assets/16cbed88-9fdb-495b-aa2c-3a2bb49fd884)

- Chức năng đăng xuất
![image](https://github.com/user-attachments/assets/b9cc8414-bf30-4ee0-9a7f-c8eda2ffded6)

- Chức năng yêu cầu đặt hàng
![image](https://github.com/user-attachments/assets/4c3c666a-16ae-45c8-9475-48a361ae68fb)

- Chức năng xem thông tin sẩn phẩm
![image](https://github.com/user-attachments/assets/305f9bdc-1a66-497e-af80-dc3e0402dbe6)

- User thực hiện mua hàng
![image](https://github.com/user-attachments/assets/58c11008-d950-49e5-b559-775f42ac7687)

- Các chức năng chính của admin trong hệ thống
![image](https://github.com/user-attachments/assets/bb7b3236-5430-4997-9ae5-b1eac5b3ca2f)

- ERD dự án
![image](https://github.com/user-attachments/assets/8e2e414c-ea0f-4c8d-b91d-a1b0a4a00c91)


## Slide & Báo Cáo

[NHÓM-09-KTPM.pptx](https://github.com/user-attachments/files/20824481/NHOM-09-KTPM.pptx)



## Cách Cài Đặt
 1. Clone repository từ GitHub:
   https://github.com/havando1302/Group09.git





