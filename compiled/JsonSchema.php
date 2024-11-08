<?php
namespace API\Validator\V10\Schema;

use JsonSchema;

final class JsonSchema
{

    private static $schema = [
  "\$schema" => "http://json-schema.org/draft-04/schema#",
    "type" => "object",
    "properties" => [
        "about" => [
            "id" => "#about",
            "type" => "object",
            "required" => [
                "version"
            ],
            "additionalProperties" => false,
            "properties" => [
                "version" => [
                    "type" => "string",
                    "allOf" => [
                        []
                    ]
                ],
                "extensions" => [
                  "\$ref" => "#extensions"
                ]
            ]
        ],
        "account" => [
            "id" => "#account",
            "type" => "object",
            "required" => [
                "account"
            ],
            "properties" => [
                "account" => [
                    "id" => "#account!core",
                    "type" => "object",
                    "additionalProperties" => false,
                    "required" => [
                        "homePage",
                        "name"
                    ],
                    "properties" => [
                        "homePage" => [
                            "type" => "string",
                            "allOf" => [
                                []
                            ]
                        ],
                        "name" => [
                            "type" => "string"
                        ]
                    ]
                ],
                "mbox" => [
                    "type" => "null"
                ],
                "mbox_sha1sum" => [
                    "type" => "null"
                ],
                "openid" => [
                    "type" => "null"
                ]
            ]
        ],
        "activity" => [
            "id" => "#activity",
            "type" => "object",
            "required" => [
                "id"
            ],
            "additionalProperties" => false,
            "properties" => [
                "objectType" => [
                    "enum" => [
                        "Activity"
                    ]
                ],
                "id" => [
                  "\$ref" => "#activityid!core"
                ],
                "definition" => [
                  "\$ref" => "#activity_definition"
                ]
            ]
        ],
        "activity_definition" => [
            "id" => "#activity_definition",
            "type" => "object",
            "oneOf" => [
                [
                    "properties" => [
                        "interactionType" => [
                            "type" => "null"
                        ],
                        "correctResponsesPattern" => [
                            "type" => "null"
                        ],
                        "choices" => [
                            "type" => "null"
                        ],
                        "scale" => [
                            "type" => "null"
                        ],
                        "source" => [
                            "type" => "null"
                        ],
                        "target" => [
                            "type" => "null"
                        ],
                        "steps" => [
                            "type" => "null"
                        ]
                    ]
                ],
                [
                  "\$ref" => "#interactionactivity"
                ]
            ],
            "additionalProperties" => false,
            "properties" => [
                "name" => [
                  "\$ref" => "#languagemap"
                ],
                "description" => [
                  "\$ref" => "#languagemap"
                ],
                "type" => [
                    "type" => "string",
                    "allOf" => [
                        []
                    ]
                ],
                "moreInfo" => [
                    "type" => "string",
                    "allOf" => [
                        []
                    ]
                ],
                "interactionType" => [],
                "correctResponsesPattern" => [],
                "choices" => [],
                "scale" => [],
                "source" => [],
                "target" => [],
                "steps" => [],
                "extensions" => [
                  "\$ref" => "#extensions"
                ]
            ]
        ],
        "activity_list_or_obj" => [
            "id" => "#activity_list_or_obj",
            "oneOf" => [
                [
                    "type" => "array",
                    "items" => [
                      "\$ref" => "#activity"
                    ]
                ],
                [
                  "\$ref" => "#activity"
                ]
            ]
        ],
        "activityid" => [
            "id" => "#activityid",
            "type" => "object",
            "required" => [
                "activityId"
            ],
            "properties" => [
                "activityId" => [
                    "id" => "#activityid!core",
                    "type" => "string",
                    "allOf" => [
                        []
                    ]
                ]
            ]
        ],
        "agent" => [
            "id" => "#agent",
            "allOf" => [
                [
                  "\$ref" => "#inversefunctional"
                ]
            ],
            "properties" => [
                "name" => [
                    "type" => "string"
                ],
                "objectType" => [
                    "enum" => [
                        "Agent"
                    ]
                ],
                "mbox" => [],
                "mbox_sha1sum" => [],
                "account" => [],
                "openid" => []
            ],
            "additionalProperties" => false
        ],
        "anonymousgroup" => [
            "id" => "#anonymousgroup",
            "allOf" => [
                [
                  "\$ref" => "#group_base"
                ]
            ],
            "required" => [
                "member"
            ],
            "properties" => [
                "member" => [],
                "name" => [],
                "objectType" => []
            ],
            "additionalProperties" => false
        ],
        "attachment" => [
            "id" => "#attachment",
            "type" => "object",
            "additionalProperties" => false,
            "required" => [
                "usageType",
                "display",
                "contentType",
                "length",
                "sha2"
            ],
            "properties" => [
                "usageType" => [
                    "type" => "string",
                    "allOf" => [
                        []
                    ]
                ],
                "display" => [
                  "\$ref" => "#languagemap"
                ],
                "description" => [
                  "\$ref" => "#languagemap"
                ],
                "contentType" => [
                    "type" => "string",
                    "allOf" => [
                        []
                    ]
                ],
                "length" => [
                    "type" => "number",
                    "minimum" => 0
                ],
                "sha2" => [
                    "type" => "string",
                    "allOf" => [
                        []
                    ]
                ],
                "fileUrl" => [
                    "type" => "string",
                    "allOf" => [
                        []
                    ]
                ]
            ]
        ],
        "context" => [
            "id" => "#context",
            "type" => "object",
            "additionalProperties" => false,
            "properties" => [
                "registration" => [
                    "type" => "string",
                    "allOf" => [
                        []
                    ]
                ],
                "instructor" => [
                    "oneOf" => [
                        [
                          "\$ref" => "#agent"
                        ],
                        [
                          "\$ref" => "#group"
                        ]
                    ]
                ],
                "team" => [
                    "allOf" => [
                        [
                          "\$ref" => "#group"
                        ]
                    ]
                ],
                "contextActivities" => [
                  "\$ref" => "#contextactivities"
                ],
                "revision" => [
                    "type" => "string"
                ],
                "platform" => [
                    "type" => "string"
                ],
                "language" => [
                    "type" => "string",
                    "allOf" => [
                        []
                    ]
                ],
                "statement" => [
                  "\$ref" => "#statementref"
                ],
                "extensions" => [
                  "\$ref" => "#extensions"
                ]
            ]
        ],
        "contextactivities" => [
            "id" => "#contextactivities",
            "type" => "object",
            "additionalProperties" => false,
            "properties" => [
                "parent" => [
                  "\$ref" => "#activity_list_or_obj"
                ],
                "grouping" => [
                  "\$ref" => "#activity_list_or_obj"
                ],
                "category" => [
                  "\$ref" => "#activity_list_or_obj"
                ],
                "other" => [
                  "\$ref" => "#activity_list_or_obj"
                ]
            ]
        ],
        "extensions" => [
            "id" => "#extensions",
            "patternProperties" => [
                "^(?:[A-Za-z](?:[-A-Za-z0-9\\+\\.])*:(?:\\/\\/(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:])*@)?(?:\\[(?:(?:(?:[0-9A-Fa-f][1,4]:)[6](?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|::(?:[0-9A-Fa-f][1,4]:)[5](?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|(?:[0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:)[4](?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|(?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:)[3](?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|(?:(?:[0-9A-Fa-f][1,4]:)[0,2][0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:)[2](?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|(?:(?:[0-9A-Fa-f][1,4]:)[0,3][0-9A-Fa-f][1,4])?::[0-9A-Fa-f][1,4]:(?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|(?:(?:[0-9A-Fa-f][1,4]:)[0,4][0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|(?:(?:[0-9A-Fa-f][1,4]:)[0,5][0-9A-Fa-f][1,4])?::[0-9A-Fa-f][1,4]|(?:(?:[0-9A-Fa-f][1,4]:)[0,6][0-9A-Fa-f][1,4])?::)|v[0-9A-Fa-f]+[-A-Za-z0-9\\._~!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:]+)\\]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3]|(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=@])*)(?::[0-9]*)?(?:\\/(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@]))*)*|\\/(?:(?:(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@]))+)(?:\\/(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@]))*)*)?|(?:(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@]))+)(?:\\/(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@]))*)*|(?!(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@])))(?:\\?(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@])|[\\uE000-\\uF8FF\\uDC00\\uDB80-\\uDFFD\\uDBBF|\\uDC00\\uDBC0-\\uDFFD\\uDBFF\\/\\?])*)?(?:\\#(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@])|[\\/\\?])*)?)$" => []
            ],
            "additionalProperties" => false
        ],
        "group" => [
            "id" => "#group",
            "oneOf" => [
                [
                  "\$ref" => "#anonymousgroup"
                ],
                [
                  "\$ref" => "#identifiedgroup"
                ]
            ]
        ],
        "group_base" => [
            "id" => "#group_base",
            "type" => "object",
            "required" => [
                "objectType"
            ],
            "properties" => [
                "name" => [
                    "type" => "string"
                ],
                "objectType" => [
                    "enum" => [
                        "Group"
                    ]
                ],
                "member" => [
                    "type" => "array",
                    "items" => [
                      "\$ref" => "#agent"
                    ]
                ]
            ]
        ],
        "identifiedgroup" => [
            "id" => "#identifiedgroup",
            "allOf" => [
                [
                  "\$ref" => "#inversefunctional"
                ],
                [
                  "\$ref" => "#group_base"
                ]
            ],
            "properties" => [
                "name" => [],
                "objectType" => [],
                "member" => [],
                "mbox" => [],
                "mbox_sha1sum" => [],
                "account" => [],
                "openid" => []
            ],
            "additionalProperties" => false
        ],
        "interactionactivity" => [
            "id" => "#interactionactivity",
            "type" => "object",
            "oneOf" => [
                [
                  "\$ref" => "#interactionactivity_choices"
                ],
                [
                  "\$ref" => "#interactionactivity_scale"
                ],
                [
                  "\$ref" => "#interactionactivity_sourcetarget"
                ],
                [
                  "\$ref" => "#interactionactivity_steps"
                ],
                [
                  "\$ref" => "#interactionactivity_none"
                ]
            ]
        ],
        "interactionactivity_base" => [
            "id" => "#interactionactivity_base",
            "type" => "object",
            "properties" => [
                "correctResponsesPattern" => [
                    "type" => "array",
                    "items" => [
                        "type" => "string"
                    ]
                ]
            ]
        ],
        "interactionactivity_choices" => [
            "id" => "#interactionactivity_choices",
            "type" => "object",
            "allOf" => [
                [
                  "\$ref" => "#interactionactivity_base"
                ]
            ],
            "required" => [
                "choices",
                "interactionType"
            ],
            "properties" => [
                "choices" => [
                  "\$ref" => "#interactioncomponent_list"
                ],
                "scale" => [
                    "type" => "null"
                ],
                "source" => [
                    "type" => "null"
                ],
                "target" => [
                    "type" => "null"
                ],
                "steps" => [
                    "type" => "null"
                ],
                "interactionType" => [
                    "enum" => [
                        "choice",
                        "sequencing"
                    ]
                ]
            ]
        ],
        "interactionactivity_none" => [
            "id" => "#interactionactivity_none",
            "type" => "object",
            "required" => [
                "interactionType"
            ],
            "allOf" => [
                [
                  "\$ref" => "#interactionactivity_base"
                ],
                [
                    "oneOf" => [
                        [
                            "properties" => [
                                "interactionType" => [
                                    "enum" => [
                                        "true-false"
                                    ]
                                ],
                                "correctResponsesPattern" => [
                                    "type" => "array",
                                    "items" => [
                                        "enum" => [
                                            "true",
                                            "false"
                                        ]
                                    ]
                                ]
                            ]
                        ],
                        [
                            "not" => [
                                "properties" => [
                                    "interactionType" => [
                                        "enum" => [
                                            "true-false"
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            "properties" => [
                "choices" => [
                    "type" => "null"
                ],
                "scale" => [
                    "type" => "null"
                ],
                "source" => [
                    "type" => "null"
                ],
                "target" => [
                    "type" => "null"
                ],
                "steps" => [
                    "type" => "null"
                ],
                "interactionType" => [
                    "enum" => [
                        "true-false",
                        "fill-in",
                        "long-fill-in",
                        "numeric",
                        "other"
                    ]
                ]
            ]
        ],
        "interactionactivity_scale" => [
            "id" => "#interactionactivity_scale",
            "type" => "object",
            "allOf" => [
                [
                  "\$ref" => "#interactionactivity_base"
                ]
            ],
            "required" => [
                "scale",
                "interactionType"
            ],
            "properties" => [
                "choices" => [
                    "type" => "null"
                ],
                "scale" => [
                  "\$ref" => "#interactioncomponent_list"
                ],
                "source" => [
                    "type" => "null"
                ],
                "target" => [
                    "type" => "null"
                ],
                "steps" => [
                    "type" => "null"
                ],
                "interactionType" => [
                    "enum" => [
                        "likert"
                    ]
                ]
            ]
        ],
        "interactionactivity_sourcetarget" => [
            "id" => "#interactionactivity_sourcetarget",
            "type" => "object",
            "allOf" => [
                [
                  "\$ref" => "#interactionactivity_base"
                ]
            ],
            "required" => [
                "source",
                "target",
                "interactionType"
            ],
            "properties" => [
                "choices" => [
                    "type" => "null"
                ],
                "scale" => [
                    "type" => "null"
                ],
                "source" => [
                  "\$ref" => "#interactioncomponent_list"
                ],
                "target" => [
                  "\$ref" => "#interactioncomponent_list"
                ],
                "steps" => [
                    "type" => "null"
                ],
                "interactionType" => [
                    "enum" => [
                        "matching"
                    ]
                ]
            ]
        ],
        "interactionactivity_steps" => [
            "id" => "#interactionactivity_steps",
            "type" => "object",
            "allOf" => [
                [
                  "\$ref" => "#interactionactivity_base"
                ]
            ],
            "required" => [
                "steps",
                "interactionType"
            ],
            "properties" => [
                "choices" => [
                    "type" => "null"
                ],
                "scale" => [
                    "type" => "null"
                ],
                "source" => [
                    "type" => "null"
                ],
                "target" => [
                    "type" => "null"
                ],
                "steps" => [
                  "\$ref" => "#interactioncomponent_list"
                ],
                "interactionType" => [
                    "enum" => [
                        "performance"
                    ]
                ]
            ]
        ],
        "interactioncomponent" => [
            "id" => "#interactioncomponent",
            "type" => "object",
            "required" => [
                "id"
            ],
            "properties" => [
                "id" => [
                    "type" => "string",
                    "minLength" => 1
                ],
                "description" => [
                  "\$ref" => "#languagemap"
                ]
            ]
        ],
        "interactioncomponent_list" => [
            "id" => "#interactioncomponent_list",
            "type" => "array",
            "items" => [
              "\$ref" => "#interactioncomponent"
            ],
            "minItems" => 1
        ],
        "inversefunctional" => [
            "id" => "#inversefunctional",
            "oneOf" => [
                [
                  "\$ref" => "#mbox"
                ],
                [
                  "\$ref" => "#mbox_sha1sum"
                ],
                [
                  "\$ref" => "#openid"
                ],
                [
                  "\$ref" => "#account"
                ]
            ]
        ],
        "languagemap" => [
            "id" => "#languagemap",
            "type" => "object",
            "patternProperties" => [
                "^(((([A-Za-z][2,3](-([A-Za-z][3](-[A-Za-z][3])[0,2]))?)|[A-Za-z][4]|[A-Za-z][5,8])(-([A-Za-z][4]))?(-([A-Za-z][2]|[0-9][3]))?(-([A-Za-z0-9][5,8]|[0-9][A-Za-z0-9][3]))*(-([0-9A-WY-Za-wy-z](-[A-Za-z0-9][2,8])+))*(-(x(-[A-Za-z0-9][1,8])+))?)|(x(-[A-Za-z0-9][1,8])+)|((en-GB-oed|i-ami|i-bnn|i-default|i-enochian|i-hak|i-klingon|i-lux|i-mingo|i-navajo|i-pwn|i-tao|i-tay|i-tsu|sgn-BE-FR|sgn-BE-NL|sgn-CH-DE)|(art-lojban|cel-gaulish|no-bok|no-nyn|zh-guoyu|zh-hakka|zh-min|zh-min-nan|zh-xiang)))$" => [
                    "type" => "string"
                ]
            ],
            "additionalProperties" => false
        ],
        "mbox" => [
            "id" => "#mbox",
            "type" => "object",
            "required" => [
                "mbox"
            ],
            "properties" => [
                "mbox" => [
                    "id" => "#mbox!core",
                    "type" => "string",
                    "allOf" => [
                        []
                    ]
                ],
                "mbox_sha1sum" => [
                    "type" => "null"
                ],
                "openid" => [
                    "type" => "null"
                ],
                "account" => [
                    "type" => "null"
                ]
            ]
        ],
        "mbox_sha1sum" => [
            "id" => "#mbox_sha1sum",
            "type" => "object",
            "required" => [
                "mbox_sha1sum"
            ],
            "properties" => [
                "mbox_sha1sum" => [
                    "id" => "#mbox_sha1sum!core",
                    "type" => "string",
                    "allOf" => [
                        []
                    ]
                ],
                "mbox" => [
                    "type" => "null"
                ],
                "openid" => [
                    "type" => "null"
                ],
                "account" => [
                    "type" => "null"
                ]
            ]
        ],
        "openid" => [
            "id" => "#openid",
            "type" => "object",
            "required" => [
                "openid"
            ],
            "properties" => [
                "openid" => [
                    "id" => "#openid!core",
                    "type" => "string",
                    "allOf" => [
                        []
                    ]
                ],
                "mbox" => [
                    "type" => "null"
                ],
                "mbox_sha1sum" => [
                    "type" => "null"
                ],
                "account" => [
                    "type" => "null"
                ]
            ]
        ],
        "person" => [
            "id" => "#person",
            "type" => "object",
            "additionalProperties" => false,
            "required" => [
                "objectType"
            ],
            "properties" => [
                "objectType" => [
                    "enum" => [
                        "Person"
                    ]
                ],
                "name" => [
                    "type" => "array",
                    "items" => [
                        "type" => "string"
                    ]
                ],
                "mbox" => [
                    "type" => "array",
                    "items" => [
                      "\$ref" => "#mbox!core"
                    ]
                ],
                "mbox_sha1sum" => [
                    "type" => "array",
                    "items" => [
                      "\$ref" => "#mbox_sha1sum!core"
                    ]
                ],
                "openid" => [
                    "type" => "array",
                    "items" => [
                      "\$ref" => "#openid!core"
                    ]
                ],
                "account" => [
                    "type" => "array",
                    "items" => [
                      "\$ref" => "#account!core"
                    ]
                ]
            ]
        ],
        "result" => [
            "id" => "#result",
            "type" => "object",
            "properties" => [
                "score" => [
                  "\$ref" => "#score"
                ],
                "success" => [
                    "type" => "boolean"
                ],
                "completion" => [
                    "type" => "boolean"
                ],
                "response" => [
                    "type" => "string"
                ],
                "duration" => [
                    "type" => "string",
                    "allOf" => [
                        []
                    ]
                ],
                "extensions" => [
                  "\$ref" => "#extensions"
                ]
            ],
            "additionalProperties" => false
        ],
        "score" => [
            "id" => "#score",
            "type" => "object",
            "additionalProperties" => false,
            "properties" => [
                "scaled" => [
                    "type" => "number",
                    "minimum" => -1,
                    "maximum" => 1
                ],
                "raw" => [
                    "type" => "number"
                ],
                "min" => [
                    "type" => "number"
                ],
                "max" => [
                    "type" => "number"
                ]
            ]
        ],
        "statement" => [
            "id" => "#statement",
            "type" => "object",
            "allOf" => [
                [
                  "\$ref" => "#statement_base"
                ]
            ],
            "properties" => [
                "objectType" => [
                    "type" => "null"
                ],
                "id" => [],
                "actor" => [],
                "verb" => [],
                "object" => [],
                "result" => [],
                "context" => [],
                "timestamp" => [],
                "stored" => [],
                "authority" => [],
                "version" => [],
                "attachments" => []
            ],
            "additionalProperties" => false
        ],
        "statement_base" => [
            "id" => "#statement_base",
            "type" => "object",
            "required" => [
                "actor",
                "verb",
                "object"
            ],
            "oneOf" => [
                [
                    "required" => [
                        "object"
                    ],
                    "properties" => [
                        "object" => [
                          "\$ref" => "#activity"
                        ]
                    ]
                ],
                [
                    "required" => [
                        "object"
                    ],
                    "properties" => [
                        "object" => [
                            "not" => [
                              "\$ref" => "#activity"
                            ]
                        ],
                        "context" => [
                            "properties" => [
                                "revision" => [
                                    "type" => "null"
                                ],
                                "platform" => [
                                    "type" => "null"
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            "additionalProperties" => false,
            "properties" => [
                "objectType" => [],
                "id" => [
                    "type" => "string",
                    "allOf" => [
                        []
                    ]
                ],
                "actor" => [
                    "oneOf" => [
                        [
                          "\$ref" => "#agent"
                        ],
                        [
                          "\$ref" => "#group"
                        ]
                    ]
                ],
                "verb" => [
                  "\$ref" => "#verb"
                ],
                "object" => [
                  "\$ref" => "#statement_object"
                ],
                "result" => [
                  "\$ref" => "#result"
                ],
                "context" => [
                  "\$ref" => "#context"
                ],
                "timestamp" => [
                    "type" => "string",
                    "allOf" => [
                        []
                    ]
                ],
                "stored" => [
                    "type" => "string",
                    "allOf" => [
                        []
                    ]
                ],
                "authority" => [
                    "oneOf" => [
                        [
                          "\$ref" => "#agent"
                        ],
                        [
                            "allOf" => [
                                [
                                  "\$ref" => "#anonymousgroup"
                                ]
                            ],
                            "properties" => [
                                "member" => [
                                    "type" => "array",
                                    "items" => [
                                      "\$ref" => "#agent"
                                    ],
                                    "minItems" => 2,
                                    "maxItems" => 2
                                ]
                            ]
                        ]
                    ]
                ],
                "version" => [
                  "\$ref" => "#version"
                ],
                "attachments" => [
                    "type" => "array",
                    "items" => [
                      "\$ref" => "#attachment"
                    ]
                ]
            ]
        ],
        "statement_object" => [
            "id" => "#statement_object",
            "type" => "object",
            "oneOf" => [
                [
                  "\$ref" => "#activity"
                ],
                [
                    "required" => [
                        "objectType"
                    ],
                    "oneOf" => [
                        [
                          "\$ref" => "#agent"
                        ],
                        [
                          "\$ref" => "#group"
                        ],
                        [
                          "\$ref" => "#statementref"
                        ],
                        [
                          "\$ref" => "#substatement"
                        ]
                    ]
                ]
            ]
        ],
        "statementref" => [
            "id" => "#statementref",
            "type" => "object",
            "additionalProperties" => false,
            "required" => [
                "objectType",
                "id"
            ],
            "properties" => [
                "objectType" => [
                    "enum" => [
                        "StatementRef"
                    ]
                ],
                "id" => [
                    "type" => "string",
                    "allOf" => [
                        []
                    ]
                ]
            ]
        ],
        "statementresult" => [
            "id" => "#statementresult",
            "type" => "object",
            "additionalProperties" => false,
            "required" => [
                "statements"
            ],
            "properties" => [
                "statements" => [
                    "type" => "array",
                    "items" => [
                      "\$ref" => "#statement"
                    ]
                ],
                "more" => [
                    "type" => "string",
                    "allOf" => [
                        []
                    ]
                ]
            ]
        ],
        "substatement" => [
            "id" => "#substatement",
            "allOf" => [
                [
                  "\$ref" => "#statement_base"
                ]
            ],
            "required" => [
                "objectType"
            ],
            "additionalProperties" => false,
            "properties" => [
                "objectType" => [
                    "enum" => [
                        "SubStatement"
                    ]
                ],
                "id" => [
                    "type" => "null"
                ],
                "stored" => [
                    "type" => "null"
                ],
                "version" => [],
                "authority" => [
                    "type" => "null"
                ],
                "object" => [
                    "not" => [
                        "required" => [
                            "objectType"
                        ],
                        "properties" => [
                            "objectType" => [
                                "enum" => [
                                    "SubStatement"
                                ]
                            ]
                        ]
                    ]
                ],
                "actor" => [],
                "verb" => [],
                "result" => [],
                "context" => [],
                "timestamp" => [],
                "attachments" => []
            ]
        ],
        "verb" => [
            "id" => "#verb",
            "type" => "object",
            "required" => [
                "id"
            ],
            "properties" => [
                "id" => [
                    "type" => "string",
                    "allOf" => [
                        []
                    ]
                ],
                "display" => [
                  "\$ref" => "#languagemap"
                ]
            ],
            "additionalProperties" => false
        ]
    ],
    "additionalProperties" => false,
    "definitions" => [
        "version" => [
            "type" => "string",
            "pattern" => "^[0-9]+\\.[0-9]+\\.[0-9]+(?:-[0-9A-Za-z-]+)?$"
        ],
        "uuid" => [
            "type" => "string",
            "pattern" => "^[0-9a-fA-F][8](?:-[0-9a-fA-F][4])[3]-[0-9a-fA-F][12]$"
        ],
        "sha1" => [
            "type" => "string",
            "pattern" => "^[0-9a-fA-F][40]$"
        ],
        "sha2" => [
            "type" => "string",
            "pattern" => "^[0-9a-fA-F][56](?:[0-9a-fA-F][8](?:[0-9a-fA-F][32])[0,2])?$"
        ],
        "mimetype" => [
            "type" => "string",
            "pattern" => "^[-\\w\\+\\.]+/[-\\w\\+\\.]+(?:;\\s*[-\\w\\+\\.]+=(?:(['\"]?)[-\\w\\+\\.]+\\1)|''|\"\")?$"
        ],
        "mailto-iri" => [
            "type" => "string",
            "pattern" => "^mailto:(?:%[0-9a-fA-F][2]|[-a-zA-Z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:])+@(?:\\[(?:(?:(?:(?:[0-9A-Fa-f][1,4]:)[6]|::(?:[0-9A-Fa-f][1,4]:)[5]|(?:[0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:)[4]|(?:(?:[0-9A-Fa-f][1,4]:)[0,1][0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:)[3]|(?:(?:[0-9A-Fa-f][1,4]:)[0,2][0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:)[2]|(?:(?:[0-9A-Fa-f][1,4]:)[0,3][0-9A-Fa-f][1,4])?::[0-9A-Fa-f][1,4]:|(?:(?:[0-9A-Fa-f][1,4]:)[0,4][0-9A-Fa-f][1,4])?::)(?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.)[3](?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?))|(?:(?:[0-9A-Fa-f][1,4]:)[0,5][0-9A-Fa-f][1,4])?::[0-9A-Fa-f][1,4]|(?:(?:[0-9A-Fa-f][1,4]:)[0,6][0-9A-Fa-f][1,4])?::)|[Vv][0-9A-Fa-f]+\\.[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:]+)\\]|(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.)[3](?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)|(?:%[0-9a-fA-F][2]|[-a-zA-Z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:])+)$"
        ],
        "mailto-uri" => [
            "type" => "string",
            "pattern" => "^mailto:(?:(?:(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:]|%[0-9A-Fa-f][2])+)@(?:(?:\\[(?:(?:(?:(?:[0-9A-Fa-f][1,4]:)[6]|::(?:[0-9A-Fa-f][1,4]:)[5]|(?:[0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:)[4]|(?:(?:[0-9A-Fa-f][1,4]:)[0,1][0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:)[3]|(?:(?:[0-9A-Fa-f][1,4]:)[0,2][0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:)[2]|(?:(?:[0-9A-Fa-f][1,4]:)[0,3][0-9A-Fa-f][1,4])?::[0-9A-Fa-f][1,4]:|(?:(?:[0-9A-Fa-f][1,4]:)[0,4][0-9A-Fa-f][1,4])?::)(?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.)[3](?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?))|(?:(?:[0-9A-Fa-f][1,4]:)[0,5][0-9A-Fa-f][1,4])?::[0-9A-Fa-f][1,4]|(?:(?:[0-9A-Fa-f][1,4]:)[0,6][0-9A-Fa-f][1,4])?::)|[Vv][0-9A-Fa-f]+\\.[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:]+)\\]|(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.)[3](?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)|(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=]|%[0-9A-Fa-f][2])+)))$"
        ],
        "iri" => [
            "type" => "string",
            "pattern" => "^(?:[A-Za-z](?:[-A-Za-z0-9\\+\\.])*:(?:\\/\\/(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:])*@)?(?:\\[(?:(?:(?:[0-9A-Fa-f][1,4]:)[6](?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|::(?:[0-9A-Fa-f][1,4]:)[5](?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|(?:[0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:)[4](?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|(?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:)[3](?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|(?:(?:[0-9A-Fa-f][1,4]:)[0,2][0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:)[2](?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|(?:(?:[0-9A-Fa-f][1,4]:)[0,3][0-9A-Fa-f][1,4])?::[0-9A-Fa-f][1,4]:(?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|(?:(?:[0-9A-Fa-f][1,4]:)[0,4][0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|(?:(?:[0-9A-Fa-f][1,4]:)[0,5][0-9A-Fa-f][1,4])?::[0-9A-Fa-f][1,4]|(?:(?:[0-9A-Fa-f][1,4]:)[0,6][0-9A-Fa-f][1,4])?::)|v[0-9A-Fa-f]+[-A-Za-z0-9\\._~!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:]+)\\]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3]|(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=@])*)(?::[0-9]*)?(?:\\/(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@]))*)*|\\/(?:(?:(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@]))+)(?:\\/(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@]))*)*)?|(?:(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@]))+)(?:\\/(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@]))*)*|(?!(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@])))(?:\\?(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@])|[\\uE000-\\uF8FF\\uDC00\\uDB80-\\uDFFD\\uDBBF|\\uDC00\\uDBC0-\\uDFFD\\uDBFF\\/\\?])*)?(?:\\#(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@])|[\\/\\?])*)?)$"
        ],
        "iri-reference" => [
            "type" => "string",
            "pattern" => "^(?:[A-Za-z](?:[-A-Za-z0-9\\+\\.])*:(?:\\/\\/(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:])*@)?(?:\\[(?:(?:(?:[0-9A-Fa-f][1,4]:)[6](?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|::(?:[0-9A-Fa-f][1,4]:)[5](?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|(?:[0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:)[4](?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|(?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:)[3](?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|(?:(?:[0-9A-Fa-f][1,4]:)[0,2][0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:)[2](?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|(?:(?:[0-9A-Fa-f][1,4]:)[0,3][0-9A-Fa-f][1,4])?::[0-9A-Fa-f][1,4]:(?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|(?:(?:[0-9A-Fa-f][1,4]:)[0,4][0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|(?:(?:[0-9A-Fa-f][1,4]:)[0,5][0-9A-Fa-f][1,4])?::[0-9A-Fa-f][1,4]|(?:(?:[0-9A-Fa-f][1,4]:)[0,6][0-9A-Fa-f][1,4])?::)|v[0-9A-Fa-f]+[-A-Za-z0-9\\._~!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:]+)\\]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3]|(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=@])*)(?::[0-9]*)?(?:\\/(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@]))*)*|\\/(?:(?:(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@]))+)(?:\\/(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@]))*)*)?|(?:(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@]))+)(?:\\/(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@]))*)*|(?!(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@])))(?:\\?(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@])|[\\uE000-\\uF8FF\\uDC00\\uDB80-\\uDFFD\\uDBBF|\\uDC00\\uDBC0-\\uDFFD\\uDBFF\\/\\?])*)?(?:\\#(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@])|[\\/\\?])*)?|(?:\\/\\/(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:])*@)?(?:\\[(?:(?:(?:[0-9A-Fa-f][1,4]:)[6](?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|::(?:[0-9A-Fa-f][1,4]:)[5](?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|(?:[0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:)[4](?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|(?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:)[3](?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|(?:(?:[0-9A-Fa-f][1,4]:)[0,2][0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:)[2](?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|(?:(?:[0-9A-Fa-f][1,4]:)[0,3][0-9A-Fa-f][1,4])?::[0-9A-Fa-f][1,4]:(?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|(?:(?:[0-9A-Fa-f][1,4]:)[0,4][0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3])|(?:(?:[0-9A-Fa-f][1,4]:)[0,5][0-9A-Fa-f][1,4])?::[0-9A-Fa-f][1,4]|(?:(?:[0-9A-Fa-f][1,4]:)[0,6][0-9A-Fa-f][1,4])?::)|v[0-9A-Fa-f]+[-A-Za-z0-9\\._~!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:]+)\\]|(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5])(?:\\.(?:[0-9]|[1-9][0-9]|1[0-9][0-9]|2[0-4][0-9]|25[0-5]))[3]|(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=@])*)(?::[0-9]*)?(?:\\/(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@]))*)*|\\/(?:(?:(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@]))+)(?:\\/(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@]))*)*)?|(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=@])+)(?:\\/(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@]))*)*|(?!(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@])))(?:\\?(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@])|[\\uE000-\\uF8FF\\uDC00\\uDB80-\\uDFFD\\uDBBF|\\uDC00\\uDBC0-\\uDFFD\\uDBFF\\/\\?])*)?(?:\\#(?:(?:%[0-9A-Fa-f][0-9A-Fa-f]|[-A-Za-z0-9\\._~\\u00A0-\\uD7FF\\uF900-\\uFDCF\\uFDF0-\\uFFEF\\uDC00\\uD800-\\uDFFD\\uD83F\\uDC00\\uD840-\\uDFFD\\uD87F\\uDC00\\uD880-\\uDFFD\\uD8BF\\uDC00\\uD8C0-\\uDFFD\\uD8FF\\uDC00\\uD900-\\uDFFD\\uD93F\\uDC00\\uD940-\\uDFFD\\uD97F\\uDC00\\uD980-\\uDFFD\\uD9BF\\uDC00\\uD9C0-\\uDFFD\\uD9FF\\uDC00\\uDA00-\\uDFFD\\uDA3F\\uDC00\\uDA40-\\uDFFD\\uDA7F\\uDC00\\uDA80-\\uDFFD\\uDABF\\uDC00\\uDAC0-\\uDFFD\\uDAFF\\uDC00\\uDB00-\\uDFFD\\uDB3F\\uDC00\\uDB44-\\uDFFD\\uDB7F!\\@@SCHEMA_VALUES@@'\\(\\)\\*\\+,;=:@])|[\\/\\?])*)?)$"
        ],
        "rfc3986-uri" => [
            "type" => "string",
            "pattern" => "^[A-Za-z][A-Za-z0-9+\\-.]*:(?:\\/\\/(?:(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:]|%[0-9A-Fa-f][2])*@)?(?:\\[(?:(?:(?:(?:[0-9A-Fa-f][1,4]:)[6]|::(?:[0-9A-Fa-f][1,4]:)[5]|(?:[0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:)[4]|(?:(?:[0-9A-Fa-f][1,4]:)[0,1][0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:)[3]|(?:(?:[0-9A-Fa-f][1,4]:)[0,2][0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:)[2]|(?:(?:[0-9A-Fa-f][1,4]:)[0,3][0-9A-Fa-f][1,4])?::[0-9A-Fa-f][1,4]:|(?:(?:[0-9A-Fa-f][1,4]:)[0,4][0-9A-Fa-f][1,4])?::)(?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.)[3](?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?))|(?:(?:[0-9A-Fa-f][1,4]:)[0,5][0-9A-Fa-f][1,4])?::[0-9A-Fa-f][1,4]|(?:(?:[0-9A-Fa-f][1,4]:)[0,6][0-9A-Fa-f][1,4])?::)|[Vv][0-9A-Fa-f]+\\.[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:]+)\\]|(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.)[3](?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)|(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=]|%[0-9A-Fa-f][2])*)(?::[0-9]*)?(?:\\/(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:@]|%[0-9A-Fa-f][2])*)*|\\/(?:(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:@]|%[0-9A-Fa-f][2])+(?:\\/(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:@]|%[0-9A-Fa-f][2])*)*)?|(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:@]|%[0-9A-Fa-f][2])+(?:\\/(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:@]|%[0-9A-Fa-f][2])*)*|)(?:\\?(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:@\\/?]|%[0-9A-Fa-f][2])*)?(?:\\#(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:@\\/?]|%[0-9A-Fa-f][2])*)?$"
        ],
        "rfc3986-uri-reference" => [
            "type" => "string",
            "pattern" => "^(?:[A-Za-z][A-Za-z0-9+\\-.]*:(?:\\/\\/(?:(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:]|%[0-9A-Fa-f][2])*@)?(?:\\[(?:(?:(?:(?:[0-9A-Fa-f][1,4]:)[6]|::(?:[0-9A-Fa-f][1,4]:)[5]|(?:[0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:)[4]|(?:(?:[0-9A-Fa-f][1,4]:)[0,1][0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:)[3]|(?:(?:[0-9A-Fa-f][1,4]:)[0,2][0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:)[2]|(?:(?:[0-9A-Fa-f][1,4]:)[0,3][0-9A-Fa-f][1,4])?::[0-9A-Fa-f][1,4]:|(?:(?:[0-9A-Fa-f][1,4]:)[0,4][0-9A-Fa-f][1,4])?::)(?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.)[3](?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?))|(?:(?:[0-9A-Fa-f][1,4]:)[0,5][0-9A-Fa-f][1,4])?::[0-9A-Fa-f][1,4]|(?:(?:[0-9A-Fa-f][1,4]:)[0,6][0-9A-Fa-f][1,4])?::)|[Vv][0-9A-Fa-f]+\\.[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:]+)\\]|(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.)[3](?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)|(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=]|%[0-9A-Fa-f][2])*)(?::[0-9]*)?(?:\\/(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:@]|%[0-9A-Fa-f][2])*)*|\\/(?:(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:@]|%[0-9A-Fa-f][2])+(?:\\/(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:@]|%[0-9A-Fa-f][2])*)*)?|(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:@]|%[0-9A-Fa-f][2])+(?:\\/(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:@]|%[0-9A-Fa-f][2])*)*|)(?:\\?(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:@\\/?]|%[0-9A-Fa-f][2])*)?(?:\\#(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:@\\/?]|%[0-9A-Fa-f][2])*)?|(?:\\/\\/(?:(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:]|%[0-9A-Fa-f][2])*@)?(?:\\[(?:(?:(?:(?:[0-9A-Fa-f][1,4]:)[6]|::(?:[0-9A-Fa-f][1,4]:)[5]|(?:[0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:)[4]|(?:(?:[0-9A-Fa-f][1,4]:)[0,1][0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:)[3]|(?:(?:[0-9A-Fa-f][1,4]:)[0,2][0-9A-Fa-f][1,4])?::(?:[0-9A-Fa-f][1,4]:)[2]|(?:(?:[0-9A-Fa-f][1,4]:)[0,3][0-9A-Fa-f][1,4])?::[0-9A-Fa-f][1,4]:|(?:(?:[0-9A-Fa-f][1,4]:)[0,4][0-9A-Fa-f][1,4])?::)(?:[0-9A-Fa-f][1,4]:[0-9A-Fa-f][1,4]|(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.)[3](?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?))|(?:(?:[0-9A-Fa-f][1,4]:)[0,5][0-9A-Fa-f][1,4])?::[0-9A-Fa-f][1,4]|(?:(?:[0-9A-Fa-f][1,4]:)[0,6][0-9A-Fa-f][1,4])?::)|[Vv][0-9A-Fa-f]+\\.[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:]+)\\]|(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\\.)[3](?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)|(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=]|%[0-9A-Fa-f][2])*)(?::[0-9]*)?(?:\\/(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:@]|%[0-9A-Fa-f][2])*)*|\\/(?:(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:@]|%[0-9A-Fa-f][2])+(?:\\/(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:@]|%[0-9A-Fa-f][2])*)*)?|(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=@]|%[0-9A-Fa-f][2])+(?:\\/(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:@]|%[0-9A-Fa-f][2])*)*|)(?:\\?(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:@\\/?]|%[0-9A-Fa-f][2])*)?(?:\\#(?:[A-Za-z0-9\\-._~!@@SCHEMA_VALUES@@'()*+,;=:@\\/?]|%[0-9A-Fa-f][2])*)?)$"
        ],
        "iso_date" => [
            "type" => "string",
            "pattern" => "^([-+]?\\d[4](?!\\d[2]\b))((-?)((0[1-9]|1[0-2])(\\3([12]\\d|0[1-9]|3[01]))?|W([0-4]\\d|5[0-2])(-?[1-7])?|(00[1-9]|0[1-9]\\d|[12]\\d[2]|3([0-5]\\d|6[1-6])))([T\\s]((([01]\\d|2[0-3])((:?)[0-5]\\d)?|24\\:?00)([\\.,]\\d+(?!:))?)?(\\17[0-5]\\d([\\.,]\\d+)?)?([zZ]|([-+])([01]\\d|2[0-3]):?([0-5]\\d)?)?)?)?$"
        ],
        "iso_duration" => [
            "type" => "string",
            "pattern" => "^P(?=\\w*\\d)(?:\\d+Y|Y)?(?:\\d+M|M)?(?:\\d+W|W)?(?:\\d+D|D)?(?:T(?:\\d+H|H)?(?:\\d+M|M)?(?:\\d+(?:\\.\\d[1,2])?S|S)?)?$"
        ],
        "langtag" => [
            "type" => "string",
            "pattern" => "^(((([A-Za-z][2,3](-([A-Za-z][3](-[A-Za-z][3])[0,2]))?)|[A-Za-z][4]|[A-Za-z][5,8])(-([A-Za-z][4]))?(-([A-Za-z][2]|[0-9][3]))?(-([A-Za-z0-9][5,8]|[0-9][A-Za-z0-9][3]))*(-([0-9A-WY-Za-wy-z](-[A-Za-z0-9][2,8])+))*(-(x(-[A-Za-z0-9][1,8])+))?)|(x(-[A-Za-z0-9][1,8])+)|((en-GB-oed|i-ami|i-bnn|i-default|i-enochian|i-hak|i-klingon|i-lux|i-mingo|i-navajo|i-pwn|i-tao|i-tay|i-tsu|sgn-BE-FR|sgn-BE-NL|sgn-CH-DE)|(art-lojban|cel-gaulish|no-bok|no-nyn|zh-guoyu|zh-hakka|zh-min|zh-min-nan|zh-xiang)))$"
        ]
    ]
];

    public static function schema(){
        return self::$schema;
    }

}
