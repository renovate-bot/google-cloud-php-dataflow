<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/dataflow/v1beta3/jobs.proto

namespace Google\Cloud\Dataflow\V1beta3;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request to create a Cloud Dataflow job.
 *
 * Generated from protobuf message <code>google.dataflow.v1beta3.CreateJobRequest</code>
 */
class CreateJobRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * The ID of the Cloud Platform project that the job belongs to.
     *
     * Generated from protobuf field <code>string project_id = 1;</code>
     */
    protected $project_id = '';
    /**
     * The job to create.
     *
     * Generated from protobuf field <code>.google.dataflow.v1beta3.Job job = 2;</code>
     */
    protected $job = null;
    /**
     * The level of information requested in response.
     *
     * Generated from protobuf field <code>.google.dataflow.v1beta3.JobView view = 3;</code>
     */
    protected $view = 0;
    /**
     * Deprecated. This field is now in the Job message.
     *
     * Generated from protobuf field <code>string replace_job_id = 4;</code>
     */
    protected $replace_job_id = '';
    /**
     * The [regional endpoint]
     * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) that
     * contains this job.
     *
     * Generated from protobuf field <code>string location = 5;</code>
     */
    protected $location = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $project_id
     *           The ID of the Cloud Platform project that the job belongs to.
     *     @type \Google\Cloud\Dataflow\V1beta3\Job $job
     *           The job to create.
     *     @type int $view
     *           The level of information requested in response.
     *     @type string $replace_job_id
     *           Deprecated. This field is now in the Job message.
     *     @type string $location
     *           The [regional endpoint]
     *           (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) that
     *           contains this job.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Dataflow\V1Beta3\Jobs::initOnce();
        parent::__construct($data);
    }

    /**
     * The ID of the Cloud Platform project that the job belongs to.
     *
     * Generated from protobuf field <code>string project_id = 1;</code>
     * @return string
     */
    public function getProjectId()
    {
        return $this->project_id;
    }

    /**
     * The ID of the Cloud Platform project that the job belongs to.
     *
     * Generated from protobuf field <code>string project_id = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setProjectId($var)
    {
        GPBUtil::checkString($var, True);
        $this->project_id = $var;

        return $this;
    }

    /**
     * The job to create.
     *
     * Generated from protobuf field <code>.google.dataflow.v1beta3.Job job = 2;</code>
     * @return \Google\Cloud\Dataflow\V1beta3\Job|null
     */
    public function getJob()
    {
        return $this->job;
    }

    public function hasJob()
    {
        return isset($this->job);
    }

    public function clearJob()
    {
        unset($this->job);
    }

    /**
     * The job to create.
     *
     * Generated from protobuf field <code>.google.dataflow.v1beta3.Job job = 2;</code>
     * @param \Google\Cloud\Dataflow\V1beta3\Job $var
     * @return $this
     */
    public function setJob($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Dataflow\V1beta3\Job::class);
        $this->job = $var;

        return $this;
    }

    /**
     * The level of information requested in response.
     *
     * Generated from protobuf field <code>.google.dataflow.v1beta3.JobView view = 3;</code>
     * @return int
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * The level of information requested in response.
     *
     * Generated from protobuf field <code>.google.dataflow.v1beta3.JobView view = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setView($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Dataflow\V1beta3\JobView::class);
        $this->view = $var;

        return $this;
    }

    /**
     * Deprecated. This field is now in the Job message.
     *
     * Generated from protobuf field <code>string replace_job_id = 4;</code>
     * @return string
     */
    public function getReplaceJobId()
    {
        return $this->replace_job_id;
    }

    /**
     * Deprecated. This field is now in the Job message.
     *
     * Generated from protobuf field <code>string replace_job_id = 4;</code>
     * @param string $var
     * @return $this
     */
    public function setReplaceJobId($var)
    {
        GPBUtil::checkString($var, True);
        $this->replace_job_id = $var;

        return $this;
    }

    /**
     * The [regional endpoint]
     * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) that
     * contains this job.
     *
     * Generated from protobuf field <code>string location = 5;</code>
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * The [regional endpoint]
     * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) that
     * contains this job.
     *
     * Generated from protobuf field <code>string location = 5;</code>
     * @param string $var
     * @return $this
     */
    public function setLocation($var)
    {
        GPBUtil::checkString($var, True);
        $this->location = $var;

        return $this;
    }

}

