<?php
// フォームから送信されたデータを取得
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$subject = isset($_POST['subject']) ? htmlspecialchars($_POST['subject']) : '';
$message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';

// メール送信エラーチェック
if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    echo "すべてのフィールドを入力してください。";
    exit;
}

// 送信先のメールアドレス
$to = "rintake0217@outlook.jp";  // ここに送信先のメールアドレスを設定

// メールの件名
$mail_subject = "お問い合わせ: " . $subject;

// メールの本文
$mail_body = "名前: " . $name . "\n";
$mail_body .= "メールアドレス: " . $email . "\n\n";
$mail_body .= "メッセージ:\n" . $message;

// メールヘッダー
$headers = "From: " . $email . "\r\n" .
           "Reply-To: " . $email . "\r\n" .
           "X-Mailer: PHP/" . phpversion();

// メールを送信
if (mail($to, $mail_subject, $mail_body, $headers)) {
    echo "メールが正常に送信されました。";
} else {
    echo "メールの送信に失敗しました。";
}
?>