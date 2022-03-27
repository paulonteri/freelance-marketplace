<?php

namespace app\models;

use app\Database;
use app\utils\DisplayAlert;

class JobProposalModel extends _BaseModel
{
    private int $id;
    private string $status;
    private string $title;
    private string $description;
    private int $job_id;
    private int $freelancer_id;
    private string $client_comment;
    private string $time_work_starts;
    private string $time_work_ends;
    private string $time_created;
    private bool $is_active;

    public static function create(
        int $job_id,
        int $freelancer_id,
        string $title,
        string $description,
    ): ?JobProposalModel {

        $job = new JobModel($job_id);
        $freelancer = new FreelancerModel($freelancer_id);

        if (isset($job) && $job->getIsActive()) {

            if ($job->isJobCreatedByUser($freelancer->getUserId())) {
                DisplayAlert::displayError('Client cannot create a proposal for own job.');
                return null;
            }
            if ($job->hasFreelancerCreatedProposal($freelancer_id)) {
                DisplayAlert::displayError('Freelancer already created a proposal for this job.');
                return null;
            }
            if ($job->hasJobStarted()) {
                DisplayAlert::displayError('This job has already started.');
                return null;
            }

            $db = (new Database)->connectToDb();

            $sql = 'INSERT INTO job_proposal (job_id, freelancer_id, title, description) VALUES (:job_id, :freelancer_id, :title, :description)';
            $statement = $db->prepare($sql);
            $statement->bindParam(':job_id', $job_id);
            $statement->bindParam(':freelancer_id', $freelancer_id);
            $statement->bindParam(':title', $title);
            $statement->bindParam(':description', $description);
            $statement->execute();

            $id = $db->lastInsertId();

            return new JobProposalModel($id);
        } else {
            DisplayAlert::displayError('Job not found.');
            return null;
        }
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getJobId(): int
    {
        return $this->job_id;
    }

    public function getFreelancerId(): int
    {
        return $this->freelancer_id;
    }

    public function getClientComment(): string
    {
        return $this->client_comment;
    }

    public function getTimeWorkStarts(): string
    {
        return $this->time_work_starts;
    }

    public function getTimeWorkEnds(): string
    {
        return $this->time_work_ends;
    }

    public function getTimeCreated(): string
    {
        return $this->time_created;
    }

    public function isIsActive(): bool
    {
        return $this->is_active;
    }
}