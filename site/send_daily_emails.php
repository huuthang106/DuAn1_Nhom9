<?php
require 'PHPExcel-1.8/Classes/PHPExcel.php';
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Tạo một đối tượng của lớp contacts
if ($cronExpression->isDue()) {
$contactObject = new contacts();
$yesterday = date('Y-m-d', strtotime("-1 day"));

// Gọi hàm get_all_contact để lấy dữ liệu
$data = $contactObject->get_all_contact($yesterday);
var_dump($data);
if ($data) {
    // Tạo một đối tượng Spreadsheet
    $objPHPExcel = new PHPExcel();

    // Thêm dữ liệu vào Spreadsheet
    $objPHPExcel->setActiveSheetIndex(0);

    $row = 1;
    foreach ($data as $rowData) {
        $objPHPExcel->getActiveSheet()->setCellValue('A' . $row, $rowData['contact_id']);
        $objPHPExcel->getActiveSheet()->setCellValue('B' . $row, $rowData['name']);
        $objPHPExcel->getActiveSheet()->setCellValue('C' . $row, $rowData['email']);
        $objPHPExcel->getActiveSheet()->setCellValue('D' . $row, $rowData['content']);
        $objPHPExcel->getActiveSheet()->setCellValue('E' . $row, $rowData['day']);
        $row++;
    }

    // Lưu Spreadsheet vào tệp Excel
    $excelFileName = 'khách hàng liên hệ' .$yesterday. '.xlsx';
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    $objWriter->save($excelFileName);

    // Gửi Email với tệp Excel đính kèm
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'milccpc06135@fpt.edu.vn'; // Thay thế bằng địa chỉ email của bạn
        $mail->Password   = 'gsygsdrvlqkwkzvg'; // Thay thế bằng mật khẩu email của bạn
        $mail->Port       = 587;

        $mail->setFrom('milccpc06135@fpt.edu.vn'); // Thay thế bằng thông tin của bạn
        $mail->addAddress('thangcachep106@gmail.com'); // Thay thế bằng địa chỉ email người nhận
        $mail->isHTML(true);
        $mail->Subject = 'Daily Report';
        $mail->Body    = 'List of contacts is attached.';
        $mail->addAttachment($excelFileName);

        $mail->send();
        echo 'Email sent successfully.';
    } catch (Exception $e) {
        echo "Không thể gửi email. Lỗi: {$mail->ErrorInfo}";
    }
} else {
    echo "Không có dữ liệu hoặc có lỗi khi truy vấn dữ liệu.";
}}
?>
