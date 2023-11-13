// Lắng nghe sự kiện khi radio button "Chuyển khoản" được chọn
document.querySelector('#f-option6').addEventListener('change', function () {
    if (this.checked) {
        // Hiển thị popup khi radio "Chuyển khoản" được chọn
        document.getElementById('popup').style.display = 'block';
    }
});

// Lắng nghe sự kiện khi bất kỳ radio button nào khác được chọn
document.querySelectorAll('input[type="radio"]').forEach(function (radio) {
    if (radio.id !== 'f-option6') {
        radio.addEventListener('change', function () {
            // Ẩn popup khi bạn chọn tùy chọn khác
            document.getElementById('popup').style.display = 'none';
        });
    }
});

// Ẩn popup khi trang web được tải lên
document.getElementById('popup').style.display = 'none';
//

// Khởi tạo DataTables và ẩn phần dataTable_filter
document.addEventListener('DOMContentLoaded', function() {
    // Tìm thẻ label trong phần tử có id là 'dataTable' và ẩn nó
    var labelElement = document.querySelector('#dataTable label');
    if (labelElement) {
        labelElement.style.display = 'none';
    }
});