<?php
require 'cron-expression-master/src/Cron/CronExpression.php';

use Cron\CronExpression;

$expression = CronExpression::factory('59 23 * * *'); // Lúc 23:59 hàng ngày

if ($expression->isDue()) {
    // Thực hiện công việc cần lên lịch ở đây
    exec('php /path/to/send_daily_emails.php');
    echo "Cron job (send_daily_emails.php) is running at 23:59!\n";
} else {
    echo "Cron job is not due yet.\n";
}
