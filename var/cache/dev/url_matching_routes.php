<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'index', '_controller' => 'App\\Controller\\MainController::index'], null, null, null, false, false, null]],
        '/dashboard' => [[['_route' => 'dashboard', '_controller' => 'App\\Controller\\MainController::dashboard'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\RegistrationController::register'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/verify/email' => [[['_route' => 'app_verify_email', '_controller' => 'App\\Controller\\RegistrationController::verifyUserEmail'], null, null, null, false, false, null]],
        '/reset-password/forgot-password' => [[['_route' => 'app_forgot_password_request', '_controller' => 'App\\Controller\\ResetPasswordController::request'], null, null, null, false, false, null]],
        '/reset-password/check-email' => [[['_route' => 'app_check_email', '_controller' => 'App\\Controller\\ResetPasswordController::checkEmail'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/dashboard/login_check' => [
            [['_route' => 'api_authentication'], null, null, null, false, false, null],
            [['_route' => 'api_login_check'], null, null, null, false, false, null],
        ],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|wdt/([^/]++)(*:24)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:69)'
                            .'|router(*:82)'
                            .'|exception(?'
                                .'|(*:101)'
                                .'|\\.css(*:114)'
                            .')'
                        .')'
                        .'|(*:124)'
                    .')'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:159)'
                .')'
                .'|/reset\\-password/reset(?:/([^/]++))?(*:204)'
                .'|/dashboard(?'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:253)'
                    .'|/(?'
                        .'|d(?'
                            .'|ocs(?:\\.([^/]++))?(*:287)'
                            .'|ecoction_mash_steps(?:\\.([^/]++))?(*:329)'
                        .')'
                        .'|contexts/(.+)(?:\\.([^/]++))?(*:366)'
                        .'|users(?'
                            .'|(?:\\.([^/]++))?(*:397)'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:434)'
                            .')'
                        .')'
                        .'|water_grain_ratios(?'
                            .'|(?:\\.([^/]++))?(*:480)'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(*:514)'
                        .')'
                        .'|mash(?'
                            .'|_volumes(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:559)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:594)'
                            .')'
                            .'|es(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:626)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:664)'
                                .')'
                            .')'
                        .')'
                        .'|next_(?'
                            .'|infusion_mash_step_with(?'
                                .'|_grain_adjuncts(?'
                                    .'|(?:\\.([^/]++))?(*:742)'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:776)'
                                .')'
                                .'|out_grain_adjuncts(?'
                                    .'|(?:\\.([^/]++))?(*:821)'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:855)'
                                .')'
                            .')'
                            .'|decoction_mash_step_with(?'
                                .'|_grain_adjuncts(?'
                                    .'|(?:\\.([^/]++))?(*:925)'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:959)'
                                .')'
                                .'|out_grain_adjuncts(?'
                                    .'|(?:\\.([^/]++))?(*:1004)'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1039)'
                                .')'
                            .')'
                        .')'
                        .'|in(?'
                            .'|fusion_mash_steps(?:\\.([^/]++))?(*:1088)'
                            .'|it_infusions(?'
                                .'|(?:\\.([^/]++))?(*:1127)'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(*:1162)'
                            .')'
                        .')'
                        .'|b(?'
                            .'|oiler_equipments(?'
                                .'|(?:\\.([^/]++))?(?'
                                    .'|(*:1214)'
                                .')'
                                .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                    .'|(*:1253)'
                                .')'
                            .')'
                            .'|eer_(?'
                                .'|styles(?'
                                    .'|(?:\\.([^/]++))?(*:1295)'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:1333)'
                                    .')'
                                .')'
                                .'|recipes(?'
                                    .'|(?:\\.([^/]++))?(?'
                                        .'|(*:1372)'
                                    .')'
                                    .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                        .'|(*:1411)'
                                    .')'
                                .')'
                            .')'
                        .')'
                        .'|fermentables(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1457)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1496)'
                            .')'
                        .')'
                        .'|hops(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1532)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1571)'
                            .')'
                        .')'
                        .'|yeasts(?'
                            .'|(?:\\.([^/]++))?(?'
                                .'|(*:1609)'
                            .')'
                            .'|/([^/\\.]++)(?:\\.([^/]++))?(?'
                                .'|(*:1648)'
                            .')'
                        .')'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        24 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        69 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        82 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        101 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        114 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        124 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        159 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        204 => [[['_route' => 'app_reset_password', 'token' => null, '_controller' => 'App\\Controller\\ResetPasswordController::reset'], ['token'], null, null, false, true, null]],
        253 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        287 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        329 => [[['_route' => 'api_decoction_mash_steps_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\DecoctionMashSteps', '_api_identifiers' => [], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null]],
        366 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        397 => [[['_route' => 'api_users_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_identifiers' => ['realUsername'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null]],
        434 => [
            [['_route' => 'api_users_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_identifiers' => ['realUsername'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'get'], ['realUsername', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_users_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\User', '_api_identifiers' => ['realUsername'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'patch'], ['realUsername', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        480 => [[['_route' => 'api_water_grain_ratios_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\WaterGrainRatio', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null]],
        514 => [[['_route' => 'api_water_grain_ratios_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\WaterGrainRatio', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        559 => [
            [['_route' => 'api_mash_volumes_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\MashVolume', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_mash_volumes_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\MashVolume', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        594 => [[['_route' => 'api_mash_volumes_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\MashVolume', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        626 => [
            [['_route' => 'api_mashes_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Mash', '_api_identifiers' => ['slug'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_mashes_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Mash', '_api_identifiers' => ['slug'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        664 => [
            [['_route' => 'api_mashes_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Mash', '_api_identifiers' => ['slug'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'get'], ['slug', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_mashes_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Mash', '_api_identifiers' => ['slug'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'patch'], ['slug', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        742 => [[['_route' => 'api_next_infusion_mash_step_with_grain_adjuncts_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\NextInfusionMashStepWithGrainAdjunct', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null]],
        776 => [[['_route' => 'api_next_infusion_mash_step_with_grain_adjuncts_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\NextInfusionMashStepWithGrainAdjunct', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        821 => [[['_route' => 'api_next_infusion_mash_step_without_grain_adjuncts_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\NextInfusionMashStepWithoutGrainAdjunct', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null]],
        855 => [[['_route' => 'api_next_infusion_mash_step_without_grain_adjuncts_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\NextInfusionMashStepWithoutGrainAdjunct', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        925 => [[['_route' => 'api_next_decoction_mash_step_with_grain_adjuncts_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\NextDecoctionMashStepWithGrainAdjunct', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null]],
        959 => [[['_route' => 'api_next_decoction_mash_step_with_grain_adjuncts_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\NextDecoctionMashStepWithGrainAdjunct', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1004 => [[['_route' => 'api_next_decoction_mash_step_without_grain_adjuncts_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\NextDecoctionMashStepWithoutGrainAdjunct', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null]],
        1039 => [[['_route' => 'api_next_decoction_mash_step_without_grain_adjuncts_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\NextDecoctionMashStepWithoutGrainAdjunct', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1088 => [[['_route' => 'api_infusion_mash_steps_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\InfusionMashSteps', '_api_identifiers' => [], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null]],
        1127 => [[['_route' => 'api_init_infusions_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\InitInfusion', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null]],
        1162 => [[['_route' => 'api_init_infusions_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\InitInfusion', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null]],
        1214 => [
            [['_route' => 'api_boiler_equipments_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\BoilerEquipment', '_api_identifiers' => ['name'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_boiler_equipments_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\BoilerEquipment', '_api_identifiers' => ['name'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1253 => [
            [['_route' => 'api_boiler_equipments_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\BoilerEquipment', '_api_identifiers' => ['name'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'get'], ['name', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_boiler_equipments_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\BoilerEquipment', '_api_identifiers' => ['name'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'delete'], ['name', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_boiler_equipments_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\BoilerEquipment', '_api_identifiers' => ['name'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'put'], ['name', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_boiler_equipments_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\BoilerEquipment', '_api_identifiers' => ['name'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'patch'], ['name', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        1295 => [[['_route' => 'api_beer_styles_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\BeerStyle', '_api_identifiers' => ['name'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null]],
        1333 => [
            [['_route' => 'api_beer_styles_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\BeerStyle', '_api_identifiers' => ['name'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'get'], ['name', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_beer_styles_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\BeerStyle', '_api_identifiers' => ['name'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'patch'], ['name', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        1372 => [
            [['_route' => 'api_beer_recipes_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\BeerRecipe', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_beer_recipes_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\BeerRecipe', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1411 => [
            [['_route' => 'api_beer_recipes_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\BeerRecipe', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'get'], ['id', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_beer_recipes_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\BeerRecipe', '_api_identifiers' => ['id'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'put'], ['id', '_format'], ['PUT' => 0], null, false, true, null],
        ],
        1457 => [
            [['_route' => 'api_fermentables_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Fermentable', '_api_identifiers' => ['name'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_fermentables_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Fermentable', '_api_identifiers' => ['name'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1496 => [
            [['_route' => 'api_fermentables_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Fermentable', '_api_identifiers' => ['name'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'get'], ['name', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_fermentables_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Fermentable', '_api_identifiers' => ['name'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'delete'], ['name', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_fermentables_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Fermentable', '_api_identifiers' => ['name'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'put'], ['name', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_fermentables_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Fermentable', '_api_identifiers' => ['name'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'patch'], ['name', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        1532 => [
            [['_route' => 'api_hops_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Hop', '_api_identifiers' => ['name'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_hops_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Hop', '_api_identifiers' => ['name'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1571 => [
            [['_route' => 'api_hops_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Hop', '_api_identifiers' => ['name'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'get'], ['name', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_hops_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Hop', '_api_identifiers' => ['name'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'delete'], ['name', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_hops_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Hop', '_api_identifiers' => ['name'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'put'], ['name', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_hops_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Hop', '_api_identifiers' => ['name'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'patch'], ['name', '_format'], ['PATCH' => 0], null, false, true, null],
        ],
        1609 => [
            [['_route' => 'api_yeasts_get_collection', '_controller' => 'api_platform.action.get_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Yeast', '_api_identifiers' => ['name'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'get'], ['_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_yeasts_post_collection', '_controller' => 'api_platform.action.post_collection', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Yeast', '_api_identifiers' => ['name'], '_api_has_composite_identifier' => false, '_api_collection_operation_name' => 'post'], ['_format'], ['POST' => 0], null, false, true, null],
        ],
        1648 => [
            [['_route' => 'api_yeasts_get_item', '_controller' => 'api_platform.action.get_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Yeast', '_api_identifiers' => ['name'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'get'], ['name', '_format'], ['GET' => 0], null, false, true, null],
            [['_route' => 'api_yeasts_delete_item', '_controller' => 'api_platform.action.delete_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Yeast', '_api_identifiers' => ['name'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'delete'], ['name', '_format'], ['DELETE' => 0], null, false, true, null],
            [['_route' => 'api_yeasts_put_item', '_controller' => 'api_platform.action.put_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Yeast', '_api_identifiers' => ['name'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'put'], ['name', '_format'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'api_yeasts_patch_item', '_controller' => 'api_platform.action.patch_item', '_format' => null, '_stateless' => null, '_api_resource_class' => 'App\\Entity\\Yeast', '_api_identifiers' => ['name'], '_api_has_composite_identifier' => false, '_api_item_operation_name' => 'patch'], ['name', '_format'], ['PATCH' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
