<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/dataflow/v1beta3/environment.proto

namespace Google\Cloud\Dataflow\V1beta3;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Defines an SDK harness container for executing Dataflow pipelines.
 *
 * Generated from protobuf message <code>google.dataflow.v1beta3.SdkHarnessContainerImage</code>
 */
class SdkHarnessContainerImage extends \Google\Protobuf\Internal\Message
{
    /**
     * A docker container image that resides in Google Container Registry.
     *
     * Generated from protobuf field <code>string container_image = 1;</code>
     */
    protected $container_image = '';
    /**
     * If true, recommends the Dataflow service to use only one core per SDK
     * container instance with this image. If false (or unset) recommends using
     * more than one core per SDK container instance with this image for
     * efficiency. Note that Dataflow service may choose to override this property
     * if needed.
     *
     * Generated from protobuf field <code>bool use_single_core_per_container = 2;</code>
     */
    protected $use_single_core_per_container = false;
    /**
     * Environment ID for the Beam runner API proto Environment that corresponds
     * to the current SDK Harness.
     *
     * Generated from protobuf field <code>string environment_id = 3;</code>
     */
    protected $environment_id = '';
    /**
     * The set of capabilities enumerated in the above Environment proto. See also
     * [beam_runner_api.proto](https://github.com/apache/beam/blob/master/model/pipeline/src/main/proto/org/apache/beam/model/pipeline/v1/beam_runner_api.proto)
     *
     * Generated from protobuf field <code>repeated string capabilities = 4;</code>
     */
    private $capabilities;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $container_image
     *           A docker container image that resides in Google Container Registry.
     *     @type bool $use_single_core_per_container
     *           If true, recommends the Dataflow service to use only one core per SDK
     *           container instance with this image. If false (or unset) recommends using
     *           more than one core per SDK container instance with this image for
     *           efficiency. Note that Dataflow service may choose to override this property
     *           if needed.
     *     @type string $environment_id
     *           Environment ID for the Beam runner API proto Environment that corresponds
     *           to the current SDK Harness.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $capabilities
     *           The set of capabilities enumerated in the above Environment proto. See also
     *           [beam_runner_api.proto](https://github.com/apache/beam/blob/master/model/pipeline/src/main/proto/org/apache/beam/model/pipeline/v1/beam_runner_api.proto)
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Dataflow\V1Beta3\Environment::initOnce();
        parent::__construct($data);
    }

    /**
     * A docker container image that resides in Google Container Registry.
     *
     * Generated from protobuf field <code>string container_image = 1;</code>
     * @return string
     */
    public function getContainerImage()
    {
        return $this->container_image;
    }

    /**
     * A docker container image that resides in Google Container Registry.
     *
     * Generated from protobuf field <code>string container_image = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setContainerImage($var)
    {
        GPBUtil::checkString($var, True);
        $this->container_image = $var;

        return $this;
    }

    /**
     * If true, recommends the Dataflow service to use only one core per SDK
     * container instance with this image. If false (or unset) recommends using
     * more than one core per SDK container instance with this image for
     * efficiency. Note that Dataflow service may choose to override this property
     * if needed.
     *
     * Generated from protobuf field <code>bool use_single_core_per_container = 2;</code>
     * @return bool
     */
    public function getUseSingleCorePerContainer()
    {
        return $this->use_single_core_per_container;
    }

    /**
     * If true, recommends the Dataflow service to use only one core per SDK
     * container instance with this image. If false (or unset) recommends using
     * more than one core per SDK container instance with this image for
     * efficiency. Note that Dataflow service may choose to override this property
     * if needed.
     *
     * Generated from protobuf field <code>bool use_single_core_per_container = 2;</code>
     * @param bool $var
     * @return $this
     */
    public function setUseSingleCorePerContainer($var)
    {
        GPBUtil::checkBool($var);
        $this->use_single_core_per_container = $var;

        return $this;
    }

    /**
     * Environment ID for the Beam runner API proto Environment that corresponds
     * to the current SDK Harness.
     *
     * Generated from protobuf field <code>string environment_id = 3;</code>
     * @return string
     */
    public function getEnvironmentId()
    {
        return $this->environment_id;
    }

    /**
     * Environment ID for the Beam runner API proto Environment that corresponds
     * to the current SDK Harness.
     *
     * Generated from protobuf field <code>string environment_id = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setEnvironmentId($var)
    {
        GPBUtil::checkString($var, True);
        $this->environment_id = $var;

        return $this;
    }

    /**
     * The set of capabilities enumerated in the above Environment proto. See also
     * [beam_runner_api.proto](https://github.com/apache/beam/blob/master/model/pipeline/src/main/proto/org/apache/beam/model/pipeline/v1/beam_runner_api.proto)
     *
     * Generated from protobuf field <code>repeated string capabilities = 4;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getCapabilities()
    {
        return $this->capabilities;
    }

    /**
     * The set of capabilities enumerated in the above Environment proto. See also
     * [beam_runner_api.proto](https://github.com/apache/beam/blob/master/model/pipeline/src/main/proto/org/apache/beam/model/pipeline/v1/beam_runner_api.proto)
     *
     * Generated from protobuf field <code>repeated string capabilities = 4;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setCapabilities($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->capabilities = $arr;

        return $this;
    }

}

