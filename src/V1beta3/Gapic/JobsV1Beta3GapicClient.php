<?php
/*
 * Copyright 2021 Google LLC
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/*
 * GENERATED CODE WARNING
 * Generated by gapic-generator-php from the file
 * https://github.com/google/googleapis/blob/master/google/dataflow/v1beta3/jobs.proto
 * Updates to the above are reflected here through a refresh process.
 *
 * @experimental
 */

namespace Google\Cloud\Dataflow\V1beta3\Gapic;

use Google\ApiCore\ApiException;

use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Dataflow\V1beta3\CheckActiveJobsRequest;
use Google\Cloud\Dataflow\V1beta3\CheckActiveJobsResponse;
use Google\Cloud\Dataflow\V1beta3\CreateJobRequest;
use Google\Cloud\Dataflow\V1beta3\GetJobRequest;
use Google\Cloud\Dataflow\V1beta3\Job;
use Google\Cloud\Dataflow\V1beta3\ListJobsRequest;
use Google\Cloud\Dataflow\V1beta3\ListJobsRequest\Filter;

use Google\Cloud\Dataflow\V1beta3\ListJobsResponse;
use Google\Cloud\Dataflow\V1beta3\Snapshot;
use Google\Cloud\Dataflow\V1beta3\SnapshotJobRequest;
use Google\Cloud\Dataflow\V1beta3\UpdateJobRequest;
use Google\Protobuf\Duration;

/**
 * Service Description: Provides a method to create and modify Google Cloud Dataflow jobs.
 * A Job is a multi-stage computation graph run by the Cloud Dataflow service.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $jobsV1Beta3Client = new JobsV1Beta3Client();
 * try {
 *     // Iterate over pages of elements
 *     $pagedResponse = $jobsV1Beta3Client->aggregatedListJobs();
 *     foreach ($pagedResponse->iteratePages() as $page) {
 *         foreach ($page as $element) {
 *             // doSomethingWith($element);
 *         }
 *     }
 *     // Alternatively:
 *     // Iterate through all elements
 *     $pagedResponse = $jobsV1Beta3Client->aggregatedListJobs();
 *     foreach ($pagedResponse->iterateAllElements() as $element) {
 *         // doSomethingWith($element);
 *     }
 * } finally {
 *     $jobsV1Beta3Client->close();
 * }
 * ```
 *
 * @experimental
 */
class JobsV1Beta3GapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.dataflow.v1beta3.JobsV1Beta3';

    /**
     * The default address of the service.
     */
    const SERVICE_ADDRESS = 'dataflow.googleapis.com';

    /**
     * The default port of the service.
     */
    const DEFAULT_SERVICE_PORT = 443;

    /**
     * The name of the code generator, to be included in the agent header.
     */
    const CODEGEN_NAME = 'gapic';

    /**
     * The default scopes required by the service.
     */
    public static $serviceScopes = [
        'https://www.googleapis.com/auth/cloud-platform',
        'https://www.googleapis.com/auth/compute',
        'https://www.googleapis.com/auth/compute.readonly',
        'https://www.googleapis.com/auth/userinfo.email',
    ];

    private static function getClientDefaults()
    {
        return [
            'serviceName' => self::SERVICE_NAME,
            'apiEndpoint' =>
                self::SERVICE_ADDRESS . ':' . self::DEFAULT_SERVICE_PORT,
            'clientConfig' =>
                __DIR__ . '/../resources/jobs_v1_beta3_client_config.json',
            'descriptorsConfigPath' =>
                __DIR__ . '/../resources/jobs_v1_beta3_descriptor_config.php',
            'gcpApiConfigPath' =>
                __DIR__ . '/../resources/jobs_v1_beta3_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' =>
                        __DIR__ .
                        '/../resources/jobs_v1_beta3_rest_client_config.php',
                ],
            ],
        ];
    }

    /**
     * Constructor.
     *
     * @param array $options {
     *     Optional. Options for configuring the service API wrapper.
     *
     *     @type string $serviceAddress
     *           **Deprecated**. This option will be removed in a future major release. Please
     *           utilize the `$apiEndpoint` option instead.
     *     @type string $apiEndpoint
     *           The address of the API remote host. May optionally include the port, formatted
     *           as "<uri>:<port>". Default 'dataflow.googleapis.com:443'.
     *     @type string|array|FetchAuthTokenInterface|CredentialsWrapper $credentials
     *           The credentials to be used by the client to authorize API calls. This option
     *           accepts either a path to a credentials file, or a decoded credentials file as a
     *           PHP array.
     *           *Advanced usage*: In addition, this option can also accept a pre-constructed
     *           {@see \Google\Auth\FetchAuthTokenInterface} object or
     *           {@see \Google\ApiCore\CredentialsWrapper} object. Note that when one of these
     *           objects are provided, any settings in $credentialsConfig will be ignored.
     *     @type array $credentialsConfig
     *           Options used to configure credentials, including auth token caching, for the
     *           client. For a full list of supporting configuration options, see
     *           {@see \Google\ApiCore\CredentialsWrapper::build()} .
     *     @type bool $disableRetries
     *           Determines whether or not retries defined by the client configuration should be
     *           disabled. Defaults to `false`.
     *     @type string|array $clientConfig
     *           Client method configuration, including retry settings. This option can be either
     *           a path to a JSON file, or a PHP array containing the decoded JSON data. By
     *           default this settings points to the default client config file, which is
     *           provided in the resources folder.
     *     @type string|TransportInterface $transport
     *           The transport used for executing network requests. May be either the string
     *           `rest` or `grpc`. Defaults to `grpc` if gRPC support is detected on the system.
     *           *Advanced usage*: Additionally, it is possible to pass in an already
     *           instantiated {@see \Google\ApiCore\Transport\TransportInterface} object. Note
     *           that when this object is provided, any settings in $transportConfig, and any
     *           $serviceAddress setting, will be ignored.
     *     @type array $transportConfig
     *           Configuration options that will be used to construct the transport. Options for
     *           each supported transport type should be passed in a key for that transport. For
     *           example:
     *           $transportConfig = [
     *               'grpc' => [...],
     *               'rest' => [...],
     *           ];
     *           See the {@see \Google\ApiCore\Transport\GrpcTransport::build()} and
     *           {@see \Google\ApiCore\Transport\RestTransport::build()} methods for the
     *           supported options.
     *     @type callable $clientCertSource
     *           A callable which returns the client cert as a string. This can be used to
     *           provide a certificate and private key to the transport layer for mTLS.
     * }
     *
     * @throws ValidationException
     *
     * @experimental
     */
    public function __construct(array $options = [])
    {
        $clientOptions = $this->buildClientOptions($options);
        $this->setClientOptions($clientOptions);
    }

    /**
     * List the jobs of a project across all regions.
     *
     * Sample code:
     * ```
     * $jobsV1Beta3Client = new JobsV1Beta3Client();
     * try {
     *     // Iterate over pages of elements
     *     $pagedResponse = $jobsV1Beta3Client->aggregatedListJobs();
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *     // Alternatively:
     *     // Iterate through all elements
     *     $pagedResponse = $jobsV1Beta3Client->aggregatedListJobs();
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $jobsV1Beta3Client->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type int $filter
     *           The kind of filter to use.
     *           For allowed values, use constants defined on {@see \Google\Cloud\Dataflow\V1beta3\ListJobsRequest\Filter}
     *     @type string $projectId
     *           The project which owns the jobs.
     *     @type int $view
     *           Deprecated. ListJobs always returns summaries now.
     *           Use GetJob for other JobViews.
     *           For allowed values, use constants defined on {@see \Google\Cloud\Dataflow\V1beta3\JobView}
     *     @type int $pageSize
     *           The maximum number of resources contained in the underlying API
     *           response. The API may return fewer values in a page, even if
     *           there are additional values to be retrieved.
     *     @type string $pageToken
     *           A page token is used to specify a page of values to be returned.
     *           If no page token is specified (the default), the first page
     *           of values will be returned. Any page token used here must have
     *           been generated by a previous call to the API.
     *     @type string $location
     *           The [regional endpoint]
     *           (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) that
     *           contains this job.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a
     *           {@see Google\ApiCore\RetrySettings} object, or an associative array of retry
     *           settings parameters. See the documentation on
     *           {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     *
     * @experimental
     */
    public function aggregatedListJobs(array $optionalArgs = [])
    {
        $request = new ListJobsRequest();
        if (isset($optionalArgs['filter'])) {
            $request->setFilter($optionalArgs['filter']);
        }

        if (isset($optionalArgs['projectId'])) {
            $request->setProjectId($optionalArgs['projectId']);
        }

        if (isset($optionalArgs['view'])) {
            $request->setView($optionalArgs['view']);
        }

        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }

        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }

        if (isset($optionalArgs['location'])) {
            $request->setLocation($optionalArgs['location']);
        }

        return $this->getPagedListResponse(
            'AggregatedListJobs',
            $optionalArgs,
            ListJobsResponse::class,
            $request
        );
    }

    /**
     * Check for existence of active jobs in the given project across all regions.
     *
     * Sample code:
     * ```
     * $jobsV1Beta3Client = new JobsV1Beta3Client();
     * try {
     *     $response = $jobsV1Beta3Client->checkActiveJobs();
     * } finally {
     *     $jobsV1Beta3Client->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type string $projectId
     *           The project which owns the jobs.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a
     *           {@see Google\ApiCore\RetrySettings} object, or an associative array of retry
     *           settings parameters. See the documentation on
     *           {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dataflow\V1beta3\CheckActiveJobsResponse
     *
     * @throws ApiException if the remote call fails
     *
     * @experimental
     */
    public function checkActiveJobs(array $optionalArgs = [])
    {
        $request = new CheckActiveJobsRequest();
        if (isset($optionalArgs['projectId'])) {
            $request->setProjectId($optionalArgs['projectId']);
        }

        return $this->startCall(
            'CheckActiveJobs',
            CheckActiveJobsResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Creates a Cloud Dataflow job.
     *
     * To create a job, we recommend using `projects.locations.jobs.create` with a
     * [regional endpoint]
     * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints). Using
     * `projects.jobs.create` is not recommended, as your job will always start
     * in `us-central1`.
     *
     * Sample code:
     * ```
     * $jobsV1Beta3Client = new JobsV1Beta3Client();
     * try {
     *     $response = $jobsV1Beta3Client->createJob();
     * } finally {
     *     $jobsV1Beta3Client->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type string $projectId
     *           The ID of the Cloud Platform project that the job belongs to.
     *     @type Job $job
     *           The job to create.
     *     @type int $view
     *           The level of information requested in response.
     *           For allowed values, use constants defined on {@see \Google\Cloud\Dataflow\V1beta3\JobView}
     *     @type string $replaceJobId
     *           Deprecated. This field is now in the Job message.
     *     @type string $location
     *           The [regional endpoint]
     *           (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) that
     *           contains this job.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a
     *           {@see Google\ApiCore\RetrySettings} object, or an associative array of retry
     *           settings parameters. See the documentation on
     *           {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dataflow\V1beta3\Job
     *
     * @throws ApiException if the remote call fails
     *
     * @experimental
     */
    public function createJob(array $optionalArgs = [])
    {
        $request = new CreateJobRequest();
        if (isset($optionalArgs['projectId'])) {
            $request->setProjectId($optionalArgs['projectId']);
        }

        if (isset($optionalArgs['job'])) {
            $request->setJob($optionalArgs['job']);
        }

        if (isset($optionalArgs['view'])) {
            $request->setView($optionalArgs['view']);
        }

        if (isset($optionalArgs['replaceJobId'])) {
            $request->setReplaceJobId($optionalArgs['replaceJobId']);
        }

        if (isset($optionalArgs['location'])) {
            $request->setLocation($optionalArgs['location']);
        }

        return $this->startCall(
            'CreateJob',
            Job::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Gets the state of the specified Cloud Dataflow job.
     *
     * To get the state of a job, we recommend using `projects.locations.jobs.get`
     * with a [regional endpoint]
     * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints). Using
     * `projects.jobs.get` is not recommended, as you can only get the state of
     * jobs that are running in `us-central1`.
     *
     * Sample code:
     * ```
     * $jobsV1Beta3Client = new JobsV1Beta3Client();
     * try {
     *     $response = $jobsV1Beta3Client->getJob();
     * } finally {
     *     $jobsV1Beta3Client->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type string $projectId
     *           The ID of the Cloud Platform project that the job belongs to.
     *     @type string $jobId
     *           The job ID.
     *     @type int $view
     *           The level of information requested in response.
     *           For allowed values, use constants defined on {@see \Google\Cloud\Dataflow\V1beta3\JobView}
     *     @type string $location
     *           The [regional endpoint]
     *           (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) that
     *           contains this job.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a
     *           {@see Google\ApiCore\RetrySettings} object, or an associative array of retry
     *           settings parameters. See the documentation on
     *           {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dataflow\V1beta3\Job
     *
     * @throws ApiException if the remote call fails
     *
     * @experimental
     */
    public function getJob(array $optionalArgs = [])
    {
        $request = new GetJobRequest();
        if (isset($optionalArgs['projectId'])) {
            $request->setProjectId($optionalArgs['projectId']);
        }

        if (isset($optionalArgs['jobId'])) {
            $request->setJobId($optionalArgs['jobId']);
        }

        if (isset($optionalArgs['view'])) {
            $request->setView($optionalArgs['view']);
        }

        if (isset($optionalArgs['location'])) {
            $request->setLocation($optionalArgs['location']);
        }

        return $this->startCall(
            'GetJob',
            Job::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * List the jobs of a project.
     *
     * To list the jobs of a project in a region, we recommend using
     * `projects.locations.jobs.list` with a [regional endpoint]
     * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints). To
     * list the all jobs across all regions, use `projects.jobs.aggregated`. Using
     * `projects.jobs.list` is not recommended, as you can only get the list of
     * jobs that are running in `us-central1`.
     *
     * Sample code:
     * ```
     * $jobsV1Beta3Client = new JobsV1Beta3Client();
     * try {
     *     // Iterate over pages of elements
     *     $pagedResponse = $jobsV1Beta3Client->listJobs();
     *     foreach ($pagedResponse->iteratePages() as $page) {
     *         foreach ($page as $element) {
     *             // doSomethingWith($element);
     *         }
     *     }
     *     // Alternatively:
     *     // Iterate through all elements
     *     $pagedResponse = $jobsV1Beta3Client->listJobs();
     *     foreach ($pagedResponse->iterateAllElements() as $element) {
     *         // doSomethingWith($element);
     *     }
     * } finally {
     *     $jobsV1Beta3Client->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type int $filter
     *           The kind of filter to use.
     *           For allowed values, use constants defined on {@see \Google\Cloud\Dataflow\V1beta3\ListJobsRequest\Filter}
     *     @type string $projectId
     *           The project which owns the jobs.
     *     @type int $view
     *           Deprecated. ListJobs always returns summaries now.
     *           Use GetJob for other JobViews.
     *           For allowed values, use constants defined on {@see \Google\Cloud\Dataflow\V1beta3\JobView}
     *     @type int $pageSize
     *           The maximum number of resources contained in the underlying API
     *           response. The API may return fewer values in a page, even if
     *           there are additional values to be retrieved.
     *     @type string $pageToken
     *           A page token is used to specify a page of values to be returned.
     *           If no page token is specified (the default), the first page
     *           of values will be returned. Any page token used here must have
     *           been generated by a previous call to the API.
     *     @type string $location
     *           The [regional endpoint]
     *           (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) that
     *           contains this job.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a
     *           {@see Google\ApiCore\RetrySettings} object, or an associative array of retry
     *           settings parameters. See the documentation on
     *           {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\ApiCore\PagedListResponse
     *
     * @throws ApiException if the remote call fails
     *
     * @experimental
     */
    public function listJobs(array $optionalArgs = [])
    {
        $request = new ListJobsRequest();
        if (isset($optionalArgs['filter'])) {
            $request->setFilter($optionalArgs['filter']);
        }

        if (isset($optionalArgs['projectId'])) {
            $request->setProjectId($optionalArgs['projectId']);
        }

        if (isset($optionalArgs['view'])) {
            $request->setView($optionalArgs['view']);
        }

        if (isset($optionalArgs['pageSize'])) {
            $request->setPageSize($optionalArgs['pageSize']);
        }

        if (isset($optionalArgs['pageToken'])) {
            $request->setPageToken($optionalArgs['pageToken']);
        }

        if (isset($optionalArgs['location'])) {
            $request->setLocation($optionalArgs['location']);
        }

        return $this->getPagedListResponse(
            'ListJobs',
            $optionalArgs,
            ListJobsResponse::class,
            $request
        );
    }

    /**
     * Snapshot the state of a streaming job.
     *
     * Sample code:
     * ```
     * $jobsV1Beta3Client = new JobsV1Beta3Client();
     * try {
     *     $response = $jobsV1Beta3Client->snapshotJob();
     * } finally {
     *     $jobsV1Beta3Client->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type string $projectId
     *           The project which owns the job to be snapshotted.
     *     @type string $jobId
     *           The job to be snapshotted.
     *     @type Duration $ttl
     *           TTL for the snapshot.
     *     @type string $location
     *           The location that contains this job.
     *     @type bool $snapshotSources
     *           If true, perform snapshots for sources which support this.
     *     @type string $description
     *           User specified description of the snapshot. Maybe empty.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a
     *           {@see Google\ApiCore\RetrySettings} object, or an associative array of retry
     *           settings parameters. See the documentation on
     *           {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dataflow\V1beta3\Snapshot
     *
     * @throws ApiException if the remote call fails
     *
     * @experimental
     */
    public function snapshotJob(array $optionalArgs = [])
    {
        $request = new SnapshotJobRequest();
        if (isset($optionalArgs['projectId'])) {
            $request->setProjectId($optionalArgs['projectId']);
        }

        if (isset($optionalArgs['jobId'])) {
            $request->setJobId($optionalArgs['jobId']);
        }

        if (isset($optionalArgs['ttl'])) {
            $request->setTtl($optionalArgs['ttl']);
        }

        if (isset($optionalArgs['location'])) {
            $request->setLocation($optionalArgs['location']);
        }

        if (isset($optionalArgs['snapshotSources'])) {
            $request->setSnapshotSources($optionalArgs['snapshotSources']);
        }

        if (isset($optionalArgs['description'])) {
            $request->setDescription($optionalArgs['description']);
        }

        return $this->startCall(
            'SnapshotJob',
            Snapshot::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Updates the state of an existing Cloud Dataflow job.
     *
     * To update the state of an existing job, we recommend using
     * `projects.locations.jobs.update` with a [regional endpoint]
     * (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints). Using
     * `projects.jobs.update` is not recommended, as you can only update the state
     * of jobs that are running in `us-central1`.
     *
     * Sample code:
     * ```
     * $jobsV1Beta3Client = new JobsV1Beta3Client();
     * try {
     *     $response = $jobsV1Beta3Client->updateJob();
     * } finally {
     *     $jobsV1Beta3Client->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type string $projectId
     *           The ID of the Cloud Platform project that the job belongs to.
     *     @type string $jobId
     *           The job ID.
     *     @type Job $job
     *           The updated job.
     *           Only the job state is updatable; other fields will be ignored.
     *     @type string $location
     *           The [regional endpoint]
     *           (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) that
     *           contains this job.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a
     *           {@see Google\ApiCore\RetrySettings} object, or an associative array of retry
     *           settings parameters. See the documentation on
     *           {@see Google\ApiCore\RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dataflow\V1beta3\Job
     *
     * @throws ApiException if the remote call fails
     *
     * @experimental
     */
    public function updateJob(array $optionalArgs = [])
    {
        $request = new UpdateJobRequest();
        if (isset($optionalArgs['projectId'])) {
            $request->setProjectId($optionalArgs['projectId']);
        }

        if (isset($optionalArgs['jobId'])) {
            $request->setJobId($optionalArgs['jobId']);
        }

        if (isset($optionalArgs['job'])) {
            $request->setJob($optionalArgs['job']);
        }

        if (isset($optionalArgs['location'])) {
            $request->setLocation($optionalArgs['location']);
        }

        return $this->startCall(
            'UpdateJob',
            Job::class,
            $optionalArgs,
            $request
        )->wait();
    }
}
