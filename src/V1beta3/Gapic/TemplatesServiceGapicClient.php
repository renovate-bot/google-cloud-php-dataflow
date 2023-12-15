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
 * https://github.com/googleapis/googleapis/blob/master/google/dataflow/v1beta3/templates.proto
 * Updates to the above are reflected here through a refresh process.
 *
 * @experimental
 */

namespace Google\Cloud\Dataflow\V1beta3\Gapic;

use Google\ApiCore\ApiException;
use Google\ApiCore\CredentialsWrapper;
use Google\ApiCore\GapicClientTrait;
use Google\ApiCore\RequestParamsHeaderDescriptor;
use Google\ApiCore\RetrySettings;
use Google\ApiCore\Transport\TransportInterface;
use Google\ApiCore\ValidationException;
use Google\Auth\FetchAuthTokenInterface;
use Google\Cloud\Dataflow\V1beta3\CreateJobFromTemplateRequest;
use Google\Cloud\Dataflow\V1beta3\DynamicTemplateLaunchParams;
use Google\Cloud\Dataflow\V1beta3\GetTemplateRequest;
use Google\Cloud\Dataflow\V1beta3\GetTemplateResponse;
use Google\Cloud\Dataflow\V1beta3\Job;
use Google\Cloud\Dataflow\V1beta3\LaunchTemplateParameters;
use Google\Cloud\Dataflow\V1beta3\LaunchTemplateRequest;
use Google\Cloud\Dataflow\V1beta3\LaunchTemplateResponse;
use Google\Cloud\Dataflow\V1beta3\RuntimeEnvironment;

/**
 * Service Description: Provides a method to create Cloud Dataflow jobs from templates.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $templatesServiceClient = new TemplatesServiceClient();
 * try {
 *     $response = $templatesServiceClient->createJobFromTemplate();
 * } finally {
 *     $templatesServiceClient->close();
 * }
 * ```
 *
 * @experimental
 *
 * @deprecated Please use the new service client {@see \Google\Cloud\Dataflow\V1beta3\Client\TemplatesServiceClient}.
 */
class TemplatesServiceGapicClient
{
    use GapicClientTrait;

    /** The name of the service. */
    const SERVICE_NAME = 'google.dataflow.v1beta3.TemplatesService';

    /**
     * The default address of the service.
     *
     * @deprecated SERVICE_ADDRESS_TEMPLATE should be used instead.
     */
    const SERVICE_ADDRESS = 'dataflow.googleapis.com';

    /** The address template of the service. */
    private const SERVICE_ADDRESS_TEMPLATE = 'dataflow.UNIVERSE_DOMAIN';

    /** The default port of the service. */
    const DEFAULT_SERVICE_PORT = 443;

    /** The name of the code generator, to be included in the agent header. */
    const CODEGEN_NAME = 'gapic';

    /** The default scopes required by the service. */
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
                __DIR__ . '/../resources/templates_service_client_config.json',
            'descriptorsConfigPath' =>
                __DIR__ .
                '/../resources/templates_service_descriptor_config.php',
            'gcpApiConfigPath' =>
                __DIR__ . '/../resources/templates_service_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' =>
                        __DIR__ .
                        '/../resources/templates_service_rest_client_config.php',
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
     *           $apiEndpoint setting, will be ignored.
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
     * Creates a Cloud Dataflow job from a template.
     *
     * Sample code:
     * ```
     * $templatesServiceClient = new TemplatesServiceClient();
     * try {
     *     $response = $templatesServiceClient->createJobFromTemplate();
     * } finally {
     *     $templatesServiceClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type string $projectId
     *           Required. The ID of the Cloud Platform project that the job belongs to.
     *     @type string $jobName
     *           Required. The job name to use for the created job.
     *     @type string $gcsPath
     *           Required. A Cloud Storage path to the template from which to
     *           create the job.
     *           Must be a valid Cloud Storage URL, beginning with `gs://`.
     *     @type array $parameters
     *           The runtime parameters to pass to the job.
     *     @type RuntimeEnvironment $environment
     *           The runtime environment for the job.
     *     @type string $location
     *           The [regional endpoint]
     *           (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) to
     *           which to direct the request.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dataflow\V1beta3\Job
     *
     * @throws ApiException if the remote call fails
     *
     * @experimental
     */
    public function createJobFromTemplate(array $optionalArgs = [])
    {
        $request = new CreateJobFromTemplateRequest();
        $requestParamHeaders = [];
        if (isset($optionalArgs['projectId'])) {
            $request->setProjectId($optionalArgs['projectId']);
            $requestParamHeaders['project_id'] = $optionalArgs['projectId'];
        }

        if (isset($optionalArgs['jobName'])) {
            $request->setJobName($optionalArgs['jobName']);
        }

        if (isset($optionalArgs['gcsPath'])) {
            $request->setGcsPath($optionalArgs['gcsPath']);
        }

        if (isset($optionalArgs['parameters'])) {
            $request->setParameters($optionalArgs['parameters']);
        }

        if (isset($optionalArgs['environment'])) {
            $request->setEnvironment($optionalArgs['environment']);
        }

        if (isset($optionalArgs['location'])) {
            $request->setLocation($optionalArgs['location']);
            $requestParamHeaders['location'] = $optionalArgs['location'];
        }

        $requestParams = new RequestParamsHeaderDescriptor(
            $requestParamHeaders
        );
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();
        return $this->startCall(
            'CreateJobFromTemplate',
            Job::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Get the template associated with a template.
     *
     * Sample code:
     * ```
     * $templatesServiceClient = new TemplatesServiceClient();
     * try {
     *     $response = $templatesServiceClient->getTemplate();
     * } finally {
     *     $templatesServiceClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type string $projectId
     *           Required. The ID of the Cloud Platform project that the job belongs to.
     *     @type string $gcsPath
     *           Required. A Cloud Storage path to the template from which to
     *           create the job.
     *           Must be valid Cloud Storage URL, beginning with 'gs://'.
     *     @type int $view
     *           The view to retrieve. Defaults to METADATA_ONLY.
     *           For allowed values, use constants defined on {@see \Google\Cloud\Dataflow\V1beta3\GetTemplateRequest\TemplateView}
     *     @type string $location
     *           The [regional endpoint]
     *           (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) to
     *           which to direct the request.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dataflow\V1beta3\GetTemplateResponse
     *
     * @throws ApiException if the remote call fails
     *
     * @experimental
     */
    public function getTemplate(array $optionalArgs = [])
    {
        $request = new GetTemplateRequest();
        $requestParamHeaders = [];
        if (isset($optionalArgs['projectId'])) {
            $request->setProjectId($optionalArgs['projectId']);
            $requestParamHeaders['project_id'] = $optionalArgs['projectId'];
        }

        if (isset($optionalArgs['gcsPath'])) {
            $request->setGcsPath($optionalArgs['gcsPath']);
        }

        if (isset($optionalArgs['view'])) {
            $request->setView($optionalArgs['view']);
        }

        if (isset($optionalArgs['location'])) {
            $request->setLocation($optionalArgs['location']);
            $requestParamHeaders['location'] = $optionalArgs['location'];
        }

        $requestParams = new RequestParamsHeaderDescriptor(
            $requestParamHeaders
        );
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();
        return $this->startCall(
            'GetTemplate',
            GetTemplateResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }

    /**
     * Launch a template.
     *
     * Sample code:
     * ```
     * $templatesServiceClient = new TemplatesServiceClient();
     * try {
     *     $response = $templatesServiceClient->launchTemplate();
     * } finally {
     *     $templatesServiceClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type string $projectId
     *           Required. The ID of the Cloud Platform project that the job belongs to.
     *     @type bool $validateOnly
     *           If true, the request is validated but not actually executed.
     *           Defaults to false.
     *     @type string $gcsPath
     *           A Cloud Storage path to the template from which to create
     *           the job.
     *           Must be valid Cloud Storage URL, beginning with 'gs://'.
     *     @type DynamicTemplateLaunchParams $dynamicTemplate
     *           Params for launching a dynamic template.
     *     @type LaunchTemplateParameters $launchParameters
     *           The parameters of the template to launch. This should be part of the
     *           body of the POST request.
     *     @type string $location
     *           The [regional endpoint]
     *           (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) to
     *           which to direct the request.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dataflow\V1beta3\LaunchTemplateResponse
     *
     * @throws ApiException if the remote call fails
     *
     * @experimental
     */
    public function launchTemplate(array $optionalArgs = [])
    {
        $request = new LaunchTemplateRequest();
        $requestParamHeaders = [];
        if (isset($optionalArgs['projectId'])) {
            $request->setProjectId($optionalArgs['projectId']);
            $requestParamHeaders['project_id'] = $optionalArgs['projectId'];
        }

        if (isset($optionalArgs['validateOnly'])) {
            $request->setValidateOnly($optionalArgs['validateOnly']);
        }

        if (isset($optionalArgs['gcsPath'])) {
            $request->setGcsPath($optionalArgs['gcsPath']);
        }

        if (isset($optionalArgs['dynamicTemplate'])) {
            $request->setDynamicTemplate($optionalArgs['dynamicTemplate']);
        }

        if (isset($optionalArgs['launchParameters'])) {
            $request->setLaunchParameters($optionalArgs['launchParameters']);
        }

        if (isset($optionalArgs['location'])) {
            $request->setLocation($optionalArgs['location']);
            $requestParamHeaders['location'] = $optionalArgs['location'];
        }

        $requestParams = new RequestParamsHeaderDescriptor(
            $requestParamHeaders
        );
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();
        return $this->startCall(
            'LaunchTemplate',
            LaunchTemplateResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }
}
