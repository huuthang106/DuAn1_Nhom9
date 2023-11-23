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
document.addEventListener('DOMContentLoaded', function () {
    // Tìm thẻ label trong phần tử có id là 'dataTable' và ẩn nó
    var labelElement = document.querySelector('#dataTable label');
    if (labelElement) {
        labelElement.style.display = 'none';
    }
});
//phân trang bình luận
function prepareReplyForm(button) {
    // Lấy comment_id từ thuộc tính data-comment-id
    var commentId = button.parentElement.querySelector('h4').getAttribute('comment-id');
    var user_id = button.parentElement.querySelector('h4').getAttribute('user-id');
    var status = 3;
    console.log('comment_id:', commentId);

    // Điền comment_id vào trường ẩn trong form
    document.getElementById('comment_id').value = commentId;
    document.getElementById('user-id').value = user_id;
    document.getElementById('status').value = status;

    // Cuộn đến form để người dùng có thể thấy nó
    document.getElementById('contactForm').scrollIntoView({ behavior: 'smooth' });
    var status = 1;
}
function prepareReplyForm_two(button) {
    // Lấy comment_id từ thuộc tính data-comment-id
    var replyCommentId = button.parentElement.querySelector('h4').getAttribute('reply-id');
    var user_id = button.parentElement.querySelector('h4').getAttribute('user-id');
    var status = 3;
    console.log('reply-id:', replyCommentId);


    // Điền reply-comment-id vào trường ẩn trong form
    document.getElementById('comment_id').value = replyCommentId;
    document.getElementById('user-id').value = user_id;
    document.getElementById('status').value = status;

    // Cuộn đến form để người dùng có thể thấy nó
    document.getElementById('contactForm').scrollIntoView({ behavior: 'smooth' });
    var status = 1;
}
function prepareForm() {
    // Lấy ngày hiện tại
    var currentDate = new Date().toISOString().slice(0, 10);

    // Điền ngày hiện tại vào trường ẩn trong form
    document.getElementById('current_date').value = currentDate;
}

document.addEventListener("DOMContentLoaded", function () {
    let page = 1;

    // Hàm để tải thêm bình luận
    function loadMoreComments() {
        // Gọi AJAX để lấy thêm dữ liệu từ server
        // Đảm bảo thay thế 'YOUR_API_ENDPOINT' bằng đường dẫn thực tế của bạn
        fetch(`YOUR_API_ENDPOINT?page=${page}`)
            .then(response => response.json())
            .then(data => {
                // Xử lý dữ liệu và hiển thị trên trang
                if (data.length > 0) {
                    // Tăng trang để lấy dữ liệu trang tiếp theo khi người dùng bấm "Xem thêm" lần nữa
                    page++;

                    // Hiển thị dữ liệu mới
                    data.forEach(comment => {
                        // Thêm dữ liệu vào phần tử HTML hiển thị bình luận
                        document.getElementById('commentList').innerHTML += `
                            <div class="commentItem">
                                <!-- Hiển thị thông tin của bình luận ở đây -->
                            </div>
                        `;
                    });
                } else {
                    // Ẩn nút "Xem thêm" nếu không còn dữ liệu
                    document.getElementById('loadMoreBtn').style.display = 'none';
                }
            })
            .catch(error => console.error('Error:', error));
    }

    // Bắt sự kiện khi người dùng bấm nút "Xem thêm"
    document.getElementById('loadMoreBtn').addEventListener('click', loadMoreComments);

    // Gọi hàm để hiển thị các bình luận ban đầu
    loadMoreComments();
});
