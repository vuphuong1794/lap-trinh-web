câu 1 #4de275
-- 1. Tạo database
CREATE DATABASE QuanLyDonHang;
GO

USE QuanLyDonHang;
GO

-- 2. Tạo các bảng
CREATE TABLE KHACHHANG (
    MAKH VARCHAR(10) PRIMARY KEY,
    TENKH NVARCHAR(50) NOT NULL,
    DIACHI NVARCHAR(100),
    DIENTHOAI VARCHAR(15)
);

CREATE TABLE DONDATHANG (
    MADDH VARCHAR(10) PRIMARY KEY,
    NGAYDH DATE NOT NULL,
    MAKH VARCHAR(10) FOREIGN KEY REFERENCES KHACHHANG(MAKH),
    TINHTRANG NVARCHAR(20) CHECK (TINHTRANG IN (N'ĐÃ GIAO', N'CHƯA GIAO', N'ĐÃ HỦY'))
);

CREATE TABLE SANPHAM (
    MASP VARCHAR(10) PRIMARY KEY,
    TENSP NVARCHAR(50) NOT NULL,
    DVT NVARCHAR(20),
    SLCON INT CHECK (SLCON >= 0),
    DONGIA DECIMAL(12,2) CHECK (DONGIA > 0)
);

CREATE TABLE CHITIETDATHANG (
    MADDH VARCHAR(10),
    MASP VARCHAR(10),
    SL INT CHECK (SL > 0),
    PRIMARY KEY (MADDH, MASP),
    FOREIGN KEY (MADDH) REFERENCES DONDATHANG(MADDH),
    FOREIGN KEY (MASP) REFERENCES SANPHAM(MASP)
);

-- 3. Chèn dữ liệu mẫu
INSERT INTO KHACHHANG VALUES
('KH001', N'Nguyễn Văn An', N'Hà Nội', '0901234567'),
('KH002', N'Trần Thị Bình', N'TP.HCM', '0912345678'),
('KH003', N'Lê Văn Cường', N'Đà Nẵng', '0923456789');

INSERT INTO SANPHAM VALUES
('SP001', N'Laptop Dell XPS', N'Chiếc', 10, 25000000),
('SP002', N'iPhone 15 Pro', N'Chiếc', 20, 30000000),
('SP003', N'Tai nghe Sony', N'Chiếc', 50, 5000000);

INSERT INTO DONDATHANG VALUES
('DDH001', '2023-01-15', 'KH001', N'ĐÃ GIAO'),
('DDH002', '2023-06-20', 'KH002', N'CHƯA GIAO'),
('DDH003', '2024-01-10', 'KH003', N'CHƯA GIAO');

INSERT INTO CHITIETDATHANG VALUES
('DDH001', 'SP001', 1),
('DDH002', 'SP002', 2),
('DDH003', 'SP003', 3);

-- 4. Tạo View khách hàng có đơn năm 2023
CREATE VIEW vw_KhachHang2023
AS
SELECT DISTINCT 
    kh.MAKH,
    kh.TENKH,
    kh.DIACHI,
    kh.DIENTHOAI
FROM KHACHHANG kh
INNER JOIN DONDATHANG ddh ON kh.MAKH = ddh.MAKH
WHERE YEAR(ddh.NGAYDH) = 2023;

-- 5. Tạo Stored Procedure thêm đơn hàng
CREATE PROCEDURE sp_ThemDonHang
    @MAKH varchar(10),
    @MASP varchar(10),
    @SL int
AS
BEGIN
    DECLARE @MADDH varchar(10)
    DECLARE @ERROR_MESSAGE nvarchar(4000)
    
    BEGIN TRY
        BEGIN TRANSACTION
            -- Kiểm tra tồn tại khách hàng
            IF NOT EXISTS (SELECT 1 FROM KHACHHANG WHERE MAKH = @MAKH)
            BEGIN
                SET @ERROR_MESSAGE = N'Khách hàng không tồn tại!'
                RAISERROR(@ERROR_MESSAGE, 16, 1)
            END

            -- Kiểm tra tồn tại sản phẩm và số lượng
            IF NOT EXISTS (SELECT 1 FROM SANPHAM WHERE MASP = @MASP AND SLCON >= @SL)
            BEGIN
                SET @ERROR_MESSAGE = N'Sản phẩm không tồn tại hoặc không đủ số lượng!'
                RAISERROR(@ERROR_MESSAGE, 16, 1)
            END

            -- Tạo mã đơn đặt hàng mới
            SET @MADDH = 'DDH' + FORMAT(GETDATE(), 'yyyyMMdd') + 
                RIGHT('0000' + CAST(
                    (SELECT ISNULL(MAX(CAST(RIGHT(MADDH, 4) AS INT)), 0) + 1 
                     FROM DONDATHANG 
                     WHERE MADDH LIKE 'DDH' + FORMAT(GETDATE(), 'yyyyMMdd') + '%')
                AS VARCHAR), 4)

            -- Thêm đơn đặt hàng
            INSERT INTO DONDATHANG (MADDH, NGAYDH, MAKH, TINHTRANG)
            VALUES (@MADDH, GETDATE(), @MAKH, N'CHƯA GIAO')

            -- Thêm chi tiết đơn hàng
            INSERT INTO CHITIETDATHANG (MADDH, MASP, SL)
            VALUES (@MADDH, @MASP, @SL)

            -- Cập nhật số lượng còn
            UPDATE SANPHAM
            SET SLCON = SLCON - @SL
            WHERE MASP = @MASP

        COMMIT TRANSACTION
        SELECT @MADDH AS 'MaDonHang'
    END TRY
    BEGIN CATCH
        IF @@TRANCOUNT > 0
            ROLLBACK TRANSACTION
        
        DECLARE @ErrorMessage nvarchar(4000) = ERROR_MESSAGE()
        DECLARE @ErrorSeverity int = ERROR_SEVERITY()
        DECLARE @ErrorState int = ERROR_STATE()
        
        RAISERROR(@ErrorMessage, @ErrorSeverity, @ErrorState)
    END CATCH
END;

-- 6. Test các chức năng
-- 6.1. Test View
SELECT * FROM vw_KhachHang2023;

-- 6.2. Test Stored Procedure - Trường hợp thành công
EXEC sp_ThemDonHang @MAKH = 'KH001', @MASP = 'SP001', @SL = 1;

-- 6.3. Test Stored Procedure - Trường hợp lỗi: Khách hàng không tồn tại
EXEC sp_ThemDonHang @MAKH = 'KH999', @MASP = 'SP001', @SL = 1;

-- 6.4. Test Stored Procedure - Trường hợp lỗi: Số lượng không đủ
EXEC sp_ThemDonHang @MAKH = 'KH001', @MASP = 'SP001', @SL = 100;

-- 6.5. Kiểm tra kết quả sau khi thêm đơn hàng
SELECT * FROM DONDATHANG;
SELECT * FROM CHITIETDATHANG;
SELECT * FROM SANPHAM;