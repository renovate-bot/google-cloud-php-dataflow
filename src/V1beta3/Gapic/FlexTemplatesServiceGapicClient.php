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
use Google\Cloud\Dataflow\V1beta3\LaunchFlexTemplateParameter;
use Google\Cloud\Dataflow\V1beta3\LaunchFlexTemplateRequest;
use Google\Cloud\Dataflow\V1beta3\LaunchFlexTemplateResponse;

/**
 * Service Description: Provides a service for Flex templates. This feature is not ready yet.
 *
 * This class provides the ability to make remote calls to the backing service through method
 * calls that map to API methods. Sample code to get started:
 *
 * ```
 * $flexTemplatesServiceClient = new FlexTemplatesServiceClient();
 * try {
 *     $response = $flexTemplatesServiceClient->launchFlexTemplate();
 * } finally {
 *     $flexTemplatesServiceClient->close();
 * }
 * ```
 *
 * @experimental
 */
class FlexTemplatesServiceGapicClient
{
    use GapicClientTrait;

    /**
     * The name of the service.
     */
    const SERVICE_NAME = 'google.dataflow.v1beta3.FlexTemplatesService';

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
                __DIR__ .
                '/../resources/flex_templates_service_client_config.json',
            'descriptorsConfigPath' =>
                __DIR__ .
                '/../resources/flex_templates_service_descriptor_config.php',
            'gcpApiConfigPath' =>
                __DIR__ .
                '/../resources/flex_templates_service_grpc_config.json',
            'credentialsConfig' => [
                'defaultScopes' => self::$serviceScopes,
            ],
            'transportConfig' => [
                'rest' => [
                    'restClientConfigPath' =>
                        __DIR__ .
                        '/../resources/flex_templates_service_rest_client_config.php',
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
     * Launch a job with a FlexTemplate.
     *
     * Sample code:
     * ```
     * $flexTemplatesServiceClient = new FlexTemplatesServiceClient();
     * try {
     *     $response = $flexTemplatesServiceClient->launchFlexTemplate();
     * } finally {
     *     $flexTemplatesServiceClient->close();
     * }
     * ```
     *
     * @param array $optionalArgs {
     *     Optional.
     *
     *     @type string $projectId
     *           Required. The ID of the Cloud Platform project that the job belongs to.
     *     @type LaunchFlexTemplateParameter $launchParameter
     *           Required. Parameter to launch a job form Flex Template.
     *     @type string $location
     *           Required. The [regional endpoint]
     *           (https://cloud.google.com/dataflow/docs/concepts/regional-endpoints) to
     *           which to direct the request. E.g., us-central1, us-west1.
     *     @type bool $validateOnly
     *           If true, the request is validated but not actually executed.
     *           Defaults to false.
     *     @type RetrySettings|array $retrySettings
     *           Retry settings to use for this call. Can be a {@see RetrySettings} object, or an
     *           associative array of retry settings parameters. See the documentation on
     *           {@see RetrySettings} for example usage.
     * }
     *
     * @return \Google\Cloud\Dataflow\V1beta3\LaunchFlexTemplateResponse
     *
     * @throws ApiException if the remote call fails
     *
     * @experimental
     */
    public function launchFlexTemplate(array $optionalArgs = [])
    {
        $request = new LaunchFlexTemplateRequest();
        $requestParamHeaders = [];
        if (isset($optionalArgs['projectId'])) {
            $request->setProjectId($optionalArgs['projectId']);
            $requestParamHeaders['project_id'] = $optionalArgs['projectId'];
        }

        if (isset($optionalArgs['launchParameter'])) {
            $request->setLaunchParameter($optionalArgs['launchParameter']);
        }

        if (isset($optionalArgs['location'])) {
            $request->setLocation($optionalArgs['location']);
            $requestParamHeaders['location'] = $optionalArgs['location'];
        }

        if (isset($optionalArgs['validateOnly'])) {
            $request->setValidateOnly($optionalArgs['validateOnly']);
        }

        $requestParams = new RequestParamsHeaderDescriptor(
            $requestParamHeaders
        );
        $optionalArgs['headers'] = isset($optionalArgs['headers'])
            ? array_merge($requestParams->getHeader(), $optionalArgs['headers'])
            : $requestParams->getHeader();
        return $this->startCall(
            'LaunchFlexTemplate',
            LaunchFlexTemplateResponse::class,
            $optionalArgs,
            $request
        )->wait();
    }
}
