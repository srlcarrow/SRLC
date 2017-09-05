<?php

class EmailGenerator {

    private $smtp_server;
    private $smtp_port;
    private $smtp_user;
    private $smtp_pass;
    private $email_sender_name;

    function __construct() {
        
    }

    public static function SendEmail($msg, $to, $subject, $attach = '') {        
        if ($to != '') {
            set_time_limit(900);
            $emailconfig = AdmEmailConfig::model()->findByPk(1);

            $SM = Yii::app()->swiftMailer;            
            if ($emailconfig->email_method == 1) {
                $transport = Swift_SmtpTransport::newInstance($emailconfig->smtp_server, $emailconfig->smtp_port)
                        ->setUsername($emailconfig->smtp_user)
                        ->setPassword($emailconfig->smtp_pass);
            } else if ($emailconfig->email_method == 2) {
                $transport = Swift_SmtpTransport::newInstance($emailconfig->smtp_server, $emailconfig->smtp_port);
            }
          
            // Mailer
            $message = Swift_Message::newInstance();
            $message->setTo($to);
            $message->setSubject($subject);
            $message->setFrom(array($emailconfig->smtp_user => $emailconfig->email_sender_name));
            $message->setBody($msg, 'text/html');
              
            if ($attach != "") {
                $message->attach(Swift_Attachment::fromPath($attach));
            }
            // Send the email
            $mailer = Swift_Mailer::newInstance($transport);

            if ($mailer->send($message)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function getEmailSubject($recognize) {
        $content = EmailContent::model()->find("recognize_text='" . $recognize . "'");
        return $content->email_subject;
    }

    static function setEmailMessageBodyUser($recognize, $type, $emp_id, $user_name, $pwd, $code) {
        $empbasic = Empbasic::model()->findByPk($emp_id);
        $company = Company::model()->findByPk(1);
        $content = EmailContent::model()->find("recognize_text='" . $recognize . "'");
        $format = EmailFormat::model()->find('email_type="' . $type . '"');
        $msg = $content->email_content;
        $subject = $content->email_subject;
        $top = $format->email_format;
        $replacearrBody = array(
            '[emp_name]' => $empbasic->emp_name,
            '[user_name]' => $user_name,
            '[user_password]' => $pwd,
            '[emp_no]' => $empbasic->emp_no,
            '[epf_no]' => $empbasic->epf_no,
            '[reset_code]' => $code,
            '[profile_reject]' => $user_name, // ok
            '[login_url]' => self::loginUrl(),
            '[appraisal_url]' => self::appraisalUrl($emp_id));
        $new_msg = self::str_replace_assoc($replacearrBody, $msg);

        $replacearrFull = array(
            '[header_logo]' => Yii::app()->getBaseUrl(true) . "/uploads/company/200/" . $company->com_logo,
            '[email_subject]' => $subject,
            '[email_message_body]' => $new_msg);
        $mailbody = self::str_replace_assoc($replacearrFull, $top);
        return $mailbody;
    }

   
    private static function str_replace_assoc(array $replace, $msg) {
        return str_replace(array_keys($replace), array_values($replace), $msg);
    }

    private static function coverupAcceptUrl($id) {
        return Yii::app()->getBaseUrl(true) . "/thirdParty/leaveCoverupAccept/id/" . Controller::encodeMailAction($id);
    }

    private static function coverupRejectUrl($id) {
        return Yii::app()->getBaseUrl(true) . "/thirdParty/leaveCoverupReject/id/" . Controller::encodeMailAction($id);
    }

    private static function approverAcceptUrl($id) {
        return Yii::app()->getBaseUrl(true) . "/thirdParty/leaveApproverAccept/id/" . Controller::encodeMailAction($id);
    }

    private static function approverRejectUrl($id) {
        return Yii::app()->getBaseUrl(true) . "/thirdParty/leaveApproverReject/id/" . Controller::encodeMailAction($id);
    }

    private static function approverAcceptArrayUrl($id) {
        return Yii::app()->getBaseUrl(true) . "/thirdParty/leaveApproverAcceptArray/id/" . Controller::encodeMailAction($id);
    }

    private static function approverRejectArrayUrl($id) {
        return Yii::app()->getBaseUrl(true) . "/thirdParty/leaveApproverRejectArray/id/" . Controller::encodeMailAction($id);
    }

    private static function approverSecondAcceptUrl($id) {
        return Yii::app()->getBaseUrl(true) . "/thirdParty/leaveApproverSecondAccept/id/" . Controller::encodeMailAction($id);
    }

    private static function approverSecondRejectUrl($id) {
        return Yii::app()->getBaseUrl(true) . "/thirdParty/leaveApproverSecondReject/id/" . Controller::encodeMailAction($id);
    }

    private static function shortAcceptUrl($id) {
        return Yii::app()->getBaseUrl(true) . "/thirdParty/shortAccept/id/" . Controller::encodeMailAction($id);
    }

    private static function shortRejectUrl($id) {
        return Yii::app()->getBaseUrl(true) . "/thirdParty/shortReject/id/" . Controller::encodeMailAction($id);
    }

    private static function maternityAcceptUrl($id) {
        return Yii::app()->getBaseUrl(true) . "/thirdParty/maternityAccept/id/" . Controller::encodeMailAction($id);
    }

    private static function loginUrl() {
        return Yii::app()->getBaseUrl(true);
    }

    private static function maternityRejectUrl($id) {
        return Yii::app()->getBaseUrl(true) . "/thirdParty/maternityReject/id/" . Controller::encodeMailAction($id);
    }

    private static function appraisalUrl($id) {
        return Yii::app()->getBaseUrl(true) . "/PerformanceMgt/Appriasal/id/" . Controller::encodeMailAction($id);
    }

}

?>
