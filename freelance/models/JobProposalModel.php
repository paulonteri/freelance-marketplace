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
    private ?string $submission_description;
    private ?string $submission_attachment;
    private ?string $client_comment;
    private ?string $time_work_starts;
    private ?string $time_work_ends;
    private string $time_created;
    private bool $is_active;

    public function __construct(?int $id = null)
    {
        $this->db = $this->connectToDb();

        if ($id != null) {

            $sql = 'SELECT * FROM job_proposal WHERE id = :id';
            $statement = $this->db->prepare($sql);
            $statement->bindParam(':id', $id);
            $statement->execute();
            $jobProposal = $statement->fetch();

            $this->id = $id;
            $this->status = $jobProposal['status'];
            $this->title = $jobProposal['title'];
            $this->description = $jobProposal['description'];
            $this->job_id = $jobProposal['job_id'];
            $this->freelancer_id = $jobProposal['freelancer_id'];
            $this->submission_description = $jobProposal['submission_description'];
            $this->submission_attachment = $jobProposal['submission_attachment'];
            $this->client_comment = $jobProposal['client_comment'];
            $this->time_work_starts = $jobProposal['time_work_starts'];
            $this->time_work_ends = $jobProposal['time_work_ends'];
            $this->time_created = $jobProposal['time_created'];
            $this->is_active = $jobProposal['is_active'];
        }
    }

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

    public static function tryGetById(int $id): ?JobProposalModel
    {
        $db = (new Database)->connectToDb();

        $sql = 'SELECT * FROM job_proposal WHERE id = :id';
        $statement = $db->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $jobProposal = $statement->fetch();

        if ($jobProposal != null) {
            return new JobProposalModel($id);
        } else {
            return null;
        }
    }

    public function getJob(): JobModel
    {
        return new JobModel($this->job_id);
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

    public function getSubmissionDescription(): string
    {
        return $this->submission_description;
    }

    public function getSubmissionAttachment(): string
    {
        return $this->submission_attachment;
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

    public function getFreelancer(): ?FreelancerModel
    {
        if ($this->freelancer_id != null) {
            return new FreelancerModel($this->freelancer_id);
        } else {
            return null;
        }
    }

    public static function getProposalsByFreelancer($freelancerId): array
    {
        $db = (new Database)->connectToDb();

        $sql = 'SELECT * FROM job_proposal WHERE freelancer_id = :freelancer_id';
        $statement = $db->prepare($sql);
        $statement->bindParam(':freelancer_id', $freelancerId);
        $statement->execute();

        $proposals = [];
        while ($row = $statement->fetch()) {
            $proposals[] = new JobProposalModel($row['id']);
        }

        return $proposals;
    }

    public static function getProposalsByJob(int $jobId): array
    {
        $db = (new Database)->connectToDb();

        $sql = 'SELECT * FROM job_proposal WHERE job_id = :job_id';
        $statement = $db->prepare($sql);
        $statement->bindParam(':job_id', $jobId);
        $statement->execute();

        $proposals = [];
        while ($row = $statement->fetch()) {
            $proposals[] = new JobProposalModel($row['id']);
        }

        return $proposals;
    }

    public function rejectProposal(): bool
    {
        $sql = 'UPDATE job_proposal SET status = :status WHERE id = :id';
        $statement = $this->db->prepare($sql);
        $statusString = 'rejected';
        $statement->bindParam(':status', $statusString);
        $statement->bindParam(':id', $this->id);
        $statement->execute();

        return true;
    }

    public function withdrawProposal(): bool
    {
        $sql = 'UPDATE job_proposal SET status = :status WHERE id = :id';
        $statement = $this->db->prepare($sql);
        $statusString = 'withdrawn';
        $statement->bindParam(':status', $statusString);
        $statement->bindParam(':id', $this->id);
        $statement->execute();

        return true;
    }

    public function acceptProposal(): bool
    {
        // check if open
        $job = $this->getJob();
        if (!$job->isOpenForProposals()) {
            DisplayAlert::displayError('This job is not open for proposals.');
            return false;
        }

        // accept proposal
        $sql = 'UPDATE job_proposal SET status = :status WHERE id = :id';
        $statement = $this->db->prepare($sql);
        $statusString = 'accepted';
        $statement->bindParam(':status', $statusString);
        $statement->bindParam(':id', $this->id);
        $statement->execute();

        // reject all other proposals for job
        $this::rejectAllJobProposalsExcept($this->getJobId(), $this->id);

        return true;
    }

    public function isProposalAccepted(): bool
    {
        $acceptedStatuses = array('accepted', 'work submitted', 'completed successfully', 'completed unsuccessfully');
        if (in_array($this->status, $acceptedStatuses)) {
            return true;
        }
        return false;
    }

    public static function rejectAllJobProposalsExcept(int $jobId, int $proposalId,): bool
    {
        $db = (new Database)->connectToDb();

        $sql = 'UPDATE job_proposal SET status = :status WHERE id != :id AND job_id = :job_id';
        $statement = $db->prepare($sql);
        $statusString = 'rejected';
        $statement->bindParam(':status', $statusString);
        $statement->bindParam(':id', $proposalId);
        $statement->bindParam(':job_id', $jobId);
        $statement->execute();

        return true;
    }

    public function submitWorkDone(string $description, string $file): bool
    {

        $job = $this->getJob();
        if ($job->isExpired()) {
            DisplayAlert::displayError('This job is expired.');
            return false;
        }
        if ($job->hasWorkSubmitted()) {
            DisplayAlert::displayError('This job has already been submitted.');
            return false;
        }

        $sql = 'UPDATE job_proposal SET status = :status, submission_description = :submission_description, submission_attachment = :submission_attachment WHERE id = :id';
        $statement = $this->db->prepare($sql);
        $statusString = 'work submitted';
        $statement->bindParam(':status', $statusString);
        $statement->bindParam(':submission_description', $description);
        $statement->bindParam(':submission_attachment', $file);
        $statement->bindParam(':id', $this->id);
        $statement->execute();

        return true;
    }

    public function markAsCompletedUnsuccessfully(): bool
    {
        $job = $this->getJob();

        if (!$job->hasWorkSubmitted()) {
            DisplayAlert::displayError("This job's work has not been submitted.");
            return false;
        }

        if ($this->status != 'work submitted') {
            DisplayAlert::displayError("Invalid status: `" . $this->status . "`. Work cannot be rejected.");
            return false;
        }

        $sql = 'UPDATE job_proposal SET status = :status WHERE id = :id';
        $statement = $this->db->prepare($sql);
        $statusString = 'completed unsuccessfully';
        $statement->bindParam(':status', $statusString);
        $statement->bindParam(':id', $this->id);
        $statement->execute();

        return true;
    }

    public function markAsCompletedSuccessfully(): bool
    {
        $job = $this->getJob();

        if (!$job->hasWorkSubmitted()) {
            DisplayAlert::displayError("This job's work has not been submitted.");
            return false;
        }

        if ($this->status != 'work submitted') {
            DisplayAlert::displayError("Invalid status: `" . $this->status . "`. Work cannot be accepted.");
            return false;
        }

        $sql = 'UPDATE job_proposal SET status = :status WHERE id = :id';
        $statement = $this->db->prepare($sql);
        $statusString = 'completed successfully';
        $statement->bindParam(':status', $statusString);
        $statement->bindParam(':id', $this->id);
        $statement->execute();

        return true;
    }

    public function getFreelancerRating(): ?JobRatingModel
    {
        $sql = 'SELECT * FROM job_rating WHERE job_id = :job_id AND type = freelancer';
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':job_id', $this->job_id);
        $statement->execute();
        $row = $statement->fetch();

        if ($row) {
            return new JobRatingModel($row['id']);
        }

        return null;
    }

    public function hasFreelancerRating(): bool
    {
        if ($this->getFreelancerRating() != null) {
            return true;
        }
        return false;
    }
}