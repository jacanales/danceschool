var classes = [
    {
        "name": "AppBundle\\AppBundle",
        "interface": false,
        "methods": [
            {
                "name": "build",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getContainerExtension",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 1,
        "externals": [
            "Symfony\\Component\\HttpKernel\\Bundle\\Bundle",
            "Symfony\\Component\\DependencyInjection\\ContainerBuilder",
            "parent",
            "AppBundle\\DependencyInjection\\AppExtension"
        ],
        "lcom": 2,
        "length": 3,
        "vocabulary": 2,
        "volume": 3,
        "difficulty": 1,
        "effort": 3,
        "level": 1,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 3,
        "number_operators": 1,
        "number_operands": 2,
        "number_operators_unique": 1,
        "number_operands_unique": 1,
        "cloc": 0,
        "loc": 12,
        "lloc": 12,
        "mi": 72.98,
        "mIwoC": 72.98,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 0.75,
        "relativeSystemComplexity": 1.75,
        "totalStructuralComplexity": 2,
        "totalDataComplexity": 1.5,
        "totalSystemComplexity": 3.5,
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 4,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Controller\\CourseController",
        "interface": false,
        "methods": [
            {
                "name": "indexAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "showAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "editAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "removeAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 6,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Symfony\\Component\\HttpFoundation\\Request",
            "AppBundle\\Entity\\Course",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Symfony\\Component\\HttpFoundation\\Request",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route"
        ],
        "lcom": 1,
        "length": 122,
        "vocabulary": 26,
        "volume": 573.45,
        "difficulty": 8.73,
        "effort": 5004.69,
        "level": 0.11,
        "bugs": 0.19,
        "time": 278,
        "intelligentContent": 65.71,
        "number_operators": 26,
        "number_operands": 96,
        "number_operators_unique": 4,
        "number_operands_unique": 22,
        "cloc": 40,
        "loc": 97,
        "lloc": 57,
        "mi": 83.51,
        "mIwoC": 41.58,
        "commentWeight": 41.93,
        "kanDefect": 0.5,
        "relativeStructuralComplexity": 324,
        "relativeDataComplexity": 0.42,
        "relativeSystemComplexity": 324.42,
        "totalStructuralComplexity": 1620,
        "totalDataComplexity": 2.11,
        "totalSystemComplexity": 1622.11,
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 9,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Controller\\DefaultController",
        "interface": false,
        "methods": [
            {
                "name": "indexAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 1,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route"
        ],
        "lcom": 1,
        "length": 3,
        "vocabulary": 3,
        "volume": 4.75,
        "difficulty": 0.5,
        "effort": 2.38,
        "level": 2,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 9.51,
        "number_operators": 1,
        "number_operands": 2,
        "number_operators_unique": 1,
        "number_operands_unique": 2,
        "cloc": 3,
        "loc": 11,
        "lloc": 8,
        "mi": 111.61,
        "mIwoC": 75.43,
        "commentWeight": 36.18,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 0.5,
        "relativeSystemComplexity": 1.5,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 0.5,
        "totalSystemComplexity": 1.5,
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 2,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Controller\\GroupController",
        "interface": false,
        "methods": [
            {
                "name": "indexAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "showAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "editAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "removeAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addStudentAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "editStudentAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "removeStudentAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 8,
        "nbMethods": 8,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 8,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 10,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Symfony\\Component\\HttpFoundation\\Request",
            "AppBundle\\Entity\\Group",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Symfony\\Component\\HttpFoundation\\Request",
            "AppBundle\\Form\\Type\\GroupType",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Symfony\\Component\\HttpFoundation\\Request",
            "AppBundle\\Entity\\GroupStudent",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Symfony\\Component\\HttpFoundation\\Request",
            "AppBundle\\Form\\Type\\GroupStudentType",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route"
        ],
        "lcom": 1,
        "length": 256,
        "vocabulary": 34,
        "volume": 1302.39,
        "difficulty": 13.87,
        "effort": 18059.81,
        "level": 0.07,
        "bugs": 0.43,
        "time": 1003,
        "intelligentContent": 93.92,
        "number_operators": 48,
        "number_operands": 208,
        "number_operators_unique": 4,
        "number_operands_unique": 30,
        "cloc": 65,
        "loc": 165,
        "lloc": 100,
        "mi": 74.53,
        "mIwoC": 33.22,
        "commentWeight": 41.31,
        "kanDefect": 0.78,
        "relativeStructuralComplexity": 441,
        "relativeDataComplexity": 0.61,
        "relativeSystemComplexity": 441.61,
        "totalStructuralComplexity": 3528,
        "totalDataComplexity": 4.91,
        "totalSystemComplexity": 3532.91,
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 17,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Controller\\RoomController",
        "interface": false,
        "methods": [
            {
                "name": "indexAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "showAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "editAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "removeAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 6,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Symfony\\Component\\HttpFoundation\\Request",
            "AppBundle\\Entity\\Room",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Symfony\\Component\\HttpFoundation\\Request",
            "AppBundle\\Form\\Type\\RoomType",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route"
        ],
        "lcom": 1,
        "length": 124,
        "vocabulary": 26,
        "volume": 582.85,
        "difficulty": 8.91,
        "effort": 5192.7,
        "level": 0.11,
        "bugs": 0.19,
        "time": 288,
        "intelligentContent": 65.42,
        "number_operators": 26,
        "number_operands": 98,
        "number_operators_unique": 4,
        "number_operands_unique": 22,
        "cloc": 40,
        "loc": 97,
        "lloc": 57,
        "mi": 83.46,
        "mIwoC": 41.53,
        "commentWeight": 41.93,
        "kanDefect": 0.5,
        "relativeStructuralComplexity": 324,
        "relativeDataComplexity": 0.42,
        "relativeSystemComplexity": 324.42,
        "totalStructuralComplexity": 1620,
        "totalDataComplexity": 2.11,
        "totalSystemComplexity": 1622.11,
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 10,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Controller\\StudentController",
        "interface": false,
        "methods": [
            {
                "name": "indexAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "showAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "editAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "removeAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addAnnotationAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "editAnnotationAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "removeAnnotationAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 8,
        "nbMethods": 8,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 8,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 10,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Method",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Method",
            "Symfony\\Component\\HttpFoundation\\Request",
            "AppBundle\\Entity\\Student",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Method",
            "Symfony\\Component\\HttpFoundation\\Request",
            "AppBundle\\Form\\Type\\StudentType",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Method",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Method",
            "Symfony\\Component\\HttpFoundation\\Request",
            "AppBundle\\Form\\Type\\StudentAnnotationType",
            "AppBundle\\Entity\\StudentAnnotation",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Method",
            "Symfony\\Component\\HttpFoundation\\Request",
            "AppBundle\\Form\\Type\\StudentAnnotationType",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Method",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Method"
        ],
        "lcom": 1,
        "length": 228,
        "vocabulary": 34,
        "volume": 1159.94,
        "difficulty": 12.13,
        "effort": 14073.96,
        "level": 0.08,
        "bugs": 0.39,
        "time": 782,
        "intelligentContent": 95.6,
        "number_operators": 46,
        "number_operands": 182,
        "number_operators_unique": 4,
        "number_operands_unique": 30,
        "cloc": 73,
        "loc": 171,
        "lloc": 98,
        "mi": 76.16,
        "mIwoC": 33.76,
        "commentWeight": 42.4,
        "kanDefect": 0.78,
        "relativeStructuralComplexity": 400,
        "relativeDataComplexity": 0.64,
        "relativeSystemComplexity": 400.64,
        "totalStructuralComplexity": 3200,
        "totalDataComplexity": 5.14,
        "totalSystemComplexity": 3205.14,
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 26,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Controller\\TeacherController",
        "interface": false,
        "methods": [
            {
                "name": "indexAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "showAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "editAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "removeAction",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 6,
        "externals": [
            "Symfony\\Bundle\\FrameworkBundle\\Controller\\Controller",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Symfony\\Component\\HttpFoundation\\Request",
            "AppBundle\\Entity\\Teacher",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Symfony\\Component\\HttpFoundation\\Request",
            "AppBundle\\Form\\Type\\TeacherType",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route",
            "Sensio\\Bundle\\FrameworkExtraBundle\\Configuration\\Route"
        ],
        "lcom": 1,
        "length": 104,
        "vocabulary": 19,
        "volume": 441.78,
        "difficulty": 10.67,
        "effort": 4712.37,
        "level": 0.09,
        "bugs": 0.15,
        "time": 262,
        "intelligentContent": 41.42,
        "number_operators": 24,
        "number_operands": 80,
        "number_operators_unique": 4,
        "number_operands_unique": 15,
        "cloc": 36,
        "loc": 91,
        "lloc": 55,
        "mi": 84.08,
        "mIwoC": 42.71,
        "commentWeight": 41.37,
        "kanDefect": 0.5,
        "relativeStructuralComplexity": 256,
        "relativeDataComplexity": 0.47,
        "relativeSystemComplexity": 256.47,
        "totalStructuralComplexity": 1280,
        "totalDataComplexity": 2.35,
        "totalSystemComplexity": 1282.35,
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 10,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\DataFixtures\\ORM\\LoadCourseData",
        "interface": false,
        "methods": [
            {
                "name": "load",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addCourse",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getOrder",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 3,
        "nbMethods": 3,
        "nbMethodsPrivate": 1,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 1,
        "externals": [
            "Doctrine\\Common\\DataFixtures\\AbstractFixture",
            "Doctrine\\Common\\DataFixtures\\OrderedFixtureInterface",
            "Doctrine\\Common\\Persistence\\ObjectManager",
            "AppBundle\\Entity\\Course"
        ],
        "lcom": 2,
        "length": 47,
        "vocabulary": 24,
        "volume": 215.49,
        "difficulty": 2,
        "effort": 430.99,
        "level": 0.5,
        "bugs": 0.07,
        "time": 24,
        "intelligentContent": 107.75,
        "number_operators": 3,
        "number_operands": 44,
        "number_operators_unique": 2,
        "number_operands_unique": 22,
        "cloc": 6,
        "loc": 41,
        "lloc": 35,
        "mi": 77.77,
        "mIwoC": 49.84,
        "commentWeight": 27.93,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 25,
        "relativeDataComplexity": 0.33,
        "relativeSystemComplexity": 25.33,
        "totalStructuralComplexity": 75,
        "totalDataComplexity": 1,
        "totalSystemComplexity": 76,
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 4,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\DataFixtures\\ORM\\LoadGroupData",
        "interface": false,
        "methods": [
            {
                "name": "load",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getOrder",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 2,
        "externals": [
            "Doctrine\\Common\\DataFixtures\\AbstractFixture",
            "Doctrine\\Common\\DataFixtures\\OrderedFixtureInterface",
            "Doctrine\\Common\\Persistence\\ObjectManager",
            "Faker\\Factory",
            "AppBundle\\Entity\\Group",
            "DateTime"
        ],
        "lcom": 2,
        "length": 71,
        "vocabulary": 27,
        "volume": 337.6,
        "difficulty": 4.96,
        "effort": 1673.31,
        "level": 0.2,
        "bugs": 0.11,
        "time": 93,
        "intelligentContent": 68.11,
        "number_operators": 14,
        "number_operands": 57,
        "number_operators_unique": 4,
        "number_operands_unique": 23,
        "cloc": 12,
        "loc": 48,
        "lloc": 36,
        "mi": 83.05,
        "mIwoC": 48.08,
        "commentWeight": 34.97,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 256,
        "relativeDataComplexity": 0.09,
        "relativeSystemComplexity": 256.09,
        "totalStructuralComplexity": 512,
        "totalDataComplexity": 0.18,
        "totalSystemComplexity": 512.18,
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 6,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\DataFixtures\\ORM\\LoadRoomData",
        "interface": false,
        "methods": [
            {
                "name": "setContainer",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "load",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addRoom",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getOrder",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 4,
        "nbMethodsPrivate": 1,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 1,
        "externals": [
            "Doctrine\\Common\\DataFixtures\\AbstractFixture",
            "Doctrine\\Common\\DataFixtures\\OrderedFixtureInterface",
            "Symfony\\Component\\DependencyInjection\\ContainerAwareInterface",
            "Symfony\\Component\\DependencyInjection\\ContainerInterface",
            "Doctrine\\Common\\Persistence\\ObjectManager",
            "AppBundle\\Entity\\Room"
        ],
        "lcom": 2,
        "length": 49,
        "vocabulary": 27,
        "volume": 232.99,
        "difficulty": 1.8,
        "effort": 419.38,
        "level": 0.56,
        "bugs": 0.08,
        "time": 23,
        "intelligentContent": 129.44,
        "number_operators": 4,
        "number_operands": 45,
        "number_operators_unique": 2,
        "number_operands_unique": 25,
        "cloc": 14,
        "loc": 42,
        "lloc": 30,
        "mi": 90.06,
        "mIwoC": 51.07,
        "commentWeight": 38.99,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 144,
        "relativeDataComplexity": 0.25,
        "relativeSystemComplexity": 144.25,
        "totalStructuralComplexity": 576,
        "totalDataComplexity": 1,
        "totalSystemComplexity": 577,
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 6,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\DataFixtures\\ORM\\LoadStudentData",
        "interface": false,
        "methods": [
            {
                "name": "setContainer",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "load",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "generatePassword",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getOrder",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 4,
        "nbMethodsPrivate": 1,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 2,
        "externals": [
            "Doctrine\\Common\\DataFixtures\\AbstractFixture",
            "Doctrine\\Common\\DataFixtures\\OrderedFixtureInterface",
            "Symfony\\Component\\DependencyInjection\\ContainerAwareInterface",
            "Symfony\\Component\\DependencyInjection\\ContainerInterface",
            "Doctrine\\Common\\Persistence\\ObjectManager",
            "Faker\\Factory",
            "AppBundle\\Entity\\User",
            "AppBundle\\Entity\\Student",
            "AppBundle\\Entity\\User"
        ],
        "lcom": 2,
        "length": 70,
        "vocabulary": 21,
        "volume": 307.46,
        "difficulty": 6.82,
        "effort": 2097.98,
        "level": 0.15,
        "bugs": 0.1,
        "time": 117,
        "intelligentContent": 45.06,
        "number_operators": 12,
        "number_operands": 58,
        "number_operators_unique": 4,
        "number_operands_unique": 17,
        "cloc": 12,
        "loc": 52,
        "lloc": 40,
        "mi": 81.23,
        "mIwoC": 47.36,
        "commentWeight": 33.87,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 900,
        "relativeDataComplexity": 0.09,
        "relativeSystemComplexity": 900.09,
        "totalStructuralComplexity": 3600,
        "totalDataComplexity": 0.35,
        "totalSystemComplexity": 3600.35,
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 9,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\DataFixtures\\ORM\\LoadTeacherData",
        "interface": false,
        "methods": [
            {
                "name": "setContainer",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "load",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "generatePassword",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getOrder",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 4,
        "nbMethodsPrivate": 1,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 2,
        "externals": [
            "Doctrine\\Common\\DataFixtures\\AbstractFixture",
            "Doctrine\\Common\\DataFixtures\\OrderedFixtureInterface",
            "Symfony\\Component\\DependencyInjection\\ContainerAwareInterface",
            "Symfony\\Component\\DependencyInjection\\ContainerInterface",
            "Doctrine\\Common\\Persistence\\ObjectManager",
            "Faker\\Factory",
            "AppBundle\\Entity\\User",
            "AppBundle\\Entity\\Teacher",
            "AppBundle\\Entity\\User",
            "AppBundle\\Entity\\Teacher",
            "AppBundle\\Entity\\User"
        ],
        "lcom": 2,
        "length": 82,
        "vocabulary": 27,
        "volume": 389.9,
        "difficulty": 5.91,
        "effort": 2305.5,
        "level": 0.17,
        "bugs": 0.13,
        "time": 128,
        "intelligentContent": 65.94,
        "number_operators": 14,
        "number_operands": 68,
        "number_operators_unique": 4,
        "number_operands_unique": 23,
        "cloc": 12,
        "loc": 55,
        "lloc": 43,
        "mi": 79.06,
        "mIwoC": 45.96,
        "commentWeight": 33.11,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 676,
        "relativeDataComplexity": 0.1,
        "relativeSystemComplexity": 676.1,
        "totalStructuralComplexity": 2704,
        "totalDataComplexity": 0.41,
        "totalSystemComplexity": 2704.41,
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 11,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\DataFixtures\\ORM\\LoadUserData",
        "interface": false,
        "methods": [
            {
                "name": "setContainer",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "load",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addUser",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "generatePassword",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getOrder",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 2,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 3,
        "externals": [
            "Doctrine\\Common\\DataFixtures\\AbstractFixture",
            "Doctrine\\Common\\DataFixtures\\OrderedFixtureInterface",
            "Symfony\\Component\\DependencyInjection\\ContainerAwareInterface",
            "Symfony\\Component\\DependencyInjection\\ContainerInterface",
            "Doctrine\\Common\\Persistence\\ObjectManager"
        ],
        "lcom": 2,
        "length": 50,
        "vocabulary": 19,
        "volume": 212.4,
        "difficulty": 3.66,
        "effort": 776.57,
        "level": 0.27,
        "bugs": 0.07,
        "time": 43,
        "intelligentContent": 58.09,
        "number_operators": 11,
        "number_operands": 39,
        "number_operators_unique": 3,
        "number_operands_unique": 16,
        "cloc": 14,
        "loc": 52,
        "lloc": 38,
        "mi": 84.84,
        "mIwoC": 48.84,
        "commentWeight": 36,
        "kanDefect": 0.29,
        "relativeStructuralComplexity": 169,
        "relativeDataComplexity": 0.39,
        "relativeSystemComplexity": 169.39,
        "totalStructuralComplexity": 845,
        "totalDataComplexity": 1.93,
        "totalSystemComplexity": 846.93,
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 5,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\DependencyInjection\\AppExtension",
        "interface": false,
        "methods": [
            {
                "name": "load",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 1,
        "externals": [
            "Symfony\\Component\\HttpKernel\\DependencyInjection\\Extension",
            "Symfony\\Component\\DependencyInjection\\ContainerBuilder",
            "Symfony\\Component\\Config\\FileLocator",
            "Symfony\\Component\\DependencyInjection\\Loader\\YamlFileLoader"
        ],
        "lcom": 1,
        "length": 10,
        "vocabulary": 8,
        "volume": 30,
        "difficulty": 1.33,
        "effort": 40,
        "level": 0.75,
        "bugs": 0.01,
        "time": 2,
        "intelligentContent": 22.5,
        "number_operators": 2,
        "number_operands": 8,
        "number_operators_unique": 2,
        "number_operands_unique": 6,
        "cloc": 0,
        "loc": 9,
        "lloc": 9,
        "mi": 68.71,
        "mIwoC": 68.71,
        "commentWeight": 0,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 1,
        "relativeSystemComplexity": 2,
        "totalStructuralComplexity": 1,
        "totalDataComplexity": 1,
        "totalSystemComplexity": 2,
        "pageRank": 0.02,
        "afferentCoupling": 1,
        "efferentCoupling": 4,
        "instability": 0.8,
        "violations": {}
    },
    {
        "name": "AppBundle\\Entity\\Course",
        "interface": false,
        "methods": [
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setId",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDescription",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setDescription",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getPrice",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setPrice",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getGroups",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setGroups",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 8,
        "nbMethods": 0,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 4,
        "nbMethodsSetters": 4,
        "ccn": 1,
        "externals": [],
        "lcom": 1,
        "length": 28,
        "vocabulary": 7,
        "volume": 78.61,
        "difficulty": 3.6,
        "effort": 282.98,
        "level": 0.28,
        "bugs": 0.03,
        "time": 16,
        "intelligentContent": 21.83,
        "number_operators": 10,
        "number_operands": 18,
        "number_operators_unique": 2,
        "number_operands_unique": 5,
        "cloc": 58,
        "loc": 100,
        "lloc": 42,
        "mi": 97.41,
        "mIwoC": 51.18,
        "commentWeight": 46.23,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 6.5,
        "relativeSystemComplexity": 6.5,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 52,
        "totalSystemComplexity": 52,
        "pageRank": 0.08,
        "afferentCoupling": 3,
        "efferentCoupling": 0,
        "instability": 0,
        "violations": {}
    },
    {
        "name": "AppBundle\\Entity\\Group",
        "interface": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "__toString",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setName",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getName",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setWeekday",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getWeekday",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setHour",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getHour",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setStartDate",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getStartDate",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setEndDate",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getEndDate",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setWhatsappGroup",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getWhatsappGroup",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCourse",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCourse",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setRoom",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getRoom",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setTeacher",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getTeacher",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addGroupStudent",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "removeGroupStudent",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getGroupStudent",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 24,
        "nbMethods": 9,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 9,
        "nbMethodsGetter": 10,
        "nbMethodsSetters": 5,
        "ccn": 1,
        "externals": [
            "Doctrine\\Common\\Collections\\ArrayCollection",
            "DateTime",
            "AppBundle\\Entity\\Course",
            "AppBundle\\Entity\\Room",
            "AppBundle\\Entity\\Teacher",
            "AppBundle\\Entity\\GroupStudent",
            "AppBundle\\Entity\\GroupStudent"
        ],
        "lcom": 1,
        "length": 94,
        "vocabulary": 15,
        "volume": 367.25,
        "difficulty": 4.62,
        "effort": 1694.99,
        "level": 0.22,
        "bugs": 0.12,
        "time": 94,
        "intelligentContent": 79.57,
        "number_operators": 34,
        "number_operands": 60,
        "number_operators_unique": 2,
        "number_operands_unique": 13,
        "cloc": 206,
        "loc": 330,
        "lloc": 124,
        "mi": 83.26,
        "mIwoC": 36.24,
        "commentWeight": 47.02,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 4.49,
        "relativeSystemComplexity": 20.49,
        "totalStructuralComplexity": 384,
        "totalDataComplexity": 107.8,
        "totalSystemComplexity": 491.8,
        "pageRank": 0.2,
        "afferentCoupling": 6,
        "efferentCoupling": 7,
        "instability": 0.54,
        "violations": {}
    },
    {
        "name": "AppBundle\\Entity\\GroupStudent",
        "interface": false,
        "methods": [
            {
                "name": "getGroup",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setGroup",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getStudent",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setStudent",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "isReinforcing",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setReinforcing",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 6,
        "nbMethods": 0,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 3,
        "nbMethodsSetters": 3,
        "ccn": 1,
        "externals": [],
        "lcom": 1,
        "length": 18,
        "vocabulary": 6,
        "volume": 46.53,
        "difficulty": 3,
        "effort": 139.59,
        "level": 0.33,
        "bugs": 0.02,
        "time": 8,
        "intelligentContent": 15.51,
        "number_operators": 6,
        "number_operands": 12,
        "number_operators_unique": 2,
        "number_operands_unique": 4,
        "cloc": 50,
        "loc": 82,
        "lloc": 32,
        "mi": 102.13,
        "mIwoC": 55.35,
        "commentWeight": 46.78,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 3.5,
        "relativeSystemComplexity": 3.5,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 21,
        "totalSystemComplexity": 21,
        "pageRank": 0.15,
        "afferentCoupling": 5,
        "efferentCoupling": 0,
        "instability": 0,
        "violations": {}
    },
    {
        "name": "AppBundle\\Entity\\Room",
        "interface": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "__toString",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setId",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getName",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setName",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getDescription",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setDescription",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getPrice",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setPrice",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAddress",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setAddress",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCity",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCity",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getPostalCode",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setPostalCode",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getPhone",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setPhone",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getGroups",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setGroups",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addGroup",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "removeGroup",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 22,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 9,
        "nbMethodsSetters": 9,
        "ccn": 1,
        "externals": [
            "Doctrine\\Common\\Collections\\ArrayCollection",
            "AppBundle\\Entity\\Group",
            "AppBundle\\Entity\\Group"
        ],
        "lcom": 1,
        "length": 86,
        "vocabulary": 14,
        "volume": 327.43,
        "difficulty": 4.58,
        "effort": 1500.73,
        "level": 0.22,
        "bugs": 0.11,
        "time": 83,
        "intelligentContent": 71.44,
        "number_operators": 31,
        "number_operands": 55,
        "number_operators_unique": 2,
        "number_operands_unique": 12,
        "cloc": 142,
        "loc": 253,
        "lloc": 111,
        "mi": 83.49,
        "mIwoC": 37.64,
        "commentWeight": 45.85,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 4,
        "relativeDataComplexity": 6.83,
        "relativeSystemComplexity": 10.83,
        "totalStructuralComplexity": 88,
        "totalDataComplexity": 150.33,
        "totalSystemComplexity": 238.33,
        "pageRank": 0.08,
        "afferentCoupling": 3,
        "efferentCoupling": 3,
        "instability": 0.5,
        "violations": {}
    },
    {
        "name": "AppBundle\\Entity\\Student",
        "interface": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "__toString",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCaptationMethod",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCaptationMethod",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setMember",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getMember",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setContractExpiration",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getContractExpiration",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setComment",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getComment",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setUser",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUser",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addGroupStudent",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "removeGroupStudent",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getGroupStudent",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addAnnotation",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "removeAnnotation",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAnnotations",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getFullName",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setAccountNumber",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 21,
        "nbMethods": 8,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 8,
        "nbMethodsGetter": 8,
        "nbMethodsSetters": 5,
        "ccn": 1,
        "externals": [
            "Doctrine\\Common\\Collections\\ArrayCollection",
            "Doctrine\\Common\\Collections\\ArrayCollection",
            "AppBundle\\Entity\\User",
            "AppBundle\\Entity\\GroupStudent",
            "AppBundle\\Entity\\GroupStudent",
            "AppBundle\\Entity\\StudentAnnotation",
            "AppBundle\\Entity\\StudentAnnotation"
        ],
        "lcom": 1,
        "length": 81,
        "vocabulary": 14,
        "volume": 308.4,
        "difficulty": 7.09,
        "effort": 2186.81,
        "level": 0.14,
        "bugs": 0.1,
        "time": 121,
        "intelligentContent": 43.49,
        "number_operators": 29,
        "number_operands": 52,
        "number_operators_unique": 3,
        "number_operands_unique": 11,
        "cloc": 159,
        "loc": 264,
        "lloc": 105,
        "mi": 84.99,
        "mIwoC": 38.35,
        "commentWeight": 46.64,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 25,
        "relativeDataComplexity": 2.91,
        "relativeSystemComplexity": 27.91,
        "totalStructuralComplexity": 525,
        "totalDataComplexity": 61.17,
        "totalSystemComplexity": 586.17,
        "pageRank": 0.02,
        "afferentCoupling": 3,
        "efferentCoupling": 7,
        "instability": 0.7,
        "violations": {}
    },
    {
        "name": "AppBundle\\Entity\\StudentAnnotation",
        "interface": false,
        "methods": [
            {
                "name": "setCreatedAt",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setUpdatedAt",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setMessage",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getMessage",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCreated",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCreated",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setModified",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getModified",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setStudent",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getStudent",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 11,
        "nbMethods": 3,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 3,
        "nbMethodsGetter": 5,
        "nbMethodsSetters": 3,
        "ccn": 1,
        "externals": [
            "DateTime",
            "Doctrine\\ORM\\Mapping",
            "DateTime",
            "Doctrine\\ORM\\Mapping",
            "Doctrine\\ORM\\Mapping",
            "AppBundle\\Entity\\Student"
        ],
        "lcom": 1,
        "length": 40,
        "vocabulary": 8,
        "volume": 120,
        "difficulty": 4.17,
        "effort": 500,
        "level": 0.24,
        "bugs": 0.04,
        "time": 28,
        "intelligentContent": 28.8,
        "number_operators": 15,
        "number_operands": 25,
        "number_operators_unique": 2,
        "number_operands_unique": 6,
        "cloc": 97,
        "loc": 154,
        "lloc": 57,
        "mi": 94.12,
        "mIwoC": 47,
        "commentWeight": 47.12,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 9.36,
        "relativeSystemComplexity": 9.36,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 103,
        "totalSystemComplexity": 103,
        "pageRank": 0.03,
        "afferentCoupling": 3,
        "efferentCoupling": 6,
        "instability": 0.67,
        "violations": {}
    },
    {
        "name": "AppBundle\\Entity\\Teacher",
        "interface": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "__toString",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getId",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setWage",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getWage",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setComment",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getComment",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setUser",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getUser",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addClassGroup",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "removeClassGroup",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getGroups",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getFullName",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 13,
        "nbMethods": 6,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 6,
        "nbMethodsGetter": 5,
        "nbMethodsSetters": 2,
        "ccn": 1,
        "externals": [
            "Doctrine\\Common\\Collections\\ArrayCollection",
            "AppBundle\\Entity\\User",
            "AppBundle\\Entity\\Group",
            "AppBundle\\Entity\\Group"
        ],
        "lcom": 1,
        "length": 48,
        "vocabulary": 10,
        "volume": 159.45,
        "difficulty": 6.43,
        "effort": 1025.05,
        "level": 0.16,
        "bugs": 0.05,
        "time": 57,
        "intelligentContent": 24.8,
        "number_operators": 18,
        "number_operands": 30,
        "number_operators_unique": 3,
        "number_operands_unique": 7,
        "cloc": 102,
        "loc": 168,
        "lloc": 66,
        "mi": 91.48,
        "mIwoC": 44.75,
        "commentWeight": 46.73,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 25,
        "relativeDataComplexity": 1.9,
        "relativeSystemComplexity": 26.9,
        "totalStructuralComplexity": 325,
        "totalDataComplexity": 24.67,
        "totalSystemComplexity": 349.67,
        "pageRank": 0.08,
        "afferentCoupling": 4,
        "efferentCoupling": 4,
        "instability": 0.5,
        "violations": {}
    },
    {
        "name": "AppBundle\\Entity\\User",
        "interface": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCreatedAt",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setUpdatedAt",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setName",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getName",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setSurname",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getSurname",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setGender",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getGender",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setBirthday",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getBirthday",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setPhone",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getPhone",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setAddress",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAddress",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCity",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCity",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCountry",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCountry",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setPostalCode",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getPostalCode",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setIdentityNumber",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getIdentityNumber",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setCreated",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getCreated",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "setModified",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getModified",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 27,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 12,
        "nbMethodsSetters": 10,
        "ccn": 2,
        "externals": [
            "FOS\\UserBundle\\Model\\User",
            "parent",
            "DateTime",
            "DateTime",
            "Doctrine\\ORM\\Mapping",
            "DateTime",
            "Doctrine\\ORM\\Mapping",
            "Doctrine\\ORM\\Mapping",
            "DateTime",
            "DateTime"
        ],
        "lcom": 1,
        "length": 111,
        "vocabulary": 18,
        "volume": 462.86,
        "difficulty": 7,
        "effort": 3240.03,
        "level": 0.14,
        "bugs": 0.15,
        "time": 180,
        "intelligentContent": 66.12,
        "number_operators": 41,
        "number_operands": 70,
        "number_operators_unique": 3,
        "number_operands_unique": 15,
        "cloc": 225,
        "loc": 367,
        "lloc": 142,
        "mi": 80.95,
        "mIwoC": 34.12,
        "commentWeight": 46.83,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 4,
        "relativeDataComplexity": 8.15,
        "relativeSystemComplexity": 12.15,
        "totalStructuralComplexity": 108,
        "totalDataComplexity": 220,
        "totalSystemComplexity": 328,
        "pageRank": 0.07,
        "afferentCoupling": 7,
        "efferentCoupling": 10,
        "instability": 0.59,
        "violations": {}
    },
    {
        "name": "AppBundle\\Form\\Type\\CourseType",
        "interface": false,
        "methods": [
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureOptions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getName",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getBlockPrefix",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface",
            "Symfony\\Component\\OptionsResolver\\OptionsResolver"
        ],
        "lcom": 3,
        "length": 26,
        "vocabulary": 17,
        "volume": 106.27,
        "difficulty": 0.75,
        "effort": 79.71,
        "level": 1.33,
        "bugs": 0.04,
        "time": 4,
        "intelligentContent": 141.7,
        "number_operators": 2,
        "number_operands": 24,
        "number_operators_unique": 1,
        "number_operands_unique": 16,
        "cloc": 13,
        "loc": 33,
        "lloc": 20,
        "mi": 98.61,
        "mIwoC": 57.3,
        "commentWeight": 41.31,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 0.69,
        "relativeSystemComplexity": 9.69,
        "totalStructuralComplexity": 36,
        "totalDataComplexity": 2.75,
        "totalSystemComplexity": 38.75,
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 3,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Form\\Type\\GenderType",
        "interface": false,
        "methods": [
            {
                "name": "__construct",
                "role": "setter",
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureOptions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getParent",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getName",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getBlockPrefix",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 1,
        "ccn": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\OptionsResolver\\OptionsResolver"
        ],
        "lcom": 3,
        "length": 13,
        "vocabulary": 6,
        "volume": 33.6,
        "difficulty": 2.25,
        "effort": 75.61,
        "level": 0.44,
        "bugs": 0.01,
        "time": 4,
        "intelligentContent": 14.94,
        "number_operators": 4,
        "number_operands": 9,
        "number_operators_unique": 2,
        "number_operands_unique": 4,
        "cloc": 3,
        "loc": 28,
        "lloc": 25,
        "mi": 82.97,
        "mIwoC": 58.68,
        "commentWeight": 24.28,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 4,
        "relativeDataComplexity": 1.13,
        "relativeSystemComplexity": 5.13,
        "totalStructuralComplexity": 20,
        "totalDataComplexity": 5.67,
        "totalSystemComplexity": 25.67,
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 2,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Form\\Type\\GroupStudentType",
        "interface": false,
        "methods": [
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureOptions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getName",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getBlockPrefix",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface",
            "Symfony\\Component\\OptionsResolver\\OptionsResolver"
        ],
        "lcom": 3,
        "length": 31,
        "vocabulary": 21,
        "volume": 136.16,
        "difficulty": 0.73,
        "effort": 98.72,
        "level": 1.38,
        "bugs": 0.05,
        "time": 5,
        "intelligentContent": 187.81,
        "number_operators": 2,
        "number_operands": 29,
        "number_operators_unique": 1,
        "number_operands_unique": 20,
        "cloc": 11,
        "loc": 31,
        "lloc": 20,
        "mi": 96.41,
        "mIwoC": 56.54,
        "commentWeight": 39.87,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 0.55,
        "relativeSystemComplexity": 16.55,
        "totalStructuralComplexity": 64,
        "totalDataComplexity": 2.2,
        "totalSystemComplexity": 66.2,
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 3,
        "instability": 0.75,
        "violations": {}
    },
    {
        "name": "AppBundle\\Form\\Type\\GroupType",
        "interface": false,
        "methods": [
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureOptions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getName",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getBlockPrefix",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface",
            "Symfony\\Component\\OptionsResolver\\OptionsResolver"
        ],
        "lcom": 3,
        "length": 79,
        "vocabulary": 38,
        "volume": 414.59,
        "difficulty": 1.04,
        "effort": 431.39,
        "level": 0.96,
        "bugs": 0.14,
        "time": 24,
        "intelligentContent": 398.43,
        "number_operators": 2,
        "number_operands": 77,
        "number_operators_unique": 1,
        "number_operands_unique": 37,
        "cloc": 13,
        "loc": 33,
        "lloc": 20,
        "mi": 94.47,
        "mIwoC": 53.16,
        "commentWeight": 41.31,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 0.55,
        "relativeSystemComplexity": 16.55,
        "totalStructuralComplexity": 64,
        "totalDataComplexity": 2.2,
        "totalSystemComplexity": 66.2,
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 3,
        "instability": 0.75,
        "violations": {}
    },
    {
        "name": "AppBundle\\Form\\Type\\RoomType",
        "interface": false,
        "methods": [
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureOptions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getName",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getBlockPrefix",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface",
            "Symfony\\Component\\OptionsResolver\\OptionsResolver"
        ],
        "lcom": 3,
        "length": 56,
        "vocabulary": 31,
        "volume": 277.43,
        "difficulty": 0.9,
        "effort": 249.69,
        "level": 1.11,
        "bugs": 0.09,
        "time": 14,
        "intelligentContent": 308.26,
        "number_operators": 2,
        "number_operands": 54,
        "number_operators_unique": 1,
        "number_operands_unique": 30,
        "cloc": 11,
        "loc": 31,
        "lloc": 20,
        "mi": 94.24,
        "mIwoC": 54.38,
        "commentWeight": 39.87,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 0.55,
        "relativeSystemComplexity": 16.55,
        "totalStructuralComplexity": 64,
        "totalDataComplexity": 2.2,
        "totalSystemComplexity": 66.2,
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 3,
        "instability": 0.75,
        "violations": {}
    },
    {
        "name": "AppBundle\\Form\\Type\\StudentAnnotationType",
        "interface": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureOptions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getName",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getBlockPrefix",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 2,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface",
            "Symfony\\Component\\OptionsResolver\\OptionsResolver"
        ],
        "lcom": 3,
        "length": 34,
        "vocabulary": 22,
        "volume": 151.62,
        "difficulty": 2.37,
        "effort": 359.1,
        "level": 0.42,
        "bugs": 0.05,
        "time": 20,
        "intelligentContent": 64.02,
        "number_operators": 4,
        "number_operands": 30,
        "number_operators_unique": 3,
        "number_operands_unique": 19,
        "cloc": 16,
        "loc": 45,
        "lloc": 29,
        "mi": 92.45,
        "mIwoC": 52.56,
        "commentWeight": 39.89,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 0.56,
        "relativeSystemComplexity": 16.56,
        "totalStructuralComplexity": 80,
        "totalDataComplexity": 2.8,
        "totalSystemComplexity": 82.8,
        "pageRank": 0.01,
        "afferentCoupling": 2,
        "efferentCoupling": 3,
        "instability": 0.6,
        "violations": {}
    },
    {
        "name": "AppBundle\\Form\\Type\\StudentType",
        "interface": false,
        "methods": [
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureOptions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getName",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getBlockPrefix",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 4,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 4,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface",
            "Symfony\\Component\\OptionsResolver\\OptionsResolver"
        ],
        "lcom": 3,
        "length": 44,
        "vocabulary": 29,
        "volume": 213.75,
        "difficulty": 0.75,
        "effort": 160.31,
        "level": 1.33,
        "bugs": 0.07,
        "time": 9,
        "intelligentContent": 285,
        "number_operators": 2,
        "number_operands": 42,
        "number_operators_unique": 1,
        "number_operands_unique": 28,
        "cloc": 13,
        "loc": 34,
        "lloc": 21,
        "mi": 95.61,
        "mIwoC": 54.71,
        "commentWeight": 40.9,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 0.55,
        "relativeSystemComplexity": 16.55,
        "totalStructuralComplexity": 64,
        "totalDataComplexity": 2.2,
        "totalSystemComplexity": 66.2,
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 3,
        "instability": 0.75,
        "violations": {}
    },
    {
        "name": "AppBundle\\Form\\Type\\TeacherType",
        "interface": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureOptions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getName",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getBlockPrefix",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface",
            "Symfony\\Component\\OptionsResolver\\OptionsResolver"
        ],
        "lcom": 4,
        "length": 32,
        "vocabulary": 21,
        "volume": 140.55,
        "difficulty": 1.53,
        "effort": 214.53,
        "level": 0.66,
        "bugs": 0.05,
        "time": 12,
        "intelligentContent": 92.09,
        "number_operators": 3,
        "number_operands": 29,
        "number_operators_unique": 2,
        "number_operands_unique": 19,
        "cloc": 16,
        "loc": 41,
        "lloc": 25,
        "mi": 95.51,
        "mIwoC": 54.33,
        "commentWeight": 41.18,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 0.56,
        "relativeSystemComplexity": 16.56,
        "totalStructuralComplexity": 80,
        "totalDataComplexity": 2.8,
        "totalSystemComplexity": 82.8,
        "pageRank": 0.01,
        "afferentCoupling": 1,
        "efferentCoupling": 3,
        "instability": 0.75,
        "violations": {}
    },
    {
        "name": "AppBundle\\Form\\Type\\UserType",
        "interface": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "buildForm",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureOptions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getName",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getBlockPrefix",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 1,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\Form\\FormBuilderInterface",
            "parent",
            "Symfony\\Component\\OptionsResolver\\OptionsResolver"
        ],
        "lcom": 3,
        "length": 108,
        "vocabulary": 60,
        "volume": 637.94,
        "difficulty": 2.71,
        "effort": 1729.16,
        "level": 0.37,
        "bugs": 0.21,
        "time": 96,
        "intelligentContent": 235.36,
        "number_operators": 5,
        "number_operands": 103,
        "number_operators_unique": 3,
        "number_operands_unique": 57,
        "cloc": 3,
        "loc": 31,
        "lloc": 28,
        "mi": 71.83,
        "mIwoC": 48.66,
        "commentWeight": 23.17,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 16,
        "relativeDataComplexity": 0.52,
        "relativeSystemComplexity": 16.52,
        "totalStructuralComplexity": 80,
        "totalDataComplexity": 2.6,
        "totalSystemComplexity": 82.6,
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 4,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Form\\Type\\WeekdayType",
        "interface": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "configureOptions",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getParent",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getName",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getBlockPrefix",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 5,
        "nbMethods": 5,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 5,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 2,
        "externals": [
            "Symfony\\Component\\Form\\AbstractType",
            "Symfony\\Component\\OptionsResolver\\OptionsResolver"
        ],
        "lcom": 3,
        "length": 24,
        "vocabulary": 14,
        "volume": 91.38,
        "difficulty": 2.45,
        "effort": 224.29,
        "level": 0.41,
        "bugs": 0.03,
        "time": 12,
        "intelligentContent": 37.23,
        "number_operators": 6,
        "number_operands": 18,
        "number_operators_unique": 3,
        "number_operands_unique": 11,
        "cloc": 3,
        "loc": 31,
        "lloc": 28,
        "mi": 77.61,
        "mIwoC": 54.43,
        "commentWeight": 23.17,
        "kanDefect": 0.38,
        "relativeStructuralComplexity": 4,
        "relativeDataComplexity": 1.07,
        "relativeSystemComplexity": 5.07,
        "totalStructuralComplexity": 20,
        "totalDataComplexity": 5.33,
        "totalSystemComplexity": 25.33,
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 2,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "AppBundle\\Menu\\Builder",
        "interface": false,
        "methods": [
            {
                "name": "mainMenu",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addRoomMenu",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addCourseMenu",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addTeacherMenu",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addStudentMenu",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "addGroupMenu",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "invalidMethod",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 7,
        "nbMethods": 7,
        "nbMethodsPrivate": 5,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "ccn": 1,
        "externals": [
            "Knp\\Menu\\FactoryInterface",
            "Knp\\Menu\\ItemInterface",
            "Knp\\Menu\\ItemInterface",
            "Knp\\Menu\\ItemInterface",
            "Knp\\Menu\\ItemInterface",
            "Knp\\Menu\\ItemInterface",
            "Knp\\Menu\\FactoryInterface",
            "stdClass"
        ],
        "lcom": 2,
        "length": 169,
        "vocabulary": 53,
        "volume": 968.02,
        "difficulty": 3.16,
        "effort": 3055.9,
        "level": 0.32,
        "bugs": 0.32,
        "time": 170,
        "intelligentContent": 306.64,
        "number_operators": 8,
        "number_operands": 161,
        "number_operators_unique": 2,
        "number_operands_unique": 51,
        "cloc": 10,
        "loc": 64,
        "lloc": 54,
        "mi": 69.91,
        "mIwoC": 41.17,
        "commentWeight": 28.74,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 64,
        "relativeDataComplexity": 0.33,
        "relativeSystemComplexity": 64.33,
        "totalStructuralComplexity": 448,
        "totalDataComplexity": 2.33,
        "totalSystemComplexity": 450.33,
        "pageRank": 0.01,
        "afferentCoupling": 0,
        "efferentCoupling": 8,
        "instability": 1,
        "violations": {}
    }
]