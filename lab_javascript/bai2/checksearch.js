// file checksearch.js
function checksearch() {
    var tukhoa = document.formtim.tukhoa.value;

    // Kiểm tra nếu trường từ khóa giữ giá trị mặc định 'Tìm kiếm'
    if (tukhoa.trim() === '' || tukhoa === 'Tìm kiếm') {
        alert("Bạn chưa nhập từ khóa tìm kiếm...");
        document.formtim.tukhoa.focus();
        return false;  // Ngăn chặn việc gửi form nếu chưa nhập
    }

    return true;  // Cho phép gửi form nếu đã nhập từ khóa
}
