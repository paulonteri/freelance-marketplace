<?php
// Should be run every 10 minutes

include __DIR__ . '/../vendor/autoload.php';
include __DIR__ . '/../includes.php';

use app\Database;
use app\models\JobProposalModel;
use app\utils\Mailer;

$db = (new Database)->getConnection();

$sql = "SELECT * FROM `job_proposal` WHERE time_work_ends < DATE_ADD(NOW(), INTERVAL 1 DAY) AND status = 'accepted' AND 24_hr_expiry_email_sent = 0 ORDER BY time_work_ends ASC LIMIT 50;";
$statement = $db->prepare($sql);
$statement->execute();
$jobProposals = $statement->fetchAll();


foreach ($jobProposals as $jobProposal) {
    $jobProposalObj = new JobProposalModel($jobProposal['id']);

    // send reminder email
    $email = $jobProposalObj->getFreelancer()->getUser()->getEmail();
    $job = $jobProposalObj->getJob();
    $mailBody = "<p>The deadline for the submission of work for job (id {$job->getId()}, title {$job->getTitle()} is coming up in the next 24hrs. Visit your dashboard for more info.</p>";
    Mailer::sendMail($email, 'Deadline for the submission of work', $mailBody);
    echo "Sent 'Deadline for the submission of work' email to {$email}";

    // record that reminder email has been sent
    $sql = "UPDATE `job_proposal` SET 24_hr_expiry_email_sent = 1 WHERE id = {$jobProposal['id']};";
    $statement = $db->prepare($sql);
    $statement->execute();
}